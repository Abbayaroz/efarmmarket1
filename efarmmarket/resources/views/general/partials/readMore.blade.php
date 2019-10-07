<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/8/2018
 * Time: 12:41 AM
 */
?>
<div class="row">
    <div class="col px-5">
        @include('templates.partials.alerts')
        <div class="row">
            <div class="col-12 col-sm-6 ">
                <div class="row">
                    <?php $galleryPics = $more->propertyImages()?>
                    <div class="col @if(auth()->guest())col-10 offset-1 pt-3 @endif">
                        <div class="row">
                            <div class="col-lg-12 offset-lg-0">
                                <div data-ride="carousel" class="carousel slide" id="carousel-1">
                                    <div role="listbox" class="carousel-inner">
                                        <?php $counter =0?>
                                        @foreach($galleryPics->get() as $img)
                                            <div class="carousel-item @if($counter==0){{"active"}}@endif">
                                                <img src="{{url('assets/uploads/GalleryPictures/'.$img->pictures)}}" alt="Slide Image" class="w-100 d-block" style="height:300px;width:500px;" />
                                            </div>
                                            <?php $counter++?>
                                        @endforeach
                                    </div>
                                    <div><a href="#carousel-1" role="button" data-slide="prev" class="carousel-control-prev"><span aria-hidden="true" class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
                                        <a href="#carousel-1" role="button" data-slide="next" class="carousel-control-next"><span aria-hidden="true" class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <?php $counter =0?>
                                        @foreach($galleryPics->get() as $img)
                                        <li data-target="#carousel-{{$counter}}" data-slide-to="{{$counter}}" class="@if($counter==0){{"active"}}@endif"></li>
                                        <?php $counter++?>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group my-4">
                    @if(auth()->guard('web')->check())
                        @if (\auth()->guard('web')->user()->customerType==1 && \auth()->guard('web')->user()->id == $more->user_id)
                            @if(\auth()->guard('web')->user()->id == $more->user_id)
                                <a href="#modal" class="btn btn-danger" data-toggle="modal" type="button">Remove<i class="fa fa-trash"></i></a>
                                <!--<a href="{{route('mark.bought',['propertyId'=>$more->id])}}" class="btn btn-success">Mark as Bought <i class="fa fa-check"></i></a>-->
                            @endif

                                <a href="{{route('general.receipt',['transactionId'=>$more->transactionId])}}" class="btn btn-info">Pay Now <i class="fa fa-money"></i></a>

                            @elseif (\auth()->guard('web')->user()->customerType==0 || \auth()->guard('web')->user()->id !== $more->user_id)
                            @if(!in_array($more->paymentStatus,[0,2,3]))
                                <!--<a href="{{route('buyerTransaction',['galleryId'=>$more->id])}}" class="btn btn-block btn-dark" type="button" >buy<i class="fa fa-money"></i></a>-->
                                <a href="{{route('cart.edit',$more->id)}}" class="btn btn-md" type="button" style="background: orangered" >Add to Cart!<i class="fa fa-cart-arrow-down"></i></a>

                            @endif

                        @endif
                    @else
                        <div class="row">
                            <div class="col @if(auth()->guest())col-10 offset-1 pt-3 @endif">
                                <a href="#areas" class="btn btn-block btn-danger" data-toggle="modal" type="button">Login To Buy! <i class="fa fa-lock"></i></a>
                            </div>
                        </div>
                @endif
                </div>
            </div>

            <div class="col col-12 col-sm-6 ">
                <div class="row">
                    <div class="col">
                        <h5 class="text-uppercase text-center " style="border-bottom: 1px solid black;font-weight: bolder;color:black ">property details</h5>
                        <span class="d-block"><span class=" text-capitalize" style="font-size: 20px;font-weight: bolder">Description: </span><span style="font-size: 18px">{{$more->description}}</span></span>
                        <span class="d-block"><span class=" text-capitalize" style="font-size: 20px;font-weight: bolder">address: </span><span style="font-size: 18px">{{$more->address}}</span></span>
                        <span  style="font-size: 18px;color:darkred;font-weight: bolder"><b class=" text-capitalize" style="font-size: 20px;font-weight: bolder">price:</b>&#8358;{{$more->price}}</span></span>
                    </div>
                </div>
                <div class="row">
                    <!--
                    <div class="col">
                        <h3 class="text-uppercase text-center text-right" style="border-bottom: 1px solid black;font-weight: bolder;color:black;  ">owner details</h3>
                        @if(auth('web')->check())
                            <?php $prop = auth('web')->user()->findPaidProperties($more->id);?>
                            @if($prop->count()>0)
                                <?php $seller = \efarmMarket\Models\User::find($more->user_id)?>
                                <span class="d-block text-capitalize"><b>Owner's name:</b>{{ $seller->fullName($seller)}}</span>
                                    <span class="d-block text-capitalize"><b>Owners phone:</b>{{ $seller->phone}}</span>
                                    <span class="d-block text-capitalize"><b>Owners email:</b>{{ $seller->email}}</span>
                            @endif
                        @endif
                    </div>
                    -->
                </div>
            </div>
        </div>
        <div role="dialog" tabindex="-1" class="modal fade" id="modal" style="width:400px;height:250px;overflow:hidden;margin:50px auto;text-transform:capitalize;">
        <div class="modal-dialog" role="document">
            <div class="modal-content alert alert-warning" role="alert" >
                <div class="modal-header p-0">
                    <strong class="text-capitalize text-center"><i class="fa fa-warning"></i> Warning!!</strong><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                <div class="modal-body p-0">
                    <span>do you want to delete this property?.</span>
                </div>
                <div class="modal-footer p-0">
                    <button class="btn btn-light p-1" type="button" data-dismiss="modal" style="font-size: 14px">Cancel</button>
                    <a href="{{route('remove.property',['removeProperty'=>$more->id])}}" class="btn btn-light text-danger p-1"  style="font-size: 14px">Delete</a></div>
            </div>
        </div>
    </div>
    </div>
</div>
