$(document).ready(function() {

  var id, option,role;
  option = 4;
  role="user" ;
  console.log(role) ;
  $('#role').change(function(){
		role = $(this).val();
    console.log(role) ;
  });    

  
  table = $('#user_table').DataTable({  
    
      "ajax":{            
          "url": "../api/admin/userlist/", 
          "method": 'POST', 
          "data":{option:option}, 
          "dataSrc":""
      },
      "columns":[
          {"data": "id"},
          {"data": "login"},
          {"data": "email"},
          {"data": "first_name"},
          {"data": "last_name"},
          {"data":"role"},
          {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEdit'><i class='material-icons'>Editer</i></button><button class='btn btn-success btn-sm btnReset'><i class='material-icons'>réinitialiser le mot de passe</i></button><button class='btn btn-danger btn-sm btndelete'><i class='material-icons'>Supprimer</i></button></div></div>"}
      ]
  });     
  
  var action; 
  $('#formulaire').submit(function(e){                         
      e.preventDefault(); 
      login = $.trim($('#login').val());    
      first_name = $.trim($('#first_name').val());
      last_name = $.trim($('#last_name').val());
      email = $.trim($('#email').val()); 
         $.ajax({
            url: "../api/admin/userlist/",
            type: "POST",
            datatype:"json",    
            data:  {id:id, email:email,login:login, first_name:first_name, last_name:last_name, role:role,option:option},    
            success: function(data) {
              table.ajax.reload(null, false);
             }
          });			        
      $('#modalCRUD').modal('hide');											     			
  });
  
 
  $("#btnNouveau").click(function(){
    
      option = 1;  
      id=null;
      $("#formulaire").trigger("reset");
      $(".modal-header").css( "background-color", "#17a2b8");
      $(".modal-header").css( "color", "white" );
      $(".modal-title").text("Ajouter Un Nouveau Utilisateur");
      $("#btnAdd").text("Ajouter");
      $('#modalCRUD').modal('show');	    
  });
  
         
  $(document).on("click", ".btnEdit", function(){		        
      option = 2;
      action = $(this).closest("tr");	        
      id = parseInt(action.find('td:eq(0)').text());	            
      login = action.find('td:eq(1)').text();
      first_name = action.find('td:eq(2)').text();
      last_name = action.find('td:eq(3)').text();
      email = action.find('td:eq(4)').text();
       
      $("#login").val(login);
      $("#first_name").val(first_name);
      $("#last_name").val(last_name);
      $("#email").val(email);
     
     
     
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white" );
      $(".modal-title").text("Editer Un Utilisatuer");
      $("#btnAdd").text("Editer");		
      $('#modalCRUD').modal('show');		   
  });
  
  //Borrar
  $(document).on("click", ".btndelete", function(){
      action = $(this);           
      id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
      option = 3; //eliminar        
      var respuesta = confirm("Êtes-vous sûr de vouloir supprimer L'utilisateur "+id+"?");                
      if (respuesta) {            
          $.ajax({
            url: "../api/admin/userlist/",
            type: "POST",
            datatype:"json",    
            data:  {option:option, id:id},    
            success: function() {
                table.row(action.parents('tr')).remove().draw();                  
             }
          });	
      }
   });
   $(document).on("click", ".btnReset", function(){
    action = $(this);           
    id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;
    last_name = $(this).closest('tr').find('td:eq(4)').text() ;
    first_name = $(this).closest('tr').find('td:eq(3)').text() ;		
    
    option = 5;         
    var respuesta = confirm("Êtes-vous sûr de vouloir réinitialiser le mot de passe de l'utilisateur : "+login+"?");                
    if (respuesta) {            
        $.ajax({
          url: "../api/admin/userlist/",
          type: "POST",
          datatype:"json",    
          data:  { option:option,
                   first_name:first_name,
                   last_name:last_name,
                   id:id
                  },    
          success: function() {
             alert("Mot de passe réinitialisé avec avec succès")                 
           }
        });	
    }
 });
       
  });    