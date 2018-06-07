<?php
header("Content-Type: application/json; charset=utf-8");

// 受信文字列取得
if($_POST["user_name"] != "slackbot"){

  $usertext   = $_POST['text'];
  $query  = preg_split('/[\s\x{3000}]/u',$usertext,3);
  
  if(count($query) == 2){
      $q  = $query[1];
      
      $replace = str_replace(':', '', $q);
      $stampname = $str = rtrim($replace);
      
      $url = "http://XX.XX.XX.XX:28080/php/phpbotstartup/img/";
      $extension = ".png";
      
      $fileName = "./img/".$stampname.$extension;
      if (file_exists($fileName)){
          $text = $url.$stampname.$extension;
      } else {
          $text = '呼び出されたスタンプが登録されていません。';
      }
  } else {
      $text = '呼び出し引数に誤りがあります。「?stamp　スタンプ登録名」 で呼び出してください。';
  }
  
  $name = 'Stamp';
  $icon = "/static/emoji/1f60e.png";
  
  $payload = array("icon_url" => "$icon", "username" => $name, "text" => $text);

  echo json_encode($payload);
}
?>
