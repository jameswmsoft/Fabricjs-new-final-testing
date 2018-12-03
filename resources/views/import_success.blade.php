<html>
  <head>
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  </head></html>
@extends('layouts.app')

<div id="header_content" class="header-before-slider header-background" style="background-color: #F1F1F1;box-shadow: 0 0 4px 0 rgba(0,0,0,.44), 0 2px 4px 0 rgba(0,0,0,.12);position: fixed;z-index: 1000;width: 100%;height:125px;">
<div class="top-header" style="background-color: #e0395d;box-shadow: 0 0 4px 0 rgba(0,0,0,.44), 0 2px 4px 0 rgba(0,0,0,.12);height:40px;">
        <div class="container">
          <div class="row">
            <div class="col-xs-5 col-sm-6 col-md-6 col-lg-6" style="color: white;margin-top: 8px;font-family: &quot;Lato&quot;,sans-serif;">
              <i class="fa fa-envelope"></i>&nbsp;
              <?php
                echo "hello@designer.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
              ?>
              <i class="fa fa-phone"></i>&nbsp;
              <?php
              echo "(888) 777-6666";
              ?>
            </div>

<div class="col-xs-7 col-sm-6 col-md-6 col-lg-6">
        <div class="clearfix">
          <div class="pull-right">
            <ul class="right-menu top-right-menu">
                <a href="/"><i class="fa fa-facebook-square fa-lg" style="color: white;margin-top: 11px;"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="/"><i class="fa fa-twitter-square fa-lg"style="color: white;margin-top: 11px;"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="/"><i class="fa fa-instagram fa-lg"style="color: white;margin-top: 11px;"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="/"><i class="fa fa-youtube-square fa-lg"style="color: white;margin-top: 11px;"></i></a>&nbsp;&nbsp;&nbsp;
              
              <li class="mini-cart-content" style="list-style: none;display: inline-block;">
                  {{--cart dropdown content--}}
                  <a href="/final-testing-dai/cart" class="main show-mini-cart" style="text-decoration: none;color: #FFFFFF;display: block;font-size: 14px;padding: 8px 10px;"> <span class="hidden-xs"><i class="fa fa-shopping-cart fa-lg" style="margin-top: 4px;"></i></span>{{--{!! trans('frontend.menu_my_cart') !!}--}} <span class="hidden-sm hidden-md hidden-lg fa fa-shopping-cart fa-lg"></span> <span class="cart-count" style="background: #2a2a2a none repeat scroll 0 0;border: 1px solid #4b4b4b;display: inline-block;height: 22px;line-height: 1.4;margin-left: 6px;padding: 0 7px;transition: all 0.2s ease-in 0s;vertical-align: top;"><span id="total_count_by_ajax">{!! Cart::count() !!}</span></span></a>
                  <div id="list_popover" class="bottom" style="display: none;">
                    <div class="arrow"></div>
                    @if( Cart::count() >0 )
                      <div id="cd-cart">
                        <h2>{!! trans('frontend.mini_cart_label_cart') !!}</h2>
                        <ul class="cd-cart-items">
                          @foreach(Cart::items() as $index => $items)
                            <li>
                              <span class="cd-qty">{!! $items->quantity !!}x</span>&nbsp;{!! $items->name !!}
                              <div class="cd-price">{!! price_html( get_product_price_html_by_filter( Cart::getRowPrice($items->quantity, get_role_based_price_by_product_id($items ->id, $items->price))) ) !!}</div>
                              <a href="{{ route('removed-item-from-cart', $index)}}" class="cd-item-remove cd-img-replace cart_quantity_delete"></a>
                            </li>
                          @endforeach
                        </ul>
                  
                        <div class="cd-cart-total">
                          <p>{!! trans('frontend.total') !!} <span>{!! price_html( get_product_price_html_by_filter(Cart::getTotal()) ) !!}</span></p>
                        </div>
                  
                        <a href="{{ route('checkout-page') }}" class="checkout-btn">{!! trans('frontend.checkout') !!}</a>
                      </div>
                    @else
                      <div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
                    @endif
                  </div>
                  {{--end cart dropdown content--}}
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
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="search-content">
                    <div class="col-xs-12 col-sm-0 col-md-3 col-lg-3" style="margin-top: 10px;">
                      @if(get_site_logo_image())
                        <div class="logo hidden-xs hidden-sm"><img src="{{ get_site_logo_image() }}" title="{{ trans('frontend.your_store_label') }}" alt="{{ trans('frontend.your_store_label') }}"></div>
                      @endif
                    </div> 
                </div>
        </div>
    </div>
