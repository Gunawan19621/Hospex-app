
<script>
    $(document).ready(function(){
        var table =$('#m_table_1').DataTable({
            dom: 'Bfrtip',
            processing : true,
            serverSide  : true,
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            ajax : {
                url : "{{ route('visitors.index') }}",
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data : "company_name", name : "company_name",
                },
                {
                    data : "name", name : "name",
                },
                {
                    data : "email", name : "email",
                },
                {
                    data : "phone", name : "phone",
                },
                {
                    data : "email_verified_at", name : "email_verified_at",
                },
                {
                    data : "created_at", name : "created_at",
                },
                {
                    data : "event", name : "event",
                },
                {
                    data:"action",
                    name: "action",
                    orderable: false
                }
            ]
        })
       
    })

    $('#m_table_1').on('click', '.delete', function () {
  
      var id = $(this).data("id");
      var link = 'verification/visitors';
      confirmVerify(link,id)
    });

    $('#m_table_1').on('click', '.resetpassword', function () {
  
      var id = $(this).data("id");
      var link = 'reset-password/visitors';
      confirmResetPassword(link,id)
    });

</script>
