<?php $__env->startSection('products-content'); ?>

<?php if($all_products_details['products']->count() > 0): ?>
  <?php if($all_products_details['selected_view'] == 'grid'): ?>
    <div class="product-content clearfix">
      <?php $__currentLoopData = $all_products_details['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($products->Pfb == '0'): ?>
        <?php 
        $reviews          = get_comments_rating_details($products->id, 'product');
        $reviews_settings = get_reviews_settings_data($products->id);
        ?>
        <div class="col-xs-12 col-sm-4 col-md-6 extra-padding grid-view">
          <div class="hover-product">
            <div class="hover">
              <?php if(!empty($products->image_url)): ?>
              <img class="img-responsive" src="<?php echo e(get_image_url( $products->image_url )); ?>" alt="<?php echo e(basename( get_image_url( $products->image_url ) )); ?>" />
              <?php else: ?>
              <img class="img-responsive" src="<?php echo e(default_placeholder_img_src()); ?>" alt="" />
              <?php endif; ?>

              <div class="overlay">
                <button class="info quick-view-popup" data-id="<?php echo e($products->id); ?>"><?php echo e(trans('frontend.quick_view_label')); ?></button>
                <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>
              </div>
            </div> 

            <div class="single-product-bottom-section">
            
            <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><h3><?php echo $products->title; ?></h3></a>

              <?php if( $products->type == 'simple_product' ): ?>
              <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo price_html( $products->price, get_frontend_selected_currency() ); ?></p></a>
              <?php elseif( $products->type == 'configurable_product' ): ?>
              <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id); ?></p></a>
              <?php elseif( $products->type == 'customizable_product' || $products->type == 'downloadable_product' ): ?>
                <?php if(count(get_product_variations($products->id))>0): ?>
                <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id); ?></p></a>
                <?php else: ?>
                <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo price_html( $products->price, get_frontend_selected_currency() ); ?></p></a>
                <?php endif; ?>
              <?php endif; ?>
              
              <?php if($reviews_settings['enable_reviews_add_link_to_product_page'] && $reviews_settings['enable_reviews_add_link_to_product_page'] == 'yes'): ?>
                <div class="text-center">
                  <div class="star-rating">
                    <span style="width:<?php echo e($reviews['percentage']); ?>%"></span>
                  </div>

                  <div class="comments-advices">
                    <ul>
                      <li class="read-review"><a href="<?php echo e(route('details-page', $products->slug)); ?>#product_description_bottom_tab" class="reviews selected"> <?php echo e(trans('frontend.single_product_read_review_label')); ?> (<span itemprop="reviewCount"><?php echo $reviews['total']; ?></span>) </a></li>
                      <li class="write-review"><a class="open-comment-form" href="<?php echo e(route('details-page', $products->slug)); ?>#new_comment_form">&nbsp;<span>|</span>&nbsp; <?php echo e(trans('frontend.single_product_write_review_label')); ?> </a></li>
                    </ul>
                  </div>
                </div>
              <?php endif; ?>
              
              
            </div>
          </div>
        </div>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  <?php endif; ?>
  
  <?php if($all_products_details['selected_view'] == 'list'): ?>
    <div class="row">
      <?php $__currentLoopData = $all_products_details['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($products->Pfb == '0'): ?>
        <?php 
        $reviews          = get_comments_rating_details($products->id, 'product');
        $reviews_settings = get_reviews_settings_data($products->id);      
        ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="box effect list-view-box">
            <div class="col-xs-5 col-sm-5 col-md-5">
              <div class="list-view-image-container">
                <?php if(!empty($products->image_url)): ?>
                <img class="img-responsive" src="<?php echo e(get_image_url( $products->image_url )); ?>" alt="<?php echo e(basename( get_image_url( $products->image_url ) )); ?>" />
                <?php else: ?>
                <img class="img-responsive" src="<?php echo e(default_placeholder_img_src()); ?>" alt="" />
                <?php endif; ?>
                <div class="overlay">
                  <button class="info quick-view-popup" data-id="<?php echo e($products->id); ?>"><?php echo e(trans('frontend.quick_view_label')); ?></button>
                  <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.product_details_label')); ?>"><i class="fa fa-eye"></i></a>
                </div>
              </div>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7">
              
              <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><h3><?php echo $products->title; ?></h3></a>
              <?php if( $products->type == 'simple_product' ): ?>
              <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo price_html( $products->price, get_frontend_selected_currency() ); ?></p></a>
              <?php elseif( $products->type == 'configurable_product' ): ?>
              <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id); ?></p></a>
              <?php elseif( $products->type == 'customizable_product' || $products->type == 'downloadable_product' ): ?>
                <?php if(count(get_product_variations($products->id))>0): ?>
                <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id); ?></p></a>
                <?php else: ?>
                <a href="<?php echo e(route('details-page', $products->slug)); ?>" class="product-box-details"><p><?php echo price_html( $products->price, get_frontend_selected_currency() ); ?></p></a>
                <?php endif; ?>
              <?php endif; ?>
              
               <?php if($reviews_settings['enable_reviews_add_link_to_product_page'] && $reviews_settings['enable_reviews_add_link_to_product_page'] == 'yes'): ?>
                <div class="list-view-reviews-main">
                  <div class="star-rating">
                    <span style="width:<?php echo e($reviews['percentage']); ?>%"></span>
                  </div>

                  <div class="comments-advices">
                    <ul>
                      <li class="read-review"><a href="<?php echo e(route('details-page', $products->slug)); ?>#product_description_bottom_tab" class="reviews selected"> <?php echo e(trans('frontend.single_product_read_review_label')); ?> (<span itemprop="reviewCount"><?php echo $reviews['total']; ?></span>) </a></li>
                      <li class="write-review"><a class="open-comment-form" href="<?php echo e(route('details-page', $products->slug)); ?>#new_comment_form">&nbsp;<span>|</span>&nbsp; <?php echo e(trans('frontend.single_product_write_review_label')); ?> </a></li>
                    </ul>
                  </div>
                </div>
              <?php endif; ?> 
              
              
            </div>
          </div>
        </div>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  <?php endif; ?>
  <div class="products-pagination"><?php echo $all_products_details['products']->appends(Request::capture()->except('page'))->render(); ?></div>
<?php else: ?>
<p class="not-available"><?php echo trans('frontend.product_not_available'); ?></p>
<?php endif; ?>
<?php $__env->stopSection(); ?>