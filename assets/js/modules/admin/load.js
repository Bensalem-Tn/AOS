
 function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
 
$(document).ready(function(){



  
  var vider_composante=$('#vider_composante').val() ; 
  $('#vider_composante').change(function(){
    vider_composante = $(this).val();
    console.log(vider_composante) ;
  });
  $("#vider").on('click',function()
  {
          
    $.ajax({
      url:"../api/admin/vider/"+vider_composante,
      method:"GET",  
       dataType:"text",
      success: function(data) {
        
       alert('le cache Des '+vider_composante+'est vidé avec succées') 
      }
    });
    
    //alert(vider_composante);
          return false ;
  });
  time=$('#time').val() ;
   //app=$('#url').val() ;
   nom_composante="central" ;
 var  composante=$('#composante').val() ;
	$('#gestions').change(function(){
		gestions = $(this).val();
    console.log(gestions) ;
     });
  // gestions=$('#gestions').val() ;
  //console.log(gestions) ; 
    $('#composante').change(function(){
      composante = $(this).val();
      if(composante==1) {nom_composante="central" ;}else if(composante==2) {nom_composante="commune" ;}else if(composante==3) {nom_composante="region" ;}else {nom_composante="epa" ;} 
        console.log(nom_composante) ;
        console.log(composante) ;
  gestions= $("#gestions option:selected").text();
        console.log(gestions) ;
       $.ajax({
          url:"../api/admin/getgestion/"+composante,
          method:"GET",  
           dataType:"text",
          success: function(data) {
            
           $('#gestions').html(data); 
          }
        });
        }) ;

       
   
    
    
      $('#btn-submit').on('click',function()
      {  
        time=$('#time').val() ;
        app=$('#url').val() ;
        link=app+"/"+nom_composante ; 
        link=nom_composante ; 
        console.log(composante) ; 
        console.log(gestions) ;
        console.log(link) ; //return false ;
         req=$('#req').val() ;
        $(this).html('Patientez SVP ...') .attr('disabled','disabled');
         load(composante,gestions) ;

      });
     
    function load(composante,gestions)
    {
      $.ajax({
        url:"../api/admin/getids/"+composante+"/"+gestions,
        method:"GET",  
         dataType:"text",
        success: function(data) {
          tab= [];console.log(data) ; 
         tab=JSON.parse(data) ; 
         x=1 ;
         for (let i=0; i<tab.length; i++) {
           task(i,tab);
           
        }
        }
      });
     
    
    }  
      function task(i,tab) {
        var url="http://"+link+"/"+tab[i].id+"/"+gestions+"/" ;
        var url=nom_composante+"/"+tab[i].id+"/"+gestions+"/" ;
        console.log(nom_composante+"/"+tab[i].id+"/"+gestions+"/") ;
       var myWin = null;
       
        setTimeout(function() {
          console.log(url) ;
            myWin = window.open("../"+url, "_blank");
            sleep(time*1000).then(myWin.close) ;
            percentComplete= x/tab.length ;
        percentComplete = parseInt(percentComplete * 100);
        $('.file-progress').text(percentComplete + '%');
        $('.file-progress').css('width', percentComplete + '%');
        $( "#liste" ).append( "<li><h3>"+x+"  chargement de  :"+url+"</h3></li>" );
        x++;
        if(i==tab.length-1)
        {
          $('#btn-submit').attr('disabled',false) ;
          $('#btn-submit').html('Charger') ;
        }
        }, time*1000 * i);
      }

      $('#vider').on('click',function()
      {
      $( "#liste" ).html('');
  });

});