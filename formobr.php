<?php
if($_FILES['fileFF']['size'] > 0) {



    $to = "yodamorfius@gmail.com"; // ����� ����� ����������
    $from = "name@mail.ru"; // ����� ����� �����������
    $subject = "������ �� " . $_POST["name"];
    $message = $_POST["text"] . ".���������� � �����:" . $_POST["email"];

    $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'])));
    $filename = $_FILES['fileFF']['name'];
    $filetype = $_FILES['fileFF']['type'];

    $boundary = md5(date('r', time())); // ��������� �����

    $headers = "From: " . $from . "\r\n"; // ��. �������� ����� ������������ ���������
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
Content-Disposition: attachment // ���������� �������� ���������

$attachment
--_1_$boundary--";

    mail($to, $subject, $message, $headers);

}else{
    $to = "yodamorfius@gmail.com"; // ����� ����� ����������
    $from = "name@mail.ru"; // ����� ����� �����������
    $subject = "������ �� " . $_POST["name"];
    $message = $_POST["text"] . ".���������� � �����:" . $_POST["email"];
    mail($to, $subject, $message);
}
?>

<!DOCTYPE HTML>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>���������� ���� � email | PHP</title>


<form enctype="multipart/form-data" method="post" id="form">
    <p>���</p>
    <input placeholder="�������������" name="name" type="text" >
    <p>Email</p>
    <input placeholder="������� �����" name="email" type="text" >
    <p>���������</p>
    <textarea name="text"></textarea>
    <p>���������� �����</p>
    <input type="file" name="fileFF" multiple id="myfile">
    <p><input value="���������" type="submit"></p>
</form>