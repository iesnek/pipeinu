<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

<div id="main">
<div class="l-mainInner">

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
    <?php get_template_part('sns','head');  //シェアボタン[head]呼び出し ?>
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

  <?php  //リード文 ?>
  <p><?php echo get_post_meta($post->ID,'mov_read',true); ?></p>

  <?php get_template_part('adsense');  //アドセンス呼び出し ?>

  <?php  //埋め込み動画
    global $wp_embed;
    if(get_post_meta($post->ID, 'mov_path', true)):
    $youtube = get_post_meta($post->ID, 'mov_path', true);
    $post_embed = $wp_embed->run_shortcode('[embed]' . $youtube . '[/embed]');
    ?>
    <div class="m-umekomi"><?php echo $post_embed; ?></div><!-- /.m-umekomi -->
    <?php
    endif;
  ?>

  <?php  //キャプチャとコメント
    $repeat_group = SCF::get( 'mov_content' );
    if($repeat_group):
      foreach ( $repeat_group as $repeat_field ) {
        $screenshot = wp_get_attachment_image($repeat_field[mov_ss], 'full');
      ?>
        <?php echo $screenshot; ?>
        <p><?php echo $repeat_field[mov_txt]; ?></p>
      <?php
      }
    endif;
  ?>

  <?php  //埋め込み動画
    global $wp_embed;
    if(get_post_meta($post->ID, 'mov_path', true)):
    $youtube = get_post_meta($post->ID, 'mov_path', true);
    $post_embed = $wp_embed->run_shortcode('[embed]' . $youtube . '[/embed]');
    ?>
    <div class="m-umekomi"><?php echo $post_embed; ?></div><!-- /.m-umekomi -->
    <?php
    endif;
  ?>

  <?php  //ソース
    $repeat_group = SCF::get( 'mov_source' );
    if($repeat_group):
    ?>
      <p>
      <?php
      foreach ( $repeat_group as $repeat_field ) {
      ?>
        <small><a target="_blank" href="<?php echo $repeat_field[mov_source_url]; ?>"><?php echo $repeat_field[mov_source_title]; ?></a></small><br>
      <?php
      }
      ?>
      </p>
      <?php
    endif;
  ?>

  </div><!-- /.m-articleBody -->
  <footer>
    <?php get_template_part('sns','foot');  //シェアボタン[foot]呼び出し ?>
  </footer>
</article><!-- /.l-article .m-article -->


<section class="l-mainBlocks m-comments">
  <h1 class="m-subHead-A"><span>comments</span>-コメントする-</h1>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_KS/sdk.js#xfbml=1&appId=169496816474656&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div class="fb-comments" data-href="http://pipeinu.com/" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
</section><!-- /.l-mainBlocks .m-comments -->


<?php get_template_part('adsense');  //アドセンス呼び出し ?>

<?php get_template_part('related');  //関連記事呼び出し ?>


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