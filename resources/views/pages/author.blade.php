@extends("layouts.layout");
@section("title") Author @endsection

@section("content")
    <section class="bg-title-page bg-title-page-about flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
        <h2 class="tit6 t-center">
            Author
        </h2>
    </section>

    <div id="author" class="my-5">
        <div class="container">

            <div class="row ">
                <div class="col-md-6 col-12 d-flex justify-content-center">
                    <div class="author-image">
                        <img src="{{asset("assets/images/moja-slika1.jpg")}}" alt="author" class="img-fluid"/>
                    </div>
                </div>

                <div class="col-md-6 col-12 d-flex align-items-center">
                    <div class="author-text ">
                        <p>Hello. My name is Mihajlo Jovanovic. I was born in Petrovac na Mlavi, a
                            small city in Serbia. I graduated in the High school "Mladost" in Petrovac and currently I'm
                            a student on the ICT college. At the moment I'm living in the student dormitory "Karaburma"
                            For more info you can check out my <strong><a
                                    href="https://jovanovic.netlify.app/">portfolio.</a></strong></br>Index number: 52/21</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
