<?php
//
//$recepient="yodamorfius@gmail.com";
//$sitename = "Армстрой";
//
//$phone = trim($_POST["phone"]);
//$name = $_POST["name"];
//$messages = ;
//
//
//$pagetitle = "Заявка с сайта \"$sitename\"";
//
//if(!empty($phone))
//{
//
//    mail($recepient, $pagetitle, $messages, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
//
//}

$to = "yodamorfius@gmail.com"; // адрес почты получателя
$phone = trim($_POST["phone"]);
$name = $_POST["name"];
$sitename = "Армстрой";
$subject = "Заявка с сайта \"$sitename\"";
$message = "Телефон: $phone, Имя: $name";
if($_FILES['file']['size'] > 0) {

    $attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];

    $boundary = md5(date('r', time())); // рандомное число

    $headers = "From: " . $from . "\r\n"; // см. наиболее часто используемые заголовки
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"_1_$boundary\"";

    $message="
--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message

--_2_$boundary--
--_1_$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment // содержимое является вложенным

$attachment
--_1_$boundary--";

    mail($to, $subject, $message, $headers);

}else{
    mail($to, $subject, $message);
}