@extends("layouts.admin")
@section("title")
    {{$table}}
@endsection

@section("content")
    <div class="content">
        <div class="container my-5">
            <h4>Table: {{$table}}</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>
            @endif
            <div id="form" class="d-flex flex-column align-items-center">
                <form enctype="multipart/form-data" class="col-lg-6" action="{{ route('admin' . ucfirst($name) . ($action == 'insert' ? '.store' : '.update'), isset($data) ? $data->id : "")}}"
                      method="post">
                   @csrf
                    @if($action == "update") @method("PUT") @endif
                    @foreach($columns as $column)
                        @php
                            $columnField = $column->Field;
                        @endphp
                        <div class="form-group my-3">
                            @if($column->Field != "created_at" && $column->Field != "updated_at" && $column->Field != "id" )
                                <label for="{{$column->Field}}">
                                    @if(substr($column->Field, -3) == "_id")
                                        {{substr(ucfirst(str_replace('_', ' ', $column->Field)), 0,-3) }}
                                    @else
                                        {{ucfirst(str_replace('_', ' ', $column->Field))}}
                                    @endif
                                </label>
                            @endif

                            @if($column->Field == "image" || $column->Field == "src")
                                <input type="file" name="{{$column->Field}}" id="{{$column->Field}}" class="form-control">

                            @elseif($column->Field == "description" || $column->Field == "biography" || $column->Field == "message")
                                <textarea name="{{$column->Field}}" id="{{$column->Field}}" class="form-control">{{ old($column->Field, isset($data) ? $data->$columnField : '') }}</textarea>

                            @elseif(str_ends_with($column->Field, "_id") || $column->Field == "sub_category")
                                    <select class="form-control" name="{{$column->Field}}" id="{{$column->Field}}">
                                        <option value="0">Choose</option>
                                        @foreach($options as $o)
                                            <option @if(old($columnField, isset($data) && $o->id == $data->$columnField)) selected @endif value="{{$o->id}}">{{$o->$property}}</option>
                                        @endforeach
                                    </select>
                            @else
                                @if($column->Field != "created_at" && $column->Field != "updated_at" && $column->Field != "id" )

                                    <input type="{{$column->Field == "password" ? "password" : "text"}}" name="{{$column->Field}}" id="{{$column->Field}}" value="{{ old($column->Field, isset($data) ? $data->$columnField : '') }}" class="form-control">
                                @endif

                            @endif

                        </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn">{{$action == "insert" ? "Insert" : "Update"}}</button>
                    </div>
                </form>
            </div>

        </div>



        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
@endsection
