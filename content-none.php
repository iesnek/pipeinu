<article class="l-article contentNone">
  <header class="m-articleHead">
    <h1>ごめんなさい。あなたがアクセスしようとしたページは見つかりませんでした。</h1>
  </header><!-- .m-articleHead -->

  <div class="m-articleBody">

  <img src="<?php echo get_template_directory_uri(); ?>/img/noimg_medium.png"
       srcset="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png 660w,
               <?php echo get_template_directory_uri(); ?>/img/noimg_medium.png 750w,
               <?php echo get_template_directory_uri(); ?>/img/noimg_large.png 1500w"
       sizes="(min-width: 769px) 750px, (min-width: 481px) 90vw, 95vw"
       alt="<?php the_title(); ?>">

  <p>piepinu（ピペイヌ）ご覧頂きありがとうございます。大変申し訳ないのですが、お求めのページは見つかりませんでした。お手数をおかけしますが、以下の方法からもう一度目的のページをお探し下さい。</p>

  <h2>検索して見つける</h2>
  <p>検索ボックスにお探しのコンテンツに該当するキーワードを入力して下さい。それに近しいページのリストが表示されます。</p>
  <div class="m-search">
    <?php get_search_form(); ?>
  </div>

  <h2>カテゴリーから見つける</h2>
  <ul class="category">
    <?php //カテゴリー
      $cats = wp_list_categories('echo=0&orderby=ID&order=DESC&title_li=');
      $cats = preg_replace('/ title=\"(.*?)\"/','',$cats);
      echo $cats;
    ?>
  </ul>

  <h2>人気の記事から見つける</h2>
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
  <?php
  if( $my_query -> have_posts() ): // サブループ ?>
  <ul class="m-subArchives clearfix">
    <?php
    while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理
    ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>" title = "「<?php the_title(); ?>」を読む" class="clearfix">
        <div class="m-subArchiveTxt arrangeHeight">
          <h3>
            <?php if(function_exists('is_multi_device')): if(!is_multi_device('smart')): ?>
            <span class="m-subArchiveNum"><?php echo $my_query->current_post+1; ?></span>
            <?php endif; endif; ?>
            <?php the_title(); ?>
          </h3>
        </div><!-- /.m-subArchiveTxt -->
        <div class="m-subArchiveImg">
          <h4>
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
          </h4>
        </div><!-- /.m-subArchiveImg -->
      </a>
      <?php if(function_exists('is_multi_device')): if(is_multi_device('smart')): ?>
      <div class="m-subArchiveNum m-sideArchiveNum"><?php echo $my_query->current_post+1; ?></div>
      <?php endif; endif; ?>
    </li><!-- /.m-subArchiveList -->
    <?php
    endwhile; // サブループの繰り返し処理終了
    ?>
  </ul><!-- /.m-subArchives -->
  <?php
  endif; // サブループ終了
  wp_reset_postdata();
  ?>

  </div><!-- /.m-articleBody -->

</article><!-- /.l-article -->