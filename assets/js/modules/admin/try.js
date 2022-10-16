
$(document).ready(function(){
    
    pth=window.location.pathname.split("/") ;
    //console.log(pth) ;
    $('#tbl_name').html(pth[4]) ;
    $('#titre').html(pth[4]) ;
    $('#base').html(pth[3]) ;
    
    $('.alert-danger').hide();
    $('.alert-success').hide();
    var  files=[] ;
    $('input[type="file"]').change(function(e){
        if(files.length!=0)
        {
            files=[] ;
        }
       // console.log(e.target.files) ;
        for(i=0;i<e.target.files.length;i++)
        {
            files.push(e.target.files[i]) ;
        }
        
    });
   
    var tab = $('#table').DataTable();
    function exec(req) {
     
        $.ajax({
            url:"../api/admin/try",
            method:"POST",  
             dataType:"text",
             data:{req:req},
            success: function(data) {
               // $( "#table" ).html('') ;
                //$( "#table" ).html(data);
               // console.log(data) ;
           // console.log(JSON.parse(data)) ;
           console.log(data) ;
           table=JSON.parse(data)  ;  
         
           console.log(JSON.stringify(table['header'])) ;
            console.log(JSON.stringify(table['content'])) ;
            tab.destroy() ; 
            $("#table").empty() ;    
            tab=$('#table').DataTable( {
                    data:table['content'],
                    columns:table['header'],
                    "language":{
                        "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                        "sLoadingRecords": "جارٍ التحميل...",
                        "sProcessing":   "جارٍ التحميل...",
                        "sLengthMenu":   "أظهر _MENU_ مدخلات",
                        "sZeroRecords":  "لم يعثر على أية سجلات",
                        "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sInfoPostFix":  "",
                        "sSearch":       "ابحث:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "الأول",
                            "sPrevious": "السابق",
                            "sNext":     "التالي",
                            "sLast":     "الأخير"
                        },
                        "oAria": {
                            "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                        }
                    },
                                responsive: true,
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
                                        
                    
                } );
               
            }
          });  
       
         
       // console.log(files.length) ;   
        }
       
    


        $('#vider').on('click',function()
        {
        $( "#liste" ).html('');
    });

 
    $('#btn-submit').on('click',function()
  {
     req=$('#req').val() ;
    $(this).val('Please wait ...')
      .attr('disabled','disabled');
      exec(req) ;
     

     
     
  });
  $(document).ajaxStop(function() {
    $('#btn-submit').attr('disabled',false) ;  
   // $('#table').DataTable();
  });

});