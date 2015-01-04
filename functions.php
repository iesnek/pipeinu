<?php

//最初の</p>のあとに広告を表示

add_filter('the_content', 'cntAd');
function cntAd($content){    
    $ad = '<div class="m-ad"><p>Sponsords Link</p><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- レクタングル（中） --><ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-1514095329243590" data-ad-slot="6455402662"></ins> <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script></div>';
    $count = 0;
     
    if(is_single()){
            $arrayCnts = preg_split('/<\/p>/', $content, -1, PREG_SPLIT_NO_EMPTY);
            foreach( $arrayCnts as $arrayCnt ){
                $count++;
                if($count == 1){
                $arrayCntAd[] = $arrayCnt.'</p>'.$ad;
                } else {
                $arrayCntAd[] = $arrayCnt.'</p>';
                }
            }        
            $content = implode("", $arrayCntAd);
    }
    return $content;
}


?>