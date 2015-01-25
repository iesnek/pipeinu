<nav id="gnav">
  <ul>

    <li class="mmProf">
      <img src="<?php echo get_template_directory_uri(); ?>/svg/logo-hw.svg" width="500" height="100" alt="ピペイヌ">
      <dl>
        <dt>pipeinu（ピペイヌ）</dt>
        <dd>犬好きの私から犬好きの皆さんへ贈る、心揺さぶるいぬメディア</dd>
      </dl>
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

    <li class="mmNav dogs"><a href="<?php echo home_url('/'); ?>dogs/">
      <svg><title>いろいろな犬種</title><desc>犬アイコン</desc><use xlink:href="#dogs"/></svg>
    <span>dogs</span>&#160;いろいろな犬種</a></li>

    <li class="mmNav about"><a href="<?php echo home_url('/'); ?>about/">
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