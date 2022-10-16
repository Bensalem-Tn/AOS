$(document).ready(function() {
   /* const start = new Date().toLocaleDateString();
   
    var id, option;
    option = 4;
    let partial=$("#partial option:selected").val() ; 
    let analytical=$("#analytical option:selected").val() ;
    $('#analytical').change(function(){analytical = $(this).val(); }); 
    let unit=$("#unit option:selected").val() ; 
    $('#unit').change(function(){unit = $(this).val();}); 
    let unit_mouv=$("#unit_mouv option:selected").val() ; 
    $('#unit_mouv').change(function(){unit_mouv = $(this).val();}); 
    let location=$("#location option:selected").val() ;
    $('#location').change(function(){location = $(this).val();console.log(location)}); 
    let state=$("#state option:selected").val() ;
    $('#state').change(function(){state = $(this).val();});  

    let allPartial='';
    $.ajax({
        url: "api/article/getallpartial/",
        type: "POST",
        datatype:"json",    
       success: function(data) {
         
          allPartial=data;
         
         }
      });	
      let allState='';
    $.ajax({
        url: "api/article/getallstate/",
        type: "POST",
        datatype:"json",    
       success: function(data) {
           console.log(data)
          allState=data;
         
         }
      });	
      let alllocation='';
      $.ajax({
          url: "api/article/getalllocation/",
          type: "POST",
          datatype:"json",    
         success: function(data) {
             console.log(data)
            alllocation=data;
           
           }
        });	
        let allunitmouv= '';
        $.ajax({
            url: "api/article/getallunitmouv/",
            type: "POST",
            datatype:"json",    
           success: function(data) {
               console.log(data)
              allunitmouv=data;
             
             }
          });	
          let allUnit= '';
          $.ajax({
              url: "api/article/getallunit/",
              type: "POST",
              datatype:"json",    
             success: function(data) {
                 console.log(data)
                allUnit=data;
               
               }
            });	
            let allAnalytical='' ;
            $.ajax({
                url: "api/article/getallanalytical/",
                type: "POST",
                datatype:"json",    
               success: function(data) {
                   console.log(data)
                  allAnalytical=data;
                 
                 }
              });	
            
     $('#partial').change(function(){
		partial = $(this).val();
		
        $('#analytical').html('') ;
		  
			$.ajax({
				url:"api/article/getanalyticalbypartial/"+partial,
				 dataType:"text",
				success: function(data) {
                    let x=JSON.parse(data) ; 
                  
                    if(x.length>0)
                    {
                        $('#analytical').append("<option  selected value='"+x[0].id_analytical+"'>"+x[0].libelle_analytical+"</option>"); 
                        for (let i = 1; i < x.length; i++) {
                            $('#analytical').append("<option value='"+x[i].id_analytical+"'>"+x[i].libelle_analytical+"</option>"); 
                        }
                    }
                    else {
                        $('#analytical').append("<option  selected value='0'> ANALYTICAL</option>");  
                    }
                   
                    analytical=$('#analytical option:selected').val() ;
				}
			});
           
		});
    
 /*  var table = $('#artilce_table').DataTable({  
        
        "ajax":{            
            "url": "api/article/articlelist/", 
            "method": 'POST', 
            "data":{option:option}, 
            "dataSrc":""
        },
        "columns":[
           
            {"data": "id"},
            {"data": "code"},
            {"data": "partial"},
            {"data": "description"},
            {"data": "analytical"},
           {"data":"qte"},
            {"data":"unit_mouv"},
            {"data":"unit"},
            {"data":"location"},
           {"data":"photo"},
           {"data":"photo_technique" },
            {"data":"etat"}
                  ],dom: 'B<"top"iflp<"clear">>rt<"bottom"ip<"clear">>',
        buttons:
            [
                {
                    extend: 'excel',
                    title:" AOS SYSTEME ARTICLE LIST -"+start,
                    titleAttr: 'Excel',
                    exportOptions: 
                            {
                                columns: ':visible:not(.not-export-col)',
                                 orthogonal: '0export',
                                 modifier: { order: 'current'},
                                 columns: [6,5,4,3, 2, 1, 0]
                            }},
                
                
                {
                    extend: 'pdf',
                    title: " AOS SYSTEME ARTICLE LIST -"+start,
                    text: 'PDF',
                    pageSize: 'A4',
                    titleAttr: 'PDF',
                    orientation: 'landscape',
                    exportOptions: 
                            {
                                columns: ':visible:not(.not-export-col)',
                                 orthogonal: 'export',
                                 modifier: { order: 'current'},
                                 columns: [6,5,4,3, 2, 1, 0]
                            }}]
    });     
  
    var dataTable = $("#artilce_table").DataTable({
        processing: true,
        serverSide: true,
       
        order: [],
        ajax: {
            url: "api/article/fetch/",
            type: "POST",
        },dom: 'B<"top"iflp<"clear">>rt<"bottom"ip<"clear">>',
        buttons:
            [
                {
                    extend: 'excel',
                    title:" AOS SYSTEME ITEMS LIST -"+start,
                    titleAttr: 'Excel',
                    exportOptions: 
                            {
                                columns: ':visible:not(.not-export-col)',
                                 orthogonal: '0export',
                                 modifier: { order: 'current'},
                                 columns: [0,1,2,3,4,5,6,7,8,9]
                            }},
                
                
                {
                    extend: 'pdf',
                    title: " AOS SYSTEME ITEMS LIST -"+start,
                    text: 'PDF',
                    pageSize: 'A4',
                    titleAttr: 'PDF',
                    orientation: 'landscape',
                    exportOptions: 
                            {
                                columns: ':visible:not(.not-export-col)',
                                 orthogonal: 'export',
                                 modifier: { order: 'current'},
                                 columns: [0,1,2,3,4,5,6,7,8,9]
                            }}]
    });

    $("#artilce_table").on("draw.dt", function () {
        console.log('yess') ;
        $("#artilce_table").Tabledit({
            url: "api/article/edit/",
            dataType: "json",
            buttons: {
                edit: {
                    class: 'btn btn-primary' ,
                    html: '<i class="ri-pencil-fill"></i>',
                    action: 'edit'
                },
                delete: {
                    class: 'btn btn-danger',
                    html: '<i class=" ri-delete-bin-6-line"></i>',
                    action: 'delete'
                },
                save: {
                    class: 'btn btn-sm btn-success',
                    html: 'Save'
                },
                restore: {
                    class: 'btn btn-sm btn-warning',
                    html: 'Restore',
                    action: 'restore'
                },
                confirm: {
                    class: 'btn btn-sm btn-danger',
                    html: 'Confirm'
                }
            },
            columns: {
                identifier: [0, "id"],
                editable: [
                  
                    [2, "description"],
                    [3, "partial",allPartial ],
                    [4, "analytical",allAnalytical],
                   // [5, "qte"],
                    [6, "unit", allUnit],
                    [7, "unit_mouv", allunitmouv],
                    [8, "location", alllocation],
                    [9, "etat", allState],
                  
                ],
            },
            restoreButton: false,
            onSuccess: function (data, textStatus, jqXHR) {
                if (data.action == "delete") {
                    $("#" + data.id).remove();
                    $("#artilce_table").DataTable().ajax.reload();
                }
            },
        });
      
    });
       





    var action; 
    let myform=document.getElementById('formulaire') ; 
   
    let myfile1=document.getElementById('file1')  ; 
    let myfile2=document.getElementById('file2')  ; 
    myform.onsubmit=function(event){
        event.preventDefault() ;
        let article_code= $.trim($('#article_code').val()) ;
        let article_name= $.trim($('#article_name').val()) ;
        let qte=$.trim($('#qte').val()) ; 
        let files1=myfile1.files;
        let files2=myfile2.files; 
        let formData=new FormData() ; 
        let file1=files1[0] ;
        let file2=files2[0] ; 
        if (typeof file1=== 'undefined')
        {
            formData.append('file1','default1.jpg') ;
        }else  {
            formData.append('file1',file1,file1.name) ;
        }
        if (typeof file2 === 'undefined')
        {
            formData.append('file2','default2.jpg') ;
        }else  {
            formData.append('file2',file2,file2.name) ;
        }
        formData.append('article_code',article_code) ;
        formData.append('article_name',article_name) ;
        formData.append('qte',qte) ;
        formData.append('state',state) ;
        formData.append('analytical',analytical) ;
        formData.append('partial',partial) ;
        formData.append('unit',unit) ;
        formData.append('unit_mouv',unit_mouv) ;
        formData.append('location',location) ;
        formData.append('option',option) ;
        let xhr=new XMLHttpRequest() ; 
        xhr.open('POST','api/article/articlelist/',true) ; 
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
            $('#modalCRUD').modal('hide');
            $("#artilce_table").DataTable().ajax.reload();
    }
   /* $('#formulaire').submit(function(e){        
       
      
        e.preventDefault(); 
        article_code = $.trim($('#article_code').val());    
       
        files = document.getElementById('file1').files;
        files2 = document.getElementById('file2').files; 
          //  file1 = $('#file1').val();
         //  file2 = $('#file2').val(); 
        //console.log(state) ; return false ;
           $.ajax({
              url: "api/article/articlelist/",
              type: "POST",
              datatype:"json",    
              data:  {article_code: article_code,
                        article_name:article_name,
                        partial:partial,
                        analytical:analytical,
                        qte:qte,
                        unit:unit,
                        unit_mouv:unit_mouv,
                        location:location,
                        state:state,
                        file1:file1,
                        file2:file2,
                        option:option},    
              success: function(data) {
                  $("#console").html(data) ;
               // table.ajax.reload(null, false);
               }
            });			        
       // $('#modalCRUD').modal('hide');											     			
    });
    
   
    $("#btnNouveau").click(function(){
      
        option = 1;  
        id=null;
        $("#formulaire").trigger("reset");
        $(".modal-header").css( "background-color", "#0F9CF3");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Add New Item");
        $("#btnAdd").text("ADD");
        $('#modalCRUD').modal('show');	    
    });
    
           
    $(document).on("click", ".btnEdit", function(){		        
        option = 2;
        action = $(this).closest("tr");	  
        console.log(action.find('td:eq(0)').text())  ;     
        id = parseInt(action.find('td:eq(0)').text());	            
        article_name = action.find('td:eq(1)').text();
        article_name = action.find('td:eq(2)').text();
        last_name = action.find('td:eq(3)').text();
        email = action.find('td:eq(4)').text();
        $("#article_name").val(article_name);
       // $("#first_name").val(first_name);
        $("#last_name").val(last_name);
        $("#email").val(email);
       
       
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Edit Item");
        $("#btnAdd").text("Save Changes");		
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
              url: "../api/admin/articlelist/",
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
            url: "../api/admin/articlelist/",
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
         */
    });    