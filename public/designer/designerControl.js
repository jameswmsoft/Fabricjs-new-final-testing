var designerControl = designerControl || {};
var localizationString;
var ss=0;
designerControl.onPageLoad =
{
  _init:function()
  {
    designerControl.event._dynamic_tab_event();
    designer.event._chnage_dynamic_text();
    designer.event._chnage_dynamic_text_fonts();
    designer.event._chnage_dynamic_color();
    designer.event._chnage_dynamic_text_align();
    designer.event._chnage_dynamic_text_fontWeight();
    designer.event._chnage_dynamic_text_decoration();
    designer.event._chnage_dynamic_text_shadow();
    designer.event._chnage_dynamic_more_options();
    designer.event._enable_curved_text();
    designer.event._remove_selected_object();
    designer.event._curved_text_reverse_change();
    designer.event._remove_design_modal();
    designerControl.event._gallery_img_show();
    designerControl.event._swap_panel();
    designerControl.event._design_images_switching();
    designer.event._save_custom_design();
    designer.event._add_restricted_area();
    designer.event._remove_custom_design();
    designerControl.event._gallery_img_add_at_canvas();
    designerControl.event._shape_add_at_canvas();
    designer.event._add_to_cart_process();

    if($('#admin_all_msg_with_localization').length>0)
    {
      localizationString = JSON.parse( $('#admin_all_msg_with_localization').val() );
    }
    else if($('#frontend_all_msg_with_localization').length>0)
    {
      localizationString = JSON.parse( $('#frontend_all_msg_with_localization').val() );
    }


    $('[data-toggle="tooltip"]').tooltip();

    //upload image
    if($('#file_upload_for_designer').length>0)
    {
      //Start Joseph
      var isFrontend = window.location.href.indexOf('product/customize') !== -1;
      //End Joseph

      Dropzone.autoDiscover = false;
      var myDropzone  = $("#file_upload_for_designer").dropzone({
        url: $('#hf_base_url').val() + "/upload/designer-images",
        paramName: "designer_upload_images",
        acceptedFiles:  "image/*",
        uploadMultiple:false,
        maxFiles:1,
        autoProcessQueue: ! isFrontend,
        parallelUploads: 100,
        addRemoveLinks: true,
        maxFilesize: 1,
        createImageThumbnails: true,
        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
        init: function()
        {
          this.on("maxfilesexceeded", function(file){
              swal("" , localizationString.maxfilesexceeded_msg);
          });
          this.on("error", function(file, message){
            if (file.size > 1*1024*1024)
            {
              swal("" , localizationString.file_larger);
              this.removeFile(file)
               return false;
            }
            if(!file.type.match('image.*')) {
              swal("" , localizationString.image_file_validation);
              this.removeFile(file)
              return false;
            }
          });
          //this.on("addedfile", function(file) { swal("Good job!", "Successfully uploaded your image!", "success") });
          this.on("success", function(file, responseText)
          {var $button = $('<a href="#" class="js-open-cropper-modal" data-file-name="' + file.name + '">Crop & Upload</a>');
            $(file.previewElement).append($button);
            if(responseText.status === 'success')
            {
              swal(localizationString.good_job, localizationString.image_upload_success, "success");

              if($('.recently-uploaded-images').find('.recent-images-items').length>0){
                $('.recently-uploaded-images').find('.recent-images-items:last').after('<div class="recent-images-items"><img src="'+ $('#hf_base_url').val() +'/public/uploads/'+ responseText.img_name +'"></div>');
              }
              else{
                if($('.no-available-msg').length>0){
                  $('.no-available-msg').remove();
                }

                $('.recently-uploaded-images').append('<div class="recent-images-items"><img src="'+ $('#hf_base_url').val() +'/public/uploads/'+ responseText.img_name +'"></div><div class="clear_both"></div>');
              }

              designerControl.event._gallery_img_add_at_canvas();

              this.removeAllFiles();
            }
          });

          //Start - Joseph
          if(isFrontend) {
            this.on("addedfile", function(file) {

            // transform cropper dataURI output to a Blob which Dropzone accepts
              function dataURItoBlob(dataURI) {
                  var byteString = atob(dataURI.split(',')[1]);
                  var ab = new ArrayBuffer(byteString.length);
                  var ia = new Uint8Array(ab);
                  for (var i = 0; i < byteString.length; i++) {
                      ia[i] = byteString.charCodeAt(i);
                  }
                  return new Blob([ab], { type: 'image/jpeg' });
              }

              // modal window template
              if (file.cropped) {
                return;
              }

              var cachedFilename = file.name;
              this.removeFile(file);

              var myDropzone = this;

              var modalTemplate =
              '<div class="modal fade" tabindex="-1" role="dialog">' +
              '<div class="modal-dialog modal-lg" role="document">' +
              '<div class="modal-content">' +
              '<div class="modal-header">' +
              '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
              '<h4 class="modal-title">Crop</h4>' +
              '</div>' +
              '<div class="modal-body">' +
              '<div class="image-container">' +
              '<img id="img-" src="uploads/' + cachedFilename + '">' +
              '</div>' +
              '</div>' +
              '<div class="modal-footer">' +
              '<button type="button" class="btn btn-warning rotate-left"><span class="fa fa-rotate-left"></span></button>' +
              '<button type="button" class="btn btn-warning rotate-right"><span class="fa fa-rotate-right"></span></button>' +
              '<button type="button" class="btn btn-warning scale-x" data-value="-1"><span class="fa fa-arrows-h"></span></button>' +
              '<button type="button" class="btn btn-warning scale-y" data-value="-1"><span class="fa fa-arrows-v"></span></button>' +
              '<button type="button" class="btn btn-warning reset"><span class="fa fa-refresh"></span></button>' +
              '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
              '<button type="button" class="btn btn-primary crop-upload">Crop & upload</button>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>';

              var $cropperModal = $(modalTemplate);
              var $uploadCrop = $cropperModal.find('.crop-upload');
              var $img = $('<img />');
              var reader = new FileReader();
              reader.onloadend = function () {
                $cropperModal.find('.image-container').html($img);
                $img.attr('src', reader.result);
                $img.cropper({
                  preview: '.image-preview',
                  // aspectRatio: 1 / 1,
                  autoCropArea: 1,
                  movable: false,
                  dragMode: 'none',
                  cropBoxMovable: true,
                  cropBoxResizable: true,
                  minContainerHeight : 320,
                  minContainerWidth : 568,
                });
              };

              reader.readAsDataURL(file);
              $cropperModal.modal('show');
              $uploadCrop.on('click', function() {
                var blob = $img.cropper('getCroppedCanvas').toDataURL();
                var newFile = dataURItoBlob(blob);
                newFile.cropped = true;
                newFile.name = cachedFilename;
                myDropzone.addFile(newFile);
                myDropzone.processQueue();
                $cropperModal.modal('hide');
              });
            });
          }
          //End - Joseph
        }
      });
    }

      //////////////////// alex start //////////////////////
      if($('#file_upload_zone_for_designer').length>0)
      {

          //Start Joseph
          var isFrontend = window.location.href.indexOf('product/customize') !== -1;
          //End Joseph

          Dropzone.autoDiscover = false;
          var myDropzone  = $("#file_upload_zone_for_designer").dropzone({
              url: $('#hf_base_url').val() + "/upload/designer-images",
              paramName: "designer_upload_images",
              acceptedFiles:  "image/*",
              uploadMultiple:false,
              maxFiles:1,
              autoProcessQueue: ! isFrontend,
              parallelUploads: 100,
              addRemoveLinks: true,
              maxFilesize: 1,
              createImageThumbnails: true,
              headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
              init: function()
              {
                  this.on("maxfilesexceeded", function(file){
                      swal("" , localizationString.maxfilesexceeded_msg);
                  });
                  this.on("error", function(file, message){
                      if (file.size > 1*1024*1024)
                      {
                          swal("" , localizationString.file_larger);
                          this.removeFile(file)
                          return false;
                      }
                      if(!file.type.match('image.*')) {
                          swal("" , localizationString.image_file_validation);
                          this.removeFile(file)
                          return false;
                      }
                  });
                  //this.on("addedfile", function(file) { swal("Good job!", "Successfully uploaded your image!", "success") });
                  this.on("success", function(file, responseText)
                  {var $button = $('<a href="#" class="js-open-cropper-modal" data-file-name="' + file.name + '">Crop & Upload</a>');
                      $(file.previewElement).append($button);
                      if(responseText.status === 'success')
                      {
                          swal(localizationString.good_job, localizationString.image_upload_success, "success");

                          if($('.recently-uploaded-zone-images').find('.recent-images-zone-items').length>0){
                              $('.recently-uploaded-zone-images').find('.recent-images-zone-items:last').after('<div class="recent-images-zone-items"><img src="'+ $('#hf_base_url').val() +'/public/uploads/'+ responseText.img_name +'"></div>');
                          }
                          else{
                              if($('.no-available-msg').length>0){
                                  $('.no-available-msg').remove();
                              }

                              $('.recently-uploaded-zone-images').append('<div class="recent-images-zone-items"><img src="'+ $('#hf_base_url').val() +'/public/uploads/'+ responseText.img_name +'"></div><div class="clear_both"></div>');
                          }
                          designerControl.event._gallery_img_add_at_canvas();
                          this.removeAllFiles();
                      }
                  });
              }
          });
      }

      if($('#file_upload_back_for_designer').length>0)
      {
          //Start Joseph
          var isFrontend = window.location.href.indexOf('product/customize') !== -1;
          //End Joseph

          Dropzone.autoDiscover = false;
          var myDropzone  = $("#file_upload_back_for_designer").dropzone({
              url: $('#hf_base_url').val() + "/upload/designer-images",
              paramName: "designer_upload_images",
              acceptedFiles:  "image/*",
              uploadMultiple:false,
              maxFiles:1,
              autoProcessQueue: ! isFrontend,
              parallelUploads: 100,
              addRemoveLinks: true,
              maxFilesize: 1,
              createImageThumbnails: true,
              headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
              init: function()
              {
                  this.on("maxfilesexceeded", function(file){
                      swal("" , localizationString.maxfilesexceeded_msg);
                  });
                  this.on("error", function(file, message){
                      if (file.size > 1*1024*1024)
                      {
                          swal("" , localizationString.file_larger);
                          this.removeFile(file)
                          return false;
                      }
                      if(!file.type.match('image.*')) {
                          swal("" , localizationString.image_file_validation);
                          this.removeFile(file)
                          return false;
                      }
                  });
                  //this.on("addedfile", function(file) { swal("Good job!", "Successfully uploaded your image!", "success") });
                  this.on("success", function(file, responseText)
                  {var $button = $('<a href="#" class="js-open-cropper-modal" data-file-name="' + file.name + '">Crop & Upload</a>');
                      $(file.previewElement).append($button);
                      if(responseText.status === 'success')
                      {
                          swal(localizationString.good_job, localizationString.image_upload_success, "success");

                          if($('.recently-uploaded-back-images').find('.recent-images-back-items').length>0){
                              $('.recently-uploaded-back-images').find('.recent-images-back-items:last').after('<div class="recent-images-back-items"><img src="'+ $('#hf_base_url').val() +'/public/uploads/'+ responseText.img_name +'"></div>');
                          }
                          else{
                              if($('.no-available-msg').length>0){
                                  $('.no-available-msg').remove();
                              }

                              $('.recently-uploaded-back-images').append('<div class="recent-images-back-items"><img src="'+ $('#hf_base_url').val() +'/public/uploads/'+ responseText.img_name +'"></div><div class="clear_both"></div>');
                          }

                          designerControl.event._gallery_img_add_at_canvas();
                          this.removeAllFiles();
                      }
                  });
              }
          });
      }

      $('.upload-zone-images').on('click',function () {

          if ($('.upload-zone-images').hasClass('image-select')) {
              $("#fileLoader").click();
          }

      });

      $('.product-designer-canvas-content-main .product-designer-left-menu ul li').on('click',function () {
          if (!$('.upload-zone-images').hasClass('image-select')) {
              $('.upload-zone-images').css({'background': 'white', 'color': 'black'});
          }
      });

      /////////////////////////////// alex end //////////////////////
    if($('#designPreview').length>0){
      $('#designPreview').on('hidden.bs.modal', function () {
        $('#designPreview .modal-body img').attr('src', '');
      });
    }
  }
};

