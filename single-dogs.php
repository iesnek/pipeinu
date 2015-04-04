<?php get_header(); ?>

<div id="contentswrap" class="clearfix">
<?php include_once("svg/sprite-rate.svg"); ?>

<div id="main">
<div class="l-mainInner">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

<article id="post-<?php the_ID(); ?>" class="l-article">
  <header class="m-articleHead">
    <h1><?php the_title(); ?></h1>
    <?php get_template_part('sns','head');  //シェアボタン[head]呼び出し ?>
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

    <h2><?php echo get_post_meta($post->ID,'dogs_subtitle',true); ?></h2>

  <?php
    the_content();
  ?>

    <h3><?php echo get_post_meta($post->ID,'dogs_note_title',true); ?></h3>
    <p><?php echo get_post_meta($post->ID,'dogs_note',true); ?></p>

    <h3><?php the_title(); ?>の特徴</h3>
    <div class="m-dogsStates clearfix">
      <div class="m-statesBox">
        <dl>
          <dt>ひとなつこさ</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_friendly',true); ?></svg></dd>
        </dl>
        <dl>
          <dt>かしこさ</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_smart',true); ?></svg></dd>
        </dl>
        <dl>
          <dt>トイレのしつけ</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_wc',true); ?></svg></dd>
        </dl>
      </div>
      <div class="m-statesBox">
        <dl>
          <dt>無駄吠え</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_bark',true); ?></svg></dd>
        </dl>
        <dl>
          <dt>攻撃性</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_attack',true); ?></svg></dd>
        </dl>
      </div>
    </div><!-- /.m-dogsStates -->

  </div><!-- /.m-articleBody -->
  <footer>
    <?php get_template_part('sns','foot');  //シェアボタン[foot]呼び出し ?>
  </footer>
</article><!-- /.l-article .m-article -->

<?php get_template_part('adsense');  //アドセンス呼び出し ?>

<?php get_template_part('related');  //関連記事呼び出し ?>

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