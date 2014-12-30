<!-- jQuery呼び出しとスクリプト -->
<?php wp_enqueue_script('jquery'); ?>
<?php wp_enqueue_script('sp', get_bloginfo('template_url') . '/js/sp.js',array(jquery)); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/sp.js"></script>
<!--[if lt IE 9]>
  <meta http-equiv="Imagetoolbar" content="no" />
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


<!-- FBみたいなナビゲーションmmenu -->
<script type="text/javascript">
  jQuery(function() {
    jQuery('nav#gnav').mmenu();
  });
</script>