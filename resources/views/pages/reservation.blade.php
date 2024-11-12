@extends("layouts.layout");
@section("title") Reservation @endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page bg-title-page-reservation flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="">
        <h2 class="tit6 t-center">
            Reservation
        </h2>
    </section>


    <!-- Reservation -->
    <section class="section-reservation bg1-pattern p-t-100 p-b-113">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-b-30">
                    <div class="t-center">
                        <div class="modalTable d-none">
                            <p class="p-4 tableMessage"></p>
                            <div class="buttons pb-4 d-none">
                                <button class="btnYes"> Yes </button>
                                <button class="btnNo"> No </button>

                            </div>
                        </div>
						<span class="tit2 t-center">
							Reservation
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Book table
                        </h3>
                    </div>

                    <form method="post" action="" class="wrap-form-reservation size22 m-l-r-auto">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Date -->


                                <div class="wrap-inputdate pos-relative txt10 size12 bo-rad-10 m-t-3 m-b-23">
                                    <label for="date" class="txt9">
                                        Date
                                    </label>
                                    <input class="bo-rad-10 form-control txt10 p-l-20" type="date" id="date" name="date">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Time -->


                                <div class="wrap-inputtime size12  bo-rad-10 m-t-3 m-b-23">
                                    <!-- Select2 -->
                                    <label for="ddlTime" class="txt9">
									    Time
								    </label>
                                    <select class="form-control bo-rad-10" id="ddlTime" >
                                        <option value="0" >Choose</option>
                                        @for($i=10;$i<21;$i++)
                                            <option value="{{$i}}">{{$i.":00"}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- People -->


                                <div class="wrap-inputpeople size12  bo-rad-10 m-t-3 m-b-23">
                                    <!-- Select2 -->
                                    <label for="ddlPeople" class="txt9">
									    People
								    </label>
                                    <select class="form-control bo-rad-10" id="ddlPeople" >
                                        <option value="0">Choose</option>
                                        @for($i=1;$i<=12;$i++)
                                            <option value="{{$i}}">{{$i." people"}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <!-- Name -->


                                <div class="wrap-inputname size12  bo-rad-10 m-t-3 m-b-23">
                                    <label for="name" class="txt9">
                                        Name
                                    </label>
                                    <input class="bo-rad-10  form-control txt10 p-l-20" type="text" name="name" id="name" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Phone -->


                                <div class="wrap-inputphone size12  bo-rad-10 m-t-3 m-b-23">
                                    <label for="phone" class="txt9">
                                        Phone
                                    </label>
                                    <input class="bo-rad-10 form-control txt10 p-l-20" type="text" name="phone" id="phone" placeholder="Phone">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Email -->


                                <div class="wrap-inputemail size12  bo-rad-10 m-t-3 m-b-23">
                                    <label for="email" class="txt9">
                                        Email
                                    </label>
                                    <input class="bo-rad-10 form-control txt10 p-l-20" type="text" id="email" name="email" placeholder="Email">
                                </div>
                            </div>

                        </div>

                        <div class="wrap-btn-booking flex-c-m m-t-6">
                            <!-- Button3 -->
                            <button type="button" class="btn3 flex-c-m size13 txt11 trans-0-4">
                                Book Table
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            </div>
        </div>
    </section>
@endsection
