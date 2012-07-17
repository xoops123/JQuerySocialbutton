facebookのいいね！等のsocialbuttonをつけるプリロード
バージョン: 1.02   掲載日:  2012/7/17

====================
説明
====================
その名のとおり、facebookの「いいね！」等のソーシャルボタンをつけるプリロードです。

XUGJの掲示板で、domifaraさんが掲載されたものを利用させていただきました。
　http://www.xugj.org/modules/QandA/index.php?topic_id=1999 

ソーシャルボタンの表示をコンテンツ下に変更して、ツィッターのつぶやきやFacebookひとこと掲示板表示も追加した修正版です。


上記掲示板を元に作成した3月15日付けのバージョンでは、モジュールコンテンツの上に表示する設定となっていましたが、今回は、モジュールコンテンツの下に表示して、CSSで表示をコントロールするようにしてみました。
また、プラスアルファの機能として、今見ているページに関する「ツィッターのつぶやき」も表示するようにしています。

解凍してできあがったディレクトリのhtml下にあるcommonディレクトリとpreloadディレクトリをサーバのhtml側にアップロードしてください。以前のバージョンがある場合は、プリロード等を上書きしてください。

なお、このプリロードだけでは、トップページにソーシャルボタンが表示できませんので、下記を参考にして、トップページにカスタムブロックを追加してください。
さらに、Facebookの「ひとこと掲示板」をトップページに表示することも可能となっていますので、よろしければお試ししください。その場合、一番下の行にあるサイトのURLをご自身のページのものに書き換えてください。

data-href="http://xoops123.com" を　data-href="利用するサイトのURL"


=================================
カスタムブロックのサンプル
=================================

●タイトル：ソーシャルボタン（トップページ用） none

●コンテンツ:

<div id="socialbutton_div">
<div class="facebook_like"></div>
<div class="twitter"></div>
<div class="evernote"></div>
<div class="google_plusone"></div>
<div class="gree"></div>
<div class="hatena"></div>
</div>
<div style="clear: both ; height:0px; visibility:hidden;"></div>
<div class="mt-label"></div>
<div class="my-trackbacks">まだ、誰もつぶやいてくれないのだぁ～　淋しいなぁ～</div>
<div style="clear: both ; height:0px; visibility:hidden;"></div>
<div class="fb-comments" data-href="http://xoops123.com" data-num-posts="2" data-width="700"></div>

●タイプ：htmlタグ

====================
履歴
====================
2012.7.17
Facebookのshareボタンが表示されなくなったので、該当部分を削除した。
GitHubに掲載した。

