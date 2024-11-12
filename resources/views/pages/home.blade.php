@extends("layouts.layout");
@section("title") Home @endsection

@section("content")
    <!-- Slide1 -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" >
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Pato Place
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="{{route('menu')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Look Menu
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            Pato Place
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                            <!-- Button1 -->
                            <a href="{{route('menu')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Look Menu
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            Pato Place
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                            <!-- Button1 -->
                            <a href="{{route('menu')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Look Menu
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

    <!-- Welcome -->
    <section class="section-welcome bg1-pattern p-t-120 p-b-105">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-t-45 p-b-30">
                    <div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							Italian Restaurant
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-5">
                            Welcome
                        </h3>

                        <p class="t-center m-b-22 size3 m-l-r-auto">

                            "Indulge in the rich flavors of Italy at our welcoming restaurant. Experience authentic Italian cuisine that will transport you to the heart of Italy."                        </p>

                        <a href="{{route('about')}}" class="txt4">
                            Our Story
                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                        <img src="{{asset('assets/images/our-story-01.jpg')}}" alt="IMG-OUR">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section class="section-intro">
        <div class="header-intro parallax100 t-center p-t-135 p-b-158">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                Pato Place
            </h3>
        </div>

        <div class="content-intro bg-white p-t-77 p-b-133">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="#"><img src="{{asset('assets/images/intro-01.jpg')}}" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="{{route("reservation")}}"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        Romantic Restaurant
                                    </h4></a>

                                <a href="{{route("reservation")}}" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="#"><img src="{{asset('assets/images/intro-02.jpg')}}" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="{{route("menu")}}"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        Delicious Food
                                    </h4></a>


                                <a href="{{route("menu")}}" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="#"><img src="{{asset('assets/images/intro-04.jpg')}}" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="{{route("menu")}}"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        Red Wines You Love
                                    </h4></a>


                                <a href="{{route("menu")}}" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Our menu -->
    <section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
        <div class="container">
            <div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Discover
				</span>

                <h3 class="tit5 t-center m-t-2">
                    Our Menu
                </h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($items as $item)
                            <div class="col-lg-4">
                                <!-- Item our menu -->
                                <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                    <img style="height: 280px" src="{{asset('assets/images/'.$item->image)}}" alt="IMG-MENU">

                                    <!-- Button2 -->
                                    <a href="{{route("menu")}}" class="btn2 flex-c-m txt5 p-2 ab-c-m size4">
                                        {{$item->category}}
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Event -->
    <section class="section-event">
        <div class="wrap-slick2">
            <div class="slick2">
                <div class="item-slick2 item1-slick2" >
                    <div class="wrap-content-slide2 p-t-115 p-b-208">
                        <div class="container">
                            <!-- - -->
                            <div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Upcomming
								</span>

                                <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                    Events
                                </h3>
                            </div>

                            <!-- Block2 -->
                            <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="zoomIn">
                                <!-- Pic block2 -->
                                <a href="#" class="wrap-pic-blo2 bg1-blo2">
                                    <div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m t-center">
											08:00 PM Tuesday - 21 November 2018
										</span>
                                    </div>
                                </a>

                                <!-- Text block2 -->
                                <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                    <h4 class="tit7 t-center m-b-10">
                                        Wines during specific nights
                                    </h4>

                                    <p class="t-center">
                                        Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla, nunc sed imperdiet lacinia
                                    </p>

                                    <div class="flex-sa-m flex-w w-full m-t-40">
                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 days">
												25
											</span>

                                            <span class="dis-block t-center txt8">
												Days
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 hours">
												12
											</span>

                                            <span class="dis-block t-center txt8">
												Hours
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 minutes">
												59
											</span>

                                            <span class="dis-block t-center txt8">
												Minutes
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 seconds">
												56
											</span>

                                            <span class="dis-block t-center txt8">
												Seconds
											</span>
                                        </div>
                                    </div>

                                    <a href="#" class="txt4 m-t-40">
                                        View Details
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 item2-slick2">
                    <div class="wrap-content-slide2 p-t-115 p-b-208">
                        <div class="container">
                            <!-- - -->
                            <div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Upcomming
								</span>

                                <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                    Events
                                </h3>
                            </div>

                            <!-- Block2 -->
                            <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="fadeInDown">
                                <!-- Pic block2 -->
                                <a href="#" class="wrap-pic-blo2 bg2-blo2">
                                    <div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m">
											08:00 PM Tuesday - 21 November 2018
										</span>
                                    </div>
                                </a>

                                <!-- Text block2 -->
                                <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                    <h4 class="tit7 t-center m-b-10">
                                        Wines during specific nights
                                    </h4>

                                    <p class="t-center">
                                        Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla, nunc sed imperdiet lacinia
                                    </p>

                                    <div class="flex-sa-m flex-w w-full m-t-40">
                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 days">
												25
											</span>

                                            <span class="dis-block t-center txt8">
												Days
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 hours">
												12
											</span>

                                            <span class="dis-block t-center txt8">
												Hours
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 minutes">
												59
											</span>

                                            <span class="dis-block t-center txt8">
												Minutes
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 seconds">
												56
											</span>

                                            <span class="dis-block t-center txt8">
												Seconds
											</span>
                                        </div>
                                    </div>

                                    <a href="#" class="txt4 m-t-40">
                                        View Details
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 item3-slick2" >
                    <div class="wrap-content-slide2 p-t-115 p-b-208">
                        <div class="container">
                            <!-- - -->
                            <div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Upcomming
								</span>

                                <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                    Events
                                </h3>
                            </div>

                            <!-- Block2 -->
                            <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="rotateInUpLeft">
                                <!-- Pic block2 -->
                                <a href="#" class="wrap-pic-blo2 bg3-blo2">
                                    <div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m">
											08:00 PM Tuesday - 21 November 2018
										</span>
                                    </div>
                                </a>

                                <!-- Text block2 -->
                                <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                    <h4 class="tit7 t-center m-b-10">
                                        Wines during specific nights
                                    </h4>

                                    <p class="t-center">
                                        Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla, nunc sed imperdiet lacinia
                                    </p>

                                    <div class="flex-sa-m flex-w w-full m-t-40">
                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 days">
												25
											</span>

                                            <span class="dis-block t-center txt8">
												Days
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 hours">
												12
											</span>

                                            <span class="dis-block t-center txt8">
												Hours
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 minutes">
												59
											</span>

                                            <span class="dis-block t-center txt8">
												Minutes
											</span>
                                        </div>

                                        <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 seconds">
												56
											</span>

                                            <span class="dis-block t-center txt8">
												Seconds
											</span>
                                        </div>
                                    </div>

                                    <a href="#" class="txt4 m-t-40">
                                        View Details
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick2-dots"></div>
        </div>
    </section>



    <!-- Review -->
    <section class="section-review p-t-115">
        <!-- - -->
        <div class="title-review t-center m-b-2">
			<span class="tit2 p-l-15 p-r-15">
				Customers Say
			</span>

            <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                Review
            </h3>
        </div>

        <!-- - -->
        <div class="wrap-slick3">
            <div class="slick3">

                @foreach($testimonials as $t)
                    <div class="item-slick3 item1-slick3">
                        <div class="wrap-content-slide3 p-b-50 p-t-50">
                            <div class="container">
                                <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
                                    <img src="{{asset('assets/images/'.$t->src)}}" alt="IGM-AVATAR">
                                </div>

                                <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                    <p class="t-center txt12 size15 m-l-r-auto">
                                        {{$t->text}}
                                    </p>

                                    <div class="star-review d-flex rating fs-18 color0 flex-c-m m-t-12">
                                        @for($i=5;$i>0;$i--)
                                            <input disabled value="{{$i}}" @if($t->rating == $i) checked @endif name="rating" id="{{"star".$i}}" type="radio">
                                            <label for="{{"star".$i}}"></label>
                                        @endfor
                                    </div>

                                    <div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
                                        {{$t->name." ".$t->surname}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

            <div class="wrap-slick3-dots m-t-30"></div>
        </div>
    </section>


    <!-- Video -->
    <section class="section-video parallax100">
        <div class="content-video t-center p-t-225 p-b-250">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                Our Video
            </h3>

            <div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
                <div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
                    <i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog -->


    <!-- Sign up -->
@endsection
