<!-- sidebar.php -->

  <div id="sub">

      <!-- ad -->
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
      <!-- /ad -->

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

    <section class="l-subBlocks">
      <h1 class="m-subHead-A"><span>pick up</span>-オススメ記事-</h1><!-- /.m-subHead-A -->
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
        <p>オススメ記事はありませんでした ...</p>
      <?php
      endif; // サブループ終了
      wp_reset_postdata();
      ?>
    </section><!-- /.l-subBlocks -->

  </div><!-- /#sub -->

<!-- /sidebar.php -->