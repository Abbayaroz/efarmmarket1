<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 5/24/2019
 * Time: 1:23 PM
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 12/19/2018
 * Time: 2:11 PM
 */
?>

@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-8 offset-2">
        <!--<div data-bs-parallax-bg="true" style="background-image:url({{url('assets/img/10.jpg')}});background-position:center;background-size:cover;margin-bottom: 10px;margin-left: 3%;margin-right: 3%">-->
            <div class="photo-gallery" style="box-shadow:-1px 1px 3px 3px gray ">
                <div class="container">
                    <div class="row py-5">
                        <div class="col-10 offset-1  searchResults" style="background:  white;">
                            @if($products->count() > 0)
                                <h2 class="text-black text-capitalize">search results</h2>
                                <p class="text-black " style="border-bottom: 1px solid #fff">{{$products->count()}} result(s) for '{{request()->input('query')}}'</p>
                                <div class="row py-3">
                                    @foreach($products as $product)
                                        <?php
                                        $image=\efarmMarket\Models\gallery::find($product->id);
                                        $imageObj = $image->propertyImages()->first();
                                        ?>
                                        <div class="col-6 col-sm-3 col-md-3 col-lg-2 text-black">
                                            <a href="{{route('readMore',$product->id)}}">
                                                <img class="img-fluid" src="{{url('assets/uploads/GalleryPictures/'.$imageObj->pictures)}}" style="width:inherit;height: 130px"></a>
                                            <span class="d-block"><span class="text-info">Name:</span> {{$product->name}}</span>
                                            <span class="d-block"><span class="text-info">Price:</span> &#8358; {{$product->price}}</span>
                                            <span class="d-block" style="text-align: justify"><span class="text-info">Description:</span> {{ str_limit($product->description, 30)}}</span>
                                            </a>
                                        </div>
                                        <script type="text/javascript">
                                            var path="{{route('search')}}";
                                            $('input.typeahead').typeahead({
                                                source:function (query,process){
                                                    return $.get(path,{query:query},function (data){
                                                        return process(data);
                                                    });
                                                }
                                            });
                                        </script>
                                    @endforeach
                                </div>

                            @else
                                <div class="row" style="background:  #fff;">
                                    <div class="col">
                                        <h3 class="text-danger">Sorry no Such Product is Found for '{{request()->input('query')}}'</h3>
                                    </div>
                                </div>
                            @endif
                            {{$products->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
