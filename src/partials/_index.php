<?php

$slider_url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/homeslider');
$json_slider = file_get_contents($slider_url);
$slider_images = json_decode($json_slider);

?>

<div class="home-slider owl-carousel" ">
    <?php foreach($slider_images as $image): ?>
    <div class="collection-item" style="background-image:url(<?php echo $image->acf->banner->url ?>)">
        <img src="<?php echo $image->acf->banner->url ?>" alt="">
        <div class="collection-item__label">

        <?php if($image->acf->label):  ?>
            <div class="collection-item__smalltext"><?php echo $image->acf->label ?></div>
        <?php endif; ?>

        <h3><?php echo $image->title->rendered ?></h3>
        <?php if($image->acf->link):  ?>
            <a href="<?php echo $image->acf->link?>" class="black-button">Conócela</a>
        <?php endif; ?>
        </div>
    
    </div>
    <?php endforeach; ?>

</div>
<div id="home-main-content">
    
<?php 
$json = file_get_contents('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?parent=0');
$obj = json_decode($json);

?>

<?php foreach($obj as $category):?>

    <?php if($category->slug != "sin-categoria"): ?>
    <div class="row row--index">
    <div class="row__column-index cover" style="background-image:url(<?php echo $category->acf->foto_de_la_linea->url ?>)">

        <div class="cover__header">

            <div class="cover__logo">
                <img src="<?php echo $category->acf->logo->url ?>" alt="" class="img-responsive" alt="Alexa Jilon" title="Alexa Jilon">
            </div>
            <div class="cover__title">
                <div class="cover__title__first-line"><?php echo $category->name  ?> </div>
                <div class="cover__title__second-line"></div>

            </div>

        </div>

        <div class="info-box">
            <div class="text-wrapper">

           
            <?php echo $category->description  ?>
            <?php if(!isset($category->acf->ocultar_boton[0])): ?>
                <a href="lineas-alexa-jilon.php?linea=<?php echo $category->slug  ?>&id=<?php echo $category->id ?>" class="black-button black-button--colections " alt="Colecciones <?php echo  $category->name ?>" title="Colecciones <?php echo  $category->name ?>">Colecciones</a>
            <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="row__column-index">

        <div class="mini-slider">
            <h4>Promoción del mes</h4>


            <div class="mini-slider__carousel owl-carousel">

               <?php
              
               $json = file_get_contents(sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/categories?parent=%d',$category->id));
               $obj = json_decode($json);
               $cats =[];
               foreach($obj as $cat){
                $cats[] =$cat->id;
               }
               $strCat = implode (",", $cats);
               $json = file_get_contents(sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?_embed&categories=%s',$strCat));
               $posts = json_decode($json);
           
            
               
               ?>
                <?php foreach($posts as $post):?>
                    <div>
                        <div class="mini-slider__title"><?php echo $post->title->rendered ?></div>
                        <div class="mini-slider__image"> 
                            <a href="vestido.php?slug=<?php echo $post->slug; ?>"> <img src="<?php echo $post->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->medium->source_url ?>" alt="<?php echo $post->title->rendered ?>" title="<?php echo $post->title->rendered ?>"></a>
                        </div>
                        <div class="mini-slider__price">
                        <?php if($post->acf->precio): ?>
                            $<?php echo number_format($post->acf->precio,0,',',',') ?>
                        <?php endif; ?>
                        </div>
                        <div class="mini-slider__label">¿Lo quieres para tí?</div>
                        <a href="https://api.whatsapp.com/send?phone=573104408034" target="_blank" class="black-button  black-button--whatsapp">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            Contactame</a>
                    </div>
            <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>
    <?php endif; ?>

<?php endforeach; ?>

</div>


<div class="slider-instagram">
    <div class="slider-instagram__title">
        <h5>Instagram</h5>
    </div>
    @alexajilonoficial
    <div class="slider-instagram__carousel owl-carousel">
        <div class="instagram-thumb"><img src="img/vestido-azul_07.jpg" alt="">Conjunto en #seda</div>
        <div class="instagram-thumb"><a href="#"> <img src="img/seda_11.jpg" alt=""></a>#Noche Estelar</div>
        <div class="instagram-thumb"> <a href="#"> <img src="img/vestido-belle_07.jpg" alt=""></a>Vestido Belle Rose
        </div>
        <div class="instagram-thumb"><a href="#"> <img src="img/seda_11.jpg" alt=""></a>#Noche Estelar</div>
        <div class="instagram-thumb"><a href="#"> <img src="img/vestido-azul_07.jpg" alt=""></a>Conjunto en #seda</div>
        <div class="instagram-thumb"><a href="#"> <img src="img/seda_11.jpg" alt=""></a>Conjunto en #seda</div>
        <div class="instagram-thumb"> <a href="#"> <img src="img/vestido-belle_07.jpg" alt=""></a>Conjunto en #seda
        </div>
        <div class="instagram-thumb"><a href="#"> <img src="img/seda_11.jpg" alt=""></a>#Noche Estelar</div>
    </div>
</div>