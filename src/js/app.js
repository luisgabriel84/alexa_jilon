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
      var url = `http://admin.alexajilon.com/wp-json/wp/v2/posts?categories=${ $(this).val()}`;
      fetch(url)
      .then(function(response) {
        return response.json();
      })
      .then(function(content) {
          popuplate_select(content);
      });
      
    })
  }


  $('#send-contact').click(function(e){
    e.preventDefault();
    if(!$('#politicas_tratamiento').prop('checked')){
      Swal.fire({
        icon: 'error',
        title: 'Acepta la políticas',
        text: 'Debes aceptar la política de tratamiento de datos personales'
      });
      return;
    }

    if(!$("#contact-form").valid()){
      //error
      Swal.fire({
        icon: 'error',
        title: 'Error al enviar mensaje',
        text: 'Corrige los campos seleccionados'
      });
      return
    }

    $.post('sendemail.php',{ 
      nombres: $('#full-name').val(),
      celular: $('#celular').val(),
      email: $('#correo').val(),
      linea: $("#sel_coleccion option:selected" ).text(),
      producto: $("#sel_producto option:selected" ).text(),
      mensaje: $('#mensaje').val()
    }, function( data ){
      var result = JSON.parse(data);
      console.log(result);
      if(!result.error){
        Swal.fire({
          icon: 'success',
          title: 'Mensaje enviado',
          text: result.message
        })
        $("#contact-form")[0].reset();
      }else{
         //error
        Swal.fire({
          icon: 'error',
          title: 'Error al enviar mensaje',
          text:  result.message
        })
      }
    });
  });

 if( $('.vestido').length){
   $('header').addClass('header--small');
   $('.slicknav_menu').addClass('slicknav_menu--dark');
}

  var vestido_items = Array.from($('.vestido_carusel .owl-item').not('.cloned').find('a'));
  var images = new Array();
  for(var i =0; i<vestido_items.length; i++){
    images.push(vestido_items[i].dataset.imgurl);
  }

  

$('.btn-primary').on('click', function(e){
  e.preventDefault();
  $('#popup').fadeIn('slow');
  $('.popup-overlay').fadeIn('slow');
  $('.zoomed-image').attr('src',this.dataset.imgurl);

  $('.popup-overlay').height($(window).height());
  return false;
});
$('.gal-nav a').on('click',function(e){

    e.preventDefault();
    var currentPicture = parseInt($('.zoomed-image').attr('data-current'));
    if( $(this).attr("class")=='gal-next'){
      console.log(currentPicture);
      if(currentPicture+1 < images.length){
        
        $('.zoomed-image').attr('src', images[currentPicture+1]);
        $('.zoomed-image').attr('data-current',currentPicture+1);
      }
    }
    if( $(this).attr("class")=='gal-prev'){
      if (currentPicture-1 > -1) {
        $('.zoomed-image').attr('src', images[currentPicture-1]);
        $('.zoomed-image').attr('data-current',currentPicture-1);
      }
    }
      $('.zoomed-image').data('current')
   // $('.zoomed-image').attr('src',images);
})

$('#close').on('click', function(){
  $('#popup').fadeOut('slow');
  $('.popup-overlay').fadeOut('slow');
  return false;
});


  $('#send-subscription').click(function(){

    $.post('send.php',{ email: $('#email-subscribe').val() }, function( data ){
      
      var response = JSON.parse(data);
      var iconAlert= 'error';
      var title= "Error al enviar la subscripción";
      if(response.error==0){
        iconAlert= 'success';
        title= "Subscrito satisfactoriamente";
      }
      Swal.fire({
        icon: iconAlert,
        title: title,
        text: response.message
      })
    })


  });
});