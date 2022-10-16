$(document).ready(function() {
    $('.js-example-basic-single').select2();
   // $('#datepicker1').datepicker();
     $('#project').change(function(){
    project = $(this).val();
    $('#receipt').html('') ;
    $('#requested').html('') ;
    $('#approved').html('') ;
       $.ajax({
            url:"api/transfert/getemployeebyproject/"+project,
             dataType:"text",
            success: function(data) {
                let x=JSON.parse(data) ; 
              
                console.log(x)
                   for (let i = 0; i < x.length; i++) {
                        $('#receipt').append("<option value='"+x[i].id_employee+"'>"+x[i].first_name_employee+"  "+x[i].last_name_employee+"</option>");
                        $('#requested').append("<option value='"+x[i].id_employee+"'>"+x[i].first_name_employee+"  "+x[i].last_name_employee+"</option>");
                        $('#approved').append("<option value='"+x[i].id_employee+"'>"+x[i].first_name_employee+"  "+x[i].last_name_employee+"</option>"); 
                    }
               
               
               
                    }
        });
       
    });



    
    let myform=document.getElementById('formulaire') ; 
   
  
    myform.onsubmit=function(event){
        event.preventDefault() ;
        let item= $.trim($('#item').val()) ;
        let project= $.trim($('#project').val()) ;
        let datepicker=$.trim($('#datepicker').val()) ; 
        let qte=$.trim($('#qte').val()) ; 
        let requested=$.trim($('#requested').val()) ; 
        let receipt=$.trim($('#receipt').val()) ; 
        let approuved=$.trim($('#approuved').val()) ; 
        let formData=new FormData() ; 
        formData.append('item',item) ;
        formData.append('project',project) ;
        formData.append('datepicker',datepicker) ;
        formData.append('qte',qte) ;
        formData.append('requested',requested) ;
        formData.append('receipt',receipt) ;
        formData.append('approuved',approuved) ;
        let xhr=new XMLHttpRequest() ; console.log(formData) ;
        xhr.open('POST','api/transfert/transferitem/',true) ; 
        xhr.onload=function(){
            if (xhr.status==200)
                {
                    console.log('upload complete') ; 
                }
            else 
                {
                    console.log('Upload error')
                }
            }
            xhr.send(formData) ; 
            
    }
    });    