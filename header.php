<!DOCTYPE html>
<html lang="ja">

<?php  //OGPの設定
  $type = "website";
  if ( is_home() ) {
    $title = get_bloginfo('name');
    $dsc = get_bloginfo('description');
    $url = get_bloginfo('url');
  } elseif ( is_single() || is_page() ) {
    $type = "article";
    $title = get_the_title() . " | " . get_bloginfo('name');
    $dsc = get_post_meta($post->ID, _aioseop_description, true);  //抜粋の文字数120文字
    if( $dsc == NULL ) {
      $dsc = strip_tags($post->post_content);
      $dsc = ereg_replace("(\r\n|\r|\n| |　|\t)", "", $dsc);
      $dsc = mb_substr($dsc, 0, 100). "...";  //本文から100文字
    }
    $url = get_permalink();
  } elseif ( is_category() ) {
    $cat_name = single_cat_title( '',false );
    $cat = get_term_by('name', $cat_name, 'category');
    $title = $cat_name . "の記事一覧 - ".  get_bloginfo('name');
    $dsc = $cat_name . "の記事一覧です。" . get_bloginfo('description');
    $url = get_category_link( $cat->term_id );
  } elseif( is_tag() ) {
    $tag_name = single_tag_title('',false);
    $tag = get_term_by('name', $tag_name, 'post_tag');
    $title = $tag_name . "の記事一覧 - ". get_bloginfo('name');
    $dsc = $tag_name . "の記事一覧です。" . get_bloginfo('description');
    $url = get_bloginfo('url') . "/tag/" . $tag->slug . "/";
  }  //OGPの設定ここまで
?>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo $type .': http://ogp.me/ns/'. $type .'#' ?>">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    if( !is_front_page() ) :
      wp_title('|', true, 'right');
    endif;
    bloginfo('name');
    ?>
  </title>

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/webclip.png" />

  <link rel="stylesheet" id="style.css-css"  href="<?php echo get_stylesheet_uri(); ?>" media="all" />

<?php 
if ( is_singular() ) {
  wp_enqueue_script( "comment-reply" );
}
?>

<!-- jQuery呼び出しとスクリプト -->
<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ):
    wp_enqueue_script('jquery');
    wp_enqueue_script('sp', get_bloginfo('template_url') . '/js/sp.js',array(jquery),'1.0',true); //スマホかタブレットの場合
    wp_head();
?>
<!-- FBみたいなナビゲーションmmenu -->
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery("nav#gnav").mmenu({
    });
  });
  jQuery(document).ready(function() {
    jQuery("div#follow").mmenu({
      "offCanvas": { "position": "right" },
      "classes": "mm-light"
    });
  });
</script>
<?php
  else:
    wp_enqueue_script('jquery');
    wp_enqueue_script('pc', get_bloginfo('template_url') . '/js/pc.js',array(jquery),'1.0',true); //PC・その他の場合
    wp_head();
  endif;
endif;
?>



<!-- アナリティクスコード -->



<!-- OGP -->
<meta property="og:type" content="<?php echo $type ?>">
<?php if($type == "article"){ ?>
  <meta property="article:publisher" content="https://www.facebook.com/※※※フェイスブックページ※※※"/><!-- FBのurl -->
<?php } ?>
<meta property="fb:admins" content="※※※フェイスブックのアイディ―※※※"><!-- FBのID -->
<meta property="og:locale" content="ja_JP">
<meta property="og:title" content="<?php echo $title ?>">
<meta property="og:url" content="<?php echo $url ?>">
<meta property="og:description" content="<?php echo $dsc ?>">
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<?php
  $str = $post->post_content;
  $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
  if (is_single() or is_page()){//単一記事ページか固定ページの場合
    if (has_post_thumbnail()){//投稿にサムネイルがある場合の処理
      $image_id = get_post_thumbnail_id();
      $image = wp_get_attachment_image_src( $image_id, 'full');
      echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
    } elseif ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//投稿にサムネイルは無いが画像がある場合の処理
      echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
    } else {//投稿にサムネイルも画像も無い場合の処理
      echo '<meta property="og:image" content="※※※デフォルト画像をフルパスで※※※">';echo "\n";
    }
  } else {//単一記事ページページ以外の場合（アーカイブページやホームなど）
    echo '<meta property="og:image" content="※※※デフォルト画像をフルパスで※※※">';echo "\n";
  }
?>
<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@ツイッターアイディ―" />
<meta name="twitter:creator" content="@ツイッターアイディ―">
<meta name="twitter:domain" content="pipeinu.com">
<!-- /OGP -->

</head>
<body <?php body_class(); ?>>

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ):
    include_once("svg/sprite-sp.svg"); //スマホかタブレットの場合
  else:
    include_once("svg/sprite-pc.svg"); //PC・その他の場合
  endif;
endif;
?>

<div id="fb-root"></div>
<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=169496816474656&version=v2.3"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>


<div><!-- the wrapper -->

<header id="header">
<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合
?>
  <h1 class="l-headLogo">
    <a href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/svg/logo-h.svg" width="500" height="100" alt="ピペイヌ">
    </a>
  </h1><!-- /.l-headLogo -->
<?php
  endif;
endif;
?>
<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //スマホでもタブレットでも無い場合
?>
  <div class="l-headInner clearfix">
    <h1 class="l-headLogo">
      <a href="<?php echo home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/svg/logo-h.svg" width="500" height="100" alt="ピペイヌ">
      </a>
    </h1><!-- /.l-headLogo -->
    <ul class="l-headFollow clearfix">
      <li class="fb"><a href="">
          <svg><title>Facebook</title><use xlink:href="#fb2"/></svg>
        </a></li>
      <li class="tw"><a href="">
          <svg><title>Twitter</title><use xlink:href="#tw2"/></svg>
        </a></li>
      <li class="gp"><a href="">
          <svg><title>Google +</title><use xlink:href="#gplus2"/></svg>
        </a></li>
      <li class="rss"><a href="">
          <svg><title>RSS</title><use xlink:href="#rss"/></svg>
        </a></li>
    </ul><!-- /.l-headFollow -->
  </div><!-- /.l-headInner -->
  <div class="m-headGnav">
    <?php get_template_part('navigation');  //ナビゲーション呼び出し ?>
  </div><!-- /.m-headGnav -->
<?php
  endif;
endif;
?>
</header><!-- /#header -->