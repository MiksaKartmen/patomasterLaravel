<div class="container my-5">
    <h4>Table: {{ucwords(str_replace('_', ' ', $tableName))}}</h4>
    @if($tableName != "testimonials" && $tableName != "reservations" && $tableName != "subscribers")
        <a href="{{route("admin".$humanReadableName.".create")}}"><button class="mt-4 btnShowInsertAdmin btn btn-primary">Insert</button></a>

    @endif
    <table class="table mt-5">
        <thead>
        <tr>
            @foreach($table as $t)
                @if($t->Field !== "created_at" && $t->Field != "updated_at")
                    @if(substr($t->Field, -3) == "_id")
                        <th>{{substr($t->Field, 0, -3)}}</th>
                    @else
                        @if($t->Field != "password")
                            <th>{{$t->Field == "id" ? "Num." : $t->Field}}</th>

                        @endif
                    @endif

                @endif

            @endforeach
                <td>Update</td>
                <td>Delete</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $item)
            <tr>

                <td>{{++$key}}</td>
                @foreach($item as $name => $i)
                    @if($name != "id" && $name !== "created_at" && $name != "updated_at" && $name != "sub_category" && substr($name, -3) !== "_id" && !str_contains($name, "password"))
                        @if(str_contains($name, "src")  || str_contains($name, "image"))
                            <td><img style="width: 150px" src="{{asset("assets/images/".$i)}}" alt=""></td>
                        @else
                            <td>{{$i}}</td>
                        @endif

                    @endif
                @endforeach
                <td>
                    @foreach($item as $column => $i)
                        <a href="{{route("admin".$humanReadableName.".edit",$item->$column)}}">
                            <button class="btn btn-warning">Update</button>
                        </a>
                        @break
                    @endforeach
                </td>
                <td>
                    @foreach($item as $column => $i)

                        <button data-id="{{$item->$column}}" data-table="{{$tableName}}" class="btn btn-danger btnDeleteAdmin">Delete</button>

                        @break
                    @endforeach

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

</div>