</div> 

<ul class="all-menu nav navbar-nav" style="margin-top: -45px;margin-left: 500px;font-family: &quot;Lato&quot;,sans-serif;text-transform: uppercase;font-size: 14px;padding: 8px 10px;
vertical-align: top;">
        <li class="first" style="padding: 0px 10px;">
            <a href="/final-testing-dai/" class="main menu-name" style="color: #777777;font-size: 14px;">Home</a></li>

<li class="dropdown mega-dropdown" style="padding: 0px 10px;">
<a href="#" class="dropdown-toggle menu-name" data-toggle="dropdown" style="color: #777777;font-size: 14px;">Shop By Categories  <span class="caret"></span></a>
<ul class="dropdown-menu mega-dropdown-menu mega-menu-cat row clearfix">
    <li class="col-xs-12 col-sm-4">  
<ul>
    <li class="dropdown-header">
        <img src="http://localhost:8888/clusterdesigner_new/public/images/no-image.png">Brochure
    </li>
</ul>
</li>
<li class="col-xs-12 col-sm-4">  
    <ul>
        <li class="dropdown-header">
            <img src="http://localhost:8888/clusterdesigner_new/public/images/no-image.png">EDDM
        </li>
    </ul>
</li>
<li class="col-xs-12 col-sm-4">  
    <ul>
        <li class="dropdown-header">
            <img src="http://localhost:8888/clusterdesigner_new/public/images/no-image.png">Postcard
        </li>
    </ul>
