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


/* Facebookみたいなナビゲーション jQuery mmenu
=========================================== */
/*  
 * jQuery mmenu v4.7.5
 * @requires jQuery 1.7.0 or later
 *
 * mmenu.frebsite.nl
 *  
 * Copyright (c) Fred Heusschen
 * www.frebsite.nl
 *
 * Licensed under the MIT license:
 * http://en.wikipedia.org/wiki/MIT_License
 */
!function(e){function n(){l=!0,d.$wndw=e(window),d.$html=e("html"),d.$body=e("body"),e.each([i,a,o],function(e,n){n.add=function(e){e=e.split(" ");for(var t in e)n[e[t]]=n.mm(e[t])}}),i.mm=function(e){return"mm-"+e},i.add("wrapper menu inline panel nopanel list nolist subtitle selected label spacer current highest hidden opened subopened subopen fullsubopen subclose"),i.umm=function(e){return"mm-"==e.slice(0,3)&&(e=e.slice(3)),e},a.mm=function(e){return"mm-"+e},a.add("parent"),o.mm=function(e){return e+".mm"},o.add("toggle open close setSelected transitionend webkitTransitionEnd mousedown mouseup touchstart touchmove touchend scroll resize click keydown keyup"),e[t]._c=i,e[t]._d=a,e[t]._e=o,e[t].glbl=d}var t="mmenu",s="4.7.5";if(!e[t]){var i={},a={},o={},l=!1,d={$wndw:null,$html:null,$body:null};e[t]=function(n,s,i){this.$menu=n,this.opts=s,this.conf=i,this.vars={},"function"==typeof this.___deprecated&&this.___deprecated(),this._initMenu(),this._initAnchors(),this._initEvents();var a=this.$menu.children(this.conf.panelNodetype);for(var o in e[t].addons)e[t].addons[o]._add.call(this),e[t].addons[o]._add=function(){},e[t].addons[o]._setup.call(this);return this._init(a),"function"==typeof this.___debug&&this.___debug(),this},e[t].version=s,e[t].addons={},e[t].uniqueId=0,e[t].defaults={classes:"",slidingSubmenus:!0,onClick:{setSelected:!0}},e[t].configuration={panelNodetype:"ul, ol, div",transitionDuration:400,openingInterval:25,classNames:{panel:"Panel",selected:"Selected",label:"Label",spacer:"Spacer"}},e[t].prototype={_init:function(n){n=n.not("."+i.nopanel),n=this._initPanels(n);for(var s in e[t].addons)e[t].addons[s]._init.call(this,n);this._update()},_initMenu:function(){this.opts.offCanvas&&this.conf.clone&&(this.$menu=this.$menu.clone(!0),this.$menu.add(this.$menu.find("*")).filter("[id]").each(function(){e(this).attr("id",i.mm(e(this).attr("id")))})),this.$menu.contents().each(function(){3==e(this)[0].nodeType&&e(this).remove()}),this.$menu.parent().addClass(i.wrapper);var n=[i.menu];n.push(i.mm(this.opts.slidingSubmenus?"horizontal":"vertical")),this.opts.classes&&n.push(this.opts.classes),this.$menu.addClass(n.join(" "))},_initPanels:function(n){var t=this;this.__findAddBack(n,"ul, ol").not("."+i.nolist).addClass(i.list);var s=this.__findAddBack(n,"."+i.list).find("> li");this.__refactorClass(s,this.conf.classNames.selected,"selected"),this.__refactorClass(s,this.conf.classNames.label,"label"),this.__refactorClass(s,this.conf.classNames.spacer,"spacer"),s.off(o.setSelected).on(o.setSelected,function(n,t){n.stopPropagation(),s.removeClass(i.selected),"boolean"!=typeof t&&(t=!0),t&&e(this).addClass(i.selected)}),this.__refactorClass(this.__findAddBack(n,"."+this.conf.classNames.panel),this.conf.classNames.panel,"panel"),n.add(this.__findAddBack(n,"."+i.list).children().children().filter(this.conf.panelNodetype).not("."+i.nopanel)).addClass(i.panel);var l=this.__findAddBack(n,"."+i.panel),d=e("."+i.panel,this.$menu);if(l.each(function(){var n=e(this),s=n.attr("id")||t.__getUniqueId();n.attr("id",s)}),l.each(function(){var n=e(this),s=n.is("ul, ol")?n:n.find("ul ,ol").first(),o=n.parent(),l=o.children("a, span"),d=o.closest("."+i.panel);if(o.parent().is("."+i.list)&&!n.data(a.parent)){n.data(a.parent,o);var r=e('<a class="'+i.subopen+'" href="#'+n.attr("id")+'" />').insertBefore(l);l.is("a")||r.addClass(i.fullsubopen),t.opts.slidingSubmenus&&s.prepend('<li class="'+i.subtitle+'"><a class="'+i.subclose+'" href="#'+d.attr("id")+'">'+l.text()+"</a></li>")}}),this.opts.slidingSubmenus){var r=this.__findAddBack(n,"."+i.list).find("> li."+i.selected);r.parents("li").removeClass(i.selected).end().add(r.parents("li")).each(function(){var n=e(this),t=n.find("> ."+i.panel);t.length&&(n.parents("."+i.panel).addClass(i.subopened),t.addClass(i.opened))}).closest("."+i.panel).addClass(i.opened).parents("."+i.panel).addClass(i.subopened)}else{var r=e("li."+i.selected,d);r.parents("li").removeClass(i.selected).end().add(r.parents("li")).addClass(i.opened)}var u=d.filter("."+i.opened);return u.length||(u=l.first()),u.addClass(i.opened).last().addClass(i.current),this.opts.slidingSubmenus&&l.not(u.last()).addClass(i.hidden).end().appendTo(this.$menu),l},_initAnchors:function(){var n=this;d.$body.on(o.click,"a",function(s){var a=e(this),l=!1,r=n.$menu.find(a).length;for(var u in e[t].addons)if(e[t].addons[u]._clickAnchor&&(l=e[t].addons[u]._clickAnchor.call(n,a,r)))break;if(!l&&r){var c=a.attr("href")||"";if("#"==c.slice(0,1))try{e(c,n.$menu).is("."+i.panel)&&(l=!0,e(c).trigger(n.opts.slidingSubmenus?o.open:o.toggle))}catch(p){}}if(l&&s.preventDefault(),!l&&r&&a.is("."+i.list+" > li > a")&&!a.is('[rel="external"]')&&!a.is('[target="_blank"]')){n.__valueOrFn(n.opts.onClick.setSelected,a)&&a.parent().trigger(o.setSelected);var h=n.__valueOrFn(n.opts.onClick.preventDefault,a,"#"==c.slice(0,1));h&&s.preventDefault(),n.__valueOrFn(n.opts.onClick.blockUI,a,!h)&&d.$html.addClass(i.blocking),n.__valueOrFn(n.opts.onClick.close,a,h)&&n.$menu.trigger(o.close)}})},_initEvents:function(){var n=this;this.$menu.on(o.toggle+" "+o.open+" "+o.close,"."+i.panel,function(e){e.stopPropagation()}),this.opts.slidingSubmenus?this.$menu.on(o.open,"."+i.panel,function(){return n._openSubmenuHorizontal(e(this))}):this.$menu.on(o.toggle,"."+i.panel,function(){var n=e(this);n.trigger(n.parent().hasClass(i.opened)?o.close:o.open)}).on(o.open,"."+i.panel,function(){e(this).parent().addClass(i.opened)}).on(o.close,"."+i.panel,function(){e(this).parent().removeClass(i.opened)})},_openSubmenuHorizontal:function(n){if(n.hasClass(i.current))return!1;var t=e("."+i.panel,this.$menu),s=t.filter("."+i.current);return t.removeClass(i.highest).removeClass(i.current).not(n).not(s).addClass(i.hidden),n.hasClass(i.opened)?s.addClass(i.highest).removeClass(i.opened).removeClass(i.subopened):(n.addClass(i.highest),s.addClass(i.subopened)),n.removeClass(i.hidden).addClass(i.current),setTimeout(function(){n.removeClass(i.subopened).addClass(i.opened)},this.conf.openingInterval),"open"},_update:function(e){if(this.updates||(this.updates=[]),"function"==typeof e)this.updates.push(e);else for(var n=0,t=this.updates.length;t>n;n++)this.updates[n].call(this,e)},__valueOrFn:function(e,n,t){return"function"==typeof e?e.call(n[0]):"undefined"==typeof e&&"undefined"!=typeof t?t:e},__refactorClass:function(e,n,t){return e.filter("."+n).removeClass(n).addClass(i[t])},__findAddBack:function(e,n){return e.find(n).add(e.filter(n))},__transitionend:function(e,n,t){var s=!1,i=function(){s||n.call(e[0]),s=!0};e.one(o.transitionend,i),e.one(o.webkitTransitionEnd,i),setTimeout(i,1.1*t)},__getUniqueId:function(){return i.mm(e[t].uniqueId++)}},e.fn[t]=function(s,i){return l||n(),s=e.extend(!0,{},e[t].defaults,s),i=e.extend(!0,{},e[t].configuration,i),this.each(function(){var n=e(this);n.data(t)||n.data(t,new e[t](n,s,i))})},e[t].support={touch:"ontouchstart"in window||navigator.msMaxTouchPoints}}}(jQuery);
/*  
 * jQuery mmenu offCanvas addon
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
!function(e){var t="mmenu",o="offCanvas";e[t].addons[o]={_init:function(){},_setup:function(){if(this.opts[o]){var t=this,s=this.opts[o],p=this.conf[o];"string"!=typeof p.pageSelector&&(p.pageSelector="> "+p.pageNodetype),a.$allMenus=(a.$allMenus||e()).add(this.$menu),this.vars.opened=!1;var r=[n.offcanvas];"left"!=s.position&&r.push(n.mm(s.position)),"back"!=s.zposition&&r.push(n.mm(s.zposition)),this.$menu.addClass(r.join(" ")).parent().removeClass(n.wrapper),this.setPage(a.$page),this[o+"_initBlocker"](),this[o+"_initWindow"](),this.$menu.on(i.open+" "+i.opening+" "+i.opened+" "+i.close+" "+i.closing+" "+i.closed+" "+i.setPage,function(e){e.stopPropagation()}).on(i.open+" "+i.close+" "+i.setPage,function(e){t[e.type]()}),this.$menu[p.menuInjectMethod+"To"](p.menuWrapperSelector)}},_add:function(){n=e[t]._c,s=e[t]._d,i=e[t]._e,n.add("offcanvas slideout modal background opening blocker page"),s.add("style"),i.add("opening opened closing closed setPage"),a=e[t].glbl},_clickAnchor:function(e){if(!this.opts[o])return!1;var t=this.$menu.attr("id");if(t&&t.length&&(this.conf.clone&&(t=n.umm(t)),e.is('[href="#'+t+'"]')))return this.open(),!0;if(a.$page){var t=a.$page.attr("id");return t&&t.length&&e.is('[href="#'+t+'"]')?(this.close(),!0):!1}}},e[t].defaults[o]={position:"left",zposition:"back",modal:!1,moveBackground:!0},e[t].configuration[o]={pageNodetype:"div",pageSelector:null,menuWrapperSelector:"body",menuInjectMethod:"prepend"},e[t].prototype.open=function(){if(this.vars.opened)return!1;var e=this;return this._openSetup(),setTimeout(function(){e._openFinish()},this.conf.openingInterval),"open"},e[t].prototype._openSetup=function(){var e=this;a.$allMenus.not(this.$menu).trigger(i.close),a.$page.data(s.style,a.$page.attr("style")||""),a.$wndw.trigger(i.resize,[!0]);var t=[n.opened];this.opts[o].modal&&t.push(n.modal),this.opts[o].moveBackground&&t.push(n.background),"left"!=this.opts[o].position&&t.push(n.mm(this.opts[o].position)),"back"!=this.opts[o].zposition&&t.push(n.mm(this.opts[o].zposition)),this.opts.classes&&t.push(this.opts.classes),a.$html.addClass(t.join(" ")),setTimeout(function(){e.vars.opened=!0},this.conf.openingInterval),this.$menu.addClass(n.current+" "+n.opened)},e[t].prototype._openFinish=function(){var e=this;this.__transitionend(a.$page,function(){e.$menu.trigger(i.opened)},this.conf.transitionDuration),a.$html.addClass(n.opening),this.$menu.trigger(i.opening)},e[t].prototype.close=function(){if(!this.vars.opened)return!1;var e=this;return this.__transitionend(a.$page,function(){e.$menu.removeClass(n.current).removeClass(n.opened),a.$html.removeClass(n.opened).removeClass(n.modal).removeClass(n.background).removeClass(n.mm(e.opts[o].position)).removeClass(n.mm(e.opts[o].zposition)),e.opts.classes&&a.$html.removeClass(e.opts.classes),a.$page.attr("style",a.$page.data(s.style)),e.vars.opened=!1,e.$menu.trigger(i.closed)},this.conf.transitionDuration),a.$html.removeClass(n.opening),this.$menu.trigger(i.closing),"close"},e[t].prototype.setPage=function(t){t||(t=e(this.conf[o].pageSelector,a.$body),t.length>1&&(t=t.wrapAll("<"+this.conf[o].pageNodetype+" />").parent())),t.addClass(n.page+" "+n.slideout),a.$page=t},e[t].prototype[o+"_initWindow"]=function(){a.$wndw.on(i.keydown,function(e){return a.$html.hasClass(n.opened)&&9==e.keyCode?(e.preventDefault(),!1):void 0});var s=0;a.$wndw.on(i.resize,function(e,t){if(t||a.$html.hasClass(n.opened)){var o=a.$wndw.height();(t||o!=s)&&(s=o,a.$page.css("minHeight",o))}}),e[t].prototype[o+"_initWindow"]=function(){}},e[t].prototype[o+"_initBlocker"]=function(){var s=e('<div id="'+n.blocker+'" class="'+n.slideout+'" />').appendTo(a.$body);s.on(i.touchstart,function(e){e.preventDefault(),e.stopPropagation(),s.trigger(i.mousedown)}).on(i.mousedown,function(e){e.preventDefault(),a.$html.hasClass(n.modal)||a.$allMenus.trigger(i.close)}),e[t].prototype[o+"_initBlocker"]=function(){}};var n,s,i,a}(jQuery);