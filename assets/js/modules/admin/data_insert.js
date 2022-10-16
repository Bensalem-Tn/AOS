
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



    function Sample(files) {
        var ges=$('#nbr_file').val() ;
        x=1 ;
        pth=window.location.pathname.split("/") ;
        //var percentComplete = x/nbr;
        for(var i = 0; i < files.length; i++) {
           $.get("../../api/admin/"+pth[4]+"/"+ges+'/'+files[i]['name']).then(function(data){
                if(data.length>1)
                {  
                    //$('.success-message').html('');
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    //$('.success-message').html(data)
                    $( "#liste" ).append( "<li><h3> "+x+" : "+data+"</h3></li>" );
                  
                    //console.log(x) ;
                    percentComplete= x/files.length ;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.file-progress').text(percentComplete + '%');
                    $('.file-progress').css('width', percentComplete + '%');
                }
                else
                {
                    $('.alert-success').hide();
                    $('.alert-danger').show();
                    $('.warning-message').html('le fichier n\` esxiste pas ... ');
                }
                 $('.success-message').html('charegment');
                 x++ ;
               // console.log(data);
            });
         
       // console.log(files.length) ;   
        }
       
    }







    $('#btn-submit').on('click',function()
  {
    $(this).val('Please wait ...')
      .attr('disabled','disabled');
      Sample(files) ;
     
  });
  $(document).ajaxStop(function() {
    $('#btn-submit').attr('disabled',false) ;  
});
    /*$('#btn-submit').click(function()
    {
        $(this).prop('disabled', true);
    
   // $(this).prop('disabled', false);
});*/
    
});