@extends('master')
@section('content')
    <div class="custom-product">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
         

            <!-- Wrapper for slides -->  
             <ol class="carousel-indicators">
                 @foreach ($products as $item)
                
                <li data-target="#myCarousel" data-slide-to="$item[id]" class="{{ $item['id'] == 1 ? 'active' : '' }}"></li>
               @endforeach
             </ol>
            <div class="carousel-inner">
                @foreach ($products as $item)
                
                    <li data-target="#myCarousel" data-slide-to="$item[id]" class="active"></li>
                
                    <!-- products je onaj niz iz ProductControllera-->
                    <div class="item {{ $item['id'] == 1 ? 'active' : '' }}">
                        <!-- Ako je id=1 primeni klasu active, inace ne treba nista da bude od elemenata -->
                       <a href="detail/{{$item['id']}}"><!-- kada se klikne predji na drugu stranicu -->
                        <img class="slider-img" src={{ $item['gallery'] }}>
                        <div class="carousel-caption slider-text">
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                       </a>
                    </div>
                @endforeach
                </ol>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="trending-wrapper">
            <h3>Trending products</h3>
            @foreach ($products as $item)
            <div class="trending-item">
                <a href="detail/{{$item['id']}}">
                <img class="trending-image" src={{ $item['gallery'] }}>
                <div class="">
                    <h3>{{ $item['name'] }}</h3>
                </div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
    </div>
@endSection
