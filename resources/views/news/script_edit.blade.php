<link rel="stylesheet" href="{{url('theme/app/vendor/plugins/summernote/summernote.css')}}">
<script src="{{url('theme/app/vendor/plugins/summernote/summernote.min.js')}}"></script>
    
<script type="text/javascript">
    $(document).ready(function(){
        $('#show_image').hide();

        $('#summernote').summernote({
            placeholder: 'Content ...*',
            tabsize: 2,
            height: 150,
            fontSizes: ['8', '9', '10', '11', '12', '13','14', '18', '24', '36', '48' , '64', '82', '150'],
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ['fontsize', ['fontsize']],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link", "hr", "video","picture"]],
                ["view", ["fullscreen", "codeview", "help"]]
            ]
        });

        var news = {!! json_encode($news->toArray()) !!};
            
        if(news['image'] == ''){
            $('#show_image').hide();
        }
        else{
            $('#show_image').show();
        }
    });

    function imageRemove()
    {
        // $('#image').attr("required", true);
        $('#old_image').val("");
        $('#show_image').hide();
        $('#label_image').text("Choose file");
        $('#image').val("");
    }

    function readURLImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#label_image').text(input.files[0].name);
                $('#show_image').show();
                $('#preview_image').attr('src', e.target.result);
                $('#old_image').val("");
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        if(this.files[0].size > 10485760){
           alert("File is too big!");
           this.value = "";
        }
        else{
            readURLImage(this);
        }
    });
</script>