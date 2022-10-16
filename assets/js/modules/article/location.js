$(document).ready(function() {
    const start = new Date().toLocaleDateString();
   
    var id, option;
    option = 4;
    var dataTable = $("#artilce_table").DataTable({
        processing: true,
        serverSide: true,
       
        order: [],
        ajax: {
            url: "api/article/fetch_location/",
            type: "POST",
        },dom: 'B<"top"iflp<"clear">>rt<"bottom"ip<"clear">>',
        buttons:
            [
                {
                    extend: 'excel',
                    title:" AOS SYSTEME UNIT LOCATIONS LIST -"+start,
                    titleAttr: 'Excel',
                    exportOptions: 
                            {
                                columns: ':visible:not(.not-export-col)',
                                 orthogonal: '0export',
                                 modifier: { order: 'current'},
                                 columns: [0,1,2,3,4,5,6,7,8,9]
                            }},
                
                
                {
                    extend: 'pdf',
                    title: " AOS SYSTEME LOCATIONS LIST -"+start,
                    text: 'PDF',
                    pageSize: 'A4',
                    titleAttr: 'PDF',
                    orientation: 'landscape',
                    exportOptions: 
                            {
                                columns: ':visible:not(.not-export-col)',
                                 orthogonal: 'export',
                                 modifier: { order: 'current'},
                                 columns: [0,1,2,3,4,5,6,7,8,9]
                            }}]
    });

    $("#artilce_table").on("draw.dt", function () {
        console.log('yess') ;
        $("#artilce_table").Tabledit({
            url: "api/article/edit_location/",
            dataType: "json",
            buttons: {
                edit: {
                    class: 'btn btn-primary' ,
                    html: '<i class="ri-pencil-fill"></i>',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-danger',
                    html: '<i class=" ri-delete-bin-6-line"></i>',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Save'
                },
                restore: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Restore',
                    action: 'restore'
                },
                confirm: {
                    class: 'btn btn-sm btn-danger',
                    html: 'Confirm'
                }
            },
            columns: {
                identifier: [0, "id"],
                editable: [
                  
                    [1, "libelle_location"],
                   ,
                  
                ],
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                if (data.action == "delete") {
                    $("#" + data.id).remove();
                    $("#artilce_table").DataTable().ajax.reload();
                }
            },
        });
      
    });
       





    
 $('#formulaire').submit(function(e){        
       
      
        e.preventDefault(); 
        let libelle_location=$('#libelle_location').val() ;
        console.log('hlof') ;
           $.ajax({
              url: "api/article/insertlocation/",
              type: "POST",
              datatype:"json",    
              data:  { libelle_location: libelle_location},    
              success: function(data) {
                  $("#console").html(data) ;
                  dataTable.ajax.reload(null, false);
               }
            });			        
     
   

    

         
    });




});    