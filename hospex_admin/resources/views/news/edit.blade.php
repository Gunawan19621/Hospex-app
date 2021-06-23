@extends('layout/base11')

@section('title', 'Edit News')

@section('container')

<div class="m-content">
  <div class="row">
      <div class="col-10">
        <div class="m-portlet m-portlet--tab">
          <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                      <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                      Form Edit News
                  </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
              </div>
          </div>
          <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data"  method="post" action="{{ url('news').'/'.$news->id }}">
          @method('patch')
          @csrf
              <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" id="title" autocomplete="off" placeholder="Title Input" value="{{ $news->title }}" required>
                    @error('title') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>
                  <div class="form-group m-form__group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror " name="content" id="summernote" autocomplete="off" placeholder="Content Input" required>{!! $news->content !!}</textarea>
                    @error('content') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                  </div>

                  <div class="form-group m-form__group">
                      <div>
                          <label for="image" class="control-label">Image (Max 10MB)</label>
                          <div class="custom-file form-control @error('content') is-invalid @enderror ">
                              <input type="file" class="custom-file-input" accept="image/*" name="image" id="image"/>
                              <label class="custom-file-label" for="image" id="label_image">Choose file</label>
                          </div>
                          @error('content') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                      </div>

                      <input type="hidden" id="old_image" name="old_image" value="{{$news->image}}" />
                      <div class="row" id="show_image">
                          <div class="col-lg-3">
                              <div class="card card-custom gutter-b">
                                  <div class="card-body">
                                      <div class="d-flex">
                                          <div class="flex-shrink-0 mr-7">
                                              <div class="symbol symbol-50 symbol-lg-120">
                                                  <img id="preview_image" style="max-width:75px;" src="{{config('url.url_media').$news->image}}"/>
                                              </div>
                                          </div>
                                      </div>
                                      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="imageRemove()">Remove</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
              </div>
            </form>
        </div>   
    </div>
  </div>
</div>
@endsection

@section('require')
@include('news/script_edit')
@endsection