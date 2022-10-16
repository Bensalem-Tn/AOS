
$(document).ready(function(){
    
        $('.get').on('click',function()
            {  
                $.ajax({
                        url:"../api/admin/reload/"+this.id,
                        dataType:"text",
                        success: function(data) {
                                console.log(data) ;
                                $('#'+this.id).html(data+"&nbsp;<i  class='fa fa-refresh' ></i>") ;
                        }
                  }); 
            });

 
  
});