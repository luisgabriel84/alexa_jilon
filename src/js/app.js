
//Fetch all lines
fetch('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?per_page=50')
  .then(function(response) {
    return response.json();
  })
  .then(function(categories) {
       populataMenu(categories);
  });

function populataMenu(categories){

    categories.forEach(category =>{
        if(category.parent == 0 && category.slug != 'sin-categoria'){
            var lineas = document.createElement('ul');
            lineas.id = `linea-${category.id}`;
            lineas.innerHTML= `<h4>${category.name}</h4>`;
            var ul = document.getElementById("main-menu");
            ul.appendChild(lineas);
          
        }
    });

    categories.forEach(category =>{
        if(category.parent != 0){
            var coleccion = document.createElement('li');
            coleccion.innerHTML = `<a href="coleccion.php?colecciones-alexa-jilon=${category.slug}&id=${category.id}">${category.name}</a>`;
            var ul = document.getElementById(`linea-${category.parent}`);
            ul.appendChild(coleccion);
        }
    })
    
}




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
