@extends("layouts.layout")
@section("title")
    Login
@endsection

@section("content")
    <section class="bg-title-page bg-title-page-menu flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
        <h2 class="tit6 t-center">
            Login
        </h2>
    </section>
    <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
        <div class="container my-5">
            @if (session('error-msg'))
                <div class="alert alert-danger">
                    <p>{{session('error-msg')}}</p>
                </div>
            @endif

                <form class="d-flex py-5 flex-column align-items-center" method="post" action="{{route("login.login")}}">
                   @csrf


                        <div class="col-md-4 ">
                            <!-- Email -->
                            <span class="txt9">
                                Email
                            </span>

                            <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" value="{{old("email")}}" type="text" name="email" placeholder="Email">
                                <p class="text-danger">@if (isset($errors->messages()["email"])){{$errors->messages()["email"][0]}}@endif</p>

                            </div>
                        </div>

                        <div class="col-md-4 my-4">
                            <!-- Name -->
                            <span class="txt9">
                                Password
                            </span>

                            <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" value="{{old("password")}}" name="password" placeholder="Password">
                                <p class="text-danger">@if (isset($errors->messages()["password"])){{$errors->messages()["password"][0]}}@endif</p>
                            </div>
                        </div>





                    <div class="form-check ">
                        <a href="{{route("register")}}">You don't have an account? Register here.</a>
                    </div>
                    <div class="wrap-btn-booking flex-c-m m-t-13">
                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
                            Submit
                        </button>
                    </div>

                </form>

        </div>
    </section>

@endsection
