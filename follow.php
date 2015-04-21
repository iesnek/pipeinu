<div id="follow">
  <div>

    <aside>
      <h1 class="m-subHead-B">Facobookで繋がろう！</h1><!-- /.m-subHead-B -->
      <div class="m-mmFollow clearfix">
        <div class="m-share m-mmshare m-mmBtn">
          <div class="m-mmshareInner">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
            <svg><title>シェア</title><use xlink:href="#fb1"/></svg>
          この記事をシェア</a>
          </div>
        </div>
        <div class="m-mmlike">
          <div class="fb-like" data-href="https://www.facebook.com/pipeinu" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
        </div>
      </div><!-- /.m-articleFollow -->
    </aside>

    <aside>
      <h1 class="m-subHead-B">Twitterで繋がろう！</h1><!-- /.m-subHead-B -->
      <div class="m-mmFollow clearfix">
        <div class="m-tweet m-mmshare m-mmBtn">
          <div class="m-mmshareInner">
            <a href="http://twitter.com/home?status=<?php echo urlencode(the_title_attribute('echo=0')); ?>%20<?php the_permalink(); ?>">
              <svg><title>ツイート</title><use xlink:href="#tw1"/></svg>
            この記事をツイート</a>
          </div>
        </div>
        <div class="m-tweet m-mmlike m-mmBtn">
            <a href="https://twitter.com/intent/follow?screen_name=pipeinu">
              <svg><title>フォロー</title><use xlink:href="#tw1"/></svg>
            <br>Follow</a>
        </div>
      </div><!-- /.m-articleFollow -->
    </aside>

    <aside>
      <h1 class="m-subHead-B">LINEで繋がろう！</h1><!-- /.m-subHead-B -->
      <div class="m-mmFollow clearfix">
        <div class="m-line m-mmshare m-mmBtn">
          <div class="m-mmshareInner">
            <a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>">
              <svg><title>おしえる</title><use xlink:href="#line"/></svg>
            この記事をおしえる</a>
          </div>
        </div>
        <div class="m-line m-mmlike m-mmBtn">
          <a href="https://line.me/ti/p/%40sem4928k">
            <svg><title>友達になる</title><use xlink:href="#line"/></svg>
          <br>LINE@</a>
        </div>
      </div><!-- /.m-articleFollow -->
    </aside>

    <aside>
      <h1 class="m-subHead-B">Google+で繋がろう！</h1><!-- /.m-subHead-B -->
      <div class="m-mmFollow clearfix">
        <div class="m-gplus m-mmshare m-mmBtn">
          <div class="m-mmshareInner">
            <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
              <svg><title>きょうゆう</title><use xlink:href="#gplus1"/></svg>
            この記事をきょうゆう</a>
          </div>
        </div>
        <div class="m-gplus m-mmlike m-mmBtn">
          <a href="https://plus.google.com/u/0/b/111407110397137154547/111407110397137154547/about/p/pub">
            <svg><title>Google+</title><use xlink:href="#gplus1"/></svg>
          <br>Google+</a>
        </div>
      </div><!-- /.m-articleFollow -->
    </aside>

  </div>
</div><!-- /#follow -->