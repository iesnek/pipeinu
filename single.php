<?php get_header(); ?>

<!-- single.php -->

<div id="contentswrap" class="clearfix">

  <div id="main">

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

    <article id="post-<?php the_ID(); ?>" class="l-article">
      <header class="m-articleHead">
        <h1><?php the_title(); ?></h1>
        <ul class="m-articleMeta clearfix">
          <li>
            <svg><title>カテゴリー</title><desc>カテゴリーのアイコン</desc><use xlink:href="#cat"/></svg>
            <?php the_category(', ') ?>
          </li>
          <li>
            <svg><title>日付</title><desc>日付のアイコン</desc><use xlink:href="#date"/></svg>
            <?php echo get_the_date(); ?>
          </li>
          <li>
            <svg><title>タグ</title><desc>タグのアイコン</desc><use xlink:href="#tag"/></svg>
            <?php the_tags(', ') ?>
          </li>
        </ul>
        <ul class="m-articleSns-A clearfix">
          <li class="like"><a href="#">
            <svg><title>いいね</title><use xlink:href="#like"/></svg>
          </a></li><!-- /.like -->
          <li class="share"><a href="#">
            <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
          </a></li><!-- /.share -->
          <li class="tweet"><a href="#">
            <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
          </a></li><!-- /.tweet -->
          <li class="line"><a href="#">
            <svg><title>おしえる</title><use xlink:href="#line"/></svg>
          </a></li><!-- /.line -->
          <li class="gplus"><a href="#">
            <svg><title>きょうゆう</title><use xlink:href="#gplus1"/></svg>
          </a></li><!-- /.gplus -->
        </ul><!-- /.m-articleSns-A -->
      </header><!-- .m-articleHead -->
      <div class="m-articleBody">

      <?php
        the_content();
      ?>

      </div><!-- /.m-articleBody -->
      <footer>
        <ul class="m-articleSns-B clearfix">
          <li class="share"><a href="#">
            <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
          シェア</a></li><!-- /.share -->
          <li class="tweet"><a href="#">
            <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
          つぶやく</a></li><!-- /.tweet -->
          <li class="line"><a href="#">
            <svg><title>おしえる</title><use xlink:href="#line"/></svg>
          おしえる</a></li><!-- /.line -->
        </ul><!-- /.m-articleSns-B -->
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
      <ul class="m-subArchives">
        <?php
        while ($my_query -> have_posts()) : $my_query -> the_post(); // 繰り返し処理 ?>
        <li>
          <h2 class="clearfix">
            <a href="<?php the_permalink() ?>" title = "「<?php the_title(); ?>」を読む">
            <?php
            if ( has_post_thumbnail() ):
              the_post_thumbnail( array(300,200) );
            else:
            ?>
              <img src = "<?php echo get_template_directory_uri(); ?>/img/noimages_s.jpg" width = "300" height="200" alt="この記事を読む" />
            <?php
            endif;
            ?>
            <span><?php the_title(); ?></span>
            </a>
          </h2>
        </li>
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

    <section class="l-mainBlocks comments">
      <h1 class="m-subHead-A"><span>comments</span>-コメントする-</h1><!-- /.m-subHead-A -->

<?php comments_template(); // コメント欄の表示 ?>

    </section><!-- /.l-mainBlocks .comments -->


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

  </div><!-- /#main -->

<!-- / single.php -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>