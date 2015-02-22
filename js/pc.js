/* スクロールしてトップ
=========================================== */
jQuery(function(){
    jQuery('.m-pagetop a,.m-articleBody a[href^=#]').click(function(){ 
        var speed = 500; //移動完了までの時間(sec)を指定 数字が小さいほどシャッっといく
        var href= jQuery(this).attr("href"); 
        var target = jQuery(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        jQuery("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });
});


/* サムネイルを正円に保つ
=========================================== */
jQuery(function(jQuery){ 
    //.m-dogsArchiveImgの縦横比をレスポンシブに合わせて調整 
    function img_rect(){ 
        var img_w = jQuery(".m-dogsArchiveImg").css("width"); 
        jQuery(".m-dogsArchiveImg").css('height',img_w); 
    }; 
    jQuery(window).resize(function(){ 
        img_rect(); 
    }); 
    img_rect(); 
});


/* タブ切り替え
=========================================== */
jQuery(function(){
  jQuery("#entry_tab li a").on("click", function(e) {
    e.preventDefault();
    jQuery("#tabs div").hide();
    jQuery(jQuery(this).attr("href")).fadeToggle();
    jQuery("#entry_tab li a").removeClass("active");
    jQuery(this).toggleClass("active");
  });
  return false;
});


/* サイドバーの固定
=========================================== */
(function(){
  jQuery(function(){
  var fix = jQuery('#fixed_sidebar'), //固定したいコンテンツ
  side = jQuery('#sub'), //サイドバーのID
  main = jQuery('#contentswrap'), //固定する要素を収める範囲
  sideTop = side.offset().top;
  fixTop = fix.offset().top,
  mainTop = main.offset().top,
  w = jQuery(window);

  var adjust = function(){
  fixTop = fix.css('position') === 'static' ? sideTop + fix.position().top : fixTop;
  var fixHeight = fix.outerHeight(true),
  mainHeight = main.outerHeight(),
  winTop = w.scrollTop();
  if(winTop + fixHeight > mainTop + mainHeight){
  fix.css({
  position: 'absolute',
  top: mainHeight - fixHeight
  });
  }else if(winTop >= fixTop){
  fix.css({
  position: 'fixed',
  top: 0, //固定する位置
  width: 336 //固定した時の幅指定（何もしないとwidth:100%で広がっちゃう）
  });
  }else{
  fix.css('position', 'static');
  }
  }
  w.on('scroll', adjust);
  });
})(jQuery);


/* サイドの固定SNS
=========================================== */

jQuery(function() {
  var topBtn = jQuery('#fixed_sns');
  topBtn.hide();
  //スクロールが100に達したらボタン表示
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 600) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });
});