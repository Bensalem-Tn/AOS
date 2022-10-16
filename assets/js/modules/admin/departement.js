$(document).ready(function(){

       $('.edit').editable({
          url: '../../api/admin/editdept',
          type: 'text',
          name: 'edit',
          title: 'Nom du chapitre',
          params:function(params){
            console.log('id') ;
            params.pk = $(this).attr('id').match(/\d+/)[0];
            return params;
          },
      });
dep_id="" ;
$(".edit").on('click',function()

{
chambre_id=this.id.match(/\d+/)[0] ;
}
)
var value = $("#ges option:selected");
                console.log(value.text())
gestion=value.text() ;
$('#ges').change(function(){
  gestion= $("#ges option:selected").text();
  console.log(gestion) ;
   });

$("#choisir").on('click',function()
{
  var loc=window.location.href.substr(0,window.location.href.length-4)+gestion ;
  location.replace(loc);
  console.log(loc) ;
  window.open(loc, '_self');
 return false ; 
}
)
});


