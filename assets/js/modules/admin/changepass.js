$(document).ready(function() {
 var action; 
    $('#modifier').click(function(e){                         
        e.preventDefault(); 
        old_pass = $('#old-pass').val();    if(old_pass===''){alert('الرجاء ادخال كلمة  المرور') ;return false ;}
        new_pass = $('#new-pass').val();     if(new_pass===''){alert('الرجاء ادخال كلمة  المرور الجديدة ') ;return false ;}
        confirm_pass = $('#confirm-pass').val();  if(confirm_pass===''){alert('الرجاء إعادة ادخال كلمة  المرور الجديدة ') ;return false ;}
        user_id = $('#user-id').val();
        console.log(old_pass+'|'+new_pass+'|'+confirm_pass+'|'+user_id) ; 
        if(new_pass!=confirm_pass)
        {
            alert('كلمة المرور غير متطابقة') ;
        }
        else 
        {
            $.ajax({
                  url: "api/user/changepassword",
                 type: "POST",
                 datatype:"json",    
                 data:  {user_id:user_id, old_pass:old_pass,new_pass:new_pass},    
                 success: function(data) {
                 alert(data) ;
                 console.log(data) ;
               }
            });			        
        }
    });
    
   
   
         
    });    