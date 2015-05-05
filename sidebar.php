<div id="sub">

<?php get_template_part('adsense');  //アドセンス呼び出し ?>

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //スマホでもタブレットでも無い場合
?>
<aside class="l-subBlocks m-search">
  <?php get_search_form(); ?>
</aside><!-- /.m-search -->


<?php
$args = array(
  'numberposts' => 5,                //表示（取得）する記事の数
  'post_type' => 'dogs',    //投稿タイプの指定
  'orderby' => 'rand',
);
$customPosts = get_posts($args);
?>
<?php if($customPosts && !is_archive('dogs')) : ?>
<section class="l-subBlocks m-subDogArchives">
  <h1 class="m-subHead-A"><span>dogs</span>-いろいろな犬種-</h1>
  <ul class="m-sideArchives clearfix">
<?php foreach($customPosts as $post) : setup_postdata( $post ); ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink(); ?>" class="clearfix">
        <div class="m-subArchiveTxt">
          <h2><?php the_title(); ?></h2>
          <h3><?php echo get_post_meta($post->ID,'dogs_subtitle',true); ?></h3>
        </div><!-- /.m-subArchiveTxt -->
        <div class="m-subArchiveImg">
          <?php if (has_post_thumbnail()) : ?>
          <div class="m-dogsArchiveImg" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
          <?php else : ?>
          <div class="m-dogsArchiveImg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png)"></div>
          <?php endif; ?>
        </div><!-- /.m-subArchiveImg -->
      </a>
    </li><!-- /.m-subArchiveList -->
<?php endforeach; ?>
  </ul><!-- /.m-sideArchives -->
</section><!-- /.l-subBlocks -->
<?php endif;
wp_reset_postdata(); //クエリのリセット ?>

<?php
  endif;
endif;
?>

<?php get_template_part('popular');  //人気記事呼び出し ?>

</div><!-- /#sub -->