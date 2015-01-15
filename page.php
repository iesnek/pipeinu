<?php get_header(); ?>

<!-- page.php -->

<div id="contentswrap" class="clearfix">

  <div id="main">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

    <article id="post-<?php the_ID(); ?>" class="l-article">
      <header class="m-articleHead">
          <h1><?php the_title(); ?></h1>
      </header><!-- .m-articleHead -->
      <div class="m-articleBody">

      <?php  //アイキャッチ画像
        if (has_post_thumbnail()) :
        ?>
          <picture><?php the_post_thumbnail( 'large' ); ?></picture>
        <?php
        else :
        ?>
          <picture><img src="<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg" alt=""></picture>
        <?php
        endif;
      ?>

      <?php
        the_content();
      ?>

      </div><!-- /.m-articleBody -->
    </article><!-- /.l-article -->

<?php
  endwhile;
else :
?>

    <article class="l-article">
      <header class="m-articleHead">
          <h1>ページがありません</h1>
      </header><!-- .m-articleHead -->
      <div class="m-articleBody">
        <p>お探しのページは見つかりませんでした。</p>
      </div><!-- /.m-articleBody -->
    </article><!-- .l-article -->

<?php
endif;
?>

  </div><!-- /main -->

<!-- / page.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>