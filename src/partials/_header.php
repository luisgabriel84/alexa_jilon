<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
    <link rel="dns-prefetch" href="https://code.jquery.com" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <script src="js/scripts.js"></script>
    <script src="https://use.fontawesome.com/8ab6df355f.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>


   

    <?php  $file =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>

    <?php if($file=="vestido.php" ): 
        $vestido_slug = $_GET['slug'];
        $vestido_url = sprintf('http://www.alexajilon.femega.com/admin/wp-json/wp/v2/posts?_embed&slug=%s',$vestido_slug);
        $json_vestido = file_get_contents($vestido_url);
        $vestido = json_decode($json_vestido);    
        
    ?>
    <meta property="og:image" content="<?php echo $vestido[0]->acf->foto_1->url; ?>" />
    <meta property="og:title" content="<?php echo $vestido[0]->title->rendered; ?>" />
    <title><?php echo $vestido[0]->title->rendered; ?></title>


    <?php else:  ?>
        <title>Alexa Jilon</title>
    <?php endif; ?>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
    <div class="container">