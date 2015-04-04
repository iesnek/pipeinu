</div><!-- /#contentswrap -->

<footer id="footer">

<div class="m-pagetop"><a href="#header">
  <svg><title>ページトップ</title><desc>ページ最上部へのリンク</desc><use xlink:href="#pagetop"/></svg>
</a></div><!-- /.pagetop -->

<div class="l-footerInner">

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') ): //スマホの場合
?>

  <aside class="m-snsBox m-lineBox"> <!-- line@ -->
    <a href="http://line.me/ti/p/%40iwr5009y">
      <svg><title>おしえる</title><use xlink:href="#line"/></svg>
    LINE@でつながる</a>
  </aside>

  <aside class="m-snsBox m-fbBox"> <!-- facebook -->
    <a href="fb://page/381573368687283">
      <svg><title>Facebookページ</title><use xlink:href="#fb1"/></svg>
    Facebookでつながる</a>
  </aside>

  <aside class="m-snsBox m-twBox"> <!-- twitter -->
    <a href="https://twitter.com/intent/follow?screen_name=pipeinu">
      <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
    Twitterでつながる</a>
  </aside>

<?php
  elseif ( is_multi_device('tablet') ): //タブレットの場合
?>

    <!-- facebook -->
  <aside class="m-fbBox">
    <h1 class="m-subHead-A"><span>facebook</span>-フェイスブック-</h1><!-- /.m-subHead-A -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/ja_KS/sdk.js#xfbml=1&appId=169496816474656&version=v2.0"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-like-box" data-href="https://www.facebook.com/pipeinu" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
  </aside><!-- /.m-fbBox -->
    <!-- facebook -->

    <!-- twitter -->
  <aside class="m-twBox">
    <h1 class="m-subHead-A"><span>twitter</span>-ツイッター-</h1><!-- /.m-subHead-A -->
    <a class="twitter-timeline" href="https://twitter.com/design_iesnek" data-widget-id="572215273550123008">@design_iesnekさんのツイート</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </aside><!-- /.m-twitterBox -->
    <!-- /twitter -->

<?php
  endif;
endif;
?>

  <div class="clearfix">
    <ul class="l-footNav m-footNav">
      <li class="home"><a href="<?php echo home_url('/'); ?>">
        <svg><title>ホーム</title><desc>ホームアイコン</desc><use xlink:href="#home"/></svg>
      ホーム</a></li>
      <li class="dogs"><a href="<?php echo home_url('/'); ?>dogs/">
        <svg><title>犬種</title><desc>犬種アイコン</desc><use xlink:href="#dogs"/></svg>
      いろいろな犬種</a></li>
      <li class="about"><a href="<?php echo home_url('/'); ?>about/">
        <svg><title>pipeinuとは</title><desc>pipeinuアイコン</desc><use xlink:href="#pipeinu"/></svg>
      pipeinuとは</a></li>
      <li class="contact"><a href="<?php echo home_url('/'); ?>contact/">
        <svg><title>問合せ</title><desc>問合せアイコン</desc><use xlink:href="#mail"/></svg>
      お問い合わせ</a></li>
    </ul><!-- /.footNav -->
    <div class="l-footLogo"><a href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/svg/logo-v.svg" width="200" height="190" alt="ピペイヌ">
    </a></div><!-- /.footLogo -->
  </div>

  <p class="m-copyright"><small>&copy; 2015 pipeinu</small></p>

</div><!-- /.l-footerInner -->

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合
?>

<ul class="m-fixedBtn">
  <li class="m-fixedMenu"><a href="#gnav">
    <svg><title>メニューボタン</title><desc>メニューボタンのアイコン</desc><use xlink:href="#menu"/></svg>
  </a></li><!-- /.m-fixedMenu -->
  <li class="m-fixedFollow"><a href="#follow">
    <svg><title>フォローボタン</title><desc>フォローボタンのアイコン</desc><use xlink:href="#heart"/></svg>
  </a></li><!-- /.m-fixedFollow -->
</ul><!-- /.m-fixedBtn -->

<?php get_template_part('navigation');  //ナビゲーション呼び出し ?>

<?php get_template_part('follow');  //フォローブロック呼び出し ?>

<?php
  endif;
endif;
?>

</footer>

</div><!-- the wrapper -->

<?php wp_footer(); ?>
</body>
</html>