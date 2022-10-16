
$(document).ready(function(){
    $(document).on({
        ajaxStart: function() {$('#close-pop').attr('disabled','disabled');$('#mb-title').html('<span class="fa fa-spinner"></span>Chargement');  $('#content').html('Traitement de la demande ...') ;$('#bt').trigger('click') ;},
         ajaxStop: function() { $('#bt').trigger('click') ;}    
    });

    $('#indexer').on('click',function()
    {   
        var entite=$("#composante option:selected").val();
        var ges=$("#gestions").val();
        console.log(ges) ;
        if(ges==''||ges.length!=4){alert('Vous devez saisir une gestion valide ') ; return false ;}
       // alert(entite) ; //return false ;
        $.ajax({
            url:"../api/admin/activategestion/"+ges+"/"+entite,
            method:"GET",
            //data:{ges:ges,entite:entite},  
             dataType:"text",
            success: function(data) {
              
             $('#content').html(data); 
             $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
             $('#close-pop').attr('disabled',false);
             $('#bt').trigger('click') ;
        
            }
          });
    });
    $('#supprimer').on('click',function()
    {   
        var entite=$("#del_composante option:selected").val();
        var ges=$("#del_gestions").val();
        console.log(ges) ;
        if(ges==''||ges.length!=4){alert('Vous devez saisir une gestion valide ') ; return false ;}
       // alert(entite) ; //return false ;
        $.ajax({
            url:"../api/admin/deleteallgestion/"+entite+"/"+ges,
            method:"GET",
            //data:{ges:ges,entite:entite},  
             dataType:"text",
            success: function(data) {
              
             $('#content').html(data); 
             $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
             $('#close-pop').attr('disabled',false);
             $('#bt').trigger('click') ;
        
            }
          });
    }
    
    );
    $('#delete-central').on('click',function()
        {
            
            $.ajax({
                url:"../api/admin/deletevoid/1",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
              
        }
        
        );

        $('#delete-region').on('click',function()
        {
            $.ajax({
                url:"../api/admin/deletevoid/3",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );

        $('#delete-commune').on('click',function()
        {
            $.ajax({
                url:"../api/admin/deletevoid/2",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );

        $('#delete-epa').on('click',function()
        {
            $.ajax({
                url:"../api/admin/deletevoid/4",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );

        $('#verif-central').on('click',function()
        {
            $.ajax({
                url:"../api/admin/resetdate/1",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );

        $('#verif-region').on('click',function()
        {
            $.ajax({
                url:"../api/admin/resetdate/3",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );

        $('#verif-commune').on('click',function()
        {
            $.ajax({
                url:"../api/admin/resetdate/2",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );

        $('#verif-epa').on('click',function()
        {
            $.ajax({
                url:"../api/admin/resetdate/4",
                method:"GET",  
                 dataType:"text",
                success: function(data) {
                  
                 $('#content').html(data); 
                 $('#mb-title').html('<span class="fa fa-check-circle"></span>Succès');
                 $('#close-pop').attr('disabled',false);
                 $('#bt').trigger('click') ;
            
                }
              });
        }
        
        );




});