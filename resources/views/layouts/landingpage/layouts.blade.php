<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="Gumiran Law Office menyediakan jasa hukum profesional di Indonesia. Konsultasi hukum, litigasi, dan layanan hukum lainnya. Hubungi kami sekarang!" />
    <meta name="keywords" content="jasa hukum, pengacara profesional, Gumiran Law Office, konsultasi hukum, litigasi Indonesia" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Security-Policy" content="frame-src 'self' https://www.google.com/;">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/icon.png') }}" />
    <!--All Css Here-->

    <!-- Droid Font CSS-->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/droid.css') }}" />
  <!-- ICO Font CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/icofont.css') }}" />
<!-- Font Awesome CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/font-awesome.min.css') }}" />
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/animate.css') }}" />
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/owl.carousel.min.css') }}" />
<!-- Datepicker CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/jquery.datepicker.css') }}" />
<!-- Calendar CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/zabuto_calendar.css') }}" />
<!-- Meanmenu CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/meanmenu.min.css') }}" />
<!-- Venobox CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/venobox.css') }}" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/bootstrap.min.css') }}" />
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/style.css') }}" />
<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('landingpage/assets/css/responsive.css') }}" />
<!-- Modernizr JS -->
<script src="{{ asset('landingpage/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

{{-- carousel  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



 <!-- meghilangkan google translate -->
 <style>
  /* floating wa */
  .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:90px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
  .goog-logo-link,
  .goog-te-gadget span,
  .goog-te-banner-frame.skiptranslate {
      display: none !important;
  }

  .goog-te-banner-frame {
      display: none !important;
  }

  .goog-te-gadget {
      font-size: 0px !important;
  }

  .goog-te-gadget span,
  .goog-te-gadget img {
      display: none !important;
  }

  .goog-te-banner-frame.skiptranslate {
      display: none !important;
  }

  .goog-te-banner-frame {
      display: none !important;
  }

/* CSS untuk menjaga header tetap di atas */
/* CSS untuk header secara umum */
header {
  position: relative; /* menjaga posisi header */
  z-index: 99999999;
}

/* CSS untuk header-top-area tetap fixed */
.header-top-area {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  transition: top 0.3s;
}

/* CSS untuk sticky header agar tidak hilang saat scroll */
.header-sticky {
  margin-top: 45px; /* Menambahkan margin untuk menghindari tumpang tindih */

}


/* testmimoni */
:root {
            --first_color: #15241c;
            --second-color: #09382f;
            --third-color: #434343;
            --fourth-color:#E55E2E;
            --fifth-color:#F8F1E0;
            --sixth-color : #EC9937;
        }

        .Testimonials {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            max-width: 100%;
            margin: 40px 0px;
        }

        .Testimonials_title h2 {
            font-size: 42px;
            letter-spacing: -2px;
            font-weight: 700;
            letter-spacing: 0;
            margin-bottom: 30px;
            text-align: center;
            color: var(--first_color);
        }

        .Testimonials_title>p {
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 40px;
            font-weight: 300;
            text-align: center;

        }


        .testimonials_container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            position: relative;
        }


        .testimonials_container_center {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .testimonials_content {
            position: relative;
            transition: all .3s ease-in-out;
            transform: scale(0.9);
            opacity: 0.9;
        }

        .testimonials_avatar {
            position: absolute;
            left: 50%;
            top: -30px;
            width: 90px;
            height: 90px;
            margin-left: -45px;
            z-index: 1;
        }

        .testimonials_avatar img {
            width: 90px;
            height: 90px;
            border-radius: 100%;
            border: 6px solid #fff;
            box-shadow: 0 9px 26px rgba(58, 87, 135, 0.1);
        }

        .testimonials_text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 75px 50px 75px;
            overflow: hidden;
            background: var(--third-color);
            border: 1ps solid #f1f1f1;
            border-radius: 10px;
            transition: all .3s ease-in-out;
        }

        .testimonials_text_after {
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;
            position: absolute;
            color: #b99044;
            opacity: .3;
            font-size: 35px;
            transition: all 400ms linear;
            bottom: 25px;
            right: 30px;
        }

        .testimonials_text_before {
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;
            position: absolute;
            color: #b99044;
            opacity: .3;
            font-size: 35px;
            transition: all 400ms linear;
            top: 25px;
            left: 30px;
        }


        .testimonials_text p {
            color: white;
            font-size: 14px;
            font-family: Georgia, "Times New Roman", Times, serif;
            font-style: italic;
            line-height: 24px;
            padding-bottom: 10px;
            font-weight: 500;
        }

        .testimonials_information h3 {
            font-weight: 600;
            color: white;
            ;
            font-size: 18px;
        }

        .testimonials_information h4 {
            font-weight: 400;
            font-size: 12px;
            padding-top: 6px;
            color: white;
            ;
        }

        .testimonials_container_center .active {
            opacity: 1;
            transform: scale(1.0);
            width: 100%;
            flex-grow: 6;
        }

        .testimonials_container_center .active .testimonials_text {
            background: var(--fourth-color);
            box-shadow: 0 9px 26px rgba(58, 87, 135, 0.1);
        }

        .listing-carousel-button {
            position: relative;
            width: 80px;
            height: 50px;
            z-index: 1;
            cursor: pointer;
            background: var(--second-color);
            box-shadow: 0 9px 26px rgba(58, 87, 135, 0.45);
            transition: all 200ms linear;
            outline: none;
        }

        .listing-carousel-button.listing-carousel-button-next {
            padding-right: 20px;
            border-radius: 60px 0 0 60px;
        }

        .listing-carousel-button.listing-carousel-button-prev {
            padding-left: 20px;
            border-radius: 0 60px 60px 0;
        }

        .listing-carousel-button.listing-carousel-button-next:hover {
            right: -15px;
            background: rgba(6, 27, 65, 0.4);
        }

        .listing-carousel-button.listing-carousel-button-prev:hover {
            left: -15px;
            background: rgba(6, 27, 65, 0.4);
        }

  </style>

  </head>
  <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="wrapper">
  


      <header>
		    <div class="header-container">
		        <!--Header Top Area Start-->
		        <div class="header-top-area default-bg">
		            <div class="container">
		                <div class="row row-75">
                            <div class="header-top-wrap col-12">
                                <div class="row">
                                    <!--Header Top Left Area Start-->
                                    <div class="col-md-4 col-xl-3">
                                      <div class="header-top-left">
                                        @foreach ($phone as $dataPhone)
                                        <p>CALL US: <a href="#"> {{ $dataPhone->no_phone }} </a></p>
                                        @endforeach
                                      </div>
                                    </div>
                                    <!--Header Top Left Area End-->
                                    <!--Header Top Middle Area Start-->
                                    <div class="col-md-4 col-xl-6">
                                        <div class="header-top-middle text-center">
                                            <ul class="social-link">
                                              @foreach ($sosialmedia as $dataSosialMedia)
                                              <li>
                                                <a href="{{ strip_tags($dataSosialMedia->link_tiktok_sosialmedia) }}" target="_blank">
                                                  <img src="https://www.tiktok.com/favicon.ico" alt="TikTok Icon" width="16" height="16" style="filter: sepia(100%) saturate(200%) hue-rotate(10deg);">
                                                </a>
                                              </li>
                                              <li>
                                                <a href=" {{ strip_tags($dataSosialMedia->link_instagram_sosialmedia) }}" target="_blank">
                                                  <i class="fa fa-instagram"></i>
                                                </a>
                                              </li>
                                              <li>
                                                <a href="{{ strip_tags($dataSosialMedia->link_youtube_sosialmedia) }}" target="_blank">
                                                  <i class="fa fa-youtube"></i>
                                                </a>
                                              </li>
                                              <li>
                                                <a href="{{ strip_tags($dataSosialMedia->link_linkedin_sosialmedia) }}" target="_blank">
                                                  <i class="fa fa-linkedin"></i>
                                                </a>
                                              </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Header Top Middle Area End-->
                                    <!--Header Top Right Area Start-->
                                    <div class="col-md-4 col-xl-3">
                                        <div class="header-top-right">
                                          @foreach ($email as $dataEmail )
                                          <p style="font-size: 13px">MAIL US: <a href="#">{{ $dataEmail->name_email }} </a></p>
                                        @endforeach
                                        </div>
                                    </div>
                                    <!--Header Top Right Area End-->
                                </div>
                            </div>
		                </div>
		            </div>
		        </div>
		        <!--Header Top Area End-->
		        <!--Header Bottom Area Start-->
		        <div class="header-bottom-area header-sticky">
		            <div class="container">
		                <div class="row align-items-center">
                            <!--Header Logo Start-->
		                    <div class="col-md-3">
		                        <div class="header-logo">
		                            <a href="index.html"><img src=" {{ asset('landingpage/assets/img/logo/logo.png?v=1') }}" alt=""></a>
		                        </div>
		                    </div>
		                    <!--Header Logo End-->
		                    <!--Header Menu Start-->
		                    <div class="col-md-9">
		                        <div class="header-menu-area text-right">
		                            <nav>
		                                <ul class="main-menu">
		                                  
                                      <li class="{{ Request::routeIs('/') ? 'active' : '' }}"><a href="{{ route('/') }}">HOME</a></li>
                                      <li class="{{ Request::routeIs('aboutuslandingpage') ? 'active' : '' }}"><a href="{{ route('aboutuslandingpage') }}">ABOUT US</a></li>
                                      <li class="{{ Request::routeIs('productlandingpage') ? 'active' : '' }}"><a href="{{ route('productlandingpage') }}">PRACTICE AREAS</a></li>
                                      <li class="{{ Request::routeIs('teamlandingpage') ? 'active' : '' }}"><a href="{{ route('teamlandingpage') }}">OUR LAWYERS</a></li>
                                      <li class="{{ Request::routeIs('bloglandingpage') ? 'active' : '' }}"><a href="{{ route('bloglandingpage') }}">BLOG</a></li>
                                      <li class="{{ Request::routeIs('contactlandingpage') ? 'active' : '' }}"><a href="{{ route('contactlandingpage') }}">CONTACT</a></li>
                                      <li class="{{ Request::routeIs('joinuslandingpage') ? 'active' : '' }}"><a href="{{ route('joinuslandingpage') }}">JOIN US</a></li>
                                    
		                                </ul>
		                            </nav>
                              
		                        </div>
                            
		                    </div>
		                    <!--Header Menu End-->
		                </div>
		                <div class="row">
                            <div class="col-12">  
                            <!--Mobile Menu Area Start-->
                            <div class="mobile-menu d-lg-none d-xl-none"></div>
                            <!--Mobile Menu Area End-->
                            </div>
                        </div>
		            </div>
		        </div>
		        <!--Header Bottom Area End-->
		    </div>
		</header>
      


      <!--Header Area End-->
    @yield('content')
      <!--Brand Area Start-->
      <div class="brand-area pt-120 pb-115">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="brand-active owl-carousel">
                <!--Single Brand Start-->
                @foreach ($business_partner as $databusiness_partner )
                <div class="single-brand">
                  <a href="#"><img src="{{ asset($databusiness_partner->image_business_partner) }}" alt="" /></a>
                </div>
                @endforeach
               
                <!--Single Brand End-->
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Brand Area End-->
      <!--Footer Area Start-->
      <footer>
        <div class="footer-container">
          <!--Footer Top Area Start-->
          <div class="footer-top-area black-bg pt-100 pb-65">
            <div class="container">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <!--Single Footer Widget Start-->
                  <div class="single-footer-widget mb-30">
                    <a class="footer-logo" href="index.html"><img src="img/logo/logo_footer.png" alt="" /></a>
                    @foreach ($aboutus as $dataAboutus)
                    <p>   {!! Illuminate\Support\Str::limit($dataAboutus->description_aboutus, 480) !!}</p>
                    @endforeach
                   
                   
                  </div>
                  <!--Single Footer Widget End-->
                </div>
                <!--Single Footer Widget Start-->
                <div class="col-md-6 col-lg-4 footer-menu">
                  <div class="single-footer-widget mb-30">
                    <h3 class="footer-title"> Links</h3>
                    <ul>
                      <li><a href="about.html">About us</a></li>
                      <li><a href="service.html">Practice Area</a></li>
                      <li><a href="appointment.html">Appointment</a></li>
                      <li><a href="#">Terms & Conditions</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
                <!--Single Footer Widget End-->
              
                <!--Single Footer Widget Start-->
                <div class="col-md-6 col-lg-4">
                  <div class="single-footer-widget mb-30">
                    <h3 class="footer-title">Contact Info</h3>
                    @foreach ($address as $dataAddress)
                    <p>{!! $dataAddress->title_address !!}</p>
                    
                    @endforeach
                    
                    <p class="contact-info">
                      @foreach ($phone as $dataPhone)
                     
                      <a href="#">{{ $dataPhone->no_phone }}</a>
                      @endforeach

                    </p>
                    <p class="contact-info">
                      @foreach ($email as $dataEmail )
                    
                      <a href="#">{{ $dataEmail->name_email }} </a>
                      @endforeach
                      
                   
                    </p>
                  </div>

                  <div id="google_translate_element"></div>
                </div>
                <!--Single Footer Widget End-->
              </div>
            </div>
          </div>
          <!--Footer Top Area End-->
          <!--Footer Bottom Area Start-->
          <div class="footer-bottom-area pt-20 pb-20">
            <div class="container text-center">
              <p><span>&copy;</span> Copyright, <script> document.write(new Date().getFullYear()); </script> All right reserved by <a href="/">Gumiran Law Office</a></p>
              
            </div>
          </div>
          <!--Footer Bottom Area End-->
        </div>
      </footer>
      <!--Footer Area End-->
      @foreach ($phone as $dataPhone)
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <a href="https://api.whatsapp.com/send?phone=+62{{ $dataPhone->no_phone }} &text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
      <i class="fa fa-whatsapp my-float"></i>
      </a>
      @endforeach
     
    </div>

    <!--All Js Here-->

  <!-- jQuery 1.12.4 -->
<script src="{{ asset('landingpage/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('landingpage/assets/js/waypoints.min.js') }}"></script>
<!-- Counterup -->
<script src="{{ asset('landingpage/assets/js/jquery.counterup.min.js') }}"></script>
<!-- Carousel -->
<script src="{{ asset('landingpage/assets/js/owl.carousel.min.js') }}"></script>
<!-- Meanmenu -->
<script src="{{ asset('landingpage/assets/js/jquery.meanmenu.min.js') }}"></script>
<!-- Instafeed -->
<script src="{{ asset('landingpage/assets/js/instafeed.min.js') }}"></script>
<!-- Datepicker -->
<script src="{{ asset('landingpage/assets/js/jquery.datepicker.min.js') }}"></script>
<!-- Calendar -->
<script src="{{ asset('landingpage/assets/js/zabuto-calendar.min.js') }}"></script>
<!-- ScrollUp -->
<script src="{{ asset('landingpage/assets/js/jquery.scrollUp.min.js') }}"></script>
<!-- Wow -->
<script src="{{ asset('landingpage/assets/js/wow.min.js') }}"></script>
<!-- Venobox -->
<script src="{{ asset('landingpage/assets/js/venobox.min.js') }}"></script>
<!-- Popper -->
<script src="{{ asset('landingpage/assets/js/popper.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('landingpage/assets/js/bootstrap.min.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('landingpage/assets/js/plugins.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('landingpage/assets/js/main.js') }}"></script>

{{-- transale --}}
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- script -->

<script>
  function googleTranslateElementInit() {
      new google.translate.TranslateElement({
          pageLanguage: 'en',
          includedLanguages: 'en,ja,zh-CN,ar',
          multiLanguagePage: true,
      }, 'google_translate_element');

      // Setelah elemen terbuat, set bahasa dari localStorage jika ada
      setTimeout(() => {
          let savedLanguage = localStorage.getItem("selectedLanguage");
          if (savedLanguage) {
              googleTranslateSetLanguage(savedLanguage);
          }
      }, 1000); // Timeout agar elemen ter-load sempurna
  }

  function googleTranslateSetLanguage(lang) {
      let select = document.querySelector(".goog-te-combo");
      if (select) {
          select.value = lang;
          select.dispatchEvent(new Event("change"));
      }
  }

  // Event listener untuk menyimpan bahasa yang dipilih
  document.addEventListener("change", function(event) {
      if (event.target.classList.contains("goog-te-combo")) {
          let selectedLanguage = event.target.value;
          if (selectedLanguage === "en") {
              localStorage.removeItem("selectedLanguage"); // Kembali ke default
          } else {
              localStorage.setItem("selectedLanguage", selectedLanguage);
          }
      }
  });
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<!-- Tambahkan jQuery dan Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $(".testimonials_slider").owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
            responsive:{
                0:{ items:1 },
                600:{ items:2 },
                1000:{ items:3 }
            }
        });
    });
</script>


  </body>
</html>
