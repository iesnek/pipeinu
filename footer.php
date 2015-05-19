<footer id="footer">

<div id="pagetopBtn" class="m-pagetop"><a href="#header">
  <svg><title>ページトップ</title><desc>ページ最上部へのリンク</desc><use xlink:href="#pagetop"/></svg>
</a></div><!-- /.pagetop -->

<div class="l-footerInner">

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') ): //スマホの場合
?>

  <aside class="m-snsBox m-lineBox"> <!-- line@ -->
    <a href="https://line.me/ti/p/%40sem4928k">
      <svg><title>友達になる</title><use xlink:href="#line"/></svg>
    LINE@でつながる</a>
  </aside>

  <aside class="m-snsBox m-fbBox"> <!-- facebook -->
    <a href="fb://page/381573368687283">
      <svg><title>Facebookページ</title><use xlink:href="#fb1"/></svg>
    Facebookでつながる</a>
  </aside>

  <aside class="m-snsBox m-twBox"> <!-- twitter -->
    <a href="https://twitter.com/intent/follow?screen_name=pipeinu">
      <svg><title>フォロー</title><use xlink:href="#tw1"/></svg>
    Twitterでつながる</a>
  </aside>

<?php
  elseif ( is_multi_device('tablet') ): //タブレットの場合
?>

  <aside class="m-snsBox m-lineBox"> <!-- line@ -->
    <a href="https://line.me/ti/p/%40sem4928k">
      <svg><title>おしえる</title><use xlink:href="#line"/></svg>
    LINE@でつながる</a>
  </aside>

  <div class="m-pagePlugin">
    <aside class="m-snsBox m-fbBox"> <!-- facebook -->
      <h1 class="m-subHead-A"><span>facebook</span>-フェイスブック-</h1>
      <div class="fb-page" data-href="https://www.facebook.com/pipeinu" data-width="500" data-height="400" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
    </aside>

    <aside class="m-snsBox m-twBox"> <!-- twitter -->
      <h1 class="m-subHead-A"><span>twitter</span>-ツイッター-</h1>
      <a class="twitter-timeline" href="https://twitter.com/pipeinu" data-widget-id="584771686114861056">@pipeinuさんのツイート</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </aside>
  </div> <!-- /m-pagePlugin -->

<?php
  else: //それ以外（PC）の場合
?>

  <div class="m-pagePlugin">
    <aside class="m-snsBox m-fbBox"> <!-- facebook -->
      <h1 class="m-subHead-A"><span>facebook</span>-フェイスブック-</h1>
      <div class="fb-page" data-href="https://www.facebook.com/pipeinu" data-width="500" data-height="400" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"></div>
    </aside>

    <aside class="m-snsBox m-twBox"> <!-- twitter -->
      <h1 class="m-subHead-A"><span>twitter</span>-ツイッター-</h1>
      <a class="twitter-timeline" href="https://twitter.com/pipeinu" data-widget-id="584771686114861056">@pipeinuさんのツイート</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </aside>

    <aside class="m-snsBox m-lineBox"> <!-- line@ -->
      <h1 class="m-subHead-A"><span>LINE@</span>-ラインアット-</h1>
      <div class="default">
        <p>QRコードをスマホで読み込んでね！<br>↓↓↓</p>
        <svg><title>LINE@ QRコード</title><use xlink:href="#lineQR"/></svg>
      </div>
    </aside>
  </div> <!-- /m-pagePlugin -->

<?php
  endif;
endif;
?>

  <div class="clearfix">
    <ul class="l-footNav m-footNav">
      <li class="home"><a href="<?php echo home_url('/'); ?>">
        <svg><title>ホーム</title><use xlink:href="#home"/></svg>
      ホーム</a></li>
      <li class="dogs"><a href="<?php echo home_url('/'); ?>dogs/">
        <svg><title>犬種</title><use xlink:href="#dogs"/></svg>
      いろいろな犬種</a></li>
      <li class="about"><a href="<?php echo home_url('/'); ?>about/">
        <svg><title>pipeinuとは</title><use xlink:href="#pipeinu"/></svg>
      pipeinuとは</a></li>
      <li class="contact"><a href="<?php echo home_url('/'); ?>contact/">
        <svg><title>問合せ</title><use xlink:href="#mail"/></svg>
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
    <svg><title>メニューボタン</title><use xlink:href="#menu"/></svg>
  </a></li>
  <li class="m-fixedFollow"><a href="#follow">
    <svg><title>フォローボタン</title><use xlink:href="#heart"/></svg>
  </a></li>
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