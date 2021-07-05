@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="detail-img" src="{{$product['gallery']}}" alt="">
            </div>

            <div class="col-sm-6">
                <a href="/">Go Back</a>
                <h2>{{$product['name']}}</h2>
                <h3><strong> Price:</strong> {{$product['price']}}</h3>
                <h4><strong>Product description:</strong> {{$product['description']}}</h4>
                <h4><strong>Category: </strong>{{$product['category']}}</h4>
            

                                 
                <form action="/add_to_cart" method="POST">

                    <label for="quantity"><h4><strong>Quantity:</strong></h4></label>
                    <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" required>                 
                    <br><br>
                    {{-- csrf mi sluzi za zastitu. Ovaj token se koristi da se potvrdi da je ulogovan korisnik onaj koji podnosi zahtev. Onemogucava zahteve sa drugih sajtova.  --}}   
                    @csrf 
                    <input type="hidden" name="product_id" value={{$product['id']}}>                    
                    <button class='btn btn-primary'>Add to Cart</button> 
                </form>
                <br><br>
            </div>

        </div>
    </div>
@endSection
