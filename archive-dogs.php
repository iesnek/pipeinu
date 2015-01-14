<?php get_header(); ?>

<!-- index.php -->

<div id="contentswrap" class="clearfix">

  <div id="main">
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
          <?php
          if (has_post_thumbnail()) :
          ?>
          <div class="m-dogsArchiveImg" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>)">
          </div><!-- /.m-dogsArchiveImg -->
          <?php
          else :
          ?>
          <div class="m-dogsArchiveImg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg)">
          </div><!-- /.m-dogsArchiveImg -->
          <?php
          endif;
          ?>
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

  </div><!-- /main -->

<!-- / index.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>