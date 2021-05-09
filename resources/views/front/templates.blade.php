<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('page_title')</title>
  <link href="{{asset('front_assets/css/font-awesome.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/css/bootstrap.css')}}" rel="stylesheet">

  <link href="{{asset('front_assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/jquery.simpleLens.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/nouislider.css')}}">
  <link id="switcher" href="{{asset('front_assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
  <link href="{{asset('front_assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">
  <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">

  <!-- Google Font -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

</head>

<body class="productPage">
  @yield('flash_msg')

  <header id="aa-header" class="">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">

              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <!-- @yield('user_name') -->
                  @if(session()->has('USER_LOGIN'))

                  <li>Welcome&nbsp;&nbsp;<strong>{{ucwords(session()->get('USER_NAME'))}}</strong></li>
                  <li><a href="{{route('home.logout')}}">Logout</a></li>
                  @else
                  <li><a href="">signup</a></li>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="#">
                  <span class="fa fa-shopping-bag"></span>
                  <p>E<strong>Com</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
              <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  {{-- <span class="aa-cart-notify">2</span> --}}
                </a>
                {{-- <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="#">Checkout</a>
                </div> --}}
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>


  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav" data-smartmenus-id="16201175357838784">
              <li><a href="index.html">Home</a></li>
              <li><a href="#" class="has-submenu" id="sm-16201175357838784-1" aria-haspopup="true" aria-controls="sm-16201175357838784-2" aria-expanded="false">Products <span class="caret"></span></a>
                <ul class="dropdown-menu" id="sm-16201175357838784-2" role="group" aria-hidden="true" aria-labelledby="sm-16201175357838784-1" aria-expanded="false">
                  <li><a href="#">Mobile</a></li>
                  <li><a href="#" class="has-submenu" id="sm-16201175357838784-3" aria-haspopup="true" aria-controls="sm-16201175357838784-4" aria-expanded="false">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="sm-16201175357838784-4" role="group" aria-hidden="true" aria-labelledby="sm-16201175357838784-3" aria-expanded="false">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>

  @section('section')

  @show

  <footer id="aa-footer">
    <!-- footer bottom -->

    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-footer-bottom-area">
              <p>Designed by <a href="#"></a></p>
              <div class="aa-footer-payment">
                <span class="fa fa-cc-mastercard"></span>
                <span class="fa fa-cc-visa"></span>
                <span class="fa fa-paypal"></span>
                <span class="fa fa-cc-discover"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="" action="{{route('home.auth')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="cc-email" class="control-label mb-1">Email</label>
              <input id="cc-email" name="email" type="text" class="form-control">
              @error('email')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="cc-password" class="control-label mb-1">Password</label>
              <input id="cc-password" name="password" type="text" class="form-control">
              @error('password')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <button class="btn btn-danger btn-sm" type="submit">Login</button>
            <div class="form-group">
              <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            </div>

            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="{{url('home/register')}}">Register now!</a>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <!-- jQuery library -->

  {{-- @yield('jquery') --}}
  <!-- Bootstrap JS-->
  <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
  <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{asset('front_assets/js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.smartmenus.bootstrap.js')}}"></script>
  <script src="{{asset('front_assets/js/sequence.js')}}"></script>
  <script src="{{asset('front_assets/js/sequence-theme.modern-slide-in.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/jquery.simpleLens.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/slick.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_assets/js/nouislider.js')}}"></script>
  <script src="{{asset('front_assets/js/custom.js')}}"></script>
</body>

</html>