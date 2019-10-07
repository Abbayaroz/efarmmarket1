<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/2/2018
 * Time: 3:13 AM
 */
?>
<div class="row motherbuyrow">
    <div class="col-lg-10 offset-lg-1" id="buycol1">
        <div class="row buyrow">
            <form method="post" action="{{route('owner.property.update')}}" enctype="multipart/form-data">
            <div class="col-lg-10 offset-lg-1">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-camera"></i>Add image<br /></span></div>
                        <input type="file" class="form-control" name="profilePic" />
                        <div class="input-group-append"></div>
                    </div>
            </div>

        <div class="row buyrow">
            <div class="col-lg-10 offset-lg-1">
                <textarea rows="5" placeholder="description" style="width:100%;" name="description"></textarea></div>
        </div>
        <div class="row buyrow">
            <div class="col-lg-10 offset-lg-1">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-dollar"></i>price<br /></span></div>
                    <input type="text" class="form-control" name="price" />
                    <div class="input-group-append"></div>
                </div>
            </div>
        </div>
        <div class="row buyrow">
            <div class="col-lg-10 offset-lg-1">
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">
                            <i class="fa fa-file-text-o"></i>Certificate of Ownership</span></div>
                    <input type="file" class="form-control" name="ownership"/>
                    <div class="input-group-append"></div>
                </div>
            </div>
        </div>
        <div class="row buyrow">
            <div class="col-lg-10 offset-lg-1">
                <textarea rows="5" placeholder="property Address" style="width:100%;" name="address" ></textarea></div>
        </div>
        <div class="row buyrow">
            <div class="col-lg-10 offset-lg-1" id="addccoll"><button class="btn btn-light switchhover1" type="button" style=".btn-light:hover; color:#212529;background-color:#1e5c51;border-color:#dae0e5;">Add<i class="fa fa-plus"></i></button></div>
        </div>
        </form>
    </div>
</div>
</div>
