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

  <?php //アイキャッチ画像  レスポンシブイメージへの対応
  $thumbnail_id = get_post_thumbnail_id(); // アイキャッチ画像のIDを取得
  $thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , 'thumbnail' );
  $medium_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );
  $large_img = wp_get_attachment_image_src( $thumbnail_id , 'large' );
  if ( has_post_thumbnail() ):
  ?>
  <img src="<?php echo $medium_img[0]; ?>"
       srcset="<?php echo $thumbnail_img[0]; ?> 660w,
               <?php echo $medium_img[0]; ?> 750w,
               <?php echo $large_img[0]; ?> 1500w"
       sizes="(min-width: 769px) 750px, (min-width: 481px) 90vw, 95vw"
       alt="<?php the_title(); ?>">
  <?php
  else:
  ?>
  <img src="<?php echo get_template_directory_uri(); ?>/img/noimg_medium.png"
       srcset="<?php echo get_template_directory_uri(); ?>/img/noimg_thumb.png 660w,
               <?php echo get_template_directory_uri(); ?>/img/noimg_medium.png 750w,
               <?php echo get_template_directory_uri(); ?>/img/noimg_large.png 1500w"
       sizes="(min-width: 769px) 750px, (min-width: 481px) 90vw, 95vw"
       alt="<?php the_title(); ?>">
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
    <div class="m-umekomi"><?php echo $post_embed; ?></div>
    <?php
    endif;
  ?>

  <?php  //キャプチャとコメント
    $repeat_group = SCF::get( 'mov_content' );
    if($repeat_group):
      foreach ( $repeat_group as $repeat_field ) {
        $samll_ss = wp_get_attachment_image_src($repeat_field[mov_ss], 'thumbnail');
        $medium_ss = wp_get_attachment_image_src($repeat_field[mov_ss], 'medium');
        $large_ss = wp_get_attachment_image_src($repeat_field[mov_ss], 'large');
      ?>
        <img src="<?php echo $medium_ss[0]; ?>"
             srcset="<?php echo $thumbnail_ss[0]; ?> 660w,
                     <?php echo $medium_ss[0]; ?> 750w,
                     <?php echo $large_ss[0]; ?> 1500w"
             sizes="(min-width: 769px) 750px, (min-width: 481px) 90vw, 95vw"
             alt="<?php echo $repeat_field[mov_txt]; ?>">
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
    <div class="m-umekomi"><?php echo $post_embed; ?></div>
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
  <div class="fb-comments" data-href="http://pipeinu.com/" data-width="100%" data-numposts="10" data-colorscheme="light"></div>
</section><!-- /.l-mainBlocks .m-comments -->


<?php get_template_part('adsense');  //アドセンス呼び出し ?>

<?php get_template_part('related');  //関連記事呼び出し ?>


<?php
  endwhile;
else :
      get_template_part('content', 'none');  //コンテントノーン呼び出し
endif;
?>

</div><!-- /.l-mainInner -->
</div><!-- /#main -->

<?php get_sidebar(); ?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>