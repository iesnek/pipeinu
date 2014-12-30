<?php get_header(); ?>

<!-- index.php -->

<div id="contentswrap" class="clearfix">

  <div id="main">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

    <article id="post-<?php the_ID(); ?>" class="l-article">
      <header>
        <div class="title">
          <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        </div><!-- /.title -->
        <ul class="post_meta">
          <li class="date"><span class="icon_diary">&#160;</span><?php echo get_the_date(); ?></li>
          <li class="category"><span class="icon_cat">&#160;</span>
            <?php the_category(', ') ?>
          </li>
        </ul>
      </header>
      <div class="thumbnail"><a class="ch_item" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
      <?php
      if (has_post_thumbnail()) :
        the_post_thumbnail( 'medium' );
      else :
      ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg" alt="この記事を読む">
      <?php
      endif;
      ?>
      </a></div><!-- /.thumbnail -->
    </article>

<?php
  endwhile;
else :
?>

    <article>
      <header>
        <div class="title">
          <h1>記事はありません</h1>
        </div><!-- /.title -->
      </header>
      <p>お探しの記事は見つかりませんでした。</p>
    </article>

<?php
endif;
?>

    <aside class="pager"> <!-- ページャーここから -->
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
        'next_text' => '',
      )); ?>
    </aside> <!-- ページャーここまで -->

  </div><!-- /main -->

<!-- / index.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>