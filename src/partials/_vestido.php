
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
<meta property="og:title" content="<?php echo  $vestido[0]->title->rendered; ?>" />
<meta property="og:image" content="http://www.alexajilon.femega.com/admin/wp-content/uploads/2019/12/03_InternadeProducto-texturas-croptopytanganegra-002.jpg" />




<section class="alexa row vestido">
    <div class="row__column-alexa alexa-photo ">
        <div class="vestido_carusel owl-carousel">
            <?php $i=0;
            foreach($fotos_vestidos as $foto_vestido): ?>
                <div style="background-image:url(<?php echo $foto_vestido ?>);" class="vestido-bg">
                    <div class="vestido-holder">
                   
                    <a href="#" class="btn btn-primary open-link" id="open" data-current=<?php echo $i; ?> data-imgurl="<?php echo $foto_vestido ?>" title="Expandir imágen"><i class="fa fa-expand" aria-hidden="true"></i></a>

                    </div>
                </div>


               <?php 
               $i++;
            endforeach; ?>
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


        <a href="https://api.whatsapp.com/send?phone=573104408034" target="_blank"
            class="black-button  black-button--whatsapp black-button--left">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            Contactame
        </a>
        <div class="detail-icons">


            <div class="alexa__icons">
                Compartir
                <a href="http://www.facebook.com/sharer.php?u=http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>&t=<?php echo $vestido[0]->title->rendered; ?>/" target="_blank"><i class="icon icon--facebook--white"></i></a>
                <a href="https://www.instagram.com/alexajilonoficial/" target="_blank"><i class="icon icon--instagram--white"></i></a>
                <a href="http://pinterest.com/pin/create/button/?url=http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>&media=<?php echo $vestido[0]->acf->foto_1->url; ?>&description=<?php echo $vestido[0]->title->rendered; ?>" target="_blank"><i class="icon icon--pinterest--white"></i></a>
            </div>
        </div>


    </div>
</section>
<section>

    <div class="business-line__slider">
        <div class="slider-title slider-title--inspiraciones">
           Más inspiraciones
        </div>
        <div class="business-line-slider__carousel owl-carousel">

            <?php
               
                $json = file_get_contents(sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?_embed&categories=%s',$vestido[0]->categories[0]));
                $posts = json_decode($json);
            ?>
            <?php foreach($posts as $post):?>

            <div>

                <div class="business-line-slider__image">
                    <a href="vestido.php?slug=<?php echo $post->slug; ?>">
                        <img src="<?php echo $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url ?>"
                            alt="<?php echo $post->title->rendered ?>" title="<?php echo $post->title->rendered ?>">
                    </a>
                </div>
                <div class="business-line-slider__title"><?php echo $post->title->rendered ?></div>
                <div class="business-line-slider__price">
                    <?php if($post->acf->precio): ?>
                    $<?php echo number_format($post->acf->precio,0,',',',') ?>
                    <?php endif; ?>
                </div>
                <a href="https://api.whatsapp.com/send?phone=573104408034" target="_blank" class="black-button  black-button--whatsapp black-button--margin-top">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            Contactame
                </a>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>



<div id="popup" style="display: none;">
                        <div class="content-popup">
                            <div class="gal-nav">
                                <a href="" class="gal-prev">
                                    <img src="img/left_03.jpg">
                                </a>
                                <a href="" class="gal-next">
                                    <img src="img/right_03.jpg">
                                </a>
                            </div>
                          
                            <div class="close"><a href="#" id="close">	&#10006;</a></div>
                            <div class="popup-image">
                                <img src="" class="zoomed-image" data-current=0/>
                            </div>
                           
                        </div>
</div>
<div class="popup-overlay"></div>