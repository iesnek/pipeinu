<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

<div class="m-breadcrumb">
<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
</div><!-- .m-breadcrumb -->

<div id="main">
<div class="l-mainInner">

<article id="post-<?php the_ID(); ?>">
  <header class="m-articleHead">
      <h1><?php the_title(); ?></h1>
  </header><!-- .m-articleHead -->

<?php //////////////////// いろいろな犬種 ////////////////////
$args = array(
  'numberposts' => 0, //表示（取得）する記事の数
  'post_type' => 'dogs', //投稿タイプの指定
  'orderby' => 'meta_value', //順番入れ替えに入力値を使う
  'meta_key' => 'dogs_yomi', //使う入力値のキー（フィールド名）
  'order' => 'asc', //上記を使って昇順に
);
$customPosts = get_posts($args); ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>dogs</span>-いろいろな犬種-</h2>
  <ul class="m-subArchives clearfix">
<?php foreach($customPosts as $post) : setup_postdata( $post ); ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li><!-- /.m-subArchiveList -->
<?php endforeach; ?>
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-subBlocks -->
<?php wp_reset_postdata(); //クエリのリセット ?>


<?php //////////////////// カテゴリー「おもしろい・笑える」 ////////////////////
$args = array(
  'category__in' => 3, //おもしろい・笑える
  'posts_per_page'=> 0, //表示（取得）する記事の数
  'post_type' => array('post','mov'), //投稿タイプの指定
);
$my_query = new WP_Query($args); ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>funny & laugh</span>-おもしろい・笑える-</h2>
  <ul class="m-subArchives clearfix">
<?php while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </li><!-- /.m-subArchiveList -->
<?php endwhile; ?>
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-mainBlocks -->
<?php wp_reset_postdata(); //クエリのリセット ?>


<?php //////////////////// カテゴリー「感動する・泣ける」 ////////////////////
$args = array(
  'category__in' => 2, //感動する・泣ける
  'posts_per_page'=> 0, //表示（取得）する記事の数
  'post_type' => array('post','mov'), //投稿タイプの指定
);
$my_query = new WP_Query($args); ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>moved to tears</span>-感動する・泣ける-</h2>
  <ul class="m-subArchives clearfix">
<?php while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </li><!-- /.m-subArchiveList -->
<?php endwhile; ?>
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-mainBlocks -->
<?php wp_reset_postdata(); //クエリのリセット ?>


<?php //////////////////// カテゴリー「かわいい・癒される」 ////////////////////
$args = array(
  'category__in' => 4, //かわいい・癒される
  'posts_per_page'=> 0, //表示（取得）する記事の数
  'post_type' => array('post','mov'), //投稿タイプの指定
);
$my_query = new WP_Query($args); ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>cute & heal</span>-かわいい・癒される-</h2>
  <ul class="m-subArchives clearfix">
<?php while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </li><!-- /.m-subArchiveList -->
<?php endwhile; ?>
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-mainBlocks -->
<?php wp_reset_postdata(); //クエリのリセット ?>


<?php //////////////////// カテゴリー「すごい・驚く」 ////////////////////
$args = array(
  'category__in' => 5, //すごい・驚く
  'posts_per_page'=> 0, //表示（取得）する記事の数
  'post_type' => array('post','mov'), //投稿タイプの指定
);
$my_query = new WP_Query($args); ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>wonderful & amazing</span>-すごい・驚く-</h2>
  <ul class="m-subArchives clearfix">
<?php while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </li><!-- /.m-subArchiveList -->
<?php endwhile; ?>
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-mainBlocks -->
<?php wp_reset_postdata(); //クエリのリセット ?>


<?php //////////////////// カテゴリー「役立つ・考える」 ////////////////////
$args = array(
  'category__in' => 6, //役立つ・考える
  'posts_per_page'=> 0, //表示（取得）する記事の数
  'post_type' => array('post','mov'), //投稿タイプの指定
);
$my_query = new WP_Query($args); ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>trivia & thought</span>-役立つ・考える-</h2>
  <ul class="m-subArchives clearfix">
<?php while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </li><!-- /.m-subArchiveList -->
<?php endwhile; ?>
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-mainBlocks -->
<?php wp_reset_postdata(); //クエリのリセット ?>


<?php //////////////////// 固定ページ //////////////////// ?>
<div class="l-mainBlocks">
  <h2 class="m-subHead-A"><span>piepinu</span>-ピペイヌについて-</h2>
  <ul class="m-subArchives clearfix">
    <li class="m-subArchiveList">
      <a href="<?php echo home_url('/'); ?>about">pipeinu（ピペイヌ）とは</a>
    </li><!-- /.m-subArchiveList -->
    <li class="m-subArchiveList">
      <a href="<?php echo home_url('/'); ?>contact">お問い合わせ</a>
    </li><!-- /.m-subArchiveList -->
  </ul><!-- /.m-subArchives -->
</div><!-- /.l-mainBlocks -->

</article>

</div><!-- /.l-mainInner -->
</div><!-- /main -->

<?php get_sidebar(); ?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>