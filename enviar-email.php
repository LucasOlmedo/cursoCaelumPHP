<?php
require_once 'mailer/PHPMailerAutoload.php';

$nome = $_POST['nome'];
$assunto = !empty($_POST['assunto']) ? $_POST['assunto'] : 'Curso PHP Caelum - Nova mensagem';
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

$mailer = new PHPMailer;
$mailer->isSMTP();
$mail->CharSet = 'UTF-8';
$mailer->Host = getenv("CURSO_EMAIL_HOST");
$mailer->SMTPAuth = true;
$mailer->Username = getenv("CURSO_EMAIL_USERNAME");
$mailer->Password = getenv("CURSO_EMAIL_PASSWORD");
$mailer->SMTPSecure = 'tls';
$mailer->Port = getenv("CURSO_EMAIL_PORT");

$mailer->setFrom($email, $nome, true);
$mailer->addAddress(getenv("CURSO_EMAIL_FROM"), getenv("CURSO_EMAIL_FROMNAME"));
$mailer->Subject = $assunto;
$mailer->Body = "<strong>De: </strong>{$nome} - {$email}<br><strong>Mensagem: </strong>{$mensagem}";
$mailer->isHTML(true);

if(!$mailer->send()) {
    header('Location: contato.php?envio=false');
} else {
    header('Location: contato.php?envio=true');
}