<ul class="m-articleSns-A">

  <li class="m-share">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
      <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
    </a>
  </li>

  <li class="m-tweet">
    <a href="http://twitter.com/home?status=<?php echo urlencode(the_title_attribute('echo=0')); ?>%20<?php the_permalink(); ?>">
      <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
    </a>
  </li>

  <li class="m-line">
    <a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>">
      <svg><title>おしえる</title><use xlink:href="#line"/></svg>
    </a>
  </li>

  <li class="m-gplus">
    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
      <svg><title>きょうゆう</title><use xlink:href="#gplus1"/></svg>
    </a>
  </li>

</ul><!-- /.m-articleSns-A -->

<div class="m-iine">
<p>pipeinuが気に入ったら「いいね！」してね！</p>
<div class="fb-like" data-href="https://www.facebook.com/pipeinu" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
</div>