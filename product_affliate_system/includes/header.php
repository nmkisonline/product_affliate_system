<!doctype html>
   <html class="no-js" lang="">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>Products</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="apple-touch-icon" href="apple-touch-icon.png">
     <!-- Place favicon.ico in the root directory -->


    <!-- =========================
        Loding All Stylesheet
        ============================== -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/animate.min.css">

        <link rel="stylesheet" href="css/megamenu.css">

    <!-- =========================
        Loding Main Theme Style
        ============================== -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/custom.css">

    <!-- =========================
    	Header Loding JS Script
       ============================== -->
       <script src="js/modernizr.js"></script>
    </head>
    <body class="">

       <!-- <div class="preloader"></div> -->
    <!-- =========================
        Header Top Section
        ============================== -->
        <section id="wd-header" class="d-flex align-items-center mob-sticky">
          <div class="container">
             <div class="row">
    		    <!-- =========================
					Mobile Menu 
             ============================== -->
             <div class="order-2 order-sm-1 col-2 col-sm-2 col-md-4 d-block d-lg-none">
               <div class="accordion-wrapper hide-sm-up">
                 <a href="#" class="mobile-open"><i class="fa fa-bars" ></i></a>
                 <!--Mobile Menu start-->

                 <ul id="mobilemenu" class="accordion">
                   <!-- <li class="mob-logo"><a href="index"><img src="img/logo.png" alt=""></a></li>-->
                   <li><a class="closeme" href="#"><i class="fa fa-times" ></i></a></li>
                   <li class="mob-logo"><a href="index"><img src="images/logo.png" alt=""></a></li>


                   <li class="out-link"><a class="" href="index">Home</a></li>
                   <li class="out-link"><a class="" href="about">About</a></li>
                   <li class="out-link"><a class="" href="contact-us">Contact</a></li>


                </ul>
                <!--Mobile Menu end-->
             </div>

          </div><!--Mobile menu end-->

         <div class="order-1 order-sm-2  col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
            <div class="blrub-logo">
               <a href="index">
                  <img src="images/logo.png" alt="Logo">
               </a>
            </div>
         </div>

				<!-- =========================
					 Search Box  Show on large device
                ============================== -->
                <div class="col-12 order-lg-2 col-md-5 col-lg-6 col-xl-5 d-none d-lg-block">
                  <div class=" input-group wd-btn-group header-search-option">
                     <!-- <form  action="index" method="get"> -->
                       <input  type="text" id="product_name" name="product_name" class="form-control blurb-search " placeholder="Search ..." aria-label="Search for...">
                       <span class="input-group-btn">
                         <button type="submit" id="search_btn" class="btn btn-secondary btn-sm wd-btn-search">
                           <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </span>
                  <!-- </form> -->
               </div>
            </div>

				<!-- =========================
					 Login and My Acount 
                ============================== -->
               <div class="nav-bar-hide order-3 order-sm-3 col-10 col-sm-6 col-lg-4 col-md-4 col-xl-5">
                  <div class="nav-styling">
                     <div class="pt-3">
                        <ul class="d-flex text-center justify-content-end text-white">
                           <li class="px-2"><a href="index" class=""><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                           </li>
                           <li class="px-2"><a href="about" class="">About</a>
                           <li class="px-2"><a href="contact-us" class="">Contact us</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
             </div><!--Row End-->
          </div><!--Container End-->
       </section><!--Section End-->

    <!-- =========================
        Main Menu Section
        ============================== -->
        <section id="main-menu" class="sticker-nav">
          <div class="container">
             <div class="row">
            <!--     <div class="col-2 col-md-6 col-lg-12 ">
                 <div class="menu-container wd-megamenu">
                   <div class="menu">
                     <ul class="wd-megamenu-ul">
                       <li><a href="index" class="main-menu-list"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                       </li>
                       <li><a href="about" class="main-menu-list">About</a>
                          <li><a href="contact-us" class="main-menu-list">Contact us</a></li>
                       </ul>
                    </div>
                 </div>
              </div> -->
              <div class="col-6 col-md-4 col-lg-5 text-right ext-right p0  d-none ">
               <div class="account-and-search">
                  <div class="account-section">
                     <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                     </button>

                     <div class="modal wd-ph-modal fade bd-example-modal-lg" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="container">
                                 <div class="row text-left">
                                    <div class="col-md-12 p0">

                                       <div class="modal-tab-section wd-modal-tabs">
                                          <ul class="nav nav-tabs wd-modal-tab-menu text-center" id="myTab-account" role="tablist">
                                             <li class="nav-item">
                                                <a class="nav-link active" id="login-tab-2" data-toggle="tab" href="#login-2" role="tab" aria-controls="login-2" aria-expanded="true">Login</a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="sign-up-tab-2" data-toggle="tab" href="#sign-up-2" role="tab" aria-controls="sign-up-2">Sign up</a>
                                             </li>
                                          </ul>
                                          <div class="tab-content" id="myTabContent-account">
                                           <div class="tab-pane fade show active" id="login-2" role="tabpanel" aria-labelledby="login-tab-2">

                                              <div class="row">
                                                 <div class="col-md-6 p0 brand-description-area">
                                                    <img src="img/login-img-1.jpg" class="img-fluid" alt="">
                                                    <div class="brand-description">
                                                       <div class="brand-logo">
                                                          <img src="images/logo.png" alt="Logo">
                                                       </div>
                                                       <div class="modal-description">
                                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teoccaecvoluptatem.</p>
                                                       </div>
                                                       <ul class="list-unstyled">
                                                          <li class="media">
                                                             <i class="fa fa-check" aria-hidden="true"></i>
                                                             <div class="media-body">
                                                                Lorem ipsum dolor sit amet, consecadipisicing 
                                                                elit, sed do eiusmod teoccaecvoluptatem.
                                                             </div>
                                                          </li>
                                                          <li class="media my-4">
                                                           <i class="fa fa-check" aria-hidden="true"></i>
                                                           <div class="media-body">
                                                              Lorem ipsum dolor sit amet, consecadipisicing 
                                                              elit, sed do eiusmod teoccaecvoluptatem.
                                                           </div>
                                                        </li>
                                                        <li class="media">
                                                         <i class="fa fa-check" aria-hidden="true"></i>
                                                         <div class="media-body">
                                                            Lorem ipsum dolor sit amet, consecadipisicing 
                                                            elit, sed do eiusmod teoccaecvoluptatem.
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                             <div class="col-12 col-md-12 col-lg-6 p0">
                                              <div class="login-section text-center">
                                                 <div class="social-media ph-social-media">
                                                    <a href="#" class="facebook-bg"><i class="fa fa-facebook" aria-hidden="true"></i> Login</a>
                                                    <a href="#" class="twitter-bg"><i class="fa fa-twitter" aria-hidden="true"></i> Login</a>
                                                    <a href="#" class="google-bg"><i class="fa fa-google-plus" aria-hidden="true"></i> Login</a>
                                                 </div>
                                                 <div class="login-form text-left">
                                                    <form>
                                                       <div class="form-group">
                                                          <label for="exampleInputEmail1">User name</label>
                                                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="John mist |">
                                                       </div>
                                                       <div class="form-group">
                                                          <label for="exampleInputPassword1">Password</label>
                                                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*** *** ***">
                                                       </div>
                                                       <button type="submit" class="btn btn-primary wd-login-btn">LOGIN</button>

                                                       <div class="form-check">
                                                          <label class="form-check-label">
                                                             <input type="checkbox" class="form-check-input">
                                                             Save this password
                                                          </label>
                                                       </div>

                                                       <div class="wd-policy">
                                                        <p>
                                                           By Continuing. I conferm that i have read and userstand the <a href="#">terms of uses</a> and <a href="#">Privacy Policy</a>. 
                                                           Don’t have an account? <a href="#" class="black-color"><strong><u>Sign up</u></strong></a>
                                                        </p>
                                                     </div>
                                                  </form>
                                               </div>
                                            </div>
                                         </div>
                                      </div>

                                   </div>
                                   <div class="tab-pane fade" id="sign-up-2" role="tabpanel" aria-labelledby="sign-up-tab-2">

                                     <div class="row">
                                        <div class="col-md-12 p0 brand-login-section">
                                           <img src="img/login-img-2.jpg" class="img-fluid" alt="">
                                           <div class="brand-description">
                                              <div class="brand-logo">
                                                 <img src="images/logo.png" alt="Logo">
                                              </div>
                                              <div class="modal-description">
                                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teoccaecvoluptatem.</p>
                                              </div>
                                              <ul class="list-unstyled">
                                                 <li class="media">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                       Lorem ipsum dolor sit amet, consecadipisicing 
                                                       elit, sed do eiusmod teoccaecvoluptatem.
                                                    </div>
                                                 </li>
                                                 <li class="media my-4">
                                                  <i class="fa fa-check" aria-hidden="true"></i>
                                                  <div class="media-body">
                                                     Lorem ipsum dolor sit amet, consecadipisicing 
                                                     elit, sed do eiusmod teoccaecvoluptatem.
                                                  </div>
                                               </li>
                                               <li class="media">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <div class="media-body">
                                                   Lorem ipsum dolor sit amet, consecadipisicing 
                                                   elit, sed do eiusmod teoccaecvoluptatem.
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6 p0">
                                     <div class="sign-up-section text-center">
                                        <div class="login-form text-left">
                                           <form>
                                              <div class="form-group">
                                                 <label for="exampleInputname-login-in">First name</label>
                                                 <input type="text" class="form-control" id="exampleInputname-login-in" placeholder="First Name">
                                              </div>
                                              <div class="form-group">
                                                 <label for="exampleInputname-login-in-2">Last name</label>
                                                 <input type="text" class="form-control" id="exampleInputname-login-in-2" placeholder="Last Name">
                                              </div>
                                              <div class="form-group">
                                                 <label for="exampleInputEmail-login-in">Email</label>
                                                 <input type="text" class="form-control" id="exampleInputEmail-login-in" placeholder="Enter you email ...">
                                              </div>
                                              <div class="form-group">
                                                 <label for="exampleInputPassword-login-in">Password</label>
                                                 <input type="password" class="form-control" id="exampleInputPassword-login-in" placeholder="*** *** ***">
                                              </div>
                                              <button type="submit" class="btn btn-primary wd-login-btn">Sign Up</button>

                                              <div class="wd-policy">
                                                 <p>
                                                    By Continuing. I conferm that i have read and userstand the <a href="#">terms of uses</a> and <a href="#">Privacy Policy</a>. 
                                                    Don’t have an account? <a href="#" class="black-color"><strong><u>Sign up</u></strong></a>
                                                 </p>
                                              </div>
                                           </form>
                                        </div>
                                     </div>
                                  </div>
                               </div>

                            </div>
                         </div>
                      </div>

                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
</div>
</div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
   $('#search_btn').click(function(event){
      event.preventDefault();
      window.location.href="index?product_name="+$("#product_name").val()+"&section=product-amazon";

   });
</script>