designerControl.event =
{
  _dynamic_tab_event:function(){
    if($('.nav-design-element').length>0 || $('.product-designer-left-menu').length>0){
      $('.nav-design-element li, .product-designer-left-menu ul li').click(function(){
        allPanelHide();

        if($('.product-designer-left-menu').length>0){
          $(this).parents('.product-designer-left-menu').find('.selected-left-menu').removeClass('selected-left-menu');
          $(this).addClass('selected-left-menu');
        }

        if($(this).data('tab_name') === 'text'){
          designer.function._add_dynamic_text_to_design();
        }
        ///////////////// alex start /////////////////
          if($(this).data('tab_name') === 'text_zone'){
              designer.function._add_dynamic_text_zone_to_design();
          }
        else if($(this).data('tab_name') === 'clipart'){
          designer.function._image_gallery();
        }
        else if($(this).data('tab_name') === 'image_upload'){
          designer.function._image_upload_option();
        }
        else if($(this).data('tab_name') === 'image_zone_upload'){
          designer.function._image_upload_zone_option();
        }
          else if($(this).data('tab_name') === 'image_upload_back'){
              designer.function._image_upload_back_option();
          }
          /////////////////////// alex end /////////////////////
        else if($(this).data('tab_name') === 'shape_add'){
          designer.function._shape_object();
        }
        else if($(this).data('tab_name') === 'manage_layer'){
          designer.function._manage_layer();
        }
        else if($(this).data('tab_name') === 'preview'){
          designer.function._img_preview();
        }
      });
    }
  },

  _gallery_img_show:function()
  {
    if($( '.designer-image-gallery .gallery-items' ).length>0){
      $( '.designer-image-gallery .gallery-items' ).on('click', function(){
        var obj = $(this);
        obj.append('<div class="art-cat-img-loader"></div>');

        $.ajax({
            url: $('#hf_base_url').val() + '/ajax/get-clipart-categories-images-with-html',
            type: 'POST',
            cache: false,
            headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
            data: {id:$(this).data('cat_id')},

            success: function(data){
              if(data && data != ''){
                obj.parents('.designer-image-gallery').find('.art-cat-img-loader').remove();
                $('.designer-image-gallery .panel-body .gallery-image-categories-list').after( data );
                $('.designer-image-gallery .panel-body .gallery-image-categories-list').hide();
                show_gallery_image_cat_list_event();
                designerControl.event._gallery_img_add_at_canvas();
              }
            },

            error:function(){}
        });
      });
    }
  },

  _gallery_img_add_at_canvas:function()
  {

      if ($('.categories-images-items').length > 0 || $('.recent-images-items').length > 0 || $('.recent-images-zone-items').length > 0) {
          $('.categories-images-items, .recent-images-items, .recent-images-back-items, .recent-images-zone-items').on('click', function () {
              if ($(this).hasClass('categories-images-items')) {
                  designer.function._dynamic_image_add_at_design('gallery_img', $(this).find('img').attr('src'));
              }
              else if ($(this).hasClass('recent-images-items')) {
                  designer.function._dynamic_image_add_at_design('upload_image', $(this).find('img').attr('src'));
              }
              /////////////// alex start /////////////////
              else if ($(this).hasClass('recent-images-back-items')) {
                  designer.function._dynamic_image_add_at_design('upload_back_image', $(this).find('img').attr('src'));
              }
              else if ($(this).hasClass('recent-images-zone-items')) {
                  designer.function._dynamic_image_add_at_design('upload_zone_image', $(this).find('img').attr('src'));
              }
              ////////////// alex end /////////////////////
          });
      }
  },


  _shape_add_at_canvas:function(){
    if($('.designer-shape-gallery ul li').length>0){
      $('.designer-shape-gallery ul li').on('click', function(){
        var shape = Base64.decode($(this).data('shape'));
        designer.function._add_shape_to_canvas( shape );
      });
    }
  },

  _swap_panel:function(){
    if($('.icon-img-swap').length>0 && $('#swap-popover-content')){
      var placement = 'bottom';

      if($('#is_product_save').length>0){
        placement = 'bottom';
      }

      $(".icon-img-swap").popover({
      placement : placement,
      html: true,
          content: function() {
            return $('#swap-popover-content').html();
          }
      }).parent().on('click', '.design-title-items', function(){
        designer.function._manage_swap_content($(this));
      })
    }
  },

  _design_images_switching:function(){
    if($('.product-designer-swap-content').length>0){
      $('.product-designer-swap-content ul li').on('click', function(){
        $(this).parents('.product-designer-swap-content').find('.selected-swap').removeClass('selected-swap');
        $(this).addClass('selected-swap');
        designer.function._manage_swap_content($(this));
      })
    }
  }
};

