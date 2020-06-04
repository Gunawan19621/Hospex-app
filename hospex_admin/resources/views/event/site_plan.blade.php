@extends('layout.base11')
@section('title', 'Site Plan')
@section('container')
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Site Plan
                    </h3>
                </div>
            </div>
        </div>

        <div class="m-portlet__body" >
            <div class="col-md-10"
            style="margin-bottom:0px;" align="center">
            <embed id="preview" src="{{ $content }}"
             style="width:1380px; height:800px;" frameborder="0" />
            </div>
        </div>
       
    </div>

    <!--end::Portlet-->
@endsection
@section('require')
<script>
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    // load_image();

    function load_image(){
        
        $.ajax({
            url : "{{ route('dropzone.fetch') }}",
            success: function(data){
                $('#preview').attr('src',data);
            }
        })
    }
    $(document).on('click', '.remove_image', function deleteImage(){
        var name = $(this).attr('id');
        $.ajax({
            url : "{{ route('dropzone.delete') }}",
            data: {name:name},
            success:function(data){
                list_image();
            }
        })
    })
</script>
    
@endsection