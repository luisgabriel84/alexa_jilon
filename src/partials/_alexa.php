<?php 

$url = 'http://www.alexajilon.femega.com/admin/wp-json/wp/v2/pages/52?_embed';
$alexa_url = file_get_contents($url);
$alexa = json_decode($alexa_url);
    
?>
<section class="alexa row">
    <div class="row__column-alexa alexa-photo">
        <img src="<?php echo $alexa->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->full->source_url ?>" alt="" class="responsive-img" id="foto-alexa">
    </div>
    <div class="row__column-alexa alexa-bio">

        <h3 id="alexa_title"><?php echo $alexa->title->rendered; ?></h3>
        <p id="alexa_content">        
        <?php echo $alexa->content->rendered; ?>
        </p>

        <hr/>
        <div class="alexa__icons">
                <a href ="https://www.facebook.com/AlexaJilonOficial/" target="_blank"><i class="icon icon--facebook--white"></i></a>
                <a href="https://www.instagram.com/alexajilonoficial/" target="_blank"><i class="icon icon--instagram--white"></i></a>
                <a href="https://co.pinterest.com/alexajilonoficial/" target="_blank"><i class="icon icon--pinterest--white"></i></a>
        </div>

    </div>
</section>