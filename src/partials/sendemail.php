<?php


require('PHPMailer/PHPMailerAutoload.php');


        $mail = new PHPMailer(true);
        try {

            
            $mail->SMTPDebug = 0;                                    
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';  
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'suscripcionalexajilon@gmail.com';             
            $mail->Password   = 'femega2020';                               
            $mail->SMTPSecure = 'ssl';                             
            $mail->Port       =  465;
            $mail->From = 'suscripcionalexajilon@gmail.com';
            $mail->FromName = "Alexa Jilon";                          
        
            //Recipients
            //$mail->setFrom('suscripcionalexajilon@gmail.com', 'Alexa Jilon');
            $mail->addAddress('prueba-alexa@mailinator.com', 'User');   
            //$mail->addAddress('suscripcionalexajilon@gmail.com', 'User'); 
            //$mail->addAddress('consultor@femega.com', 'User');   
            

            $mail->CharSet = 'UTF-8';

            // Attachments
        
            // Content
            $mail->isHTML(true);    
            // Set email format to HTML
            $mail->Subject = 'Nuevo correo desde sitio Alexa Jilon';
            $mail->Body = sprintf('<table border="1" cellspacing="0" cellpadding="6">
                <tr>
                    <td><strong>Nombres</strong></td>
                    <td>%s</td>
                </tr>
                <tr>
                    <td><strong>Celular</strong></td>
                    <td>%s</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>%s</td>
                </tr>
                <tr>
                    <td><strong>Linea</strong></td>
                    <td>%s</td>
                </tr>
                <tr>
                    <td><strong>Producto</strong></td>
                    <td>%s</td>
                </tr>
                <tr>
                <td><strong>Mensaje</strong></td>
                <td>%s</td>
            </tr>

            </table>',
                strip_tags($_POST['nombres']),
                strip_tags($_POST['celular']),
                strip_tags($_POST['email']),
                strip_tags($_POST['linea']),
                strip_tags($_POST['producto']),
                strip_tags($_POST['mensaje'])
            );
            $mail->send();

            $response['message']= 'El mensaje fue enviado';
            $response['error'] = 0;
        } catch (Exception $e) {
            $response['message']= "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
            $response['error'] = 1;
        }
        echo json_encode($response);



?>