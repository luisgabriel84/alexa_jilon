<?php
$url = 'http://www.alexajilon.femega.com/admin/wp-json/wp/v2/pages/572';
$contacto_url = file_get_contents($url);
$contacto = json_decode($contacto_url);


?>
<section class="contact row">
        <div class="row__column-contact contact-photo ">

        
                <?php foreach($contacto->acf as $key =>$foto): ?>
                        <?php if($foto->url): ?>
                            <img src="<?php echo $foto->url; ?>" alt="" class="responsive-img">
                        <?php endif; ?>

                <?php endforeach; ?>
        


       
        </div>
        <div class="row__column-contact contact-form">
            <h3>Contacto</h3>
            Quieres conocer nuestras últimas colecciones y promociones, contáctanos!
            <div class="form">
                <form action="">
                    <div><input type="text" placeholder="Nombres y apellidos"></div>
                    <div><input type="text" placeholder="Celular*"></div>
                    <div><input type="text" placeholder="Correo electrónico*"></div>
                    <div>
                        <select name="" id="">
                            <option value="">Colección</option>
                            <option value="">Colección 1</option>
                            <option value="">Colección 2</option>
                            <option value="">Colección 3</option>
                        </select>
                    </div>
                    <div>
                        <select name="" id="">
                            <option value="">Producto</option>
                            <option value="">Producto 1</option>
                            <option value="">Producto 2</option>
                            <option value="">Producto 3</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="" id="" cols="30" rows="4" placeholder="Mensaje"></textarea>
                    </div>
                    <div>
                        <input type="checkbox"> <label for="">*Acepto y atorizo el tratamiento de datos personales</label>
                    </div>
                    
                    <div class="form__send-button">
                        <input type="submit" value="Enviar" class="black-button black-button--left btn-large">
                    </div>
                  

                </form>
            </div>
        </div>
</section>