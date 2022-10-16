"use strict";
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
jQuery(document).ready(function() {
    var tab=['','min_dep_nomenclature','min_dep_credit','min_engagement','min_facture','min_facture_ordonnance','min_commande','min_paiement','min_avenant','min_ligne_avenant','min_marche','min_arrets'];
    var tab_condtion=['','GESTION','GESTION','GES_GESTIO','GES_GESTIO','GES_GESTIO','GES_GESTIO','PAY_GESEMI','MAR_ANNMAR','MAR_ANNMAR','MAR_ANNMAR','GES_GESTIO'];
    var  files=[] ;
    $('input[type="file"').change(function(e)
            {
                console.log(this.id) ;
                if(files.length!=0)
                    {
                        files=[] ;
                    }
                for(var i=0;i<e.target.files.length;i++)
                    {
                        files.push(e.target.files[i]) ;
                    }
            }
    );
            
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
            //console.log($target.id) ;
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
   
        $("#step-text").html(' ETAPE 1 : Vous devez choisir la gestion');
    $('#activate-step-1').on('click', function(e) {
        //$('#titre').html(tab[1]+'/'+$("#gestion").val()) ;
       if($("#gestion").val()==""){alert("vouz devez saisir la gestion") ;return false } 
        $('ul.setup-panel li:eq(0)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-1"]').trigger('click');
        $(this).remove();
       // $("#gestion-text").append($("#gestion").val()+')');
    })
    $('#activate-step-13').on('click', function(e) {
        //console.log('ok') ; return false ;
        $('ul.setup-panel li:eq(0)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-13"]').trigger('click');
        $(this).remove();
        $.ajax({
            url:"../../api/admin/resetdate/1",
            method:"GET",  
             dataType:"text",
            success: function(data) {
                alert("la verification des colonnes de type DATE est efféctué avec succés ...") ;
                console.log(data);    
             }
          });
          $.ajax({
            url:"../../api/admin/activategestion/"+$("#gestion").val()+"/1",
            method:"GET",  
             dataType:"text",
            success: function(data) {
                alert("l'indexation des données est efféctué avec succés...") ;
                console.log(data);    
             }
          });
     
    })
    for (let i=1;i<=12;i++)
    {    
    $('#activate-step-'+i).on('click', function(e) {
        console.log(tab[i]) ;
        if($("#gestion").val()==""){alert("vouz devez saisir la gestion") ;return false } else {  $( "#liste" ).append( "<li><h3> Insertion des données de la gestion  : "+$("#gestion").val()+"</h3></li>" );}
        $('ul.setup-panel li:eq('+i+')').removeClass('disabled');
        var x=i+1 ;
        console.log(i);
        if(x<13)
        {
        $('#activate-step-'+x).attr('disabled','disabled');
        $("#step-text").html(' ETAPE  '+x+'  : Insertion des données de la table '+tab[i]);
        }
        else 
        {
            $("#step-text").html("Finalisation de l'insertion ...");
        }
        
         
         $('ul.setup-panel li a[href="#step-'+x+'"]').trigger('click');
        $(this).remove();
      
        files=[] ;
    
            // Sample(tab[i],files) ;
    }) ;
    
    }
    
    for (let j=1;j<=12;j++)
    {       var x=j+1 ;
           var  y=j*1+2 ;
        $("#btn-submit-"+x).on('click',function(e){
                
                   console.log(this.id) ;
                   $('.file-progress').css('width', 0 + '%');
                   $('.file-progress').text(0 + '%');
                    if(files.length==0){alert('vous devez selectionner le(s) fichier(s) à  insérer') ;  $('#activate-step-'+x).attr('disabled',false) ; return false ;}
                   else {
                    $(this).attr('disabled','disabled');
                    $.ajax({
                        url:"../../api/admin/trytofind/"+tab[j]+"/"+tab_condtion[j]+"='"+$('#gestion').val()+"'",
                        method:"GET",  
                         dataType:"text",
                        success: function(data) {
                            console.log(JSON.parse(data));    
                          if(JSON.parse(data)==1)
                          {
                            $( "#dialog-confirm" ).dialog({
                                resizable: false,
                                height: "auto",
                                width: 600,
                                modal: true,
                               
                                buttons: {
                                  "Contunier": function() {
                                    Sample(tab[j],files) ;
                                  },
                                  Annuler: function() {
                                    $( this ).dialog( "close" );
                                  }
                                }
                              });
                            return false ;
                                                    } 
                          else 
                         
                                                    {
                                                        //Sample(tab[j],files) ;
                                                        sleep(2000) ;
                                                    }
                        

                     }
                      });
                     
                   }
               
            })
    }   var ajax=1 ;
   /* $(document).ajaxStop(function() {
        ajax+=1 ;
        $('#activate-step-'+ajax).attr('disabled',false) ;
        $('.insert').attr('disabled',false) ; 
        console.log("termier: "+ajax) ;
    });*/


   
   
    function Sample(table_name,files) {
      
        var x=1 ;var y=1;
        var ges=$('#gestion').val() ;
        for(var i = 0; i < files.length; i++) {
           var  pth="../../api/admin/"+table_name+"/"+ges+'/'+files[i]['name'] ;
            console.log(pth) ; 
           $.get(pth).then(function(data){
                if(data.length>1)
                {  
                    $( "#liste" ).append( "<li><h3> "+x+" : "+data+"</h3></li>" );
                    var percentComplete= x/files.length ;
                    percentComplete = parseInt(percentComplete * 100);
                    $('.file-progress').text(percentComplete + '%');
                    $('.file-progress').css('width', percentComplete + '%');
                }
                else
                {
                    
                    $('.warning-message').html('le fichier n\` esxiste pas ... ');
                }
                 $('.success-message').html('charegment');
                 x++ ;y=x+1 ;
                console.log(y);
            }).done(function()
            {
               
                $('.btn-suiv').attr('disabled',false) ;
                $('.insert').attr('disabled',false) ; 
                console.log("termier: "+y+"|"+x) ;
            }
                );
         
       // console.log(files.length) ;   
        }
       
    }
});

