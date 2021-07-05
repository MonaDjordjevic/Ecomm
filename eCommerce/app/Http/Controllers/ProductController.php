<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    function search(Request $req)
    {

        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function addToCart(Request $request)
    {
        if (!$request->session()->has('user'))
        {
            return redirect('/login');
        }

        $user_id= $request->session()->get('user')['id'];
        
        $item = DB::table('cart')
        ->where('product_id','=',$request->product_id)
        ->where('user_id','=',$user_id)
        ->first();

        if ($item===null) {
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $request->product_id;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect('/');
        }

        DB::update('update cart set quantity = ? where id = ?',[$item->quantity+$request->quantity,$item->id]);
        return redirect('/');
        
    }

    static function cartItem()
    { //staticka je da bih mogao da je zovem u header-u
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    function cartList()
    {
        $userId = Session::get('user')['id'];

        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id','cart.quantity as quantity')
            ->get();

        return view('cartlist', ['products' => $products]);
    }

    function removeFromCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow()
    {
        $userId = Session::get('user')['id'];

        $total = DB::select('select sum(c.quantity * p.price) as value from cart c join products p on c.product_id=p.id where c.user_id = ?', [$userId]);

        $val=0;
        foreach($total as $t)
        {
            $val+=$t->value;
        }

        return view('ordernow', ['total' => $val]);
    }

    function orderPlace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allcartitems = Cart::where('user_id', $userId)->get();
        foreach ($allcartitems as $cart) 
        {
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status='pending';
            $order->payment_method=$req->payment;
            $order->payment_status='pending';
            $order->address=$req->address;
            $order->quantity=$cart['quantity'];
            $order->order_date=date("Y-m-d");
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
         $req->input();
         return redirect('/');
    }

    function myOrders(){
        $userId = Session::get('user')['id'];

        $orders= DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();

        return view('myorders',['orders'=>$orders]);
    }

}