var show_gallery_image_cat_list_event = function()
{
  if($('.categories-images-list .show-categories-list').length>0)
  {
    $('.categories-images-list .show-categories-list').on('click', function(e)
    {
      e.preventDefault();
      show_gallery_image_cat_list();
    });
  }
}

var show_gallery_image_cat_list = function()
{
  if($('.gallery-image-categories-list').length>0)
  {
    $('.gallery-image-categories-list').show();
  }
  if($('.categories-images-list').length>0)
  {
    $('.categories-images-list').remove();
  }
}

var _makeid = function()
{
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for( var i=0; i < 5; i++ )
      text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

var _scaleImageSize = function(maxW, maxH, currW, currH)
{
  var ratio = currH / currW;
  if(currW >= maxW && ratio <= 1)
  {
    currW = maxW;
    currH = currW * ratio;
  }
  else if(currH >= maxH)
  {
    currH = maxH;
    currW = currH / ratio;
  }
  return [currW, currH];
}

var allPanelHide = function(){
  canvasDeactivateAll();
  if($('.designer-text-control').css('display') === 'block'){
    $('.designer-text-control').hide();
  }

  if($('.designer-image-gallery').css('display') === 'block'){
    $('.designer-image-gallery').hide();
  }

  if($('.designer-image-edit-panel').css('display') === 'block'){
    $('.designer-image-edit-panel').hide();
  }

  if($('.designer-upload-image').css('display') === 'block'){
    $('.designer-upload-image').hide();
  }
//////////////// alex start ///////////////////
    if($('.designer-upload-zone-image').css('display') === 'block'){
        $('.designer-upload-zone-image').hide();
    }

    if($('.designer-upload-back-image').css('display') === 'block'){
        $('.designer-upload-back-image').hide();
    }
//////////////// alex end ///////////////////////////
  if($('.designer-shape-gallery').css('display') === 'block'){
    $('.designer-shape-gallery').hide();
  }

  if($('.designer-layer-content').css('display') === 'block'){
    $('.designer-layer-content').hide();
  }

  if($('.icon-img-swap').hasClass('in')){
    $('.icon-img-swap').popover('hide');
  }

}

var createBlob = function( canvastoDataURL )
{
  var blobBin = atob(canvastoDataURL.split(',')[1]);
  var array = [];
  for(var i = 0; i < blobBin.length; i++) {
      array.push(blobBin.charCodeAt(i));
  }
  var file = new Blob([new Uint8Array(array)], {type: 'image/png'});

  return file;
}

$(document).ready(function(){
  designerControl.onPageLoad._init();
});
