$(document).ready(function(){
  
    
    $( ".sortable_list" ).sortable(
      {
        connectWith: ".connectedSortable",
        /*stop: function(event, ui) {
            var item_sortable_list_id = $(this).attr('id');
            console.log(ui);
            //alert($(ui.sender).attr('id'))
        },*/
        receive: function(event, ui) {
            console.log("dropped on = "+this.id); // Where the item is dropped
            console.log("sender = "+ui.sender[0].id); // Where it came from
            console.log("item = "+ui.item[0].innerHTML); //Which item (or ui.item[0].id)
            console.log($('#ch'+this.id).text()) ;
            id=this.id.match(/\d+/)[0]; 
            gouv_id=ui.item[0].innerHTML.match(/\d+/)[0] ; 
            $.ajax(
                {  
                  url:"../api/admin/updatechambre",  
                  method:"POST",  
                  data:{id:id,gouv_id:gouv_id},  
                  dataType:"text",  
                  success:function(data)  
                    { 
                        if($('#'+ui.sender[0].id).children().length==0)
                        {
                          $("#delete-chambre-"+ui.sender[0].id.match(/\d+/)[0]).attr('class', 'btn btn-primary btn-block delete-chambre');
                          console.log('log log') ;
                        }
                        if($('#sortable'+id).children().length!=0)
                        {
                          $("#delete-chambre-"+id).attr('class', 'btn btn-disabled btn-block delete-chambre');
                          console.log('log log') ;
                        }
                       
                    } , 
                  error:function(data)
                    {  
                            console.log(data) ;
                            alert(data) ;
                          
                    }
                    
                   }); 
          
            
        }         
    }).disableSelection();
    $("#ajouter").on('click',function()
        {
            nom=$('#chambre-name').val() ;
           if(nom.trim()=="") 
           {
               alert('Vous devez tappez le nom de la chambre ') ;
                return false ;
            }
           // console.log(nom) ;
           $.ajax(
            {  
              url:"../api/admin/addchambre",  
              method:"POST",  
              data:{nom:nom},  
              dataType:"text",  
              success:function(data)  
                { 
                   
                    console.log(data) ;
                    //$('#p-body').append('<div  id="'+parseInt(data)+'" class="col-md-3"><div  class="panel panel-primary"><div class="panel-heading"><h4 id="chsortable'+data+'" class="panel-title-box">'+nom+'</h4></div><div    class="panel-body" ><ul id="sortable'+parseInt(data)+'" class="sortable_list connectedSortable"></ul></div></div></div>');
                    location.reload() ;
                  } , 
              error:function(data)
                {  
                        console.log(data) ;
                        alert(data) ;
                }
            }); 
             return false ;
       }) ;
       $('.editable').editable({
        url: '../api/admin/editchambre',
        type: 'text',
        name: 'editable',
        title: 'le nom de la chambre',
        params:function(params){
          params.pk = $(this).attr('id').match(/\d+/)[0];
          return params;
       },
      });
 $('.editable_gouv').editable({
  url: '../api/admin/editgouv',
  type: 'text',
  name: 'editable',
  title: 'le nom de la Gouvernerat',
  params:function(params){
    params.pk = $(this).attr('id').match(/\d+/)[0];
    return params;
 },
});



$(".delete-chambre").on('click',function()
{  
  if($(this).hasClass('btn-disabled'))
  return false ;
  console.log(this.id.match(/\d+/)[0])  ;
   id=this.id.match(/\d+/)[0] ;
   
   $( "#dialog-confirm_ch" ).dialog({
    resizable: false,
    height: "auto",
    width: 400,
    modal: true,
    buttons: {
      "Delete all items": function() {
        
                  $.ajax(
                    {  
                      url:"../api/admin/deletechambre/"+id,  
                      method:"POST",  
                      data:{id:id},  
                      dataType:"text",  
                      success:function(data)  
                        { 
                          
                            console.log(data) ;
                            $('#'+id).html("");
                            $( "#dialog-confirm_ch" ).dialog( "close" );
                        } , 
                      error:function(data)
                        {  
                                console.log(data) ;
                                alert(data) ;
                              
                        }
                        
                      }); 
                    },
                    Cancel: function() {
                      $( this ).dialog( "close" );
                    }
                  }
                });
                    

    return false ;
}) ;






$(".delete-gouv").on('click',function()
{ 
  id=this.id.match(/\d+/)[0] ;
  $( "#dialog-confirm" ).dialog({
    resizable: false,
    height: "auto",
    width: 400,
    modal: true,
   
    buttons: {
      "Supprimer": function() {
        $.ajax(
          {  
            url:"../api/admin/deletegouv",  
            method:"POST",  
            data:{id:id},  
            dataType:"text",  
            success:function(data)  
              { 
                 
                  console.log(data) ;
                  
                  $( "#dialog-confirm" ).dialog("close") ;
                  location.reload() ;
              } , 
            error:function(data)
              {  
                      console.log(data) ;
                      alert(data) ;
                    
              }
              
             }); 
      },
      Annuler: function() {
        $( this ).dialog( "close" );
      }
    }
  });
   
 
 
  
    
    

    return false ;
}) ; chambre_id="" ;
$(".chambre").on('click',function()

{
chambre_id=this.id.match(/\d+/)[0] ;
}
)
$("#add-gouv").on('click',function()
{   
    nom=$('#nom_gouv').val() ;
    id=$('#code_gouv').val() ;
   
    var exist=false ;
    $.ajax(
      {  
        url:"../api/admin/gouvexist",  
        method:"POST",  
        data:{id:id},  
        dataType:"text",  
        success:function(data)  
          { console.log(data) ;
            if(parseInt(data)>0)
            { alert('Ce Code Exite déja ') ; 
             
            return false ;

            } else 
            {
              $.ajax(
                {  
                  url:"../api/admin/addgouv",  
                  method:"POST",  
                  data:{id:id,nom:nom,chambre_id:chambre_id},  
                  dataType:"text",  
                  success:function(data)  
                    { 
                      location.reload();
                      } , 
                  error:function(data)
                    {  
                            console.log(data) ;
                            alert(data) ;
                    }
                }); 
            }
            } , 
        error:function(data)
          {  
                  console.log(data) ;
                  alert(data) ;
          }
      }); 
         
       
       
    
    return  false ;
  
}) ;


    });