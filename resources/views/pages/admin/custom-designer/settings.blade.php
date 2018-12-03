@extends('layouts.admin.master')
@section('title', trans('admin.designer_settings') .' < '. get_site_title())

@section('content')
@if(count($custom_designer_settings_data) > 0)

@include('pages-message.notify-msg-success')

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">{{ trans('admin.custom_designer_settings') }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right" type="submit">Update</button>
      </div>
    </div>
  </div>
  
<div class="box box-solid">
  <div class="row">
    <div class="col-md-12">
      <div class="box-body">
<!--        <h4><b><i>{{ trans('admin.general_settings') }}</i></b></h4><hr>
        <div class="form-group">
          <label class="col-sm-4 control-label" style="text-align:left;" for="inputDesignPanelDimension">{{ trans('admin.canvas_size') }}</label>
          <div class="col-sm-8">
            <div class="form-group">
                <br><p><b><i>{{ trans('admin.small_devices_dimension') }}</i></b></p>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="global_canvas_small_devices_width" id="global_canvas_small_devices_width" placeholder="{{ trans('admin.width') }}" value="{{ $custom_designer_settings_data['general_settings']['canvas_dimension']['small_devices']['width'] }}">
                </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="global_canvas_small_devices_height" id="global_canvas_small_devices_height" placeholder="{{ trans('admin.height') }}" value="{{ $custom_designer_settings_data['general_settings']['canvas_dimension']['small_devices']['height']}}">
                </div>
            </div><hr> 
              
            <div class="form-group">
                <br><p><b><i>{{ trans('admin.medium_devices_dimension') }}</i></b></p> 
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="global_canvas_medium_devices_width" id="global_canvas_medium_devices_width" placeholder="{{ trans('admin.width') }}" value="{{ $custom_designer_settings_data['general_settings']['canvas_dimension']['medium_devices']['width'] }}">
                </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="global_canvas_medium_devices_height" id="global_canvas_medium_devices_height" placeholder="{{ trans('admin.height') }}" value="{{ $custom_designer_settings_data['general_settings']['canvas_dimension']['medium_devices']['height']}}">
                </div>
            </div><hr>   
            
            <div class="form-group">
              <br><p><b><i>{{ trans('admin.large_devices_dimension') }}</i></b></p>
              <div class="col-sm-6">
                <input type="number" class="form-control" name="global_canvas_large_devices_width" id="global_canvas_large_devices_width" placeholder="{{ trans('admin.width') }}" value="{{ $custom_designer_settings_data['general_settings']['canvas_dimension']['large_devices']['width'] }}">
              </div>
              <div class="col-sm-6">
                <input type="number" class="form-control" name="global_canvas_large_devices_height" id="global_canvas_large_devices_height" placeholder="{{ trans('admin.height') }}" value="{{ $custom_designer_settings_data['general_settings']['canvas_dimension']['large_devices']['height']}}">
              </div>
            </div>
          </div>
        </div>-->
        <?php if(isset($custom_designer_settings_data['watermark_img_url']) && !empty($custom_designer_settings_data['watermark_img_url'])) { $img_url = $custom_designer_settings_data['watermark_img_url'];} else { $img_url = '';}?>  
        <div class="form-group">
          <label class="col-sm-4 control-label" style="text-align:left;">Add Watermark image</label> 
          <div class="col-sm-6">
              <input type="text" class="form-control" name="water_mark_image_url" id="water_mark_image_url" readonly="true" placeholder="water mark image url" value="{{ $img_url }}">
          </div>
          <div class="col-sm-2">
            <button data-toggle="modal" data-target="#watermarkImageUpload" type="button" class="btn btn-default btn-sm watermark-image-uploader">Upload</button>
          </div>
        </div>    
      </div>
    </div>
  </div>
</div>
  
<div class="modal fade" id="watermarkImageUpload" tabindex="-1" role="dialog" aria-labelledby="watermarkimageupload" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="no-margin">{{ trans('admin.you_can_upload_1_image') }}</p>
      </div>  
      <div class="modal-body">             
        <div class="uploadform dropzone no-margin dz-clickable" id="water_mark_image_uploader" name="water_mark_image_uploader">
          <div class="dz-default dz-message">
            <span>{{ trans('admin.drop_your_cover_picture_here') }}</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{{ trans('admin.close') }}</button>
      </div>
    </div>
  </div>
</div>   
</form>

@endif
@endsection