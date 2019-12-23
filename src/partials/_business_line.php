<?php 

$linea_slug = $_GET['linea'];
$id =  $_GET['id'];

$url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?slug=%s',$linea_slug);
$json = file_get_contents($url);
$linea = json_decode($json);

$colecciones_url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?parent=%s',$id);
$json_colecciones = file_get_contents($colecciones_url);
$colecciones = json_decode($json_colecciones);
?>

<section>
    <figure>
        <div class="business-line__top-banner" style="background: url(<?php echo $linea[0]->acf->banner->url ?>);">
            <img src="<?php echo $linea[0]->acf->banner->url ?>" alt="" class="responsive-img">
        </div>
    </figure>

</section>

<section>

    <div class="business-line__content">
        <div class="business-line__breadcrumbs">
            <a href="/">Inicio</a> |
            <?php echo $linea[0]->name ?>
        </div>

        <div class="business-line__headers">
            <div class="business-line__headers business-line__headers--small">

                ALEXA JILON
            </div>
            <div class="business-line__headers business-line__headers--large">
                <?php echo $linea[0]->name ?>
            </div>
        </div>

        <div class="business-line__collections">
            <?php foreach($colecciones as $coleccion): 
                    $cats[] =$coleccion->id;
            
                ?>
            <div class="business-line__collection">
                <a
                    href="coleccion.php?colecciones-alexa-jilon=<?php echo $coleccion->slug ?>&id=<?php echo $coleccion->id ?>&linea=<?php echo $linea_slug ?>">
                    <img src="<?php echo $coleccion->acf->banner_de_coleccion->url ?>"
                        alt="<?php echo $coleccion->name ?>" title="<?php echo $coleccion->name ?>"
                        class="responsive-img">
                </a>
            </div>
            <?php endforeach;
            
           
            $strCat = implode (",", $cats);
            $json = file_get_contents(sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?_embed&categories=%s',$strCat));
            $posts = json_decode($json);
            ?>

        </div>

    </div>


</section>

<section>

    <div class="business-line__slider">
        <div class="slider-title slider-title--inspiraciones">
            Conoce más de nuestra Inspiración <?php echo $linea[0]->name ?>
        </div>
        <div class="business-line-slider__carousel owl-carousel">


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
                <a href="https://api.whatsapp.com/send?phone=573104408034" class="black-button  black-button--whatsapp black-button--margin-top">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            Contactame
                </a>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>