//Pagina Alexa Jilon

$(document).ready(function(){


  function popuplate_select(response){
    $("#sel_producto option").remove();
    var options = $("#sel_producto");
    $.each(response,function(e,item){
      options.append($("<option />").val(item.title.rendered).text(item.title.rendered));

    });
  }
  if($('#sel_coleccion').length){
    $('#sel_coleccion').change(function(){
      var url = `http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?categories=${ $(this).val()}`;
      fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(content) {
          popuplate_select(content);
      });
      
    })
  }

  if($('.vestido_carusel a').length){
    var lightbox = $('.vestido_carusel a').simpleLightbox();
  }

  $('#send-contact').click(function(e){
    e.preventDefault();
    if(!$("#contact-form").valid()){
      //error
      Swal.fire({
        icon: 'error',
        title: 'Error al enviar mensaje',
        text: 'Corrige los campos seleccionados'
      })
    }else{
      //send
     
    }
    
  });

 if( $('.vestido').length){
   $('header').addClass('header--small');
   $('.slicknav_menu').addClass('slicknav_menu--dark');
 
 }
});
