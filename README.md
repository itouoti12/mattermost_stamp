mattermost_stampの使い方
===

##前提
xamppでapachを起動している。

##使い方
#１．
phpディレクトリごと「C:\xampp\htdocs」配下に格納してください。

#２．
スタンプとして登録させたい画像を「php\phpbotstartup\img」配下に配置してください。
例：hoge.png
※png画像ファイルにしてください。


#３．
mattermostのカスタム絵文字機能で登録させたい画像と同じ名前で絵文字を登録してください。
例：「:hoge:」

#４．
チャット上で以下のコマンドを打ち込んでください。
「?stamp :hoge:」
