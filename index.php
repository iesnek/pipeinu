<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

  <div id="main">
  <div class="l-mainInner">

    <div class="m-archives clearfix">

<?php //カスタム投稿タイプ「mov」の投稿を取得する
global $wp_query;
query_posts(array_merge(
    array( 'post_type' => array('post','mov') ),
    $wp_query->query
));
?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

      <article id="post-<?php the_ID(); ?>" class="m-archiveList">
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
          <div class="m-archiveTxt">
            <h1><?php the_title(); ?></h1>
            <ul class="m-archiveMeta">
              <li>
                <svg><title>カテゴリー</title><desc>カテゴリーのアイコン</desc><use xlink:href="#cat"/></svg>
                <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
              </li>
              <li>
                <svg><title>日付</title><desc>日付のアイコン</desc><use xlink:href="#date"/></svg>
                <?php echo get_the_date(); ?>
              </li>
            </ul><!-- /.m-archiveMeta -->
          </div><!-- /.m-archiveTxt -->
          <div class="m-archiveImg">
            <h2>
              <?php //レスポンシブイメージへの対応
              $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
              $thumbnail3_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail3' );
              $thumbnail2_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail2' );
              $thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );
              $medium_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );
              $large_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
              if ( has_post_thumbnail() ):
              ?>
              <img src="<?php echo $thumbnail3_img[0]; ?>"
                   srcset="<?php echo $thumbnail3_img[0]; ?> 240w,
                           <?php echo $thumbnail2_img[0]; ?> 330w,
                           <?php echo $thumbnail_img[0]; ?> 660w,
                           <?php echo $medium_img[0]; ?> 750w,
                           <?php echo $large_img[0]; ?> 1500w"
                   sizes="(min-width: 769px) 330px, (min-width: 481px) 40vw, 30vw"
                   alt="<?php the_title(); ?>">
              <?php
              else:
              ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png"
                   srcset="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb3.png 240w,
                           <?php echo get_template_directory_uri(); ?>/img/noimg_thumb2.png 330w,
                           <?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png 660w,
                           <?php echo get_template_directory_uri(); ?>/img/noimg_medium.png 750w,
                           <?php echo get_template_directory_uri(); ?>/img/noimg_large.png 1500w"
                   sizes="(min-width: 769px) 330px, (min-width: 481px) 40vw, 30vw"
                   alt="<?php the_title(); ?>">
              <?php
              endif;
              ?>
            </h2>
          </div><!-- /.m-archiveImg -->
        </a>
      </article><!-- /.m-archiveList -->

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

    </div><!-- /.m-archives -->

    <aside class="m-pager"> <!-- ページャーここから -->
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
    </aside> <!-- ページャーここまで -->

  </div><!-- /.l-mainInner -->
  </div><!-- /#main -->


<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //スマホでもタブレットでも無い場合
  get_sidebar();
  endif;
endif;
?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>