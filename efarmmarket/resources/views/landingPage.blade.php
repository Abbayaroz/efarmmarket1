<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 10/26/2018
 * Time: 11:48 AM
 */
?>
@extends ('templates.default')
@section ('content')
    <div class="row">
        <div class="col-12">
            @include('templates.partials.alerts')
            @if($images->count()>0)
            <div class="row">
                <div class="col-8 offset-2">
                    <div data-ride="carousel" class="carousel slide" id="carousel-1">
                        <div role="listbox" class="carousel-inner">
                            <?php $counter =0;?>
                            @foreach($images->get() as $image)
                                <?php $image = \efarmMarket\Models\gallery::find($image->id)?>
                                <?php $galleryPics =$image->propertyImages()->inrandomOrder()->first()?>

                                <div class="carousel-item @if($counter==0){{"active"}}@endif">
                                    <img src="{{url('assets/uploads/GalleryPictures/'.$galleryPics->pictures)}}" alt="Slide Image" class="w-100 d-block" style="height:500px;width:500px;" />
                                    <div class="carousel-caption" style="background:rgba(0,0,0, 0.2)">
                                        <p class="text-capitalize">
                                            @if(strlen($image->description)>100)
                                                {{$image->description." ...."}}
                                            @else
                                                {{$image->description}}
                                            @endif
                                        </p>
                                        <a class="btn btn-link text-white" style="background:green" href="{{route('readMore',['moreDetails'=>$image->id])}}">Read More >></a>
                                    </div>
                                </div>

                                <?php $counter++?>
                            @endforeach
                        </div>
                        <div><a href="#carousel-1" role="button" data-slide="prev" class="carousel-control-prev"><span aria-hidden="true" class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a href="#carousel-1" role="button" data-slide="next" class="carousel-control-next"><span aria-hidden="true" class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                        <ol class="carousel-indicators">
                            <?php $counter =0;?>
                            @foreach($images->get() as $image)
                                <li data-target="#carousel-{{$counter}}" data-slide-to="{{$counter}}" class="@if($counter==0){{"active"}}@endif" style="height: 10px;width: 10px;border-radius: 50%;" ></li>
                                <?php $counter++?>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

            @else
                <div>
                    <img src="{{url('assets/img/a.jp')}}" style="width: 100%;height: 450px">
                </div>
            @endif
        </div>
    </div>
    <div  class="my-4" style="box-shadow:-1px 1px 1px 1px rgba(0,0,0,0.5)">
        <div class="pl-5 pr-5">
            <div class="intro">
                <marquee>  <p class="text-center text-capitalize" style="color:rgb(244,248,251);font-style:italic;">electronic farm market</p></marquee>
            </div>
            @include('general.partials.ownersPost')
        </div>
    </div>
@endsection
