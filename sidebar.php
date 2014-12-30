<!-- sidebar.php -->

  <div id="sub">

      <!-- adsense -->
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
      <!-- /adsense -->

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
    </section><!-- /.l-subBlocks -->

  </div><!-- /#sub -->

</div><!-- /#contentswrap -->

<!-- /sidebar.php -->