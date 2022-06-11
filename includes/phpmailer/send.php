<?php
//#####Скрипт отправки доступов в аккаунт на почту#####


// Файлы phpmailer
require dirname(__FILE__) . '/PHPMailer.php';
require dirname(__FILE__) . '/SMTP.php';
require dirname(__FILE__) . '/Exception.php';


// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function ($str, $level) {$GLOBALS['status'][] = $str;};

    //log: numerologist-pro
    //pass: Kas23d3_hed

    // Настройки вашей почты
    $mail->Host = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username = ''; // Логин на почте
    $mail->Password = ''; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('', ''); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress("$userEmail");
    //$mail->addAddress('youremail@gmail.com'); // Ещё один, если нужен

    // Прикрипление файлов к письму
    if (!empty($file['name'][0])) {
        for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
            $filename = $file['name'][$ct];
            if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
                $mail->addAttachment($uploadfile, $filename);
                $rfile[] = "Файл $filename прикреплён";
            } else {
                $rfile[] = "Не удалось прикрепить файл $filename";
            }
        }
    }
// Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;

// Проверяем отравленность сообщения
    if ($mail->send()) {$result = "success";} else { $result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
//#####-----#####
?>
