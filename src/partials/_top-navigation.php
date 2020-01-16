<?php
$menu_categories_url = sprintf('http://admin.alexajilon.com/wp-json/wp/v2/categories?per_page=50');
$categories = file_get_contents($menu_categories_url);
$categories_all = json_decode($categories);


$foto_menu_url = 'http://admin.alexajilon.com/wp-json/wp/v2/fotomenu/585';
$fotoMenu = file_get_contents($foto_menu_url);
$foto_menu = json_decode($fotoMenu);



$arr= [];
$subcats=[];

$alternate=[];

foreach($categories_all as $category){
  
    if($category->parent ==0 && $category->slug!='sin-categoria' && !isset($category->acf->quitar_del_menu[0]) ){
        $arr[$category->id] =  ['id'=>$category->id, 'name'=>$category->name,'slug'=>$category->slug,'parentid'=>$category->parent];
  
    }
    else if( $category->slug!='sin-categoria') {
        $subcats[$category->parent][] =  ['id'=>$category->id, 'name'=>$category->name,'slug'=>$category->slug,'parentid'=>$category->parent];
        if($category->id == $_GET['id']){
            $parent = $category->parent;
        }
        if($category->parent != $parent && $category->parent !=0 ){
            if(count($alternate) < 1){
                $alternate[] = $category;
            }
        }
    }
}


$menu = "";
foreach($arr as $main){
    $menu.="<ul>";
    $menu.=sprintf("<h4><a href='lineas-alexa-jilon.php?linea=%s&id=%s'>%s</a></h4>",$main['slug'],$main['id'],$main['name']);

    
    foreach($subcats as $key => $subcat){
        if($key == $main['id']){
            foreach($subcat as $innerCat){
                $menu.=sprintf('<li><a href="coleccion.php?colecciones-alexa-jilon=%s&id=%d">%s</a></li>', $innerCat['slug'] , $innerCat['id'],$innerCat['name']);
            }
           
        }
    }
    $menu.="</ul>";
}
?>
<header>
    <a href="/" id="logo-link"><img src="img/logo_alexaJilon.png" alt="Alexa Jilon" class="logo"></a>
<nav>
    <ul class="res-menu">
      
        <li><a href="/alexa-jilon.php">Alexa Jilon </a></li>
        
        <li>
            
            <a href="#" class="dropdown">Show Room </a>
                <ul class="menu-area" id="main-menu">
                        <?php echo $menu; ?>

                        <ul>
                            <li><a href="<?php echo $foto_menu->acf->link; ?>"> <img src="<?php echo $foto_menu->acf->foto->url; ?>"> </a></li>
                        </ul>
                </ul>
        </li>
        <li><a href="/contacto.php">Contacto</a></li>
    </ul>
</nav>
</header>
