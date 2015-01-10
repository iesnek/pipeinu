<?php

////////// 初期設定 //////////

// メインカラムの幅を指定
if ( ! isset( $content_width ) ) $content_width = 660;

// <head>内に RSSフィードのリンクを表示
add_theme_support( 'automatic-feed-links' );

// アイキャッチ画像を有効化する
add_theme_support( 'post-thumbnails' );

// アイキャッチ画像のサイズ追加
add_image_size( 'small', 330, 220, false );

// 抜粋文の末尾の文字を変更[...]→...
function new_excerpt_more($more){
  return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );



////////// 最初の</p>のあとに広告を表示 //////////

add_filter('the_content', 'cntAd');
function cntAd($content){
  $ad = '<div class="m-ad"><p>Sponsords Link</p><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- レクタングル（中） --><ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-1514095329243590" data-ad-slot="6455402662"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script></div>';
  $count = 0;

  if(is_single() && !is_singular('dogs')){
    $arrayCnts = preg_split('/<\/p>/', $content, -1, PREG_SPLIT_NO_EMPTY);
    foreach( $arrayCnts as $arrayCnt ){
      $count++;
      if($count == 1){
      $arrayCntAd[] = $arrayCnt.'</p>'.$ad;
      } else {
        $arrayCntAd[] = $arrayCnt.'</p>';
      }
    }
    $content = implode("", $arrayCntAd);
  }
  return $content;
}


////////// カスタム投稿タイプ-いろいろな犬種 //////////

add_action( 'init', 'register_cpt_dogs' );

function register_cpt_dogs() {

  $labels = array( 
    'menu_name'          => _x( 'いろいろな犬種', 'dogs' ),    //サイドメニューのラベル
    'all_items'          => _x( '犬種一覧', 'dogs' ),        //サイドメニューの一覧ラベル
    'add_new'            => _x( '新規追加', 'dogs' ),        //サイドメニューの新規ラベル
    'name'               => _x( 'いろいろな犬種', 'dogs' ),    //いろいろな犬種画面のタイトル
    'singular_name'      => _x( 'いろいろな犬種', 'dogs' ),    //よくわからん
    'add_new_item'       => _x( '新しい犬種を追加', 'dogs' ),  //新規追加ページのタイトル
    'edit_item'          => _x( '犬種を編集', 'dogs' ),       //編集ページのタイトル
    'new_item'           => _x( '新しい犬種', 'dogs' ),       //よくわからん
    'search_items'       => _x( '犬種を検索', 'dogs' ),       //検索する時
    'not_found'          => _x( '見つかりませんでした', 'dogs' ), //投稿が無い時
    'not_found_in_trash' => _x( '見つかりませんでした', 'dogs' ), //ゴミ箱にも投稿が無い時
    'parent_item_colon'  => _x( '親犬種', 'dogs' ),
  );

  $args = array( 
    'labels'       => $labels,
    'hierarchical' => false,  //階層ありならtrue（固定ページぽく） or 階層無しならfalse（投稿ぽく）

    'supports' => array( 'title', 'editor', 'thumbnail' ),

    'public'       => true,
    'show_ui'      => true,
    'show_in_menu' => true,


    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => true,  //アーカイブするかどうか
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => true,
    'capability_type'     => 'post'
  );

  register_post_type( 'dogs', $args );
}

//カスタム投稿タイプのアイコン変更
//https://developer.wordpress.org/resource/dashicons/　からアイコン選ぶ
function dogs_icons_styles(){
   echo '<style>
    #adminmenu #menu-posts-dogs div.wp-menu-image:before {
      content: "\f511";
    }
   </style>';
}
add_action( 'admin_head', 'dogs_icons_styles' );


////////// カスタムフィールド-いろいろな犬種 //////////

///// カスタムフィールドを追加
function add_dogs_field() {  //メタボックスのID,メタボックス名,メタボックスの関数名,表示する場所
  add_meta_box('dogs_subtitle', 'サブタイトル（必須）', 'dogs_subtitle_form', 'dogs');
  add_meta_box('dogs_note', '気を付けること', 'dogs_note_form', 'dogs');
  add_meta_box('dogs_status', '特徴', 'dogs_status_form', 'dogs');
}
add_action('add_meta_boxes', 'add_dogs_field');

