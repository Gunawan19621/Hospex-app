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
        if (typeof(flash) == 'number') {
            if (code.hasOwnProperty(flash)) {
                Swal.fire(
                    {
                        'type'  : code[flash]['type'],
                        'title' : code[flash]['type'],
                        'text'  : code[flash]['message']
                    }
                )
                
            }
            
        }
    })


</script>