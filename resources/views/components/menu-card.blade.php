@foreach($mainCategories as $mainCat)
    @foreach($items as $item)
        @if($item->sub_category == $mainCat->id)
            <div class="mt-4">
                @foreach($items as $item)
                    @if($item->sub_category == $mainCat->id)
                        <h3 class="tit-mainmenu text-center tit10 p-b-25">
                            {{$mainCat->name}}
                        </h3>
                        @break
                    @endif
                @endforeach
                <div class="wrap-item-mainmenu d-flex flex-wrap p-b-22">
                    @foreach($categories as $cat)
                        @if($cat->sub_category == $mainCat->id && $items->contains($cat->id))
                            <div class="wrap-item-mainmenu col-lg-5 p-0">

                                <h5 class="tit-mainmenu tit-sub-category pt-3 pb-2">
                                    {{$cat->name}}
                                </h5>


                                <div class="wrap-item-mainmenu">
                                    @foreach($items as $item)
                                        @if($item->menu_category_id == $cat->id)
                                            <div class="flex-w flex-b m-b-3">
                                                <a href="{{route("menu.single", ['id'=>$item->item_id])}}" class="name-item-mainmenu txt21">
                                                    {{$item->name}}
                                                </a>

                                                <div class="line-item-mainmenu bg3-pattern"></div>

                                                <div class="price-item-mainmenu txt22">
                                                    ${{$item->price}}
                                                </div>
                                            </div>

                                            <span class="info-item-mainmenu txt23">
                                {{Str::limit($item->description, 25, '...')}}
                            </span>
                                        @endif

                                    @endforeach
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
            @break
        @endif

    @endforeach

@endforeach

{{ $items->links() }}
