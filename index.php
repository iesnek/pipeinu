<?php get_header(); ?>

<!-- index.php -->

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
              <?php
              if (has_post_thumbnail()) :
                the_post_thumbnail( 'medium' );
              else :
              ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg" alt="この記事を読む">
              <?php
              endif;
              ?>
            </h2>
          </div><!-- /.m-archiveImg -->
        </a>
      </article>

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
  </div><!-- /main -->

<!-- / index.php -->

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //スマホでもタブレットでも無い場合
  get_sidebar();
  endif;
endif;
?>

<?php get_footer(); ?>