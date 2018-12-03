<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
@include('includes.frontend.header-content-custom-css')
<div id="header_content" class="header-before-slider header-background">
  <div class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-5 col-sm-6 col-md-6 col-lg-6" style="color: white;margin-top: 8px;">
          <i class="fa fa-envelope"></i>&nbsp;
          <?php
            echo "hello@designer.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
          ?>
          <i class="fa fa-phone"></i>&nbsp;
          <?php
          echo "(888) 777-6666";
          ?>

          {{-- <div class="dropdown change-multi-currency">
            @if(get_frontend_selected_currency())
            <a class="dropdown-toggle" href="#" data-hover="dropdown" data-toggle="dropdown">
              <span class="hidden-xs">{!! get_currency_name_by_code( get_frontend_selected_currency() ) !!}</span>
              <span class="hidden-sm hidden-md hidden-lg fa fa-money fa-lg"></span> 
              @if(count(get_frontend_selected_currency_data()) >0)
              <span class="caret"></span>
              @endif
            </a>
            @endif
            <div class="dropdown-content">
              @if(count(get_frontend_selected_currency_data()) >0)
                @foreach(get_frontend_selected_currency_data() as $val)
                  <a href="#" data-currency_name="{{ $val }}">{!! get_currency_name_by_code( $val ) !!}</a>
                @endforeach
              @endif
            </div>
          </div> --}}
          {{--<div class="dropdown language-list">
            @if(count(get_frontend_selected_languages_data()) > 0)
              @if(get_frontend_selected_languages_data()['lang_code'] == 'en')
                <a class="dropdown-toggle" href="#" data-hover="dropdown" data-toggle="dropdown">
                  <img src="{{ asset('public/images/'. get_frontend_selected_languages_data()['lang_sample_img']) }}" alt="lang"> <span class="hidden-xs"> &nbsp; {!! get_frontend_selected_languages_data()['lang_name'] !!}</span> <span class="caret"></span></a>
              @else
                <a class="dropdown-toggle" href="#" data-hover="dropdown" data-toggle="dropdown">
                  <img src="{{ get_image_url(get_frontend_selected_languages_data()['lang_sample_img']) }}" alt="lang"> <span class="hidden-xs"> &nbsp; {!! get_frontend_selected_languages_data()['lang_name'] !!}</span> <span class="caret"></span></a>
              @endif
            @endif
            
            @if(count(get_available_languages_data_frontend()) > 0)
              <div class="dropdown-content">
                @foreach(get_available_languages_data_frontend() as $key => $val)
                  @if($val['lang_code'] == 'en')
                    <a href="#" data-lang_name="{{ $val['lang_code'] }}"><img src="{{ asset('public/images/'. $val['lang_sample_img']) }}" alt="lang"> &nbsp;{!! ucwords($val['lang_name']) !!}</a>
                  @else
                    <a href="#" data-lang_name="{{ $val['lang_code'] }}"><img src="{{ get_image_url($val['lang_sample_img']) }}" alt="lang"> &nbsp;{!! ucwords($val['lang_name']) !!}</a>
                  @endif
                @endforeach
              </div>
            @endif
          </div> --}}    
        </div>
      
        <div class="col-xs-7 col-sm-6 col-md-6 col-lg-6">
          <div class="clearfix">
            <div class="pull-right">
              <ul class="right-menu top-right-menu">
                  <a href="//{{ $appearance_all_data['footer_details']['follow_us_url']['fb'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.fb_tooltip_msg') }}" target="_blank"><i class="fa fa-facebook-square fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
                  <a href="//{{ $appearance_all_data['footer_details']['follow_us_url']['twitter'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.twitter_tooltip_msg') }}" target="_blank"><i class="fa fa-twitter-square fa-lg"></i>&nbsp;&nbsp;&nbsp;
                  <a href="//{{ $appearance_all_data['footer_details']['follow_us_url']['instagram'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.instagram_tooltip_msg') }}" target="_blank"><i class="fa fa-instagram fa-lg"></i>&nbsp;&nbsp;&nbsp;
                  <a href="//{{ $appearance_all_data['footer_details']['follow_us_url']['youtube'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.youtube_play_tooltip_msg') }}" target="_blank"><i class="fa fa-youtube-square fa-lg"></i>&nbsp;&nbsp;&nbsp;
                {{-- <li class="wishlist-content">
                  <a class="main" href="{{ route('my-saved-items-page') }}">
                    <i class="fa fa-heart"></i> 
                    <span class="hidden-xs">{!! trans('frontend.frontend_wishlist') !!}</span> 
                  </a>    
                </li> --}}
                
                {{--<li class="users-vendors-login"><a href="#" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-user" aria-hidden="true"></i> <span class="hidden-xs">{!! trans('frontend.menu_my_account') !!}</span><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    @if (Session::has('shopist_frontend_user_id'))
                    <li><a href="{{ route('user-account-page') }}">{!! trans('frontend.user_account_label') !!}</a></li>
                    @else
                    <li><a href="{{ route('user-login-page') }}">{!! trans('frontend.frontend_user_login') !!}</a></li>
                    @endif
                    
                    @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
                     <li><a target="_blank" href="{{ route('admin.dashboard') }}">{!! trans('frontend.vendor_account_label') !!}</a></li>
                    @else
                     <li><a target="_blank" href="{{ route('admin.login') }}">{!! trans('frontend.frontend_vendor_login') !!}</a></li>
                    @endif
                    
                    <li><a href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a></li>
                  </ul>
                </li>--}}
                
                <li class="mini-cart-content">
                    @include('pages.ajax-pages.mini-cart-html')
                </li>
              </ul>
            </div>  
          </div>
        </div> 
      </div>         
    </div>      
  </div>  
   
  <div class="container">  
    <div class="row">
      <div class="search-content">
        {{--<div class="col-xs-12 col-sm-0 col-md-3 col-lg-3">
          @if(get_site_logo_image())
            <div class="logo hidden-xs hidden-sm"><img src="{{ get_site_logo_image() }}" title="{{ trans('frontend.your_store_label') }}" alt="{{ trans('frontend.your_store_label') }}"></div>
          @endif 
        </div> --}}

        {{-- <div class="col-xs-8 col-sm-10 col-md-6 col-lg-6">
          <form id="search_option" action="{{ route('shop-page') }}" method="get">
            <div class="input-group">
              <input type="text" id="srch_term" name="srch_term" class="form-control" placeholder="{{ trans('frontend.search_for_label') }}">
              <span class="input-group-btn">
                <button id="btn-search" type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
            </div>
          </form>
        </div> --}}

        <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3 text-right"> 
          <a href="{{ route('product-comparison-page') }}" class="btn btn-default btn-compare"><i class="fa fa-exchange"></i> <span class="hidden-xs hidden-sm"> &nbsp; {!! trans('frontend.compare_label') !!}</span> <span class="compare-value"> (<?php echo $total_compare_item;?>)</span></a>
        </div>  
      </div> 
    </div>   
  </div>   
   
  <div class="container"> 
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="search-content">
              <div class="col-xs-12 col-sm-0 col-md-3 col-lg-3">
                @if(get_site_logo_image())
                  <div class="logo hidden-xs hidden-sm"><img src="{{ get_site_logo_image() }}" title="{{ trans('frontend.your_store_label') }}" alt="{{ trans('frontend.your_store_label') }}"></div>
                @endif
              </div> 
            </div>

        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="btn navbar-toggle collapsed" 
               data-toggle="collapse" data-target="#header-navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand visible-xs visible-sm" src="{{ get_site_logo_image() }}" alt="{{ trans('frontend.your_store_label') }}">  
          </div>
          <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="all-menu nav navbar-nav">
              @if(Request::is('/'))
                <li class="first"><a href="{{ route('home-page') }}" class="main selected menu-name">{!! trans('frontend.home') !!}</a></li>
              @else
                <li class="first"><a href="{{ route('home-page') }}" class="main menu-name">{!! trans('frontend.home') !!}</a></li>
              @endif

              <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle menu-name" data-toggle="dropdown">{!! trans('frontend.shop_by_cat_label') !!}  <span class="caret"></span></a>
                <ul class="dropdown-menu mega-dropdown-menu mega-menu-cat row clearfix">
                  @if(count($productCategoriesTree) > 0)
                    <?php $i = 1; $j = 0;?>
                    @foreach($productCategoriesTree as $cat)
                      @if($i == 1)
                      <?php $j++; ?>
                      <li class="col-xs-12 col-sm-4">  
                      @endif

                      <ul>
                        @if(isset($cat['parent']) && $cat['parent'] == 'Parent Category')  
                        <li class="dropdown-header">
                            @if( !empty($cat['img_url']) )
                            <img src="{{ get_image_url($cat['img_url']) }}"> 
                            @else
                            <img src="{{ default_placeholder_img_src() }}"> 
                            @endif
                            
                            <a href="{{ route('categories-page', $cat['slug']) }}">{!! $cat['name'] !!}</a>
                        </li>
                        @endif
                        @if(isset($cat['children']) && count($cat['children']) > 0)
                          @foreach($cat['children'] as $cat_sub)
                            <li class="product-sub-cat"><a href="{{ route('categories-page', $cat_sub['slug']) }}">{!! $cat_sub['name'] !!}</a></li>
                            @if(isset($cat_sub['children']) && count($cat_sub['children']) > 0)
                              @include('pages.common.category-frontend-loop-home', $cat_sub)
                            @endif
                          @endforeach
                        @endif
                      </ul>

                      @if($i == 1)
                      </li>
                      <?php $i = 0;?>
                      @endif

                      @if($j == 3 || $j == 4)
                      <div class="clear-both"></div>
                      <?php $j = 0; ?>
                      @endif

                      <?php $i ++;?>
                    @endforeach
                  @endif
                </ul>
              </li>

              @if(Request::is('shop'))
                <li><a href="{{ route('shop-page') }}" class="main selected menu-name">{!! trans('frontend.all_products_label') !!}</a></li>
              @else
                <li><a href="{{ route('shop-page') }}" class="main menu-name">{!! trans('frontend.all_products_label') !!}</a></li>
              @endif

              {{--@if(Request::is('checkout'))
                <li><a href="{{ route('checkout-page') }}" class="main selected menu-name">{!! trans('frontend.checkout') !!}</a></li>
              @else
                <li><a href="{{ route('checkout-page') }}" class="main menu-name">{!! trans('frontend.checkout') !!}</a></li>
              @endif--}}

              @if(Request::is('cart'))
                <li><a href="{{ route('cart-page') }}" class="main selected menu-name">{!! trans('frontend.cart') !!}</a></li>
              @else
                <li><a href="{{ route('cart-page') }}" class="main menu-name">{!! trans('frontend.cart') !!}</a></li>
              @endif

             {{--@if(Request::is('blogs'))
                <li><a href="{{ route('blogs-page-content') }}" class="main selected menu-name">{!! trans('frontend.blog') !!}</a></li>
              @else
                <li><a href="{{ route('blogs-page-content') }}" class="main menu-name">{!! trans('frontend.blog') !!}</a></li>
              @endif--}}

              @if(count($pages_list) > 0)
              <li>
                <div class="dropdown custom-page">
                  <a class="dropdown-toggle menu-name" href="#" data-hover="dropdown" data-toggle="dropdown"> {!! trans('frontend.pages_label') !!} 
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    @foreach($pages_list as $pages)
                    <li> <a href="{{ route('custom-page-content', $pages['post_slug']) }}">{!! $pages['post_title'] !!}</a></li>
                    @endforeach
                  </ul>
                </div>
              </li>
              @endif

              {{-- <li class="wishlist-content">
                  <a class="main" href="{{ route('my-saved-items-page') }}">
                    <i class="fa fa-heart"></i> 
                    <span class="hidden-xs">{!! trans('frontend.frontend_wishlist') !!}</span> 
                  </a>    
                </li> --}}
              
              {{--store list page--}}
              @if(Request::is('stores'))
                <li><a href="{{ route('store-list-page-content') }}" class="main selected menu-name">{!! trans('frontend.vendor_account_store_list_title_label') !!}</a></li>
              @else
                <li><a href="{{ route('store-list-page-content') }}" class="main menu-name">{!! trans('frontend.vendor_account_store_list_title_label') !!}</a></li>
              @endif
                
                <li class="users-vendors-login"><a href="#" class="dropdown-toggle menu-name" data-toggle="dropdown" data-hover="dropdown" style="margin-top: -7px;"><i class="fa fa-user" aria-hidden="true"></i> <span class="hidden-xs">{!! trans('frontend.menu_my_account') !!}</span><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    
                    @if(is_frontend_user_logged_in())
                    <li><a href="{{ route('user-dashboard-page') }}"><i class="fa fa-dashboard"></i> {{ trans('frontend.dashboard') }}</a></li>
                   
                    
                   
                      <li><a href="{{ route('my-address-page') }}"><i class="fa fa-map-marker"></i> {{ trans('frontend.my_address') }}</a></li>
                    
                      <li><a href="{{ route('my-orders-page') }}"><i class="fa fa-file-text-o"></i> {{ trans('frontend.my_orders') }}</a></li>
                    
                      <li><a href="{{ route('my-saved-items-page') }}"><i class="fa fa-save"></i> {{ trans('frontend.my_saved_items') }}</a></li>
                    
                    
                     <li><a href="{{ route('my-coupons-page') }}"><i class="fa fa-scissors"></i> {{ trans('frontend.my_coupons') }}</a></li>
                    <li><a href="{{ route('download-page') }}"><i class="fa fa-download"></i> {{ trans('frontend.user_account_download_title') }}</a></li>
                    <li><a href="{{ route('my-profile-page') }}"><i class="fa fa-user"></i> {{ trans('frontend.my_profile') }}</a></li>
                   
                    <li>
                      <a href="{{ route('user-logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-circle-o-notch"></i> {!! trans('admin.sign_out') !!}
                                        </a>
                    <form id="logout-form" method="post" action="{{ route('user-logout') }}" enctype="multipart/form-data" style="display: none;">
                      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">   
                    </form>
                     </li>
                     @else
                      <li><a href="{{ route('user-login-page') }}">{!! trans('frontend.frontend_user_login') !!}</a></li>
                      <li><a target="_blank" href="{{ route('admin.login') }}">{!! trans('frontend.frontend_vendor_login') !!}</a></li>
                      <li><a href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a></li>
                    @endif

                    {{--@if (Session::has('shopist_frontend_user_id'))
                    <li><a href="{{ route('user-account-page') }}">{!! trans('frontend.user_account_label') !!}</a></li>
                    @else
                    <li><a href="{{ route('user-login-page') }}">{!! trans('frontend.frontend_user_login') !!}</a></li>
                    @endif
                    
                    @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
                     <li><a target="_blank" href="{{ route('admin.dashboard') }}">{!! trans('frontend.vendor_account_label') !!}</a></li>
                    @else
                     <li><a target="_blank" href="{{ route('admin.login') }}">{!! trans('frontend.frontend_vendor_login') !!}</a></li>
                    @endif
                    
                    <li><a href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a></li>--}}
                  </ul>
                </li>
            </ul>
          </div>
        </nav>
      </div>
    </div> 
  </div>    