//第3パラメータで指定した関数の作成
function dogs_subtitle_form() {  //「サブタイトル」メタボックスに表示する内容
  global $post;  //編集中の記事に関するデータを保存
  wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');  //CSRF対策の設定（フォームにhiddenフィールドとして追加するためのnonceを「'my_nonce」として設定）
?>
  <p><input type="text" name="subtitle" value="<?php echo esc_html(get_post_meta($post->ID, 'subtitle', true)); ?>" style="width:100%" /></p>
<?php
}

function dogs_note_form() {  //「気を付けること」メタボックスに表示する内容
  global $post;  //編集中の記事に関するデータを保存
  wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce');  //CSRF対策の設定（フォームにhiddenフィールドとして追加するためのnonceを「'my_nonce」として設定）
?>
  <p><label>気を付けることタイトル<br><input type="text" name="note_title" value="<?php echo esc_html(get_post_meta($post->ID, 'note_title', true)); ?>" style="width:100%" /></label></p>
  <p><label>気を付けること本文<br><textarea name="note" rows="3" style="width:100%;"><?php echo get_post_meta($post->ID, 'note', true); ?></textarea></label></p>
<?php
}

function dogs_status_form(){  //「特徴」メタボックスに表示する内容
  $id = get_the_ID();  //カスタムフィールドの値を取得
  $friendly = get_post_meta($id,'friendly',true);  //セレクトボックスの値を配列に挿入
  $smart = get_post_meta($id,'smart',true);  //セレクトボックスの値を配列に挿入
  $wc = get_post_meta($id,'wc',true);  //セレクトボックスの値を配列に挿入
  $bark = get_post_meta($id,'bark',true);  //セレクトボックスの値を配列に挿入
  $attack = get_post_meta($id,'attack',true);  //セレクトボックスの値を配列に挿入
  $data = array(  //例：array('表示','value','selected')
    array("選択してください","",""),
    array("★☆☆☆☆","★☆☆☆☆",""),
    array("★★☆☆☆","★★☆☆☆",""),
    array("★★★☆☆","★★★☆☆",""),
    array("★★★★☆","★★★★☆",""),
    array("★★★★★","★★★★★","")
  );

  echo '<p><label>人なつこさ　　 ： <select name="friendly">';
  foreach($data as $d){  //セレクトボックスの作成:配列をforeachでまわす
    if($d[1]==$friendly) $d[2] ="selected";
    echo '<option value="', $d[1], '"', $d[2], '>', $d[0];
  }
  echo '</select></label></p>';

  echo '<p><label>かしこさ　　　 ： <select name="smart">';
  foreach($data as $d){  //セレクトボックスの作成:配列をforeachでまわす
    if($d[1]==$smart) $d[2] ="selected";
    echo '<option value="', $d[1], '"', $d[2], '>', $d[0];
  }
  echo '</select></label></p>';

  echo '<p><label>トイレのしつけ ： <select name="wc">';
  foreach($data as $d){  //セレクトボックスの作成:配列をforeachでまわす
    if($d[1]==$wc) $d[2] ="selected";
    echo '<option value="', $d[1], '"', $d[2], '>', $d[0];
  }
  echo '</select></label></p>';

  echo '<p><label>無駄吠え　　　 ： <select name="bark">';
  foreach($data as $d){  //セレクトボックスの作成:配列をforeachでまわす
    if($d[1]==$bark) $d[2] ="selected";
    echo '<option value="', $d[1], '"', $d[2], '>', $d[0];
  }
  echo '</select></label></p>';

  echo '<p><label>攻撃性　　　　 ： <select name="attack">';
  foreach($data as $d){  //セレクトボックスの作成:配列をforeachでまわす
    if($d[1]==$attack) $d[2] ="selected";
    echo '<option value="', $d[1], '"', $d[2], '>', $d[0];
  }
  echo '</select></label></p>';

}

