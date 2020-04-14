@extends('layout/base11')

@section('title', 'Edit Event')

@section('container')

<div class="m-content">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                  </span>
                  <h3 class="m-portlet__head-text">
                    Form Edit Event
                  </h3>
                </div>
              </div>
            </div>

          <!--begin::Form-->
          <form class="m-form m-form--fit m-form--label-align-right" method="post" action="/categories/{{$category->id}}">
            @method('patch')
            @csrf
            <div class="m-portlet__body">
                <div class="form-group m-form__group">
                    <label for="eventitel">Event Title</label>
                    <input type="text" class="form-control m-input @error('category_name') is-invalid @enderror " name="category_name" id="category_name" placeholder="Category Name Input" value="{{ $category->category_name }}">
                    @error('category_name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
          </form>

          <!--end::Form-->
        </div>

        <!--end::Portlet-->
    </div>
  </div>
</div>
@endsection