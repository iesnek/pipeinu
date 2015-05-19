<nav id="gnav">
  <ul class="clearfix">

<?php //プロフィールと検索窓ここから-MMENUのみ表示 ?>
<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合
?>
    <li class="mmProf">
      <img src="<?php echo get_template_directory_uri(); ?>/svg/logo-hw.svg" width="500" height="100" alt="ピペイヌ">
      <dl>
        <dt>pipeinu（ピペイヌ）</dt>
        <dd>犬好きの私から犬好きの皆さんへ贈る、心揺さぶるいぬメディア</dd>
      </dl>
    </li>

    <li class="mm-search"><?php get_search_form(); ?></li>
<?php
  endif;
endif;
?>
<?php //プロフィールと検索窓ここまで-MMENUのみ表示 ?>

<?php //ホームここから-どっちも表示 ?>
    <li class="mmNav home"><a href="<?php echo home_url('/'); ?>"><dl>
      <dt><svg><title>ホーム</title><use xlink:href="#home"/></svg>home</dt>
      <dd>ホーム</dd>
    </dl></a></li>
<?php //ホームここまで-どっちも表示 ?>

<?php //カテゴリーここから-どっちも表示 ?>
<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合
?>
    <li class="mmNav mmLabel cat"><p><dl>
      <dt><svg><title>カテゴリー</title><use xlink:href="#cat"/></svg>category</dt>
      <dd>カテゴリー</dd>
    </dl></p></li>
    <?php //カテゴリー
      $cats = wp_list_categories('echo=0&title_li=');
      $cats = preg_replace('/ title=\"(.*?)\"/','',$cats);
      echo $cats;
    ?>
<?php
  else:
?>
    <li class="mmNav cat">
      <dl>
        <dt><svg><title>カテゴリー</title><use xlink:href="#cat"/></svg>category</dt>
        <dd>カテゴリー</dd>
      </dl>
      <ul>
        <?php //カテゴリー
          $cats = wp_list_categories('echo=0&title_li=');
          $cats = preg_replace('/ title=\"(.*?)\"/','',$cats);
          echo $cats;
        ?>
      </ul>
    </li>
<?php
  endif;
endif;
?>
<?php //カテゴリーここまで-どっちも表示 ?>

<?php //いろいろな犬種ここから-どっちも表示 ?>
    <li class="mmNav dogs"><a href="<?php echo home_url('/'); ?>dogs/"><dl>
      <dt><svg><title>いろいろな犬種</title><use xlink:href="#dogs"/></svg>dogs</dt>
      <dd>いろいろな犬種</dd>
    </dl></a></li>
<?php //いろいろな犬種ここまで-どっちも表示 ?>

<?php //アバウトpipeinuここから-どっちも表示 ?>
    <li class="mmNav about"><a href="<?php echo home_url('/'); ?>about/"><dl>
      <dt><svg><title>pipeinuとは</title><use xlink:href="#pipeinu"/></svg>about pipeinu</dt>
      <dd>pipeinuとは</dd>
    </dl></a></li>
<?php //アバウトpipeinuここまで-どっちも表示 ?>

<?php //問合せとSNSここから-MMENUのみ表示 ?>
<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合
?>
    <li class="mmNav fb"><a href="fb://page/381573368687283"><dl>
      <dt><svg><title>Facebook</title><use xlink:href="#fb1"/></svg>Facebook</dt>
      <dd>「いいね！」してね</dd>
    </dl></a></li>

    <li class="mmNav tw"><a href="https://twitter.com/intent/follow?screen_name=pipeinu"><dl>
      <dt><svg><title>Twitter</title><use xlink:href="#tw1"/></svg>Twitter</dt>
      <dd>「フォロー」してね</dd>
    </dl></a></li>

    <li class="mmNav line"><a href="https://line.me/ti/p/%40sem4928k"><dl>
      <dt><svg><title>LINE@</title><use xlink:href="#line"/></svg>LINE@</dt>
      <dd>「友だち」になってね</dd>
    </dl></a></li>

    <li class="mmNav gp"><a href="https://www.google.com/+Pipeinu"><dl>
      <dt><svg><title>Google +</title><use xlink:href="#gplus1"/></svg>Google +</dt>
      <dd>「フォロー」してね</dd>
    </dl></a></li>

    <li class="mmNav contact"><a href="<?php echo home_url('/'); ?>contact/"><dl>
      <dt><svg><title>問合せ</title><use xlink:href="#mail"/></svg>contact</dt>
      <dd>お問い合わせ</dd>
    </dl></a></li>
<?php
  endif;
endif;
?>
<?php //問合せとSNSここまで-MMENUのみ表示 ?>

  </ul><!-- /.m-headGnav -->
</nav><!-- /#gnav -->