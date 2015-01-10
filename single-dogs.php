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
        <ul class="m-articleSns-A clearfix">
          <li class="m-like"><a href="#">
            <svg><title>いいね</title><use xlink:href="#like"/></svg>
          </a></li><!-- /.like -->
          <li class="m-share"><a href="#">
            <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
          </a></li><!-- /.share -->
          <li class="m-tweet"><a href="#">
            <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
          </a></li><!-- /.tweet -->
          <li class="m-line"><a href="#">
            <svg><title>おしえる</title><use xlink:href="#line"/></svg>
          </a></li><!-- /.line -->
          <li class="m-gplus"><a href="#">
            <svg><title>きょうゆう</title><use xlink:href="#gplus1"/></svg>
          </a></li><!-- /.gplus -->
        </ul><!-- /.m-articleSns-A -->
      </header><!-- .m-articleHead -->
      <div class="m-articleBody">

      <?php
        if (has_post_thumbnail()) :
          the_post_thumbnail( 'medium' );
        else :
        ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/noimages_m.jpg" alt="この記事を読む">
        <?php
        endif;
      ?>

      <h2><?php echo get_post_meta($post->ID,'subtitle',true); ?></h2>

      <?php
        the_content();
      ?>

      <h3><?php echo get_post_meta($post->ID,'note_title',true); ?></h3>
      <p><?php echo get_post_meta($post->ID,'note',true); ?></p>

      <ul>
        <li><?php echo get_post_meta($post->ID,'friendly',true); ?></li>
        <li><?php echo get_post_meta($post->ID,'smart',true); ?></li>
        <li><?php echo get_post_meta($post->ID,'wc',true); ?></li>
        <li><?php echo get_post_meta($post->ID,'bark',true); ?></li>
        <li><?php echo get_post_meta($post->ID,'attack',true); ?></li>
      </ul>

      </div><!-- /.m-articleBody -->
      <footer>
        <ul class="m-articleSns-B clearfix">
          <li class="m-share"><a href="#">
            <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
          シェア</a></li><!-- /.share -->
          <li class="m-tweet"><a href="#">
            <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
          つぶやく</a></li><!-- /.tweet -->
          <li class="m-line"><a href="#">
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