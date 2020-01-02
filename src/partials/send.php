<?php
    if( empty($_POST['email']) ){
        $response['message']= "Por favor corregir los campos vacios";
        $response['error'] = 1;
        echo json_encode($response);
        exit;
    }

    require('PHPMailer/PHPMailerAutoload.php');

    if( insertUser($_POST['email'])){

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
                $mail->setFrom('suscripcionalexajilon@gmail.com', 'Alexa Jilon');
                //$mail->addAddress('prueba-alexa@mailinator.com', 'User');   
                $mail->addAddress('suscripcionalexajilon@gmail.com', 'User'); 
                $mail->addAddress('consultor@femega.com', 'User');   
                

                $mail->CharSet = 'UTF-8';

                // Attachments
            
                // Content
                $mail->isHTML(true);    
                // Set email format to HTML
                $mail->Subject = 'Nuevo subscriptor Alexa Jilon';
                $mail->Body = sprintf('<table border="1" cellspacing="0" cellpadding="6">
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>%s</td>
                    </tr>


                </table>',
                    strip_tags($_POST['email'])
                );

            
                $mail->send();

                $response['message']= 'El mensaje fue enviado';
                $response['error'] = 0;
            } catch (Exception $e) {
                $response['message']= "El mensaje no pudo ser enviado: {$mail->ErrorInfo}";
                $response['error'] = 1;
            }
            echo json_encode($response);
    }else{
        $response['message']= 'Cuenta de correo ya ha sido registrada';
        $response['error'] = 1;
        echo json_encode($response);
    }

    function insertUser($email ){

        $servername = "mysql.femega.com";
        $username = "alexajilon";
        $password = "4l3x4Jil0n";
        $dbname = "alexajilonwordpress";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
    
        $emailAddress = strip_tags($email);
        $findSQL = sprintf("SELECT user_email FROM wp_users WHERE user_email ='%s'",$emailAddress);
        
        $result= $conn->query($findSQL);
    
        if ($result->num_rows > 0){
         
            return false;
        }
        $date = date( "Y-m-d H:i:s");
    
        $sql = "INSERT INTO wp_users (user_login, user_email, user_nicename,user_registered , user_status)
        VALUES ('$emailAddress', '$emailAddress','Subscriptor','$date', 0)";
    
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
           return false;
        }
    
        $conn->close();
        return true;
    
     }


    
     
?>