/*  ドロップダウンメニュー
=========================================== */


/* ヘッダーの固定
=========================================== */

jQuery(function() {
  var showFlag = false;
  var topBtn = jQuery('#fixed_header');
  topBtn.css('top', '-100px');
  var showFlag = false;

  //スクロールが100に達したらボタン表示
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      if (showFlag == false) {
        showFlag = true;
        topBtn.stop().animate({'top' : '0'}, 700);
        jQuery("#gnav").addClass('fixed_gnav');
        jQuery("#header").addClass('fixed_height');
      }
    } else {
      if (showFlag) {
        showFlag = false;
        topBtn.stop().animate({'top' : '-100px'}, 700);
        jQuery("#gnav").removeClass('fixed_gnav');
        jQuery("#gnav").removeClass('move');
        jQuery("#gnav").removeClass('fixed_gnav_checked');
        jQuery("#header").removeClass('fixed_height');
      }
    }
  });

  //スクロールしてトップ
    jQuery('.pagetop a').click(function () {
    jQuery('body,html').animate({
      scrollTop: 0
    }, 500);
    return false;
    });
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
  side = jQuery('#side'), //サイドバーのID
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
  top: 80
  });
  }else{
  fix.css('position', 'static');
  }
  }
  w.on('scroll', adjust);
  });
})(jQuery);


/* サムネイルを正円に保つ
=========================================== */

jQuery(function(jQuery){ 
    //.thumb_bgの縦横比をレスポンシブに合わせて調整 
    function img_rect(){ 
        var img_w = jQuery(".thumb_bg").css("width"); 
        jQuery(".thumb_bg").css('height',img_w); 
    }; 
    jQuery(window).resize(function(){ 
        img_rect(); 
    }); 
    img_rect(); 
});


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