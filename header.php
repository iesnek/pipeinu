<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
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

<?php get_template_part('ogp');?>
</head>
<body <?php body_class(); ?>>

<!-- Google Analytics トラッキングコード -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-43680545-2', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>
<!-- /Google Analytics トラッキングコード -->

<!-- Facebookプラグイン -->
<div id="fb-root"></div>
<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=169496816474656&version=v2.3"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
<!-- /Facebookプラグイン -->


<?php //svgスプライトの呼び出し
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ):
    include_once("svg/sprite-sp.svg"); //スマホかタブレットの場合
  else:
    include_once("svg/sprite-pc.svg"); //PC・その他の場合
  endif;
endif;
?>

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
      <li class="fb"><a target="_blank" href="https://www.facebook.com/pipeinu">
          <svg><title>Facebook</title><use xlink:href="#fb2"/></svg>
        </a></li>
      <li class="tw"><a target="_blank" href="https://twitter.com/pipeinu">
          <svg><title>Twitter</title><use xlink:href="#tw2"/></svg>
        </a></li>
      <li class="gp"><a target="_blank" href="https://plus.google.com/111407110397137154547">
          <svg><title>Google +</title><use xlink:href="#gplus2"/></svg>
        </a></li>
      <li class="rss"><a target="_blank" href="http://pipeinu.com/feed/">
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