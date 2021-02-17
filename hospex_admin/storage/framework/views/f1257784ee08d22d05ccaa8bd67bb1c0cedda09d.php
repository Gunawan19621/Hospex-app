<script>
let flash = $('.flash').data('flash'),
    code  = {
        // basic
        200     : {'message': 'Data Found', 'type' : 'success' },
        201     : {'message': 'Data Successfull Saved', 'type' : 'success' },
        202     : {'message': 'Data Successfull Updated', 'type' : 'success' },
        204     : {'message': 'Data Successfull Deleted', 'type' : 'success' },
        // custom(lulu)
        001     : {'message': 'Data Failed to Save', 'type' : 'error' },
        002     : {'message': 'Data Failed to Update', 'type' : 'error' },
        004     : {'message': 'Data Failed to Deleted', 'type' : 'error' },
        // advance
        304     : {'message': 'Data Failed to Update', 'type' : 'error' },
        400     : {'message': 'Bad Request', 'type' : 'error' },
        401     : {'message': 'Not authorized', 'type' : 'error' },
        403     : {'message': 'Forbiden', 'type' : 'error' },
        404     : {'message': 'Not Found', 'type' : 'error' },
        415     : {'message': 'Unsupported media type', 'type' : 'error' },
        500     : {'message': 'Internal server error', 'type' : 'error' },
        502     : {'message': 'Bad gateway', 'type' : 'error' },
        503     : {'message': 'Service unavailable', 'type' : 'error' },
        504     : {'message': 'Gateway timeout', 'type' : 'error' },
    }

    $(document).ready(function(){
        alertMessage(flash)
        $(".year").datepicker( {
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            startDate: 'today' 
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });
        $('.inpuat-time').timepicker({
            timeFormat: 'HH:ii',
                interval: 60,
                defaultTime: '10',

        });
        $('.inpuat-date').datepicker({
            startDate: 'today',
        });
    })
    function alertMessage(flash){
        if (!jQuery.isEmptyObject(flash)) {
            flash = flash.split('-');
            if (flash[0] == '1') {
                Swal.fire({
                        'type'  : 'success',
                        'title' : 'Success',
                        'text'  : `${flash[1]}`
                    })
            }else{
                Swal.fire({
                        'type'  : 'error',
                        'title' : 'Failed',
                        'text'  : `${flash[1]}`
                    })
            }
            
        }

    }
    function confirmDelete(link, id){
        Swal.fire({
        title: 'Warning!',
        text: "Are you sure want to Delete?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    dataType:'json',
                    type: "DELETE",
                    url: `<?php echo e(url('${link}')); ?>/${id}`,
                    success: function (data) { 
                        $('#m_table_1').DataTable().ajax.reload();
                        alertMessage(data);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
        })
    }


</script><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/script-global.blade.php ENDPATH**/ ?>