<?php // ここから関連記事の表示
// タグIDの取得
$tags = wp_get_post_tags($post->ID);
$tag_ids = array();
foreach($tags as $tag):
  array_push( $tag_ids, $tag -> term_id);
endforeach ;

// WordPressオブジェクトの作成
$args = array(
  'post__not_in' => array($post -> ID),
  'tag__in' => $tag_ids,
  'posts_per_page'=> 6,
  'post_type' => array('post','mov'),    //投稿タイプの指定
  'orderby' => 'rand',
);
$my_query = new WP_Query($args); ?>

<section class="l-mainBlocks">
  <h1 class="m-subHead-A"><span>related</span>-関連記事-</h1>
  <?php
  if( $my_query -> have_posts() && !empty($tag_ids) ): // サブループ ?>
  <ul class="m-subArchives clearfix">
    <?php
    while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>" title = "「<?php the_title(); ?>」を読む" class="clearfix">
        <div class="m-subArchiveTxt">
          <h2 class="arrangeHeight"><?php the_title(); ?></h2>
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
            <?php //レスポンシブイメージへの対応
            $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
            $thumbnail3_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail3' );
            $thumbnail2_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail2' );
            $thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );
            if ( has_post_thumbnail() ):
            ?>
            <img src="<?php echo $thumbnail3_img[0]; ?>"
                 srcset="<?php echo $thumbnail3_img[0]; ?> 240w,
                         <?php echo $thumbnail2_img[0]; ?> 330w,
                         <?php echo $thumbnail_img[0]; ?> 660w"
                 sizes="(min-width: 769px) 330px, (min-width: 481px) 50vw, 30vw"
                 alt="<?php the_title(); ?>">
            <?php
            else:
            ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png"
                 srcset="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb3.png 240w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_thumb2.png 330w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png 660w"
                 sizes="(min-width: 769px) 330px, (min-width: 481px) 50vw, 30vw"
                 alt="<?php the_title(); ?>">
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
    <p>関連する記事はありませんでした ...</p>
  <?php
  endif; // サブループ終了
  wp_reset_postdata();
  ?>
</section><!-- /.l-mainBlocks -->