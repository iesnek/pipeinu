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
          <div class="m-dogsArchiveImg" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div><!-- /.m-dogsArchiveImg -->
          <?php else : ?>
          <div class="m-dogsArchiveImg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg)"></div><!-- /.m-dogsArchiveImg -->
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

<?php // ここから関連記事の表示※ほんとはここオススメ記事にしたい
// カテゴリーIDの取得
$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
  array_push( $category_ID, $category -> cat_ID);
endforeach ;

// WordPressオブジェクトの作成
$args = array(
  'post__not_in' => array($post -> ID),
  'category__in' => $category_ID,
  'posts_per_page'=> 6,
  'post_type' => array('post','mov'),    //投稿タイプの指定
  'orderby' => 'rand',
);
$my_query = new WP_Query($args); ?>

<section id="fixed_sidebar" class="l-subBlocks">
  <h1 class="m-subHead-A"><span>pick up</span>-オススメ記事-</h1>
  <?php
  if( $my_query -> have_posts() ): // サブループ ?>
  <ul class="m-subArchives m-sideArchives clearfix">
    <?php
    while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>" title = "「<?php the_title(); ?>」を読む" class="clearfix">
        <div class="m-subArchiveTxt">
          <h2><?php the_title(); ?></h2>
          <ul class="m-subArchiveMeta">
            <li>
              <svg><title>カテゴリー</title><desc>カテゴリーのアイコン</desc><use xlink:href="#cat"/></svg>
              <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
            </li>
            <li>
              <svg><title>日付</title><desc>日付のアイコン</desc><use xlink:href="#date"/></svg>
              <?php echo get_the_date(); ?>
            </li>
          </ul><!-- /.m-subArchiveMeta -->
        </div><!-- /.m-subArchiveTxt -->
        <div class="m-subArchiveImg">
          <h3>
            <?php
            if ( has_post_thumbnail() ):
              the_post_thumbnail( array(300,200) );
            else:
            ?>
              <img src = "<?php echo get_template_directory_uri(); ?>/img/noimages_s.jpg" width = "300" height="200" alt="この記事を読む" />
            <?php
            endif;
            ?>
          </h3>
        </div><!-- /.m-subArchiveImg -->
      </a>
    </li><!-- /.m-subArchiveList -->
    <?php
    endwhile; // サブループの繰り返し処理終了
    ?>
  </ul><!-- /.m-subArchives -->
  <?php 
  else:
  ?>
    <p>オススメ記事はありませんでした ...</p>
  <?php
  endif; // サブループ終了
  wp_reset_postdata();
  ?>
</section><!-- /#fixed_sidebar .l-subBlocks -->

</div><!-- /#sub -->