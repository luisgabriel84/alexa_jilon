<?php
$vestido_slug = $_GET['slug'];
$vestido_url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?_embed&slug=%s',$vestido_slug);
$json_vestido = file_get_contents($vestido_url);
$vestido = json_decode($json_vestido);
$fotos_vestidos =[];

foreach($vestido[0]->acf as $key => $vestidof){
    if($key != 'precio' && $vestidof->url){
        $fotos_vestidos[]= $vestidof->url;
    }
}


$coleccion= sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories/%d',$vestido[0]->categories[0]);
$json_coleccion = file_get_contents($coleccion);
$coleccionInfo = json_decode($json_coleccion);


?>

<section class="alexa row vestido">
    <div class="row__column-alexa alexa-photo ">
        <div class="vestido_carusel owl-carousel">
            <?php foreach($fotos_vestidos as $foto_vestido): ?>
               <a href="<?php echo $foto_vestido ?>"> <img src="<?php echo $foto_vestido ?>" alt="<?php echo  $vestido[0]->title->rendered ?>" title="<?php echo  $vestido[0]->title->rendered ?>" class="responsive-img" id="foto-alexa"></a>
            <?php endforeach; ?>
        </div>
        
    </div>
    <div class="row__column-alexa alexa-bio">


        <div class="detail-title">
            Colección
        </div>
        <div class="detail-colection">
            <?php echo $coleccionInfo->name ?>
        </div>


        <h1><?php echo $vestido[0]->title->rendered; ?></h1>
        <p>

            <?php echo $vestido[0]->content->rendered; ?>

        </p>
        <div class="detail-price">
            <?php if($vestido[0]->acf->precio): ?>
            $<?php echo number_format($vestido[0]->acf->precio,0,'.','.'); ?>
            <?php endif; ?>
        </div>


        <a href="https://api.whatsapp.com/send?phone=573104408034"
            class="black-button  black-button--whatsapp black-button--left">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            Contactame
        </a>
        <div class="detail-icons">


            <div class="alexa__icons">
                Compartir
                <a href="https://www.facebook.com/AlexaJilonOficial/"><i class="icon icon--facebook--white"></i></a>
                <a href="https://www.instagram.com/alexajilonoficial/"><i class="icon icon--instagram--white"></i></a>
                <a href="https://co.pinterest.com/alexajilonoficial/"><i class="icon icon--pinterest--white"></i></a>
            </div>
        </div>


    </div>
</section>