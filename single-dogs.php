<?php get_header(); ?>

<div id="contentswrap" class="clearfix">
<?php include_once("svg/sprite-rate.svg"); ?>

<div class="m-breadcrumb">
<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
</div><!-- .m-breadcrumb -->

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

  <div class="m-eyecatch">
    <?php //アイキャッチ画像  レスポンシブイメージへの対応
    $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
    $thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );
    $medium_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );
    $large_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
    if ( has_post_thumbnail() ):
    ?>
    <img src="<?php echo $medium_img[0]; ?>"
         srcset="<?php echo $thumbnail_img[0]; ?> 660w,
                 <?php echo $medium_img[0]; ?> 750w,
                 <?php echo $large_img[0]; ?> 1500w"
         sizes="(min-width: 769px) 750px, (min-width: 481px) 90vw, 95vw"
         alt="<?php the_title(); ?>">
    <?php
    else:
    ?>
    <img src="<?php echo get_template_directory_uri(); ?>/img/noimg_medium.png"
         srcset="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png 660w,
                 <?php echo get_template_directory_uri(); ?>/img/noimg_medium.png 750w,
                 <?php echo get_template_directory_uri(); ?>/img/noimg_large.png 1500w"
         sizes="(min-width: 769px) 750px, (min-width: 481px) 90vw, 95vw"
         alt="<?php the_title(); ?>">
    <?php
    endif;
    ?>
  </div>

    <h2><?php echo get_post_meta($post->ID,'dogs_subtitle',true); ?></h2>

  <?php
    the_content();
  ?>

    <h3><?php echo get_post_meta($post->ID,'dogs_note_title',true); ?></h3>
    <p><?php echo nl2br(get_post_meta($post->ID,'dogs_note',true)); ?></p>

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

<?php get_template_part('related','tag');  //関連記事呼び出し ?>

<?php get_template_part('sns','side');  //シェアボタン[side]呼び出し ?>

<?php
  endwhile;
else :
      get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

</div><!-- /.l-mainInner -->
</div><!-- /#main -->

<?php get_sidebar(); ?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>