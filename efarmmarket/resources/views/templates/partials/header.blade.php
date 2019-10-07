<style>
    a{
        color:white;
    }
</style>
<div class="row" id="homerow1">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 offset-0 offset-sm-0 offset-lg-0"  >
        <form method="post" action="{{route('user.login')}}">
            @csrf
            <div role="dialog" tabindex="-1" style="margin-top: 200px;" class="modal fade @if(count($errors->all())>0){{"show"}}@endif" id="areas" @if(count($errors->all())>0){{"style=display:block;"}}@endif>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-lock" style="color:white;"></i><i class="fa fa-lock" style="color:#002868;font-size:22px;"></i>Login</h4>
                        <small class="mx-5 text-primary"><a href="{{route('user.register')}}">forgot your password?</a></small>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user" style="color:black;"></i></span></div>
                                <input type="text" name="username" placeholder="Username" class="form-control" />
                            </div>
                            @if($errors->has('username'))
                                <small class="form-text text-danger">{{$errors->first('username')}}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">
                                        <i class="fa fa-eye" style="color:black;"></i></span></div>
                                <input type="password" name="password" placeholder="Password" class="form-control" />
                            </div>
                            @if($errors->has('password'))
                                <small class="form-text text-danger">{{$errors->first('password')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-8 offset-4">
                            <small><a href="{{route('user.register')}}" class="text-capitalize " style="color:navy">Are you a new user? SignUp </a> </small>
                            &nbsp; <button class="btn" type="submit" style="background-color:green;color: white">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean navbar-inverse navbar-fixed-top" id="nav1" style="background-color:green;margin-bottom: 5px;padding: 15px 0px">
            <div class="container">
                <h5 style="position: absolute;z-index: 300;top: 0;font-family: 'Raleway', sans-serif;font-weight: 800;text-shadow: 2px 2px black" class="text-uppercase">Electronic farm market</h5>
                <a href="#" class="navbar-brand logo" style="color:white;padding:0px;margin-left:0px;height:80px;">
                    <img class="img-fluid" src="{{url('assets/img/a.png')}}">
                </a>
                <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler trigger text-white"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1" style="float:left;margin-right:120px">
                    <nav class="nav navbar-nav" style="margin-top:13px;">
                        <li role="presentation" class="nav-item"><a href="{{route('homepage')}}" class="nav-link" uk-scroll="offset:100" style="color:rgb(239,242,244);"><i class="fa fa-home" style="color:rgb(252,252,252);"></i> home</a></li>
                        @if(!auth()->guard('web')->check())
                        @elseif (\auth()->guard('web')->user()->customerType==1)
                        <li role="presentation" class="nav-item"><a href="{{route('owner.post')}}" class="nav-link text-uppercase" uk-scroll="offset:100" style="color:rgb(247,249,250);" ><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        @elseif (\auth()->guard('web')->user()->customerType==0)
                            <li role="presentation" class="nav-item"><a href="{{route('owner.post')}}" class="nav-link text-capitalize" uk-scroll="offset:100" style="color:rgb(247,249,250);" >Dashboard</a></li>
                        @endif
                        <li >
                            <a href="{{route('cart.index')}}" style="background: green;width: fit-content">
                                <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">

                                </i>
                                Cart

                                <span class="alert badge" style="background: yellow;width: 20px;height: 20px;border-radius: 50%;color: red;">
                                    {{\Gloudemans\Shoppingcart\Facades\Cart::count()}}
                                </span>
                                <!--
                                @if(auth()->guard('web')->check())
                                    <span class="alert badge text-danger"style="background: yellow;width: 20px;height: 20px;border-radius: 80%;color: red;">
                                       {{Cart::count()}}
                                    </span>
                                @endif
                                -->
                            </a>
                        </li>
                    @if(!auth()->guard('web')->check())
                            <li role="presentation" class="nav-item"><a href="#areas" class="nav-link text-uppercase" uk-scroll="offset:100" style="color:rgb(247,249,250);" data-toggle="modal"><i class="fa fa-sign-in" style="color:rgb(252,252,252);"></i> Login</a></li>
                        @endif
                            @if(auth()->guard('web')->check())
                            <li class="dropdown" style="margin-top: -20px; position: absolute;right:0">
                                <a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle nav-link dropdown-toggle text-white" >
                                        <i class="fa fa-user" ></i>{{auth()->guard('web')->user()->username}}</a>
                                <div role="menu" class="dropdown-menu drope">
                                        <a role="presentation" href="{{route('owners.profileUpdate')}}" class="dropdown-item">
                                            <i class="fa fa-user" style="color:#002868;font-size:22px;"></i>Edit Profile</a>
                                        <a role="presentation" href="{{route('user.LogOut')}}" class="dropdown-item">
                                            <i class="fa fa-sign-out" style="color:#002868;font-size:22px;"></i>Logout</a>
                                </div>
                            </li>
                        @endif
                    </nav>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-6 offset-5">
                <form method="get" action="{{route('search')}}">
                    <div class="form-group">
                        @if($errors->has('query'))
                            <div role="alert" id="alerter" class="alert alert-danger alert-dismissible col-6 offset-3">
                                <i class="fa fa-warning"></i>
                                <span class="text-capitalize"><strong>Warning!!</strong>{{$errors->first('query')}}</span>
                            </div>
                        @endif
                        <div class="input-group">
                            <input type="text" class="form-control typeahead text-lowercase" value="{{request()->input('query')}}" name="query" placeholder="Search for an Item..." />
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>