@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a>
            <br><br>
            @foreach($products as $item)
            <div class="row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-image" src="{{$item->gallery}}">
                        </a>
                </div>
                <div class="col-sm-4">
                        <div class="">
                            <h1>{{$item->name}}</h1>
                            <h4><strong>Quantity:</strong> {{$item->quantity}}   <strong>Price:</strong> {{$item->price}}x{{$item->quantity}}=${{$item->quantity*$item->price}}</h4>
                            <h5><strong>Product Description: </strong>{{$item->description}}</h5>
                        </div>
                </div>
                <div class="col-sm-3">
                    <a href="/removefromcart/{{$item->cart_id}}" class="btn btn-warning">Remove from Cart</a>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="ordernow">Order Now</a>
    </div>
</div>
@endsection