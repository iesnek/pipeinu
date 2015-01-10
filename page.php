<?php get_header(); ?>

<!-- page.php -->

<div id="contentswrap" class="clearfix">

  <div id="main">
  <div class="main_inner">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

    <article id="post-<?php the_ID(); ?>" class="clearfix article">
      <header>
        <div class="title">
          <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        </div><!-- /.title -->
      </header>
      <?php
        the_content();
      ?>
    </article>

<?php
  endwhile;
else :
?>

    <article>
      <header>
        <div class="title">
          <h1>ページがありません</h1>
        </div><!-- /.title -->
      </header>
      <p>お探しのページは見つかりませんでした。</p>
    </article>

<?php
endif;
?>

  </div><!-- /.main_inner -->
  </div><!-- /main -->

<!-- / page.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>