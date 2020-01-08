<?php 

$coleccion = $_GET['colecciones-alexa-jilon'];
$id =  $_GET['id'];
$linea =  $_GET['linea'];


$url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?slug=%s',$coleccion);
$json = file_get_contents($url);
$coleccion_json = json_decode($json);


$parent = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories/%d',$coleccion_json[0]->parent);
$parent_json = file_get_contents($parent);
$parent = json_decode($parent_json);


$vestidos_url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?_embed&categories=%d',$id);
$json_vestidos = file_get_contents($vestidos_url);
$vestidos = json_decode($json_vestidos);

$colecciones_url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?parent=%s',$coleccion_json[0]->parent);
$json_colecciones = file_get_contents($colecciones_url);
$colecciones = json_decode($json_colecciones);


?>


<section>
    <figure>
        <div class="detail-page__top-banner" style="background: url(<?php echo $parent->acf->banner->url ?>);"> 
            <img src="<?php echo $parent->acf->banner->url ?>" alt="" class="responsive-img">
        </div>
    </figure>
</section>
<section>

    <div class="business-line__content">
        <div class="business-line__breadcrumbs">
            <a href="/">Inicio</a> |
            <a href="lineas-alexa-jilon.php?linea=<?php echo $parent->slug ?>&id=<?php echo $parent->id ?>">Linea
                <?php echo $parent->name ?> </a> |
            <?php echo $coleccion_json[0]->name ?>
        </div>

        <div class="business-line__headers business-line__headers--flex">

            <div class="headers-left">
                <div class="business-line__headers business-line__headers--small">

                    ALEXA JILON
                </div>
                <div class="business-line__headers business-line__headers--large">
                    <?php echo $coleccion_json[0]->name ?>
                </div>
            </div>
            <div class="headers-right">
                Colección
                <select name="" id="selection-changer" onchange="if (this.value) window.location.href=this.value">
                    <option value="">Seleccione la colección</option>
                    <?php foreach($colecciones as $coleccion): ?>
                    <option
                        value="/coleccion.php?colecciones-alexa-jilon=<?php echo $coleccion->slug?>&id=<?php echo $coleccion->id ?>">
                        <?php echo $coleccion->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>


        <section>

            <div class="business-line__slider business-line__slider--white">

             

                    <?php foreach($vestidos as $vestido): ?>

                    <div class="carrousel-item">

                        <div class="business-line-slider__image collection-image">
                            <a href="vestido.php?slug=<?php echo $vestido->slug ?>">
                                <img src="<?php echo $vestido->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url ?>"
                                    alt="">
                            </a>
                        </div>
                        <div class="business-line-slider__title"><?php echo $vestido->title->rendered ?></div>
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
        </section>
        <div class="clear"></div>
        <section>
            <div class="business-line__collections">

                <?php foreach($colecciones as $coleccion): 
                    $cats[] =$coleccion->id;
            
                ?>
                <div class="business-line__collection">
                    <a href="coleccion.php?colecciones-alexa-jilon=<?php echo $coleccion->slug ?>&id=<?php echo $coleccion->id ?> ">
                        <img src="<?php echo $coleccion->acf->banner_de_coleccion->url ?>"
                            alt="<?php echo $coleccion->name ?>" title="<?php echo $coleccion->name ?>"
                            class="responsive-img">
                    </a>

                </div>
                <?php endforeach; ?>



            </div>
        </section>
    </div>
</section>



