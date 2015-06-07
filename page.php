<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

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
  </header><!-- .m-articleHead -->
  <div class="m-articleBody">

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

  <?php
    the_content();
  ?>

  </div><!-- /.m-articleBody -->
</article><!-- /.l-article -->

<?php
  endwhile;
else :
      get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

</div><!-- /.l-mainInner -->
</div><!-- /main -->

<?php get_sidebar(); ?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>