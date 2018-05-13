<?php
header("Content-Type: application/json; charset=utf-8");

// 受信文字列取得
if($_POST["user_name"] != "slackbot"){

  $usertext   = $_POST['text'];
  $query  = preg_split('/[\s\x{3000}]/u',$usertext,2);
  $q  = $query[1];
  
  $replace = str_replace(':', '', $q);
  $stampname = $str = rtrim($replace);
  
  $url = "http://10.17.25.12:28080/php/phpbotstartup/img/";
  $extension = ".png";
  
  $text = $url.$stampname.$extension;
  $name = 'Stamp';
  $icon = "/static/emoji/1f60e.png";
  
  $payload = array("icon_url" => "$icon", "username" => $name, "text" => $text);

  echo json_encode($payload);
}
?>
