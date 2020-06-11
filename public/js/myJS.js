
$(document).ready(function(){

    $(".choose-status").change(function(){
        var id =  $( this ).attr("data-id");
        var row = $(this).attr("data-row");
     var data =   $(this).find('option:selected').val();
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        dataType: 'html',
        url : '/update/' + id,
        data:{data:data, id:id},
        success:function(response){
            $("#"+ row).html(response);
        } 

     }) 
    });

    $('#example tbody').on( 'click', 'tr', function () {
   
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $(".delete-member").on("click", function(){
        var id =  $(this).attr("data-id");
        var row = $(this).val();
        var table = $("#example").DataTable();
       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'delete',
            dataType: 'html',
            url : '/members/' + id,
            data:{ id:id, row},
            success:function(response){
              
                 /*    document.getElementById("example").deleteRow(row);
                    $("#example").DataTable().ajax.reload() */

                    table.row('.selected').remove().draw( false );
                
              
            } 
    
         }) 
    });
})