(function($){$(document).ready(function(){window.CreativeImageSliderLightbox=function(P){P=P||{};this.options=P;this.cis_popup_arrows_timeout1='';this.cis_popup_arrows_timeout2='';this.cis_popup_topright_icons_timeout1='';this.cis_popup_topright_icons_timeout2='';this.cis_popup_item_order_timeout1='';this.cis_popup_item_order_timeout2='';this.cis_popup_autoplay_start_timeout='';this.options.cis_popup_paths=new Array;this.createLightbox=function(){this.cis_add_creative_popup_html();this.cis_add_creative_overlay_html();this.overlay=$('.cis_main_overlay');this.popupWrapper=$('.cis_popup_wrapper');this.createPopupPaths();this.setPopupEvents()};this.createPopupPaths=function(){$('.cis_main_wrapper').each(function(i,d){var e=$(d);var f=0;var g=e.attr("id");this.options.cis_popup_paths[g]=new Array;e.find('.cis_row_item').each(function(i,a){$this=$(a);var b=$this.data("cis_popup_link");var c=$this.data("item_id");if(b!=''){f++;this.options.cis_popup_paths[g][c]=b;$this.attr("cis_popup_order",f).addClass('cis_has_popup')}}.bind(this));e.attr("cis_popup_items_count",f)}.bind(this))};this.cis_add_creative_popup_html=function(){var a=$(".cis_main_wrapper").data("cis_base");var b='cis_popup_wrapper_loader';var c='<div class="cis_popup_wrapper '+b+'" cis_popup_autoplay="2">'+'<div class="cis_popup_autoplay_bar_holder">'+'<div class="cis_popup_autoplay_bar_wrapper">'+'<div class="cis_popup_autoplay_bar"></div>'+'</div>'+'</div>'+'<div class="cis_popup_item_holder">'+'<img src="" class="cis_popup_left_arrow" alt="" title="" />'+'<img src="" class="cis_popup_right_arrow" alt="" title="" />'+'<div class="cis_popup_item_order_info"></div>'+'<img src="'+a+'components/com_creativeimageslider/assets/images/play.png" class="cis_popup_autoplay_play" alt="" title="" />'+'<img src="'+a+'components/com_creativeimageslider/assets/images/pause.png" class="cis_popup_autoplay_pause cis_popup_topright_icon_hidden" alt="" title="" />'+'<img src="'+a+'components/com_creativeimageslider/assets/images/close.png" class="cis_popup_close" alt="" title="" />'+'</div>'+'<div class="cis_popup_bottom_holder"></div>'+'</div>';$('body').append(c)};this.cis_add_creative_overlay_html=function(){var a='<div class="cis_main_overlay"></div>';$('body').append(a)};this.cis_show_creative_overlay=function(){var a=$(document).width();var b=$(document).height();this.overlay.css({'width':a,'height':b}).stop().fadeTo(400,0.8)};this.cis_resize_creative_overlay=function(){var a=$(document).width();var b=$(document).height();this.overlay.css({'width':a,'height':b})};this.cis_hide_creative_overlay=function(){this.overlay.stop().fadeOut(400,function(){$(this).css({'width':'100%','height':'100%'});$('.cis_popup_item').remove();$('.cis_popup_bottom_holder').removeAttr("style").removeAttr("h").html('');$('.cis_popup_wrapper').removeClass('cis_popup_in_progress')})};this.cis_animate_creative_popup=function(j){var j=j;var k=j.parents('.cis_row_item').attr("cis_popup_order");var l=j.parents('.cis_row_item').data("item_id");var m=j.parents('.cis_main_wrapper').attr("id");var n=this.options.cis_popup_paths[m][l];var o=$("#cis_item_"+l).parents('.cis_main_wrapper').find('.cis_popup_data').html();var p=o.split(',');var q=parseInt(p[2]);var r=this.popupWrapper;var s=this.overlay;r.addClass('cis_popup_in_progress');r.attr("slider_id",m);r.addClass('cis_vissible');if(q==0)s.addClass('cis_main_overlay_without_bg');else s.removeClass('cis_main_overlay_without_bg');var t=10;setTimeout(function(){var w=parseInt(j.css('width'));var h=parseInt(j.css('height'));var a=parseInt($('body').css('border-top-width'));var b=parseInt($('body').css('border-left-width'));var c=j.offset().top;var d=j.offset().left;var e=c;var f=d;var g=$(document).scrollTop();var i=$(document).scrollLeft();r.hide().attr("start_data",w+','+h+','+e+','+f+','+g+','+i).css({'width':w,'height':h,'top':c,'left':f}).fadeIn(400,function(){this.cis_show_image(l)}.bind(this))}.bind(this),t)};this.cis_reset_creative_popup=function(){var a=this.popupWrapper;var b=a.attr("slider_id");this.cis_popup_hide_arrows();this.cis_popup_hide_item_order();this.cis_popup_hide_autoplay_bar();this.cis_popup_hide_topright_icons();if(a.hasClass('cis_popup_in_progress'))return;a.addClass('cis_popup_in_progress');var c=a.find('.cis_popup_item');var d=a.find('.cis_popup_bottom_holder');a.removeClass("cis_vissible");var e=a.attr("start_data");var f=e.split(",");var g=parseInt(a.find('.cis_popup_bottom_holder').attr("h"));var h=0;var i=this;setTimeout(function(){c.fadeOut(400);$('.cis_main_overlay').stop().fadeTo(400,0.8);a.stop().animate({'height':'-='+g},{duration:400,queue:false,easing:'swing',complete:function(){setTimeout(function(){$("body").stop().animate({scrollTop:f[4]},400);a.removeClass("cis_popup_wrapper_loader_shaddow").animate({'width':f[0],'height':f[1],'top':f[2],'left':f[3]},400,'swing',function(){a.fadeOut(400);i.cis_hide_creative_overlay();$('.cis_wrapper_'+b).trigger("mouseleave")})},100)}});d.stop().animate({'height':'0'},{duration:400,queue:false,easing:'swing',complete:function(){$(this).hide()}})},h)};this.cis_show_image=function(z){$loader=$("#cis_item_"+z).find('.cis_row_item_inner');var A=$loader.parents('.cis_row_item').attr("cis_popup_order");var z=$loader.parents('.cis_row_item').data("item_id");var B=$loader.parents('.cis_main_wrapper').attr("id");var C=$loader.parents('.cis_main_wrapper').attr("cis_popup_items_count");var D=this.options.cis_popup_paths[B][z];var E=$("#cis_item_"+z).parents('.cis_main_wrapper').find('.cis_popup_data').html();var F=E.split(',');var G=parseInt(F[0]);var H=parseInt(F[1]);var I=this.popupWrapper;var J=this.overlay;I.addClass('cis_vissible');I.attr("item_id",z);var K=A+' of '+C;$('.cis_popup_item_order_info').html(K);var L=$("#cis_item_"+z).find('.cis_row_item_overlay_txt').html();var M=$("#cis_item_"+z).find('.cis_popup_caption').html();if(D==''||D==undefined){I.removeClass('cis_popup_in_progress');this.cis_reset_creative_popup()};var N=$("<img>");N.attr('src',D);N.attr('class','cis_popup_item');var O=this;N.error(function(){alert("Error loading image. Url: "+D);I.removeClass('cis_popup_in_progress');O.cis_reset_creative_popup()}).load(function(){N.addClass('cis_hidden').appendTo("body");var a=parseInt(N.width());var b=parseInt(N.height());var c=b/a;var d=a;var e=b;N.attr("w",a);N.attr("h",b);var f=N;N.remove();f.removeClass('cis_hidden');I.append(f);var g=parseInt($(window).width());var h=parseInt($(window).height());var i=parseInt($(document).scrollTop());var j=parseInt($(document).scrollLeft());var k=G;var l=G;var m=parseInt(g*k/100);var n=parseInt(h*l/100);if(b>n){var o=n;var p=n/c;if(p>m){p=m;o=m*c}d=p;e=o}else if(a>m){var p=m;var o=m*c;if(o>n){o=n;p=n/c}d=p;e=o}var q=$('.cis_popup_autoplay_bar_holder');var q=$('.cis_popup_autoplay_bar');var r=parseInt(q.attr("h"));var s='<div class="cis_popup_bottom_inner_wrapper cis_hidden"><div class="cis_popup_bottom_inner">';s+='<div class="cis_popup_bottom_title">'+L+'</div>';if(M!='')s+='<div class="cis_popup_bottom_desc">'+M+'</div>';s+='<div class="cis_popup_bottom_line"></div></div></div>';var t=s;I.append(t);$(".cis_popup_bottom_inner_wrapper").width(d);var u=$(".cis_popup_bottom_inner_wrapper").height();if(e+1*u>n){e=n-u;e=e>b?b:e;d=e/c;var v=H;if(d<v){d=v;e=d*c}}I.append(t);$(".cis_popup_bottom_inner_wrapper").width(d);u=$(".cis_popup_bottom_inner_wrapper").height();$(".cis_popup_bottom_inner_wrapper").remove();I.find('.cis_popup_bottom_holder').attr("h",u).hide().html(s);$(".cis_popup_bottom_inner_wrapper").removeClass('cis_hidden');var w=i+0.3*(h-e-u);var x=false;if(w<i){w=i+12*1;if(!I.hasClass('cis_popup_disable_scrolling_behaviour'))I.addClass('cis_popup_disable_scrolling_behaviour');x=true}else{I.removeClass('cis_popup_disable_scrolling_behaviour')}var y=j+0.5*(g-d);if(y<j){y=j+12*1;if(!I.hasClass('cis_popup_disable_scrolling_behaviour'))I.addClass('cis_popup_disable_scrolling_behaviour')}else if(!x){I.removeClass('cis_popup_disable_scrolling_behaviour')}f.css({'width':d,'height':e,'display':'none'});I.find('.cis_popup_item_holder').append(f);I.stop().animate({'width':d,'height':e,'top':w,'left':y},400,'easeOutBack',function(){f.stop().fadeIn(400,function(){J.stop().fadeTo(400,0.96);I.addClass('cis_popup_wrapper_loader_shaddow');I.stop().animate({'height':'+='+u},400,'swing',function(){I.removeClass('cis_popup_in_progress');O.cis_prepare_popup_arrows();O.cis_popup_prepare_item_order_info();O.cis_popup_show_autoplay_bar();O.cis_popup_prepare_topright_icons();O.cis_popup_prepare_autoplay()});I.find('.cis_popup_bottom_holder').stop().fadeIn(400)})})})};this.cis_popup_show_next_item=function(){var a=$('.cis_popup_wrapper');if(a.hasClass('cis_popup_in_progress'))return;var b=parseInt(a.attr("item_id"));var c=$("#cis_item_"+b);var d=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var e=d.split(',');var f=parseInt(e[14]);var g=parseInt(c.attr("cis_popup_order"));var h=parseInt(c.parents('.cis_main_wrapper').attr("cis_popup_items_count"));if(g==h){var i=f;if(i==1){this.cis_reset_creative_popup()}else{$('.cis_popup_autoplay_pause').addClass('cis_popup_topright_icon_hidden');$('.cis_popup_autoplay_play').removeClass('cis_popup_topright_icon_hidden');$('.cis_popup_autoplay_bar').stop(true,false).animate({'width':'0%'},400,'swing')}return}else{var j=parseInt(c.nextAll('.cis_row_item.cis_has_popup').first().data("item_id"));this.cis_popup_hide_arrows();this.cis_popup_hide_item_order();this.cis_popup_hide_autoplay_bar();this.cis_popup_hide_topright_icons();a.addClass('cis_popup_in_progress');var k=parseInt(a.find('.cis_popup_bottom_holder').attr("h"));a.stop().animate({'height':'-='+k},600,'swing',function(){$('.cis_popup_bottom_inner_wrapper').remove()});$('.cis_popup_bottom_holder').animate({'height':0},600,'swing');var l=this;$('.cis_popup_item').stop().fadeTo(600,0,function(){$(this).remove();l.cis_show_image(j)})}};this.cis_popup_show_prev_item=function(){var a=this.popupWrapper;if(a.hasClass('cis_popup_in_progress'))return;var b=parseInt(a.attr("item_id"));var c=$("#cis_item_"+b);var d=parseInt(c.attr("cis_popup_order"));var e=parseInt(c.parents('.cis_main_wrapper').attr("cis_popup_items_count"));if(d==1){return}else{var f=parseInt(c.prevAll('.cis_row_item.cis_has_popup').first().data("item_id"));this.cis_popup_hide_arrows();this.cis_popup_hide_item_order();this.cis_popup_hide_autoplay_bar();this.cis_popup_hide_topright_icons();a.addClass('cis_popup_in_progress');var g=parseInt(a.find('.cis_popup_bottom_holder').attr("h"));a.stop().animate({'height':'-='+g},600,'swing',function(){$('.cis_popup_bottom_inner_wrapper').remove()});$('.cis_popup_bottom_holder').animate({'height':0},600,'swing');this_copy=this;$('.cis_popup_item').stop().fadeTo(600,0,function(){$(this).remove();this_copy.cis_show_image(f)})}};this.cis_resize_image=function(){var a=this.popupWrapper;var b=this.overlay;if(a.hasClass('cis_popup_in_progress'))return;if(!a.hasClass('cis_vissible'))return;var c=a.attr("item_id");$loader=$("#cis_item_"+c).find('.cis_row_item_inner');var d=$("#cis_item_"+c).parents('.cis_main_wrapper').find('.cis_popup_data').html();var e=d.split(',');var f=parseInt(e[0]);var g=parseInt(e[1]);var h=$('.cis_popup_item');h.css({'width':'100%','height':'auto'});var i=parseInt(h.attr("w"));var j=parseInt(h.attr("h"));var k=j/i;var l=i;var m=j;var n=parseInt($(window).width());var o=parseInt($(window).height());var p=parseInt($(document).scrollTop());var q=parseInt($(document).scrollLeft());var r=f;var s=f;var t=parseInt(n*r/100);var u=parseInt(o*s/100);if(j>u){var v=u;var w=u/k;if(w>t){w=t;v=t*k}l=w;m=v}else if(i>t){var w=t;var v=t*k;if(v>u){v=u;w=u/k}l=w;m=v}var x=parseInt($(".cis_popup_bottom_holder").attr("h"));if(m+1*x>u){m=u-x;m=m>j?j:m;l=m/k;var y=g;if(l<y){l=y;m=l*k}}var z=$('.cis_popup_bottom_inner_wrapper').html();z='<div class="cis_popup_bottom_inner_wrapper_dummy cis_hidden">'+z+'</div>';a.append(z);$(".cis_popup_bottom_inner_wrapper_dummy").width(l);x=$(".cis_popup_bottom_inner_wrapper_dummy").height();$(".cis_popup_bottom_inner_wrapper_dummy").remove();a.find('.cis_popup_bottom_holder').attr("h",x);var A=p+0.3*(o-m-x);var B=false;if(A<p){A=p+12*1;if(!a.hasClass('cis_popup_disable_scrolling_behaviour'))a.addClass('cis_popup_disable_scrolling_behaviour');B=true}else{a.removeClass('cis_popup_disable_scrolling_behaviour')}var C=q+0.5*(n-l);if(C<q){C=q+12*1;if(!a.hasClass('cis_popup_disable_scrolling_behaviour'))a.addClass('cis_popup_disable_scrolling_behaviour')}else if(!B){a.removeClass('cis_popup_disable_scrolling_behaviour')};var D=m+1*x;var E=this;a.stop().animate({'width':l,'height':D,'top':A,'left':C},400,'easeOutBack',function(){E.cis_resize_popup_arrows()})};this.cis_move_image=function(){var a=this.popupWrapper;if(a.hasClass('cis_popup_in_progress'))return;if(!a.hasClass('cis_vissible'))return;if(a.hasClass('cis_popup_disable_scrolling_behaviour'))return;var b=a.attr("item_id");var c=a.width();var d=a.height();var e=$(window).width();var f=$(window).height();var g=$(document).scrollTop();var h=$(document).scrollLeft();var i=g+0.3*(f-d);var j=(e-c)/2;a.stop(false,false).animate({'top':i,'left':j},400,'swing')};this.cis_prepare_popup_arrows=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var d=c.split(',');var e=this.overlay;var f=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_button_left');var g=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_button_right');var h=$('.cis_popup_left_arrow');var i=$('.cis_popup_right_arrow');var j=parseInt(d[5]);var k=parseInt(d[6]);var l=parseInt(d[7]);var m=parseInt(d[3])/100;var n=parseInt(d[4]);var o=n;h.attr({"src":f.attr("src"),'op':m,'corner_offset':o});i.attr({"src":g.attr("src"),'op':m,'corner_offset':o});var p=parseInt($("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_row_item_inner').height());var q=parseInt(f.css("height"));var r=q/p;var s=parseInt(h.height());var t=parseInt($('.cis_popup_item_holder').height());s=k;var u=j;var v=t*0.085;var w=v>s?s:(v<u?u:v);var x=0.5*(t-w);var y=m;h.css({'left':'-64px','top':x,'height':w,'opacity':y});i.css({'left':'auto','right':'-64px','top':x,'height':w,'opacity':y});var z=l;a.off('mouseenter.cis_popup_hover_handler');a.off('mouseleave.cis_popup_hover_handler');if(z==0){}else if(z==1){this.cis_popup_show_arrows();a.on('mouseenter.cis_popup_hover_handler',function(){this.cis_popup_show_arrows()}.bind(this));a.on('mouseleave.cis_popup_hover_handler',function(){this.cis_popup_hide_arrows()}.bind(this))}else{this.cis_popup_show_arrows()}};this.cis_popup_show_arrows=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var d=c.split(',');var e=parseInt(d[3])/100;var f=parseInt(d[4]);if(a.hasClass('cis_popup_in_progress'))return;clearTimeout(this.cis_popup_arrows_timeout1);clearTimeout(this.cis_popup_arrows_timeout2);var g=a.find('.cis_popup_left_arrow');var h=a.find('.cis_popup_right_arrow');var i=f;var j=e;var k=400;var l=-64;var m='easeOutBack';this.cis_popup_arrows_timeout1=setTimeout(function(){g.stop(true,false).animate({'left':i,'opacity':j},k,m);h.stop(true,false).animate({'right':i,'opacity':j},k,m)},100)};this.cis_popup_hide_arrows=function(){var a=this.popupWrapper;clearTimeout(this.cis_popup_arrows_timeout1);clearTimeout(this.cis_popup_arrows_timeout2);var b=a.find('.cis_popup_left_arrow');var c=a.find('.cis_popup_right_arrow');b.fadeTo(200,0.2);c.fadeTo(200,0.2);var d=400;var e=-64;var f='easeInBack';this.cis_popup_arrows_timeout2=setTimeout(function(){b.stop(true,false).animate({'left':e},d,f);c.stop(true,false).animate({'right':e},d,f)},200)};this.cis_resize_popup_arrows=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_button_left');var d=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_button_right');var e=$('.cis_popup_left_arrow');var f=$('.cis_popup_right_arrow');var g=parseInt($("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_row_item_inner').height());var h=parseInt(c.css("height"));var i=h/g;var j=parseInt(e.height());var k=parseInt($('.cis_popup_item_holder').height());var l=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var m=l.split(',');var n=parseInt(m[5]);var o=parseInt(m[6]);var p=parseInt(m[3]);j=o;var q=n;var r=k*0.085;var s=r>j?j:(r<q?q:r);var t=0.5*(k-s);var u=p;e.stop().animate({'top':t,'height':s},400,'easeOutBack');f.stop().animate({'top':t,'height':s},400,'easeOutBack')};this.cis_popup_prepare_item_order_info=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var d=c.split(',');var e=parseInt(d[8])/100;var f=parseInt(d[10]);var g=e;$('.cis_popup_item_order_info').attr("op",g);var h=f;a.off('mouseenter.cis_popup_show_order_hover_handler');a.off('mouseleave.cis_popup_show_order_hover_handler');if(h==0){}else if(h==1){this.cis_popup_show_item_order();a.on('mouseenter.cis_popup_show_order_hover_handler',function(){this.cis_popup_show_item_order()}.bind(this));a.on('mouseleave.cis_popup_show_order_hover_handler',function(){this.cis_popup_hide_item_order()}.bind(this))}else{this.cis_popup_show_item_order()}};this.cis_popup_prepare_topright_icons=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var d=c.split(',');var e=parseInt(d[11])/100;var f=parseInt(d[12]);var g=e;$('.cis_popup_autoplay_play').attr("op",g);$('.cis_popup_autoplay_pause').attr("op",g);$('.cis_popup_close').attr("op",g);var h=f;a.off('mouseenter.cis_popup_show_topright_icons_hover_handler');a.off('mouseleave.cis_popup_show_topright_icons_hover_handler');if(h==0){}else if(h==1){this.cis_popup_show_topright_icons();a.on('mouseenter.cis_popup_show_topright_icons_hover_handler',function(){this.cis_popup_show_topright_icons()}.bind(this));a.on('mouseleave.cis_popup_show_topright_icons_hover_handler',function(){this.cis_popup_hide_topright_icons()}.bind(this))}else{this.cis_popup_show_topright_icons()}};this.cis_popup_show_topright_icons=function(){var a=this.popupWrapper;if(a.hasClass('cis_popup_in_progress'))return;clearTimeout(this.cis_popup_topright_icons_timeout1);clearTimeout(this.cis_popup_topright_icons_timeout2);var b=$('.cis_popup_close').attr("op");this.cis_popup_topright_icons_timeout1=setTimeout(function(){$('.cis_popup_close').removeClass('disable_click').stop(true,false).animate({'opacity':b},400,'easeOutBack');$('.cis_popup_autoplay_play').removeClass('disable_click').stop(true,false).animate({'opacity':b},400,'easeOutBack');$('.cis_popup_autoplay_pause').removeClass('disable_click').stop(true,false).animate({'opacity':b},400,'easeOutBack')},100)};this.cis_popup_hide_topright_icons=function(){var a=this.popupWrapper;clearTimeout(this.cis_popup_topright_icons_timeout1);clearTimeout(this.cis_popup_topright_icons_timeout2);$('.cis_popup_close').stop(true,true).fadeTo(400,0,function(){});$('.cis_popup_autoplay_play').stop(true,false).fadeTo(400,0,function(){});$('.cis_popup_autoplay_pause').stop(true,false).fadeTo(400,0,function(){})};this.cis_popup_show_item_order=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var d=c.split(',');var e=parseInt(d[8])/100;var f=parseInt(d[9]);if(a.hasClass('cis_popup_in_progress'))return;clearTimeout(this.cis_popup_item_order_timeout1);clearTimeout(this.cis_popup_item_order_timeout2);var g=e;this.cis_popup_item_order_timeout1=setTimeout(function(){$('.cis_popup_item_order_info').stop(true,false).animate({'opacity':g,'top':f},400,'easeOutBack')},100)};this.cis_popup_hide_item_order=function(){var a=this.popupWrapper;clearTimeout(this.cis_popup_item_order_timeout1);clearTimeout(this.cis_popup_item_order_timeout2);$('.cis_popup_item_order_info').stop().fadeTo(400,0,function(){$(this).css('top','-30px')})};this.cis_popup_show_autoplay_bar=function(){setTimeout(function(){$('.cis_popup_autoplay_bar_holder').stop().animate({'opacity':'0.8'},400,'swing')},100)};this.cis_popup_hide_autoplay_bar=function(){$('.cis_popup_autoplay_bar_holder').stop(true,false).animate({'opacity':'0'},400,'swing');$('.cis_popup_autoplay_bar').stop(true,false).animate({'width':'0%'},400,'swing')};this.setPopupEvents=function(){$('.cis_popup_close').on('click',function(){this.cis_reset_creative_popup()}.bind(this));$('.cis_popup_autoplay_play').on('click',function(){if($(this).hasClass('disable_click'))return;this.cis_popup_make_autoplay_start()}.bind(this));$('.cis_popup_autoplay_pause').on('click',function(){if($(this).hasClass('disable_click'))return;this.cis_popup_make_autoplay_stop()}.bind(this));$('.cis_popup_right_arrow').on('click',function(){this.cis_popup_show_next_item()}.bind(this));$('.cis_popup_left_arrow').on('click',function(){this.cis_popup_show_prev_item()}.bind(this));$(window).scroll(function(){this.cis_move_image()}.bind(this));$(window).resize(function(){this.cis_resize_creative_overlay();this.cis_resize_image()}.bind(this));$(document).keyup(function(e){var a=e.keyCode;if(a==37||a==39||a==27){var b=$('.cis_popup_wrapper');if(b.hasClass('cis_vissible')){if(a==27)this.cis_reset_creative_popup();else if(a==39)this.cis_popup_show_next_item();else if(a==37)this.cis_popup_show_prev_item()}}}.bind(this));$(".cis_main_overlay").on('click',function(){this.cis_reset_creative_popup()}.bind(this));$('.cis_popup_close').on('mouseenter',function(){if($(this).hasClass('disable_click'))return;$(this).stop(true,false).animate({'opacity':1},300)});$('.cis_popup_close').on('mouseleave',function(){if($(this).hasClass('disable_click'))return;var a=$(this).attr("op");$(this).stop(true,false).animate({'opacity':a},300)});$('.cis_popup_autoplay_play').on('mouseenter',function(){if($(this).hasClass('disable_click'))return;$(this).stop(true,false).animate({'opacity':1},300)});$('.cis_popup_autoplay_play').on('mouseleave',function(){if($(this).hasClass('disable_click'))return;var a=$(this).attr("op");$(this).stop(true,false).animate({'opacity':a},300)});$('.cis_popup_autoplay_pause').on('mouseenter',function(){if($(this).hasClass('disable_click'))return;$(this).stop(true,false).animate({'opacity':1},300)});$('.cis_popup_autoplay_pause').on('mouseleave',function(){if($(this).hasClass('disable_click'))return;var a=$(this).attr("op");$(this).stop(true,false).animate({'opacity':a},300)});$('.cis_popup_item_order_info').on('mouseenter',function(){$(this).stop(true,false).animate({'opacity':1},300)});$('.cis_popup_item_order_info').on('mouseleave',function(){var a=$(this).attr("op");$(this).stop(true,false).animate({'opacity':a},300)});$('.cis_popup_left_arrow').on('mouseenter',function(){$(this).animate({'opacity':1},300)});$('.cis_popup_left_arrow').on('mouseleave',function(){var a=$(this).attr("op");$(this).animate({'opacity':a},300)});$('.cis_popup_right_arrow').on('mouseenter',function(){$(this).animate({'opacity':1},300)});$('.cis_popup_right_arrow').on('mouseleave',function(){var a=$(this).attr("op");$(this).animate({'opacity':a},300)})};this.cis_popup_prepare_autoplay=function(){var a=this.popupWrapper;var b=a.attr("item_id");$('.cis_popup_autoplay_pause').addClass('cis_popup_topright_icon_hidden');$('.cis_popup_autoplay_play').removeClass('cis_popup_topright_icon_hidden');$('.cis_popup_autoplay_bar').stop(true,false).css('width','0%');var c=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var d=c.split(',');var e=parseInt(d[13]);var f=e;var g=parseInt(a.attr("cis_popup_autoplay"));if((g==2&&f==1)||g==1){this.cis_popup_autoplay_start_timeout=setTimeout(function(){this.cis_popup_make_autoplay_start()}.bind(this),1200)}};this.cis_popup_make_autoplay_start=function(){var a=this.popupWrapper;clearTimeout(this.cis_popup_autoplay_start_timeout);$('.cis_popup_autoplay_play').addClass('cis_popup_topright_icon_hidden');$('.cis_popup_autoplay_pause').removeClass('cis_popup_topright_icon_hidden');a.attr("cis_popup_autoplay","1");this.cis_popup_autoplay_start()};this.cis_popup_make_autoplay_stop=function(){var a=$('.cis_popup_autoplay_bar');var b=parseFloat(a.width());var c=parseFloat(a.parent('div').width());var d=100*b/c;if(d>98){return}$('.cis_popup_autoplay_pause').addClass('cis_popup_topright_icon_hidden');$('.cis_popup_autoplay_play').removeClass('cis_popup_topright_icon_hidden');this.cis_popup_autoplay_stop()};this.cis_popup_autoplay_start=function(){var a=this.popupWrapper;var b=a.attr("item_id");var c=$('.cis_popup_autoplay_bar');var d=$("#cis_item_"+b).parents('.cis_main_wrapper').find('.cis_popup_data').html();var e=d.split(',');var f=parseInt(e[15]);var g=f;var h=parseFloat(c.width());var i=parseFloat(c.parent('div').width());var j=100*h/i;var k=100-j;var l=g*k/100;var m=this;c.stop(true,false).animate({'width':'100%'},l,'linear',function(){$('.cis_popup_close').addClass('disable_click');$('.cis_popup_autoplay_pause').addClass('disable_click');$('.cis_popup_autoplay_play').addClass('disable_click');m.cis_popup_show_next_item()})};this.cis_popup_autoplay_stop=function(){var a=this.popupWrapper;clearTimeout(this.cis_popup_autoplay_start_timeout);a.attr("cis_popup_autoplay","0");var b=$('.cis_popup_autoplay_bar');var c=parseInt(b.width());var d=c*0.9;b.stop(true,false).animate({'width':'0%'},d,'linear')}}})})(creativeJ);