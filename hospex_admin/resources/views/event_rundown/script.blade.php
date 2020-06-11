<script>

// $(".btn-submit").click(function(e){

//     e.preventDefault();

//     var data = new FormData($('#form1')[0]);
//     $.ajax({

//         url: "{{ url('/eventrundown') }}",

//         type:'ajax',
//         method:'POST',
//         dataType:'json',
//         processData: false,
//         contentType: false,
//         data: data,

//         success: function(data) {
//             console.log(data)
//             alertMessage(data.status)
//             if(!jQuery.isEmptyObject(data.message)){
//                 $('.feedback-task').html(data.message.task[0])
//                 $('input[name=task]').addClass('is-invalid')
//                 data.message.name.forEach(element => {
                    
//                 });
//                 $('.feedback-name :eq(${data.message.task[0]})')
//             }

//         },
//         error:function(){
//             alert('gagal')
//         }

//     });

// }); 




function dynamicRow(anchor,type){
    var outerHTML_text = $(anchor).closest('.dynamic-row').prop('outerHTML');
    if (type=='tambah') {
            var cek='';
            $(anchor).closest('.dynamic-row').find('input').map(function() {
                 cek = $(this).val() == '' ? '': 'ada';
            }).get();
			// if ( cek == '') {
            //     alert('Form');
			// } else if(cek == 'ada'){
			// }
				$('.body-dynamic').append(outerHTML_text)
    } else {
        $(anchor).closest('.dynamic-row').remove();
    }
    cek1()    
}
function cek1(){
    var dynamic	= document.getElementsByClassName("tombol");
    var remove	= document.getElementsByClassName("remove-field");
	var create	= document.getElementsByClassName("create-field");
	var last_dynamic	= dynamic.length-1;
	if(dynamic.length > 1){
		for (let i = 0; i < dynamic.length; i++) {
			if (i == last_dynamic ) {
				dynamic[i].innerHTML='<a href="javascript:void(0);" onclick="dynamicRow(this,`tambah`)" class="btn-sm btn btn-primary m-btn m-btn--icon create-field"><span><i class="la la-plus"></i></span></a>';
			} else  {
				dynamic[i].innerHTML='<a href="javascript:void(0);"  onclick="dynamicRow(this,`kurang`)" class="btn-sm btn btn-danger m-btn m-btn--icon remove-field"><span class="hidden-xs"> <i class="la la-trash-o"></i> </span></a>';
				
			}
		}
	}
	
}   
</script>