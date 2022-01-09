<?php
if($_FILES['fileFF']['size'] > 0) {



    $to = "yodamorfius@gmail.com"; // адрес почты получателя
    $from = "name@mail.ru"; // адрес почты отправителя
    $subject = "Письмо от " . $_POST["name"];
    $message = $_POST["text"] . ".Отправлено с почты:" . $_POST["email"];

    $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'])));
    $filename = $_FILES['fileFF']['name'];
    $filetype = $_FILES['fileFF']['type'];

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
    $to = "yodamorfius@gmail.com"; // адрес почты получателя
    $from = "name@mail.ru"; // адрес почты отправителя
    $subject = "Письмо от " . $_POST["name"];
    $message = $_POST["text"] . ".Отправлено с почты:" . $_POST["email"];
    mail($to, $subject, $message);
}
?>

<!DOCTYPE HTML>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Прикрепить файл к email | PHP</title>


<form enctype="multipart/form-data" method="post" id="form">
    <p>Имя</p>
    <input placeholder="Представьтесь" name="name" type="text" >
    <p>Email</p>
    <input placeholder="Укажите почту" name="email" type="text" >
    <p>Сообщение</p>
    <textarea name="text"></textarea>
    <p>Прикрепить файлы</p>
    <input type="file" name="fileFF" multiple id="myfile">
    <p><input value="Отправить" type="submit"></p>
</form>