///// カスタムフィールドの値を保存
function dogs_customfields_save($post_id) {
  global $post;  //編集中の記事に関するデータを保存
  $my_nonce = isset($_POST['my_nonce']) ? $_POST['my_nonce'] : null;  //設定したnonce を取得（CSRF対策）
  if(!wp_verify_nonce($my_nonce, wp_create_nonce(__FILE__))) {  //nonce を確認し、値が書き換えられていれば、何もしない（CSRF対策）
    return $post_id;
  }
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
  //自動保存ルーチンかどうかチェック。そうだった場合は何もしない（記事の自動保存処理として呼び出された場合の対策）
  if(!current_user_can('edit_post', $post->ID)) { return $post_id; }
  //ユーザーが編集権限を持っていない場合は何もしない。
  if($_POST['post_type'] == 'dogs'){  //'dogs' 投稿タイプの場合のみ実行  
  //入力フィールドに入力された情報を保存＆更新するように指定
    update_post_meta($post->ID, 'subtitle', $_POST['subtitle']);

    update_post_meta($post->ID, 'note_title', $_POST['note_title']);
    update_post_meta($post->ID, 'note', $_POST['note']);

    update_post_meta($post->ID, 'friendly', $_POST['friendly']);
    update_post_meta($post->ID, 'smart', $_POST['smart']);
    update_post_meta($post->ID, 'wc', $_POST['wc']);
    update_post_meta($post->ID, 'bark', $_POST['bark']);
    update_post_meta($post->ID, 'attack', $_POST['attack']);
  }
}
add_action('save_post', 'dogs_customfields_save');


/////カスタムフィールドを投稿より上に表示(admin-script.js必須)
function dogs_enqueue_scripts() {
  wp_enqueue_script('my-admin-script', get_bloginfo('template_directory').'/js/admin-script.js', array('jquery'), false, true);
  echo '<style> #dogs_subtitle { margin-top: 20px; } </style>';
}
add_action('admin_enqueue_scripts', 'dogs_enqueue_scripts');


////////// カスタム投稿タイプ-動画紹介 //////////

add_action( 'init', 'register_cpt_mov' );

function register_cpt_mov() {

  $labels = array( 
    'menu_name'          => _x( '動画紹介記事', 'mov' ),    //サイドメニューのラベル
    'all_items'          => _x( '動画紹介記事一覧', 'mov' ),        //サイドメニューの一覧ラベル
    'add_new'            => _x( '新規追加', 'mov' ),        //サイドメニューの新規ラベル
    'name'               => _x( '動画紹介', 'mov' ),    //動画紹介画面のタイトル
    'singular_name'      => _x( '動画紹介', 'mov' ),    //よくわからん
    'add_new_item'       => _x( '新しい記事を追加', 'mov' ),  //新規追加ページのタイトル
    'edit_item'          => _x( '記事を編集', 'mov' ),       //編集ページのタイトル
    'new_item'           => _x( '新しい記事', 'mov' ),       //よくわからん
    'search_items'       => _x( '動画紹介記事を検索', 'mov' ),       //検索する時
    'not_found'          => _x( '見つかりませんでした', 'mov' ), //投稿が無い時
    'not_found_in_trash' => _x( '見つかりませんでした', 'mov' ), //ゴミ箱にも投稿が無い時
    'parent_item_colon'  => _x( '親記事', 'mov' ),
  );

  $args = array( 
    'labels'       => $labels,
    'hierarchical' => false,  //階層ありならtrue（固定ページぽく） or 階層無しならfalse（投稿ぽく）

    'supports' => array( 'title', 'thumbnail' ),

    'public'       => true,
    'show_ui'      => true,
    'show_in_menu' => true,


    'show_in_nav_menus'   => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'has_archive'         => true,  //アーカイブするかどうか
    'query_var'           => true,
    'can_export'          => true,
    'rewrite'             => true,
    'capability_type'     => 'post'
  );

  register_post_type( 'mov', $args );
}

//カスタム投稿タイプのアイコン変更
//https://developer.wordpress.org/resource/dashicons/　からアイコン選ぶ
function mov_icons_styles(){
   echo '<style>
    #adminmenu #menu-posts-mov div.wp-menu-image:before {
      content: "\f126";
    }
   </style>';
}
add_action( 'admin_head', 'mov_icons_styles' );





?>