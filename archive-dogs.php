<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

<div class="m-breadcrumb">
<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
</div><!-- .m-breadcrumb -->

<div id="main">
<div class="l-mainInner">

<div class="m-archives clearfix">

<?php
if (have_posts()) :
while (have_posts()) : the_post();
?>

<article id="post-<?php the_ID(); ?>" class="m-dogsArchiveList">
  <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
    <div class="m-dogsArchiveTxt">
      <h1><?php the_title(); ?></h1>
    </div><!-- /.m-dogsArchiveTxt -->
    <?php //レスポンシブイメージへの対応
    $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
    $thumbnail2_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail2' );
    $thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );
    if ( function_exists( 'is_multi_device' ) ):
      if ( is_multi_device('smart') ): //スマホの場合
        if (has_post_thumbnail()) : ?>
    <div class="m-dogsArchiveImg" style="background-image: url(<?php echo $thumbnail2_img[0]; ?>)"></div>
    <?php else: ?>
    <div class="m-dogsArchiveImg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/noimg_thumb2.png)"></div>
        <?php endif;
      else: //スマホじゃない場合
        if (has_post_thumbnail()) : ?>
    <div class="m-dogsArchiveImg" style="background-image: url(<?php echo $thumbnail_img[0]; ?>)"></div>
    <?php else: ?>
    <div class="m-dogsArchiveImg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png)"></div>
        <?php endif;
      endif;
    endif;
    ?>
  </a>
</article><!-- /.m-archiveList -->

<?php
endwhile;
else :
  get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

</div><!-- /.m-archives -->

<aside class="m-pager"> <!-- ページャー -->
  <?php global $wp_rewrite;
  $paginate_base = get_pagenum_link(1);
  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
    $paginate_format = '';
    $paginate_base = add_query_arg('paged','%#%');
  }
  else{
    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
    user_trailingslashit('page/%#%/','paged');;
    $paginate_base .= '%_%';
  }
  echo paginate_links(array(
    'base' => $paginate_base,
    'format' => $paginate_format,
    'total' => $wp_query->max_num_pages,
    'mid_size' => 4,
    'current' => ($paged ? $paged : 1),
    'prev_text' => '',
    'next_text' => '次のページ',
  )); ?>
</aside> <!-- /ページャー -->

</div><!-- /.l-mainInner -->
</div><!-- /#main -->


<?php get_sidebar(); ?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>