</div>

@if($appearance_all_data['header_details']['slider_visibility'] == true && Request::is('/'))
  <?php $count = count(get_appearance_header_settings_data());?>
  @if($count > 0)
  <div class="header-with-slider">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @for($i = 0; $i < $count; $i++)
          @if($i== 0)
            <li data-target="#slider-carousel" data-slide-to="{{ $i }}" class="active"></li>
          @else
            <li data-target="#slider-carousel" data-slide-to="{{ $i }}"></li>
          @endif
        @endfor                           
      </ol>

      <?php $numb = 1; ?>
      <div class="carousel-inner" >

        @foreach(get_appearance_header_settings_data() as $img)
          @if($numb == 1)
            <div class="item active" style="margin-top: 100px;">
              @if($img->img_url)
                <img src="{{ get_image_url($img->img_url) }}" class="girl img-responsive" alt="" />
              @endif

              <?php if(isset($img->text)){?>
                <div class="dynamic-text-on-image-container">{!! $img->text !!}</div>
              <?php }?>
            </div>
          @else
            <div class="item" style="margin-top: 100px;">
              @if($img->img_url)
              <!-- Joseph Start -->
              <div id="particles-js" data-src="{{ get_image_url($img->img_url) }}"></div>
                <!-- <img src="{{ get_image_url($img->img_url) }}" class="girl img-responsive" id="particles-js" alt="" /> -->
                <!-- Joseph End -->
              @endif

              <?php if(isset($img->text)){?>
                <div class="dynamic-text-on-image-container">{!! $img->text !!}</div>
              <?php }?>
            </div>
          @endif
          <?php $numb++ ; ?>
        @endforeach
      </div>
    </div>
  </div>
  @else
  <div class="header-with-slider">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active" style="margin-top: 125px;">
          <img src="{{ asset('public/images/sunglass.jpg') }}" class="girl img-responsive" alt="" />
        </div>
      </div>
    </div>
  </div>
  @endif
