<?php
/*
Plugin Name:OKCOM Sendmail Addpost
Plugin URI:https://www.ok-computer.jp
Description:記事を追加した際に、指定の連絡先にメールを送るプラグインです。
Version:1.00
Author:OK COMPUTER
Author URI:https://www.ok-computer.jp
Domain Path: /langwages
Text Domain: okcom-sendmail-addpost
*/

add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu(){
	add_utility_page(
		__('Sendmail Addpost', 'my-custom-admin'),//（必須）メニューが選択されたとき、ページのタイトルタグに表示されるテキスト。
		__('Sendmail Addpost', 'my-custom-admin'),//（必須）メニューとして表示されるテキスト
		'administrator', //（必須） メニューを表示するために必要な権限
		'my-custom-admin', //（必須） メニューのスラッグ名。一意であり、小文字の英数字、ダッシュ、下線のみを含む必要があります
		'my_custom_admin', //（オプション） メニューページを表示する際に実行される関数
		'', //（オプション） メニューのアイコンを示す URL
		
		2 //（オプション） メニューが表示される位置。省略時はメニュー構造の最下部に表示されます。大きい数値ほど下に表示されます。
	);

	add_submenu_page(
		'my-custom-admin', //親メニューのスラッグ名。またはサブメニューを追加する先のトップレベルメニューを実装する標準 WordPress 管理ファイルのファイル名。またはサブメニューを追加する先のカスタムトップレベルメニューを実装するプラグインファイル
		__('Setting', 'my-custom-admin'),//サブメニューが有効化された際にHTMLページタイトルに表示されるテキスト
		__('Setting', 'my-custom-admin'),//サブメニューの管理画面上での名前。
		'manage_options', //ユーザーがこのメニュー表示する際に必要な権限
		'my-submenu', //既存の WordPress メニューの場合、メニューページコンテンツ表示を処理する PHP ファイル。カスタムトップレベルメニューのサブメニューの場合、このサブメニューページの一意の識別子
		'my_submenu' //メニューページのコンテンツを表示する関数
		
	);

}

function my_custom_admin(){
	//プラグイン用のCSSを登録（resister）し、呼び出し（enqueue）
	wp_register_style( 'smaddpost', plugins_url('css/style.css', __FILE__) );
	wp_enqueue_style( 'smaddpost' );
	//plugins_url( $path, $plugin ); 　$plugin パラメータ（第２引数）に __FILE__ PHP マジック定数を渡すと、$path はそのプラグインファイルの親ディレクトリーからの相対パスと見なされます:
?>
	<div class="wrap">
		<h2>okcom sendmail addpost</h2>
	</div>
<?php
}


function my_submenu(){
?>
	<div class="wrap">
		<h2>okcom sendmail addpost</h2>

		<form id="my-submenu-form" method="post" action="">
			<?php wp_nonce_field( 'my-nonce-key', 'my-submenu' ); ?>
		</form>
	</div>
<?php
}