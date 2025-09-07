<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>@yield('page-url','الصفحة الرئيسية')</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{ asset('front/assets/css/templatemo-hexashop.css')}}">
  <link rel="stylesheet" href="{{ asset('front/assets/css/owl-carousel.css')}}">
  <link rel="stylesheet" href="{{ asset('front/assets/css/lightbox.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
      <div class="jumper">
          <div></div>
          <div></div>
          <div></div>
      </div>
  </div>  
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{ url('/') }}" class="logo">
                          <img src="{{ asset('front/assets/images/Test_IT_logo.png')}}" style="width:120px;" alt="Logo">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="#men">Men's</a></li>
                          <li class="scroll-to-section"><a href="#women">Women's</a></li>
                          <li class="scroll-to-section"><a href="#kids">Kid's</a></li>
                          <li class="submenu">
                              <a href="javascript:;">Pages</a>
                              <ul>
                                  <li><a href="#">About Us</a></li>
                                  <li><a href="#">Products</a></li>
                                  <li><a href="#">Single Product</a></li>
                                  <li><a href="#">Contact Us</a></li>
                              </ul>
                          </li>
                          <li class="submenu">
                              <a href="javascript:;">Features</a>
                              <ul>
                                  <li><a href="#">Features Page 1</a></li>
                                  <li><a href="#">Features Page 2</a></li>
                                  <li><a href="#">Features Page 3</a></li>
                                  <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#explore">Explore</a></li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  @yield('content')

  {{-- SECTION FOOTER --}}
  <!-- ***** Subscribe Area Starts ***** -->
  <div class="subscribe">
      <div class="container">
          <div class="row">
              <div class="col-lg-8">
                  <div class="section-heading">
                      <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                      <span>Details to details is what makes Hexashop different from the other themes.</span>
                  </div>
                  <form id="subscribe" action="" method="get">
                      <div class="row">
                          <div class="col-lg-5">
                              <fieldset>
                                  <input name="name" type="text" id="name" placeholder="Your Name" required="">
                              </fieldset>
                          </div>
                          <div class="col-lg-5">
                              <fieldset>
                                  <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                              </fieldset>
                          </div>
                          <div class="col-lg-2">
                              <fieldset>
                                  <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                              </fieldset>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="col-lg-4">
                  <div class="row">
                      <div class="col-6">
                          <ul>
                              <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                              <li>Phone:<br><span>010-020-0340</span></li>
                              <li>Office Location:<br><span>North Miami Beach</span></li>
                          </ul>
                      </div>
                      <div class="col-6">
                          <ul>
                              <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                              <li>Email:<br><span>info@company.com</span></li>
                              <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- ***** Subscribe Area Ends ***** -->

  <!-- ***** Footer Start ***** -->
  <footer>
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="first-item">
                      <div class="logo">
                          <img src="{{ asset('front/assets/images/white-logo.png')}}" alt="hexashop ecommerce templatemo">
                      </div>
                      <ul>
                          <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li>
                          <li><a href="#">hexashop@company.com</a></li>
                          <li><a href="#">010-020-0340</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-3">
                  <h4>Shopping &amp; Categories</h4>
                  <ul>
                      <li><a href="#">Men’s Shopping</a></li>
                      <li><a href="#">Women’s Shopping</a></li>
                      <li><a href="#">Kid's Shopping</a></li>
                  </ul>
              </div>
              <div class="col-lg-3">
                  <h4>Useful Links</h4>
                  <ul>
                      <li><a href="#">Homepage</a></li>
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Help</a></li>
                      <li><a href="#">Contact Us</a></li>
                  </ul>
              </div>
              <div class="col-lg-3">
                  <h4>Help &amp; Information</h4>
                  <ul>
                      <li><a href="#">Help</a></li>
                      <li><a href="#">FAQ's</a></li>
                      <li><a href="#">Shipping</a></li>
                      <li><a href="#">Tracking ID</a></li>
                  </ul>
              </div>
              <div class="col-lg-12">
                  <div class="under-footer">
                      <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved. 
                      <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
                      <ul>
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <!-- jQuery -->
  <script src="{{ asset('front/assets/js/jquery-2.1.0.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('front/assets/js/popper.js')}}"></script>
  <script src="{{ asset('front/assets/js/bootstrap.min.js')}}"></script>
  <!-- Plugins -->
  <script src="{{ asset('front/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('front/assets/js/accordions.js')}}"></script>
  <script src="{{ asset('front/assets/js/datepicker.js')}}"></script>
  <script src="{{ asset('front/assets/js/scrollreveal.min.js')}}"></script>
  <script src="{{ asset('front/assets/js/waypoints.min.js')}}"></script>
  <script src="{{ asset('front/assets/js/jquery.counterup.min.js')}}"></script>
  <script src="{{ asset('front/assets/js/imgfix.min.js')}}"></script> 
  <script src="{{ asset('front/assets/js/slick.js')}}"></script> 
  <script src="{{ asset('front/assets/js/lightbox.js')}}"></script> 
  <script src="{{ asset('front/assets/js/isotope.js')}}"></script> 
  <!-- Global Init -->
  <script src="{{ asset('front/assets/js/custom.js')}}"></script>
  <!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".owl-men-item, .owl-women-item, .owl-kid-item").owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            nav: true, // 👈 دي اللي بتظهر الأسهم
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>'
            ]
        });
    });
</script>


</body>
</html>
