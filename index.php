<?php get_header(); ?>

<!-- index.php -->

<div id="contentswrap" class="clearfix">

  <div id="main">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

    <article id="post-<?php the_ID(); ?>" class="m-archiveList">
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="clearfix">
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

    <article>
      <h1>記事はありません</h1>
      <p>お探しの記事は見つかりませんでした。</p>
    </article>

<?php
endif;
?>

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

  </div><!-- /main -->

<!-- / index.php -->


<?php get_footer(); ?>