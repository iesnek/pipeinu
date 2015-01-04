<!-- /footer.php -->

</div><!-- /#contentswrap -->

<footer id="footer">
  <div class="m-pagetop"><a href="#header">
    <svg><title>ページトップ</title><desc>ページ最上部へのリンク</desc><use xlink:href="#pagetop"/></svg>
  </a></div><!-- /.pagetop -->
  <div class="l-footerInner">

      <!-- facebook -->
    <div class="m-fbBox">
      <h1 class="m-subHead-A"><span>facebook</span>-フェイスブック-</h1><!-- /.m-subHead-A -->
      <div id="fb-root"></div>
      <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=169496816474656"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
      <div class="fb-like-box" data-href="http://www.facebook.com/design.iesnek" data-width="100%" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
    </div><!-- /.m-fbBox -->
      <!-- facebook -->

      <!-- twitter -->
    <aside class="m-twBox">
      <h1 class="m-subHead-A"><span>twitter</span>-ツイッター-</h1><!-- /.m-subHead-A -->
      <a href="https://twitter.com/design_iesnek" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @design_iesnek</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </aside><!-- /.m-twitterBox -->
      <!-- /twitter -->

    <div class="clearfix">
      <ul class="l-footNav m-footNav">
        <li class="home"><a href="#">
          <svg><title>ホーム</title><desc>ホームアイコン</desc><use xlink:href="#home"/></svg>
        ホーム</a></li>
        <li class="dogs"><a href="#">
          <svg><title>犬種</title><desc>犬種アイコン</desc><use xlink:href="#dogs"/></svg>
        いろいろな犬種</a></li>
        <li class="about"><a href="#">
          <svg><title>pipeinuとは</title><desc>pipeinuアイコン</desc><use xlink:href="#pipeinu"/></svg>
        pipeinuとは</a></li>
        <li class="contact"><a href="#">
          <svg><title>問合せ</title><desc>問合せアイコン</desc><use xlink:href="#mail"/></svg>
        お問い合わせ</a></li>
      </ul><!-- /.footNav -->
      <div class="l-footLogo"><a href="<?php echo home_url('/'); ?>">
        <svg><title>ピペイヌ</title><desc>ピペイヌのロゴ</desc><use xlink:href="#logo-v"/></svg>
      </a></div><!-- /.footLogo -->
    </div><!-- /.clearfix -->

    <p class="m-copyright"><small>&copy; 2015 pipeinu</small></p><!-- /.copyright -->

  </div><!-- /.l-footerInner -->


  <ul class="m-fixedBtn">
    <li class="m-fixedMenu"><a href="#gnav">
      <svg><title>メニューボタン</title><desc>メニューボタンのアイコン</desc><use xlink:href="#menu"/></svg>
    </a></li><!-- /.m-fixedMenu -->
    <li class="m-fixedFollow"><a href="#like">
      <svg><title>フォローボタン</title><desc>フォローボタンのアイコン</desc><use xlink:href="#heart"/></svg>
    </a></li><!-- /.m-fixedLike -->
  </ul><!-- /.m-fixedBtn -->

  <nav id="gnav">
    <ul>

      <li class="mmProf clearfix">
          <svg><title>pipeinu</title><desc>pipeinuのロゴ</desc><use xlink:href="#logo-v"/></svg>
          <p>pipeinu（ピペイヌ）<br>犬好きの私から犬好きの皆さんへ贈る、心揺さぶるいぬメディア</p>
      </li>

      <li class="mm-search"><?php get_search_form(); ?><!-- /searchform.php --></li>

      <li class="mmNav home"><a href="<?php echo home_url('/'); ?>">
        <svg><title>ホーム</title><desc>ホームアイコン</desc><use xlink:href="#home"/></svg>
      <span>home</span>&#160;ホーム</a></li>

      <li class="mmNav mmLabel cat">
        <p>
          <svg><title>カテゴリー</title><desc>カテゴリーアイコン</desc><use xlink:href="#cat"/></svg>
        <span>category</span>&#160;カテゴリー</p>
      </li>
      <?php //カテゴリー
        $cats = wp_list_categories('echo=0&orderby=ID&order=DESC&title_li=');
        $cats = preg_replace('/ title=\"(.*?)\"/','',$cats);
        echo $cats;
      ?>

      <li class="mmNav about"><a href="<?php echo home_url('/'); ?>about-pipeinu/">
        <svg><title>pipeinuとは</title><desc>pipeinuアイコン</desc><use xlink:href="#pipeinu"/></svg>
      <span>about pipeinu</span>&#160;pipeinuとは</a></li>

      <li class="mmNav contact"><a href="<?php echo home_url('/'); ?>contact/">
        <svg><title>問合せ</title><desc>問合せアイコン</desc><use xlink:href="#mail"/></svg>
      <span>contact</span>コンタクト</a></li>

      <li class="mmNav fb"><a href="">
        <svg><title>Facebook</title><desc>Facebookアイコン</desc><use xlink:href="#fb1"/></svg>
      <span>Facebook</span></a></li>

      <li class="mmNav tw"><a href="">
        <svg><title>Twitter</title><desc>Twitterアイコン</desc><use xlink:href="#tw1"/></svg>
      <span>Twitter</span></a></li>

      <li class="mmNav gp"><a href="">
        <svg><title>Google +</title><desc>Google +アイコン</desc><use xlink:href="#gplus1"/></svg>
      <span>Google +</span></a></li>

    </ul>
  </nav><!-- /#gnav -->

  <nav id="like" class="md-modal md-effect-2">
    <div class="md-content">
      <section>
        <h1><span class="icon_fb">&#160;</span>share & like me!!</h1>
        <p>この記事をシェアする</p>
        <div id="fb-root"></div>
        <script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.async = true; js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=169496816474656"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-type="button_count"></div>
        <p>facebookページもあります</p>
        <div class="fb-like" data-href="http://www.facebook.com/design.iesnek" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
      </section>

      <section>
        <h1><span class="icon_twitter">&#160;</span>tweet & follow me!!</h1>
        <p>この記事をツイートする</p>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="design_iesnek" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-lang="ja">ツイート</a>
        <p>もし良ければフォローも</p>
        <a href="https://twitter.com/design_iesnek" class="twitter-follow-button" data-show-count="false">Follow @design_iesnek</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.async=true;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
      </section>

    </div><!-- /.md-content -->
  </nav><!-- /#like -->



</footer>

</div><!-- the wrapper -->

<?php wp_footer(); ?>
</body>
</html>