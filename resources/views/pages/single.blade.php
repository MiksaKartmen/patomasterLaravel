@extends("layouts.layout");
@section("title") Menu @endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page bg-title-page-menu flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
        <h2 class="tit6 t-center">
            Pato Menu
        </h2>
    </section>

    <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
        <div class="container">
            <div id="item-name" class="mb-5 text-center">
                <h4><span>Name:</span> {{$item->name}}</h4>
            </div>
            <div id="item" class="d-flex justify-content-between">


                <div id="image-item" class="col-lg-6 col-sm-12">
                    <img src="{{asset("assets/images/".$item->image)}}" alt="{{$item->name}}">
                </div>
                <div id="info-item" class="d-flex flex-column justify-content-between col-lg-5 col-sm-12">

                    <div id="item-description">
                        <h4><span>Description:</span> {{$item->description}}</h4>
                    </div>
                    <div id="item-price">
                        <h4><span>Price:</span> ${{$item->price}}</h4>
                    </div>
                    <div id="item-category">
                        <h4><span>Category:</span> {{$item->category}}</h4>
                    </div>
                    <div id="item-meal-time">
                        <h4><span>Meal time:</span> {{$item->meal_time}}</h4>
                    </div>
                    <div id="item-meal-time-description">
                        <h4><span>{{$item->meal_time}}:</span> {{$item->meal_time_description}}</h4>
                    </div>
                    <div id="item-meal-time-description">
                        <h4><span>Starting from:</span> {{$item->time_from}}</h4>
                        <h4><span>Lasts to:</span> {{$item->time_to}}</h4>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
