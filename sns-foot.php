<ul class="m-articleSns-B">

  <li class="m-share">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
      <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
    シェア</a>
  </li>

  <li class="m-tweet">
    <a href="http://twitter.com/home?status=<?php echo urlencode(the_title_attribute('echo=0')); ?>%20<?php the_permalink(); ?>">
      <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
    つぶやく</a>
  </li>

  <li class="m-line">
    <a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>">
      <svg><title>おしえる</title><use xlink:href="#line"/></svg>
    おしえる</a>
  </li>

</ul><!-- /.m-articleSns-B -->


<div class="m-articleFollow clearfix">
  <p>pipeinuが気に入ったら「いいね！」してね！</p>
  <div class="m-iine">
    <div class="fb-like" data-href="https://www.facebook.com/pipeinu" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
  </div>

<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( is_multi_device('smart') || is_multi_device('tablet') ): //スマホかタブレットの場合
?>
  <div class="m-line m-lineat">
    <div class="m-lineatInner">
      <a href="https://line.me/ti/p/%40sem4928k">
        <svg><title>Line@</title><use xlink:href="#line"/></svg>
      <span>LINE@</span>やってます！</a>
    </div>
  </div>
<?php
  else: //それ以外
?>
  <div class="m-line m-lineat">
    <div class="m-lineatInner">
      <a rel="leanModal" href="#m-lineQR">
        <svg><title>Line@</title><use xlink:href="#line"/></svg>
      <span>LINE@</span>やってます！</a>
    </div>
  </div>
  <div id="m-lineQR" class="m-lineQR">
    <p><svg><title>Line@</title><use xlink:href="#line"/></svg>&nbsp;QRコードをスマホで読み込んでね！<br>↓↓↓</p>
    <svg><title>LINE@ QRコード</title><use xlink:href="#lineQR"/></svg>
  </div>

<script type="text/javascript">
jQuery(function() {
  jQuery( 'a[rel*=leanModal]').leanModal({
    top: 50,                     // モーダルウィンドウの縦位置を指定
    overlay : 0.5,               // 背面の透明度 
  });
}); 
</script>

<?php
  endif;
endif;
?>
</div><!-- /.m-articleFollow -->