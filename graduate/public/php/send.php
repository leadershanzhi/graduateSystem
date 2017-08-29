<?php
require_once("class.phpmailer.php");
require_once("class.smtp.php");
$m=$_REQUEST['mail'];
$id=$_REQUEST['id'];
$pw=$_REQUEST['pw'];
$mail = new PHPMailer(true); //实例化PHPMailer类,true表示出现错误时抛出异常
$mail->IsSMTP(); // 使用SMTP

  $mail->CharSet ="UTF-8";//设定邮件编码
  $mail->Host       = "smtp.163.com"; // SMTP server
  $mail->SMTPDebug  = 1;// 启用SMTP调试 1 = errors  2 =  messages
  $mail->SMTPAuth   = true;// 服务器需要验证
  $mail->Port       = 25;//默认端口   
  $mail->Username   = "leadershanzhi1@163.com"; //SMTP服务器的用户帐号
  $mail->Password   = "shanzhi526";//SMTP服务器的用户密码
  $mail->AddReplyTo('leadershanzhi1@163.com', '回复'); //收件人回复时回复到此邮箱
$mail->AddAddress($m, '用户'.$id); //收件人如果多人发送循环执行AddAddress()方法即可 还有一个方法时清除收件人邮箱ClearAddresses()
$mail->SetFrom('leadershanzhi1@163.com', '高校推免指定邮箱: leadershanzhi1@163.com');//发件人的邮箱
$mail->Subject = '高校推免管理系统-用户找回密码';
$mail->Body = '为了安全起见,系统已为你初始化密码为：'.$pw.',你可以登录成功后修改此密码！';
$mail->IsHTML(true);
  $mail->Send();
  header("location:/login/login");
?>