<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=7l9cwatx9v7nbuhitapj8m93plhiugcdcs7yknme455h58bl"></script>
<script src="{{ asset('employee/backend/assets/js/plugins.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/main.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/buttons.print.min.j')}}s"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/data-table/datatables-init.js')}}"></script>
<script src="{{ asset('employee/backend/cropimage/js/html5imageupload.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/chart-js/chartjs-init.js')}}"></script>
<script src="{{ asset('employee/backend/assets/js/lib/chosen/chosen.jquery.min.js')}}"></script
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
        
        $(".livesearch").chosen();
    });
    // delete alert 
    $('button.delete-btn').on('click', function(e){
        e.preventDefault();
        var self = $(this);
        swal({
            title             : "Are you sure?",
            text              : "You will not be able to recover this!",
            type              : "warning",
            showCancelButton  : true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText : "Yes, Delete it!",
            cancelButtonText  : "No, Cancel delete!",
            closeOnConfirm    : false,
            closeOnCancel     : false
        },
        function(isConfirm){
            if(isConfirm){
                swal("Deleted!","It has been deleted", "success");
                setTimeout(function() {
                    self.parents(".delete_form").submit();
                }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
            }
            else{
                  swal("Cancelled","It is safe", "error");
            }
        });
    });
</script>