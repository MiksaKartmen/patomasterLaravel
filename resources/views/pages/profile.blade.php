@extends("layouts.layout");
@section("title") Profile @endsection

@section("content")
    <!-- Title Page -->
    <section class="bg-title-page bg-title-page-about flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
        <h2 class="tit6 t-center">
            Profile
        </h2>
    </section>

    <section class="bg1-pattern">
        <div class="container py-5">
            @if (session('error-msg'))
                <div class="alert alert-danger">
                    <p>{{session('error-msg')}}</p>
                </div>
            @endif
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <div class="card col-lg-4">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{asset("assets/images/". $user->src)}}" alt="Admin" class="rounded-circle p-1" width="110">
                                    <div class="mt-3">
                                        <h4>{{$user->name ." ". $user->surname}}</h4>
                                        <p class="text-secondary mb-1">{{$user->role}}</p>
                                        <p class="text-muted font-size-sm">Registered: {{$user->created_at}}</p>

                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="photo-update">
                                    <p>Photo update</p>
                                    <form enctype="multipart/form-data" action="{{route("profile.photo", $user->userId)}}" method="post">
                                        @csrf
                                        <input class="form-control my-3 p-0" type="file" name="image" id="image">
                                        <input type="submit" value="Change" class="btn btn-dark">
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="card col-lg-7">
                            <div class="card-body">
                                @if(!isset($testimonial))
                                <form action="{{route("testimonial.store", $user->userId)}}" method="post">
                                    @csrf
                                    <div class="d-flex flex-column align-items-center text-center h-100 justify-content-around">
                                        <h4>Here you can rate us and leave a message!</h4>
                                        <div class="d-flex flex-column align-items-center">
                                            <div id="message-profile" class="my-4">
                                                <div class="input-group">
                                                    <textarea name="testimonial-msg" id="testimonial-msg" class="form-control" cols="40" ></textarea>
                                                </div>

                                            </div>
                                            <div class="rating">
                                                @for($i=5;$i>0;$i--)
                                                    <input value="{{$i}}" name="rating" id="{{"star".$i}}" type="radio">
                                                    <label for="{{"star".$i}}"></label>
                                                @endfor

                                            </div>
                                            <div class="button-submit">
                                                <button type="submit" class="btn btn-dark">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                                @else
                                    <div class="d-flex flex-column align-items-center text-center h-100 justify-content-around">
                                        <h4>You already rated us like this:</h4>
                                        <div class="d-flex flex-column align-items-center">
                                            <div id="message-profile" class="my-4">
                                                <div class="input-group">
                                                    <textarea disabled name="testimonial-msg" id="testimonial-msg" class="form-control" cols="40" >{{$testimonial->text}}</textarea>
                                                </div>

                                            </div>
                                            <div class="rating">
                                                @for($i=5;$i>0;$i--)
                                                    <input disabled value="{{$i}}" @if($testimonial->rating == $i) checked @endif name="rating" id="{{"star".$i}}" type="radio">
                                                    <label for="{{"star".$i}}"></label>
                                                @endfor
                                            </div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="buttons d-flex">
                            <div class="card col-lg-3 mr-3">
                                <button data-id="{{$user->userId}}" class="py-2 btn-profile-info">Profile info</button>
                            </div>
                            <div class="card col-lg-3">
                                <button data-email="{{$user->email}}" class="py-2 btn-reservations">Reservations</button>
                            </div>
                        </div>

                        <div class="modalTable d-none text-center">
                            <p class="p-4 tableMessage"></p>
                            <div class="buttons pb-4 d-none">
                                <button class="btn-cancel-yes"> Yes </button>
                                <button class="btn-cancel-no"> No </button>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" id="info-reservations">
                                <form action="{{route("profile.info", $user->userId)}}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name" id="name-profile" value="{{$user["name"]}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <h6 class="mb-0">Surname</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="surname" id="surname-profile" value="{{$user["surname"]}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 d-flex align-items-center">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control"  name="email" id="email-profile" value="{{$user["email"]}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-dark btn-update-profile px-4" disabled value="Save Changes">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


       {{-- <div class="container py-5">
            <div class="row">
                <div id="image" class="col-lg-6">
                    <div class="user-image">
                        <img src="{{asset("assets/images/".$user["src"])}}">
                    </div>
                </div>
                <div id="user-info" class="col-lg-6">
                    <div class="name mb-3">
                        <div class="input-group justify-content-between">
                            <label class="mb-0 d-flex align-items-center" for="name">Name</label>
                            <input class="form-control col-lg-9" type="text" name="name" id="name" value="{{$user["name"]}}">
                        </div>
                    </div>
                    <div class="surname mb-3">
                        <div class="input-group justify-content-between">
                            <label class="mb-0 d-flex align-items-center" for="surname">Surname</label>
                            <input class="form-control col-lg-9" type="text" name="surname" id="surname" value="{{$user["surname"]}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </section>


@endsection
