@extends("layouts.layout");
@section("title") Contact @endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page bg-title-page-contact flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" >
        <h2 class="tit6 t-center">
            Contact
        </h2>
    </section>



    <!-- Contact form -->
    <section class="section-contact bg1-pattern p-t-90 p-b-113">
        <!-- Map -->
        <div class="container">
            {{--<div class="map bo8 bo-rad-10 of-hidden">
            </div>--}}
        </div>

        <div class="container">
            <div class="sucess-msg">
                @if (session('success-msg'))
                    <div id="success-message" class="alert alert-success">{{ session('success-msg') }}</div>
                @endif
            </div>
            <h3 class="tit7 t-center p-b-62 p-t-105">
                Send us a Message
            </h3>

            <form action="{{route("contact.submit")}}" method="post" class="wrap-form-reservation size22 m-l-r-auto">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <!-- Name -->
                        <span class="txt9">
							Name
						</span>

                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" value="{{old("name")}}" name="name" placeholder="Name">
                            <p class="text-danger">@if (isset($errors->messages()["name"])){{$errors->messages()["name"][0]}}@endif</p>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Name -->
                        <span class="txt9">
							Surname
						</span>

                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" value="{{old("surname")}}" type="text" name="surname" placeholder="Surname">
                            <p class="text-danger">@if (isset($errors->messages()["surname"])){{$errors->messages()["surname"][0]}}@endif</p>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Email -->
                        <span class="txt9">
							Email
						</span>

                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" value="{{old("email")}}" name="email" placeholder="Email">
                            <p class="text-danger">@if (isset($errors->messages()["email"])){{$errors->messages()["email"][0]}}@endif</p>
                        </div>
                    </div>



                    <div class="col-12">
                        <!-- Message -->
                        <span class="txt9">
							Message
						</span>
                        <textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="message" placeholder="Message">{{old("message")}}</textarea>
                        <p class="text-danger">@if (isset($errors->messages()["message"])){{$errors->messages()["message"][0]}}@endif</p>
                    </div>
                </div>

                <div class="wrap-btn-booking flex-c-m m-t-13">
                    <!-- Button3 -->
                    <button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
                        Submit
                    </button>
                </div>
            </form>

            <div class="row p-t-135">
                <div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
                    <div class="dis-flex m-l-23">
                        <div class="p-r-40 p-t-6">
                            <img src="{{asset("assets/images/icons/map-icon.png")}}" alt="IMG-ICON">
                        </div>

                        <div class="flex-col-l">
							<span class="txt5 p-b-10">
								Location
							</span>

                            <span class="txt23 size38">
								8th floor, 379 Hudson St, New York, NY 10018
							</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
                    <div class="dis-flex m-l-23">
                        <div class="p-r-40 p-t-6">
                            <img src="{{asset("assets/images/icons/phone-icon.png")}}" alt="IMG-ICON">
                        </div>


                        <div class="flex-col-l">
							<span class="txt5 p-b-10">
								Call Us
							</span>

                            <span class="txt23 size38">
								(+1) 96 716 6879
							</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
                    <div class="dis-flex m-l-23">
                        <div class="p-r-40 p-t-6">
                            <img src="{{asset("assets/images/icons/clock-icon.png")}}" alt="IMG-ICON">
                        </div>


                        <div class="flex-col-l">
							<span class="txt5 p-b-10">
								Opening Hours
							</span>

                            <span class="txt23 size38">
								09:30 AM – 11:00 PM <br/>Every Day
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
