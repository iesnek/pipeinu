<?php get_header(); ?>

<div id="contentswrap" class="clearfix">

<div id="main">
<div class="l-mainInner">

<?php get_template_part('content', 'none');  //コンテントノーン呼び出し ?>

</div><!-- /.l-mainInner -->
</div><!-- /#main -->

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //スマホでもタブレットでも無い場合
    get_sidebar();
  endif;
endif;
?>

</div><!-- /#contentswrap -->

<?php get_footer(); ?>