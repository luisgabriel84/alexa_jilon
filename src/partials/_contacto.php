<?php
$url = 'http://admin.alexajilon.com/wp-json/wp/v2/pages/572';
$contacto_url = file_get_contents($url);
$contacto = json_decode($contacto_url);


?>
<section class="contact row">
        <div class="row__column-contact contact-photo">

        <div class="contact-carousel owl-carousel">
                <?php foreach($contacto->acf as $key =>$foto): ?>
                        <?php if($foto->url): ?>
                            <img src="<?php echo $foto->url; ?>" alt="Show Room Alexa Jilon" title="Show Room Alexa Jilon" class="showroom-img-item">
                        <?php endif; ?>

                <?php endforeach; ?>
        
        </div>
       
        </div>
        <div class="row__column-contact contact-form">
            <h3>Contacto</h3>
            Quieres conocer nuestras últimas colecciones y promociones, contáctanos!
            <div class="form">
                <form action="contacto.php" id="contact-form">
                    <div><input type="text" placeholder="Nombres y apellidos" required name="nombres" id="full-name"></div>
                    <div><input type="text" placeholder="Celular*" name="celular" id="celular"></div>
                    <div><input type="email" placeholder="Correo electrónico*" class="required" name="correo" id="correo"></div>
                    <div>
                        <select name="coleccion" id="sel_coleccion" required name="coleccion">
                        <option value="">Seleccione la línea</option>
                            <?php foreach($arr as $coleccion): ?>
                            <option value="<?php echo $coleccion['id'] ?>"><?php echo $coleccion['name'] ?></option>
                            <?php endforeach ?>
                            
                        </select>
                    </div>
                    <div>
                        <select name="producto" id="sel_producto" name="producto">
                        <option value="">Producto</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="mensaje" id="mensaje" cols="30" rows="4" placeholder="Mensaje" required></textarea>
                    </div>
                    <div>
                        <input type="checkbox" id="politicas_tratamiento"> <label for="">*Acepto y atorizo el tratamiento de datos personales</label>
                    </div>
                    
                    <div class="form__send-button">
                        <input type="submit" value="Enviar" id="send-contact" class="black-button black-button--left btn-large">
                    </div>
                  

                </form>
            </div>
        </div>
</section>