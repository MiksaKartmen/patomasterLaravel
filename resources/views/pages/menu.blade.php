@extends("layouts.layout");
@section("title") Menu @endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page bg-title-page-menu flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
        <h2 class="tit6 t-center">
            Pato Menu
        </h2>
    </section>

    <!-- Main menu -->
    <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">

        <div class="container d-flex">
            <div id="filtering">
                <form action="{{route("menu.filter")}}" method="get">
                    @csrf
                    <div class="form-group p-0">
                        <button class="btn btn-primary" type="submit">Filter</button>

                        <button class="btn btn-warning btn-reset-filter" type="submit">Reset Filters</button>

                    </div>
                    <div class="search form-group p-0">
                        <label for="search" class="text-uppercase">Search</label>
                        <input type="text" value="{{ old("search") }}" class="form-control" name="search" id="search">
                    </div>

                    <div class="form-group p-0">
                        <span class="mb-3 text-uppercase">Filter by category</span>
                        @foreach($mainCategories as $mainCat)
                            <div class="form-check  p-0">

                                <input class="form-check-input ml-0" type="checkbox" value="{{$mainCat->id}}" name="mainCatChb[]" id="cat{{$mainCat->id}}">
                                <label class="form-check-label " for="cat{{$mainCat->id}}">
                                    {{$mainCat->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group p-0">
                        <span class="mb-3 text-uppercase">Filter by meal time</span>
                        @foreach($mealTimes as $time)
                            <div class="form-check  p-0">
                                <input class="form-check-input ml-0" type="checkbox" value="{{$time->id}}" name="mealTimeChb[]" id="time{{$time->id}}">
                                <label class="form-check-label " for="time{{$time->id}}">
                                    {{$time->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </form>

            </div>

            <div id="menu-items" class="col-lg-9">
                <x-menu-card
                    :items="$items"
                    :categories="$categories"
                    :mainCategories="$mainCategories"

                />
            </div>

        </div>
    </section>





@endsection
