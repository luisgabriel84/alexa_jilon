//Pagina Alexa Jilon

function alexajilon(content){
    document.getElementById('alexa_title').innerHTML = content.title.rendered;
    document.getElementById('alexa_content').innerHTML = content.content.rendered;
    document.getElementById('foto-alexa').src=content._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
    
}
fetch('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/pages/52?_embed')
  .then(function(response) {
    return response.json();
  })
  .then(function(content) {
       alexajilon(content);
  });
