<?php
header("Content-Type: application/json; charset=utf-8");

// 受信文字列取得
if($_POST["user_name"] != "slackbot"){

  $usertext   = $_POST['text'];
  $text = '';
  $query  = preg_split('/[\s\x{3000}]/u',$usertext,4);
  
  if(count($query) == 3){
  
      //登録用スタンプ画像
      $registURL  = $query[1];
      //登録用スタンプ名
      $registName  = $query[2];
  
      //画像格納用情報
      $dir = './img/';
      $extension = ".png";
      $registFileName = $dir.$registName.$extension;
      
      //スタンプ画像をディレクトリに格納
      //URLから画像データを取得
      if($data = @file_get_contents($registURL)){
      
          //取得した画像をディレクトリに保存
          if(@file_put_contents($registFileName,$data)){
          
              //画像生成確認
              $imgSize = filesize($registFileName);
              
              if($imgSize != 0){
                  $text = 'スタンプの登録に成功。カスタム絵文字を登録後、スタンプコマンド + 「:'.$registName.':」で使用できます。';
              } else {
                  unlink($registFileName);
                  $text = 'スタンプの登録に失敗しました。URLを確認してください。';
              }
          } else {
              $text = 'スタンプの登録に失敗しました。管理者に問い合わせてください。';
          }
      } else {
          $text = 'スタンプの登録に失敗しました。URLを確認してください。';
      }
  } else {
      $text = '呼び出し引数に誤りがあります。「?registStamp　画像URL　スタンプ登録名」 で呼び出してください。';
  }
  
  $name = 'Stamp';
  $icon = "/static/emoji/1f60e.png";
  
  $payload = array("icon_url" => "$icon", "username" => $name, "text" => $text);

  echo json_encode($payload);
}
?>
