<?php get_header(); ?>

<div id="contentswrap" class="clearfix">
<?php include_once("svg/sprite-rate.svg"); ?>

<div id="main">
<div class="l-mainInner">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

<article id="post-<?php the_ID(); ?>" class="l-article">
  <header class="m-articleHead">
    <h1><?php the_title(); ?></h1>
    <?php get_template_part('sns','5');  //シェアボタン5列呼び出し ?>
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

    <h2><?php echo get_post_meta($post->ID,'dogs_subtitle',true); ?></h2>

  <?php
    the_content();
  ?>

    <h3><?php echo get_post_meta($post->ID,'dogs_note_title',true); ?></h3>
    <p><?php echo get_post_meta($post->ID,'dogs_note',true); ?></p>

    <h3><?php the_title(); ?>の特徴</h3>
    <div class="m-dogsStates clearfix">
      <div class="m-statesBox">
        <dl>
          <dt>ひとなつこさ</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_friendly',true); ?></svg></dd>
        </dl>
        <dl>
          <dt>かしこさ</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_smart',true); ?></svg></dd>
        </dl>
        <dl>
          <dt>トイレのしつけ</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_wc',true); ?></svg></dd>
        </dl>
      </div>
      <div class="m-statesBox">
        <dl>
          <dt>無駄吠え</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_bark',true); ?></svg></dd>
        </dl>
        <dl>
          <dt>攻撃性</dt>
          <dd><svg><?php echo get_post_meta($post->ID,'dogs_attack',true); ?></svg></dd>
        </dl>
      </div>
    </div><!-- /.m-dogsStates -->

  </div><!-- /.m-articleBody -->
  <footer>
    <?php get_template_part('sns','3');  //シェアボタン3列呼び出し ?>
  </footer>
</article><!-- /.l-article .m-article -->

<aside class="m-ad">
  <p>Sponsords Link</p>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <!-- レクタングル（中） -->
  <ins class="adsbygoogle"
       style="display:inline-block;width:300px;height:250px"
       data-ad-client="ca-pub-1514095329243590"
       data-ad-slot="6455402662"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</aside><!-- /.m-ad -->

<aside class="m-ad"></aside><!-- /.m-ad -->


<?php // ここから関連記事の表示
// カテゴリーIDの取得
$categories = get_the_category($post->ID);
$category_ID = array();
foreach($categories as $category):
  array_push( $category_ID, $category -> cat_ID);
endforeach ;

// WordPressオブジェクトの作成
$args = array(
  'post__not_in' => array($post -> ID),
  'category__in' => $category_ID,
  'posts_per_page'=> 3,
  'orderby' => 'rand',
);
$my_query = new WP_Query($args); ?>

<section class="l-mainBlocks">
  <h1 class="m-subHead-A"><span>related</span>-関連記事-</h1><!-- /.m-subHead-A -->
  <?php
  if( $my_query -> have_posts() ): // サブループ ?>
  <ul class="m-subArchives clearfix">
    <?php
    while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
    <li class="m-subArchiveList">
      <a href="<?php the_permalink() ?>" title = "「<?php the_title(); ?>」を読む" class="clearfix">
        <div class="m-subArchiveTxt">
          <h2><?php the_title(); ?></h2>
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
        </div><!-- /.m-subArchiveTxt -->
        <div class="m-subArchiveImg">
          <h3>
            <?php
            if ( has_post_thumbnail() ):
              the_post_thumbnail( array(300,200) );
            else:
            ?>
              <img src = "<?php echo get_template_directory_uri(); ?>/img/noimages_s.jpg" width = "300" height="200" alt="この記事を読む" />
            <?php
            endif;
            ?>
          </h3>
        </div><!-- /.m-subArchiveImg -->
      </a>
    </li><!-- /.m-subArchiveList -->
    <?php
    endwhile; // サブループの繰り返し処理終了
    ?>
  </ul><!-- /.m-subArchives -->
  <?php 
  else:
  ?>
    <p>関連する記事はありませんでした ...</p>
  <?php
  endif; // サブループ終了
  wp_reset_postdata();
  ?>
</section><!-- /.l-mainBlocks -->

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

</div><!-- /.l-mainInner -->
</div><!-- /#main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>