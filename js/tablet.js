/* inline-blockの高さを揃える ※２番目の要素以降
=========================================== */
var maxHeight = 0;
//もし.arrangeHeightがmaxHeightの値より大きい場合は.arrangeHeightの高さを全部合わせる
jQuery(".arrangeHeight:not(':first')").each(function(){
   if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
});
//.arrangeHeightの高さを取得する
jQuery(".arrangeHeight:not(':first')").height(maxHeight);


/* inline-blockの高さを揃えるその２
=========================================== */
var maxHeight = 0;
//もし.arrangeHeightがmaxHeightの値より大きい場合は.arrangeHeightの高さを全部合わせる
jQuery(".arrangeHeight2").each(function(){
   if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
});
//.arrangeHeightの高さを取得する
jQuery(".arrangeHeight2").height(maxHeight);