<?php
/**
 * Created by PhpStorm.
 * User: Spartacus
 * Date: 6/2/2018
 * Time: 1:16 PM
 */
?>

@if(Session::has('failure') || isset($failure))
    <div class="row" id="alerter">
        <div class="col-6 offset-3">
            <div role="alert" class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="alert-heading">
                    @if(Session::has('failure'))
                        {{Session::get('failure')['heading']}}
                    @else
                        {{$failure['heading']}}
                    @endif

                </h4><span><strong>@if(Session::has('failure'))
                            {{Session::get('failure')['body']}}
                        @else
                            {{$failure['body']}}
                        @endif</strong></span></div>
        </div>
    </div>
@elseif(Session::has('success') || isset($success))
    <div class="row" id="alerter2" style="z-index: 3000; position: absolute;margin-top: 20px;width:100%">
        <div class="col-6 offset-3" style="z-index: 3000">
            <div role="alert" class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="alert-heading">@if(Session::has('success'))
                        {{Session::get('success')['heading']}}
                    @else
                        {{$success['heading']}}
                    @endif
                </h4><span><strong>
                        @if(Session::has('success'))
                            {{Session::get('success')['body']}}
                        @else
                            {{$success['body']}}
                        @endif
                    </strong></span></div>
        </div>
    </div>
@endif