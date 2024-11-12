@extends("layouts.layout");
@section("title") Gallery @endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page bg-title-page-gallery flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
        <h2 class="tit6 t-center">
            Gallery
        </h2>
    </section>



    <!-- Gallery -->
    <div class="section-gallery p-t-118 p-b-100">
        <div class="wrap-label-gallery size27 flex-w flex-sb-m m-l-r-auto flex-col-c-sm p-l-15 p-r-15 m-b-60">
            @foreach($galleries as $gallery)
                <button data-id="{{$gallery->id}}" class="label-gallery txt26 trans-0-4" data-filter="*">
                    {{$gallery->title}}
                </button>
            @endforeach

        </div>

        <div class="wrap-gallery isotope-grid flex-w p-l-25 p-r-25">
            <!-- - -->
            @foreach($images as $image)
                <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom events guests">
                    <img src="{{asset("assets/images/".$image["src"])}}" alt="IMG-GALLERY">

                    <div class="overlay-item-gallery trans-0-4 flex-c-m">
                        <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset("assets/images/".$image["src"])}}" data-lightbox="gallery"></a>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
