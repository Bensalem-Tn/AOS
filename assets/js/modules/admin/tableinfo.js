
$(document).ready(function(){
    pth=window.location.pathname.split("/") ;
    console.log(pth[4]) ;
   var tab=pth[4] ;
    table = $('#user_table').DataTable({  
    
        "ajax":{            
            "url": "../../api/admin/tableinfo/"+tab, 
            "method": 'POST', 
            "data":{tab:tab}, 
            "dataSrc":""
        },
        "columns":[
            {"data": "COLUMN_NAME"},
            {"data": "COLUMN_TYPE"},
            {"data": "COLLATION_NAME"},
            {"data": "COLUMN_KEY"},
            {"data": "IS_NULLABLE"},
            {"data":"COLUMN_DEFAULT"},
            {"defaultContent": "EXTRA"}
        ],
        dom: 'B<"top"iflp<"clear">>rt<"bottom"ip<"clear">>',
                                buttons:
                                    [
                                        {
                                            extend: 'excel',
                                            //title: " "+document.title+"- "+ges,
                                            titleAttr: 'Excel',
                                            exportOptions: 
                                                    {
                                                        columns: ':visible:not(.not-export-col)',
                                                         orthogonal: '0export',
                                                         modifier: { order: 'current'},
                                                         
                                                    }},
                                    ]
    });    
    
});