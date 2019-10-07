<?php
/**
 * Created by PhpStorm.
 * User: DEATH
 * Date: 11/16/2018
 * Time: 2:38 AM
 */
?>
@extends ('admin.partials.default')
    @section ('adminContent')

        <script src="{{url('assets/js/jquery.min.js')}}"></script>
        <script src="{{url('assets/js/raphael.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/js/morris.js')}}"></script>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="row mb-4">
                    <div class="col" style="text-align:center;color:black">
                        <h1 style="font-weight:bolder;text-shadow:4px 2px darkgray;">SALE&#39;S REPORT</h1>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daily Sell&#39;s Report</h4>
                                <div id="daily"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Weekly Report</h4>
                                <div id="week"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card"><!--
                            <div class="card-body">
                                <h4 class="card-title">This Month Vs Same Day Last Month</h4>
                                <div id="mont"></div>
                            </div>-->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card"><!--
                            <div class="card-body">
                                <h4 class="card-title">Annual Report</h4>
                                <div id="yea"></div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            Morris.Donut({
                element: 'daily',
                behaveLikeLine: true,
                data: [
                    <?php echo $advertD?>,
                    <?php echo $boughtD?>
                ],
                formatter:function(y,data){
                  return data.type+" Total: "+data.value;
                },
                resize:true

            });
        </script>
        <script>
            Morris.Area({
                element: 'week',
                behaveLikeLine: true,
                data: [
                    <?php echo $boughtW?>
                ],
                xkey: 'date',
                ykeys: ['Advert','Purchase'],
                labels: ['Advert','Purchase'],
                hoverCallback:function(index,options,content,data){
                  return "Total Of "+data.Advert+" Paid For Upload And Total Of "+data.Purchase+"Paid For Purchase On "+data.date;
                },
                resize:true
            });
        </script>

        <script>
            Morris.Bar({
                element: 'month',
                data: [
                    <?php echo $boughtM?>
                ],
                xkey: 'date',
                ykeys: ['Advert','Purchase'],
                labels: ['Advert','Purchase'],
                hoverCallback:function(index,options,content,data){
                    return "Total Of "+data.Advert+" Paid For Upload And Total Of "+data.Purchase+"Paid For Purchase";
                },
                resize:true,

            });
        </script>
        <script>
            Morris.Bar({
                element: 'year',
                data: [
                    <?php echo $boughtY?>
                ],
                xkey: 'date',
                ykeys: ['Advert','Purchase'],
                labels: ['Advert','Purchase'],
                hoverCallback:function(index,options,content,data){
                    return "Total Of "+data.Advert+" Paid For Upload And Total Of "+data.Purchase+"Paid For Purchase";
                },
                resize:true,
                stacked:true
            });
        </script>

        @endsection