</li>
<div class="clear-both"></div>
</ul>
</li>
<li style="padding: 0px 10px;"><a href="/final-testing-dai/shop" class="main selected menu-name" style="color: #777777;font-size: 14px;">Products</a></li>
<li style="padding: 0px 10px;"><a href="/final-testing-dai/cart" class="main menu-name" style="color: #777777;font-size: 14px;">Cart</a></li>
<li class="users-vendors-login" style="padding: 0px 10px;"><a href="#" class="main selected dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" style="color: #777777;font-size: 14px;"><i class="fa fa-user" aria-hidden="true"></i> <span class="hidden-xs">My Account</span><span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost:8888/clusterdesigner_new/user/login" style="color: #777777;font-size: 14px;">User Login</a></li>
<li><a target="_blank" href="http://localhost:8888/clusterdesigner_new/admin/login" style="color: #777777;font-size: 14px;">Vendor Login</a></li>
<li><a href="http://localhost:8888/clusterdesigner_new/vendor/registration" style="color: #777777;font-size: 14px;">Vendor Registration</a></li>
</ul>
</li>
</ul>
</div>

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 170px;">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CSV Import</div>

                    <div class="panel-body">
                        Data imported successfully.
                    </div>
                </div>

                <button class="btn btn-sm btn-style" type="button" onclick="window.location.href='/final-testing/cart'" style="background-color: #e0395d;border-color: transparent;color: #fff;font-size: 20px;font-family: &quot;Lato&quot;,sans-serif;">
                    {{ trans('Continue') }}
                </button> <br /><br />

            </div>
        </div>
    </div>

    <div class="footer-top full-width" style="background: #272727 none repeat scroll 0 0;box-shadow: 0 0 4px 0 rgba(0,0,0,.74), 0 2px 4px 0 rgba(0,0,0,.12);">
            <div class="footer-top-background">
              <div class="container" style="padding: 0px 70px;">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-4" style="float: left;width: 33.33333333%;">
                    <h3 class="widget-title" style="font-size: .9em;letter-spacing: 0.05em;line-height: 1.05;text-transform: uppercase;color: silver;font-family: &quot;Lato&quot;,sans-serif;">{!! trans('frontend.footer_about_us') !!}</h3>
                    <div class="is-divider small" style="background-color: rgba(255, 255, 255, 0.3);display: block;height: 3px;width: 30px;"></div>
                    <p style="color: silver;font-family: &quot;Lato&quot;,sans-serif;padding: 20px 0px;font-size: 1em;">Your description here</p>
                   
                    <h3 class="widget-title" style="font-size: .9em;letter-spacing: 0.05em;line-height: 1.05;text-transform: uppercase;color: silver;font-family: &quot;Lato&quot;,sans-serif;">{!! trans('frontend.footer_follow_us') !!}</h3>
                    <div class="is-divider small" style="background-color: rgba(255, 255, 255, 0.3);display: block;height: 3px;width: 30px;"></div>
                    <ul class="social-media" style="list-style: none;display: block;padding-left: 0px;padding-top: 20px;">
                      <li style=" display: inline-block; "><a class="facebook" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-facebook" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                      <li style=" display: inline-block; "><a class="twitter" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-twitter" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                      <li style=" display: inline-block; "><a class="linkedin" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-linkedin" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                      <li style=" display: inline-block; "><a class="dribbble" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-dribbble" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                      <li style=" display: inline-block; "><a class="google-plus" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-google-plus" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                      <li style=" display: inline-block; "><a class="instagram" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-instagram" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                      <li style=" display: inline-block; "><a class="youtube-play" href="/" style="background: transparent none repeat scroll 0 0;border: 2px solid rgba(255, 255, 255, 0.3);border-radius: 100%;display: block;height: 32px;padding: 7px 0 0;text-align: center;width: 32px;"><i class="fa fa-youtube-play" style="transition: all 0.9s ease 0s;color: silver;"></i></a></li>
                    </ul>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12 col-md-4">
                    <h3 class="widget-title" style="font-size: .9em;letter-spacing: 0.05em;line-height: 1.05;text-transform: uppercase;color: silver;font-family: &quot;Lato&quot;,sans-serif;">{!! trans('frontend.latest_news_label') !!}</h3>
                    <div class="is-divider small" style="background-color: rgba(255, 255, 255, 0.3);display: block;height: 3px;width: 30px;"></div>
                    <p style="color: silver;font-family: &quot;Lato&quot;,sans-serif;padding: 20px 0px;font-size: 1em;text-align: center;">There are no latest news available</p>
                  </div>
                  
                  <div class="col-xs-12 col-sm-12 col-md-4">
                    <h3 class="widget-title" style="font-size: .9em;letter-spacing: 0.05em;line-height: 1.05;text-transform: uppercase;color: silver;font-family: &quot;Lato&quot;,sans-serif;">{!! trans('frontend.footer_tags_label') !!}</h3>
                    <div class="is-divider small" style="background-color: rgba(255, 255, 255, 0.3);display: block;height: 3px;width: 30px;"></div>
                    <p style="color: silver;font-family: &quot;Lato&quot;,sans-serif;padding: 20px 0px;font-size: 1em;text-align: center;">No Tags Available</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-copyright full-width">
            <div class="footer-copyright-background" style="background: #171717 none repeat scroll 0 0;height: 60px;">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 footer-text" style="padding: 30px 70px;color: silver;font-size: 14px;font-family: &quot;Lato&quot;,sans-serif;line-height: 0px;">
                    <div>
                    <span>Copyright © 2018 Jack's Designer. All rights reserved.</span>
                    <span class="powered-text" style="float: right;">Powered By <strong style="color: #e0395d;">Jack's Designer</strong></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
          </div>
        
        
    
@endsection


