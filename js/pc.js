/* スクロールしてトップ
=========================================== */
jQuery(function(){
    jQuery('#pagetopBtn a,.m-articleBody a[href^=#]').click(function(){ 
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


/* inline-blockの高さを揃える ※２番目の要素以降
=========================================== */
var maxHeight = 0;
//もし.arrangeHeightがmaxHeightの値より大きい場合は.arrangeHeightの高さを全部合わせる
jQuery(".arrangeHeight:not(':first')").each(function(){
   if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
});
//.arrangeHeightの高さを取得する
jQuery(".arrangeHeight:not(':first')").height(maxHeight);


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
  //スクロールが600に達したらボタン表示
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 600) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });
});


/* モーダルウインドウ
=========================================== */

// leanModal v1.1 by Ray Stone - http://finelysliced.com.au
// Dual licensed under the MIT and GPL

(function($){$.fn.extend({leanModal:function(options){var defaults={top:100,overlay:0.5,closeButton:null};var overlay=jQuery("<div id='lean_overlay'></div>");jQuery("body").append(overlay);options=$.extend(defaults,options);return this.each(function(){var o=options;jQuery(this).click(function(e){var modal_id=jQuery(this).attr("href");jQuery("#lean_overlay").click(function(){close_modal(modal_id)});jQuery(o.closeButton).click(function(){close_modal(modal_id)});var modal_height=jQuery(modal_id).outerHeight();var modal_width=jQuery(modal_id).outerWidth();
jQuery("#lean_overlay").css({"display":"block",opacity:0});jQuery("#lean_overlay").fadeTo(200,o.overlay);jQuery(modal_id).css({"display":"block","position":"fixed","opacity":0,"z-index":11000,"left":50+"%","margin-left":-(modal_width/2)+"px","top":o.top+"px"});jQuery(modal_id).fadeTo(200,1);e.preventDefault()})});function close_modal(modal_id){jQuery("#lean_overlay").fadeOut(200);jQuery(modal_id).css({"display":"none"})}}})})(jQuery);