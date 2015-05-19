<?php
if ( function_exists( 'is_multi_device' ) ):
  if ( !is_multi_device('smart') && !is_multi_device('tablet') ): //スマホでもタブレットでも無い場合
?>
<aside id="fixed_sns">
  <ul class="m-articleSns-C">
    <li> <!-- facebook Like -->
      <div class="fb-like" data-href="https://www.facebook.com/pipeinu" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
    </li> <!-- /facebook Like -->

    <li> <!-- facebook Share -->
      <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="box_count"></div>
    </li> <!-- /facebook Share -->

    <li> <!-- twitter -->
      <a href="https://twitter.com/share" class="twitter-share-button" data-via="pipeinu" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-count="vertical" data-lang="ja">ツイート</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </li> <!-- /twitter -->

    <li> <!-- google+ -->
      <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone>
    </li> <!-- /google+ -->

    <li> <!-- pocket -->
      <a data-pocket-label="pocket" data-pocket-count="vertical" class="pocket-btn" data-lang="en"></a><script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script"); j.id=i; j.async=true; j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1"; var w=d.getElementById(i); d.body.appendChild(j); }} (document,"pocket-btn-js"); </script>

    </li> <!-- /pocket -->
    <li id="pagetopBtn" class="m-sidePagetop"><!-- .pagetop -->
    <a href="#header"><svg><title>ページトップ</title><desc>ページ最上部へのリンク</desc><use xlink:href="#pagetop"/></svg></a>
    </li><!-- /.pagetop -->
  </ul>
</aside>
<?php
  endif;
endif;
?>