@endif

<!-- Joseph Start -->

<style type="text/css">
  #slider-carousel {
      /*height: 785px*/
    }
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
      /*width: 70%;
      margin: auto;*/
    }
 canvas {
      /*position: relative;*/
      /*pointer-events:none;*/
      top: 0;
      left: 0
    }
    /* Particles Canvas*/
    #particles-js{
      /*height: 785px*/
      height: 533px;
      width: 100%;
      background-color: #D0EDF5;
      background-size: cover;
      /*background-position: 50% 50%;*/
      background-repeat: no-repeat;
    }
</style>
<script>
  $('#slider-carousel').on('slide.bs.carousel', function () {
   

    var img_url = $('#particles-js').data('src');console.log(img_url);

     $('#particles-js').css('background-image', 'url('+img_url+')');

      particlesJS('particles-js',

       {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "image",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "src": "{{ asset('public/images/map-marker.png') }}",
              "width": 9000,
              "height": 8000
            }
          },
          "opacity": {
            "value": 0.05,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.01,
              "sync": false
            }
          },
          "size": {
            "value": 30,
            "random": true,
            "anim": {
              "enable": true,
              "speed": 10,
              "size_min": 0,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200,
              "duration": 0.4
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
            "hide_card": false,
            "background_color": "#D0EDF5",
            "background_image": "",
            "background_position": "50% 50%",
            "background_repeat": "no-repeat",
            "background_size": "cover"
          }
      } );
  
   })
  </script>
<!-- Joseph End  -->