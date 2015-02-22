<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

<div id="main">
<div class="l-mainInner">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

<article id="post-<?php the_ID(); ?>" class="l-article">
  <header class="m-articleHead">
    <h1><?php the_title(); ?></h1>
    <ul class="m-articleMeta clearfix">
      <li>
        <svg><title>カテゴリー</title><desc>カテゴリーのアイコン</desc><use xlink:href="#cat"/></svg>
        <?php the_category(', ') ?>
      </li>
      <li>
        <svg><title>日付</title><desc>日付のアイコン</desc><use xlink:href="#date"/></svg>
        <?php echo get_the_date(); ?>
      </li>
      <li>
        <svg><title>タグ</title><desc>タグのアイコン</desc><use xlink:href="#tag"/></svg>
        <?php the_tags(', ') ?>
      </li>
    </ul>
    <?php get_template_part('sns','5');  //シェアボタン5列呼び出し ?>
  </header><!-- .m-articleHead -->

  <div class="m-articleBody">

  <?php  //アイキャッチ画像
    if (has_post_thumbnail()) :
    ?>
    <picture><?php the_post_thumbnail( 'large' ); ?></picture>
    <?php
    else :
    ?>
    <picture><img src="<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg" alt=""></picture>
    <?php
    endif;
  ?>

  <?php
    the_content();
  ?>

  </div><!-- /.m-articleBody -->

  <footer>
    <?php get_template_part('sns','3');  //シェアボタン3列呼び出し ?>
  </footer>
</article><!-- /.l-article -->

<?php get_template_part('adsense');  //アドセンス呼び出し ?>

<?php get_template_part('related');  //関連記事呼び出し ?>

<section class="l-mainBlocks m-comments">
  <h1 class="m-subHead-A"><span>comments</span>-コメントする-</h1><!-- /.m-subHead-A -->

<?php comments_template(); // コメント欄の表示 ?>

</section><!-- /.l-mainBlocks .m-comments -->


<?php
endwhile;
else :
?>

<article class="l-article">
  <header class="m-articleHead">
      <h1>記事はありません</h1>
  </header><!-- .m-articleHead -->
  <div class="m-articleBody">
    <p>お探しの記事は見つかりませんでした。</p>
  </div><!-- /.m-articleBody -->
</article><!-- .l-article -->

<?php
endif;
?>

</div><!-- /.l-mainInner -->
</div><!-- /#main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>