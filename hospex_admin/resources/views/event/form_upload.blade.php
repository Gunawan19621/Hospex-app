@extends('layout.base11')
@section('title', $title)
@section('container')
<div class="flash" data-flash="{{ session('status') }}"></div>
    <!--begin::Portlet-->
    <div class="m-portlet">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Upload File Site Plan
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <a href="{{ \URL::previous() }}" class="btn btn-primary my-3">Back</a>
            </div>
        </div>

        <!--begin::Form-->
        <div class="m-portlet__body">
            <div class="row">
                <div class="offset-lg-4 col-lg-4 col-md-9 col-sm-12">
                    <form class="m-dropzone dropzone" id="my-dropzone" method="POST" action="/events/{{ $event->id }}/site-plan">
                        @method('patch')
                        @csrf
                    </form>
                </div>
                <div class="offset-lg-4 col-lg-4 col-md-9 col-sm-12">
                    <br>
                        <br>
                        <button type="button" class="btn btn-brand" id="submit">Upload</button>
                        <button type="reset" class="btn btn-warning" >reset</button>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                    <div class="col-md-10" style="margin-bottom:0px;" align="center" id="preview">
                        
                    </div>
            </div>
        </div>
       

        <!--end::Form-->
    </div>
    {{-- <div class="m-portlet__body" id="preview1" >
        <div class="col-md-10"
        style="margin-bottom:0px;" align="center">
        <embed src="{{ route('dropzone.fetch') ?: '' }}" 
         style="width:1380px; height:800px;" frameborder="0" />
        </div>
    </div> --}}

    <!--end::Portlet-->
@endsection
@section('require')
<script>
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    // Dropzone.autoDiscover = false;
    // var myDropzone = new Dropzone(".dropzone",{ 
    //     maxFilesize: 3,  // 3 mb
    //     maxFile: 1,  // 1 file
    //     acceptedFiles: ".jpeg,.jpg,.png,.pdf",
    //     renameFile: function(file) {
    //             var dt = new Date();
    //             var time = dt.getTime();
    //            return time+file.name;
    //         },
    //     addRemoveLinks: true,
    //     timeout: 5000,
    // });
    // $('.submit').on('click',function(){
    //     myDropzone.on("sending", function(file, xhr, formData) {
    //        formData.append("_token", CSRF_TOKEN);
    //     }); 
    // })
    Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop File here to Upload! max 3MB (Pdf only)";
    Dropzone.options.myDropzone = {
        autoProcessQueue: false,
        maxFilesize: 3,  // 3 mb
        maxFiles: 1,  // 1 file
        uploadMultiple:false,
        addRemoveLinks: true,
        acceptedFiles: ".jpeg,.jpg,.png,.pdf",
        init: function(){
            // this.hiddenFileInput.removeAttribute('multiple');
            var submitButton = document.querySelector('#submit');
            drop = this;
            submitButton.addEventListener("click",function(){
                drop.processQueue();
            });
            this.on("complete",function(resp){
                if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0 )
                {
                    var _this = this;
                    _this.removeAllFiles();
                }
                if (resp.status == 'success') {
                    alertMessage('1-Siteplan Successfull Saved')
                } else {
                    alertMessage('1-Siteplan Failed to Save')
                }
                // list_image();
            })
        }
    };
    // list_image();
    // function list_image(){
    //     var eventId = {!! $event->id !!};
    //     var pdf_url = ` {{ url('dropzone/${eventId}/fetch') }} `;
    //     // $.ajax({
    //     //     url : "{{ url('dropzone.fetch') }}",
    //     //     // cache: false,
    //     //     contentType: 'application/json',
    //     //     // processData: false,
    //     //     success: function(response){
    //     //         // alert('ok')
    //     //         // var file = fileName;
    //     //         $('#preview').html(file_gets_contents(response));
    //     // // window.location = "someFilePath?file=" + file;
    //     //         // console.log(file_gets_contents(data))

    //     //     }
    //     // })
    //     $.ajax({
    //         url: '',
    //         type: 'GET',
    //         processData: false,
    //         contentType: "application/json; charset=utf-8",
    //         xhrFields: { withCredentials: true },
    //         cache: false,
    //         success: function () {
    //             var iframe = $('<embed id="iframe-pdf" class="iframe-pdf"  style="width:1380px; height:800px;" frameborder="0" ></embed>');

    //             iframe.attr('src', pdf_url);
    //             // iframe.load(function () {
    //             //     btn_generate_pdf.text(old_text).removeClass('disabled').css('pointer-events', '');
    //             //     div_iframe.show();
    //             // });
    //             $('#preview').html(iframe);
    //         }
    //     });
    //     // PDFObject.embed("{{ url('dropzone.fetch') }}", "#preview");
    // }
    $(document).on('click', '.remove_image', function deleteImage(){
        var name = $(this).attr('id');
        $.ajax({
            url : "{{ route('dropzone.delete') }}",
            data: {name:name},
            success:function(data){
                // list_image();
            }
        })
    })
</script>
    
@endsection