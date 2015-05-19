<?php // ここから人気記事の表示
// WordPressオブジェクトの作成
$args = array(
  'orderby' => 'meta_value_num',//meta_valueではないので注意
  'meta_key' =>'views',
  'posts_per_page' => 6,
  'post_type' => array('post','mov'),    //投稿タイプの指定
  'order' => 'DESC',
);
$my_query = new WP_Query( $args ); ?>

<section id="fixed_sidebar" class="l-subBlocks">
  <h1 class="m-subHead-A"><span>popular</span>-人気記事-</h1>
  <?php
  if( $my_query -> have_posts() ) : // サブループ ?>
  <ul class="m-subArchives m-sideArchives clearfix">
    <?php
    while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理
    ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>" title = "「<?php the_title(); ?>」を読む" class="clearfix">
        <div class="m-subArchiveTxt arrangeHeight2">
          <h2>
            <?php if(function_exists('is_multi_device')): if(is_multi_device('tablet')): ?>
            <span class="m-subArchiveNum"><?php echo $my_query->current_post+1; ?></span>
            <?php endif; endif; ?>
            <?php the_title(); ?>
          </h2>
          <?php if ( function_exists( 'is_multi_device' ) ): if ( is_multi_device('smart') || is_multi_device('tablet') ): ?>
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
          <?php endif; endif; ?>
        </div><!-- /.m-subArchiveTxt -->
        <div class="m-subArchiveImg">
          <h3>
            <?php //レスポンシブイメージへの対応
            $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
            $thumbnail4_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail4' );
            $thumbnail3_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail3' );
            $thumbnail2_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail2' );
            $thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );
            $medium_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );
            $large_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
            if ( has_post_thumbnail() ):
            ?>
            <img src="<?php echo $thumbnail_img[0]; ?>"
                 srcset="<?php echo $thumbnail4_img[0]; ?> 120w,
                         <?php echo $thumbnail3_img[0]; ?> 240w,
                         <?php echo $thumbnail2_img[0]; ?> 330w,
                         <?php echo $thumbnail_img[0]; ?> 660w,
                         <?php echo $medium_img[0]; ?> 750w,
                         <?php echo $large_img[0]; ?> 1500w"
                 sizes="(min-width: 1150px) 240px, (min-width: 481px) 50vw, 30vw"
                 alt="<?php the_title(); ?>">
            <?php
            else:
            ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png"
                 srcset="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb4.png 120w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_thumb3.png 240w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_thumb2.png 330w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png 660w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_medium.png 750w,
                         <?php echo get_template_directory_uri(); ?>/img/noimg_large.png 1500w"
                 sizes="(min-width: 1150px) 240px, (min-width: 481px) 50vw, 30vw"
                 alt="<?php the_title(); ?>">
            <?php
            endif;
            ?>
          </h3>
        </div><!-- /.m-subArchiveImg -->
      </a>
      <?php if(function_exists('is_multi_device')): if(!is_multi_device('tablet')): ?>
      <div class="m-subArchiveNum m-sideArchiveNum"><?php echo $my_query->current_post+1; ?></div>
      <?php endif; endif; ?>
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