<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<?php echo $__env->make('includes.frontend.header-content-custom-css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

          
              
        </div>
      
        <div class="col-xs-7 col-sm-6 col-md-6 col-lg-6">
          <div class="clearfix">
            <div class="pull-right">
              <ul class="right-menu top-right-menu">
                  <a href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['fb']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.fb_tooltip_msg')); ?>" target="_blank"><i class="fa fa-facebook-square fa-lg"></i></a>&nbsp;&nbsp;&nbsp;
                  <a href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['twitter']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.twitter_tooltip_msg')); ?>" target="_blank"><i class="fa fa-twitter-square fa-lg"></i>&nbsp;&nbsp;&nbsp;
                  <a href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['instagram']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.instagram_tooltip_msg')); ?>" target="_blank"><i class="fa fa-instagram fa-lg"></i>&nbsp;&nbsp;&nbsp;
                  <a href="//<?php echo e($appearance_all_data['footer_details']['follow_us_url']['youtube']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.youtube_play_tooltip_msg')); ?>" target="_blank"><i class="fa fa-youtube-square fa-lg"></i>&nbsp;&nbsp;&nbsp;
                
                
                
                
                <li class="mini-cart-content">
                    <?php echo $__env->make('pages.ajax-pages.mini-cart-html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        

        

        <div class="col-xs-4 col-sm-2 col-md-3 col-lg-3 text-right"> 
          <a href="<?php echo e(route('product-comparison-page')); ?>" class="btn btn-default btn-compare"><i class="fa fa-exchange"></i> <span class="hidden-xs hidden-sm"> &nbsp; <?php echo trans('frontend.compare_label'); ?></span> <span class="compare-value"> (<?php echo $total_compare_item;?>)</span></a>
        </div>  
      </div> 
    </div>   
  </div>   
   
  <div class="container"> 
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="search-content">
              <div class="col-xs-12 col-sm-0 col-md-3 col-lg-3">
                <?php if(get_site_logo_image()): ?>
                  <div class="logo hidden-xs hidden-sm"><img src="<?php echo e(get_site_logo_image()); ?>" title="<?php echo e(trans('frontend.your_store_label')); ?>" alt="<?php echo e(trans('frontend.your_store_label')); ?>"></div>
                <?php endif; ?>
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
            <img class="navbar-brand visible-xs visible-sm" src="<?php echo e(get_site_logo_image()); ?>" alt="<?php echo e(trans('frontend.your_store_label')); ?>">  
          </div>
          <div class="collapse navbar-collapse" id="header-navbar-collapse">
            <ul class="all-menu nav navbar-nav">
              <?php if(Request::is('/')): ?>
                <li class="first"><a href="<?php echo e(route('home-page')); ?>" class="main selected menu-name"><?php echo trans('frontend.home'); ?></a></li>
              <?php else: ?>
                <li class="first"><a href="<?php echo e(route('home-page')); ?>" class="main menu-name"><?php echo trans('frontend.home'); ?></a></li>
              <?php endif; ?>

              <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle menu-name" data-toggle="dropdown"><?php echo trans('frontend.shop_by_cat_label'); ?>  <span class="caret"></span></a>
                <ul class="dropdown-menu mega-dropdown-menu mega-menu-cat row clearfix">
                  <?php if(count($productCategoriesTree) > 0): ?>
                    <?php $i = 1; $j = 0;?>
                    <?php $__currentLoopData = $productCategoriesTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($i == 1): ?>
                      <?php $j++; ?>
                      <li class="col-xs-12 col-sm-4">  
                      <?php endif; ?>

                      <ul>
                        <?php if(isset($cat['parent']) && $cat['parent'] == 'Parent Category'): ?>  
                        <li class="dropdown-header">
                            <?php if( !empty($cat['img_url']) ): ?>
                            <img src="<?php echo e(get_image_url($cat['img_url'])); ?>"> 
                            <?php else: ?>
                            <img src="<?php echo e(default_placeholder_img_src()); ?>"> 
                            <?php endif; ?>
                            
                            <a href="<?php echo e(route('categories-page', $cat['slug'])); ?>"><?php echo $cat['name']; ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(isset($cat['children']) && count($cat['children']) > 0): ?>
                          <?php $__currentLoopData = $cat['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="product-sub-cat"><a href="<?php echo e(route('categories-page', $cat_sub['slug'])); ?>"><?php echo $cat_sub['name']; ?></a></li>
                            <?php if(isset($cat_sub['children']) && count($cat_sub['children']) > 0): ?>
                              <?php echo $__env->make('pages.common.category-frontend-loop-home', $cat_sub, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </ul>

                      <?php if($i == 1): ?>
                      </li>
                      <?php $i = 0;?>
                      <?php endif; ?>

                      <?php if($j == 3 || $j == 4): ?>
                      <div class="clear-both"></div>
                      <?php $j = 0; ?>
                      <?php endif; ?>

                      <?php $i ++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </ul>
              </li>

              <?php if(Request::is('shop')): ?>
                <li><a href="<?php echo e(route('shop-page')); ?>" class="main selected menu-name"><?php echo trans('frontend.all_products_label'); ?></a></li>
              <?php else: ?>
                <li><a href="<?php echo e(route('shop-page')); ?>" class="main menu-name"><?php echo trans('frontend.all_products_label'); ?></a></li>
              <?php endif; ?>

              

              <?php if(Request::is('cart')): ?>
                <li><a href="<?php echo e(route('cart-page')); ?>" class="main selected menu-name"><?php echo trans('frontend.cart'); ?></a></li>
              <?php else: ?>
                <li><a href="<?php echo e(route('cart-page')); ?>" class="main menu-name"><?php echo trans('frontend.cart'); ?></a></li>
              <?php endif; ?>

             

              <?php if(count($pages_list) > 0): ?>
              <li>
                <div class="dropdown custom-page">
                  <a class="dropdown-toggle menu-name" href="#" data-hover="dropdown" data-toggle="dropdown"> <?php echo trans('frontend.pages_label'); ?> 
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <?php $__currentLoopData = $pages_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <a href="<?php echo e(route('custom-page-content', $pages['post_slug'])); ?>"><?php echo $pages['post_title']; ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </li>
              <?php endif; ?>

              
              
              
              <?php if(Request::is('stores')): ?>
                <li><a href="<?php echo e(route('store-list-page-content')); ?>" class="main selected menu-name"><?php echo trans('frontend.vendor_account_store_list_title_label'); ?></a></li>
              <?php else: ?>
                <li><a href="<?php echo e(route('store-list-page-content')); ?>" class="main menu-name"><?php echo trans('frontend.vendor_account_store_list_title_label'); ?></a></li>
              <?php endif; ?>
                
                <li class="users-vendors-login"><a href="#" class="dropdown-toggle menu-name" data-toggle="dropdown" data-hover="dropdown" style="margin-top: -7px;"><i class="fa fa-user" aria-hidden="true"></i> <span class="hidden-xs"><?php echo trans('frontend.menu_my_account'); ?></span><span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    
                    <?php if(is_frontend_user_logged_in()): ?>
                    <li><a href="<?php echo e(route('user-dashboard-page')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('frontend.dashboard')); ?></a></li>
                   
                    
                   
                      <li><a href="<?php echo e(route('my-address-page')); ?>"><i class="fa fa-map-marker"></i> <?php echo e(trans('frontend.my_address')); ?></a></li>
                    
                      <li><a href="<?php echo e(route('my-orders-page')); ?>"><i class="fa fa-file-text-o"></i> <?php echo e(trans('frontend.my_orders')); ?></a></li>
                    
                      <li><a href="<?php echo e(route('my-saved-items-page')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('frontend.my_saved_items')); ?></a></li>
                    
                    
                     <li><a href="<?php echo e(route('my-coupons-page')); ?>"><i class="fa fa-scissors"></i> <?php echo e(trans('frontend.my_coupons')); ?></a></li>
                    <li><a href="<?php echo e(route('download-page')); ?>"><i class="fa fa-download"></i> <?php echo e(trans('frontend.user_account_download_title')); ?></a></li>
                    <li><a href="<?php echo e(route('my-profile-page')); ?>"><i class="fa fa-user"></i> <?php echo e(trans('frontend.my_profile')); ?></a></li>
                   
                    <li>
                      <a href="<?php echo e(route('user-logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-circle-o-notch"></i> <?php echo trans('admin.sign_out'); ?>

                                        </a>
                    <form id="logout-form" method="post" action="<?php echo e(route('user-logout')); ?>" enctype="multipart/form-data" style="display: none;">
                      <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">   
                    </form>
                     </li>
                     <?php else: ?>
                      <li><a href="<?php echo e(route('user-login-page')); ?>"><?php echo trans('frontend.frontend_user_login'); ?></a></li>
                      <li><a target="_blank" href="<?php echo e(route('admin.login')); ?>"><?php echo trans('frontend.frontend_vendor_login'); ?></a></li>
                      <li><a href="<?php echo e(route('vendor-registration-page')); ?>"><?php echo trans('frontend.vendor_registration'); ?></a></li>
                    <?php endif; ?>

                    
                  </ul>
                </li>
            </ul>
          </div>
        </nav>
      </div>
    </div> 
  </div>    
</div>

<?php if($appearance_all_data['header_details']['slider_visibility'] == true && Request::is('/')): ?>
  <?php $count = count(get_appearance_header_settings_data());?>
  <?php if($count > 0): ?>
  <div class="header-with-slider">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php for($i = 0; $i < $count; $i++): ?>
          <?php if($i== 0): ?>
            <li data-target="#slider-carousel" data-slide-to="<?php echo e($i); ?>" class="active"></li>
          <?php else: ?>
            <li data-target="#slider-carousel" data-slide-to="<?php echo e($i); ?>"></li>
          <?php endif; ?>
        <?php endfor; ?>                           
      </ol>

      <?php $numb = 1; ?>
      <div class="carousel-inner" >

        <?php $__currentLoopData = get_appearance_header_settings_data(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($numb == 1): ?>
            <div class="item active" style="margin-top: 100px;">
              <?php if($img->img_url): ?>
                <img src="<?php echo e(get_image_url($img->img_url)); ?>" class="girl img-responsive" alt="" />
              <?php endif; ?>

              <?php if(isset($img->text)){?>
                <div class="dynamic-text-on-image-container"><?php echo $img->text; ?></div>
              <?php }?>
            </div>
          <?php else: ?>
            <div class="item" style="margin-top: 100px;">
              <?php if($img->img_url): ?>
              <!-- Joseph Start -->
              <div id="particles-js" data-src="<?php echo e(get_image_url($img->img_url)); ?>"></div>
                <!-- <img src="<?php echo e(get_image_url($img->img_url)); ?>" class="girl img-responsive" id="particles-js" alt="" /> -->
                <!-- Joseph End -->
              <?php endif; ?>

              <?php if(isset($img->text)){?>
                <div class="dynamic-text-on-image-container"><?php echo $img->text; ?></div>
              <?php }?>
            </div>
          <?php endif; ?>
          <?php $numb++ ; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="header-with-slider">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active" style="margin-top: 125px;">
          <img src="<?php echo e(asset('public/images/sunglass.jpg')); ?>" class="girl img-responsive" alt="" />
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>

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
              "src": "<?php echo e(asset('public/images/map-marker.png')); ?>",
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