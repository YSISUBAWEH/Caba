try { !function(){function e(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}window.__ezDotData=function(e,t){"string"!=typeof e&&2==e.length&&(t=e[1],e=e[0]),this.name=e,this.val=t},__ez.dot.b64={keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t,n,r,o,i,a,d,f="",u=0;for(e=Base64._utf8_encode(e);u<e.length;)o=(t=e.charCodeAt(u++))>>2,i=(3&t)<<4|(n=e.charCodeAt(u++))>>4,a=(15&n)<<2|(r=e.charCodeAt(u++))>>6,d=63&r,isNaN(n)?a=d=64:isNaN(r)&&(d=64),f=f+this._keyStr.charAt(o)+this._keyStr.charAt(i)+this._keyStr.charAt(a)+this._keyStr.charAt(d);return f},decode:function(e){var t,n,r,o,i,a,d="",f=0;for(e=e.replace(/[^A-Za-z0-9+\/=]/g,"");f<e.length;)t=this._keyStr.indexOf(e.charAt(f++))<<2|(o=this._keyStr.indexOf(e.charAt(f++)))>>4,n=(15&o)<<4|(i=this._keyStr.indexOf(e.charAt(f++)))>>2,r=(3&i)<<6|(a=this._keyStr.indexOf(e.charAt(f++))),d+=String.fromCharCode(t),64!=i&&(d+=String.fromCharCode(n)),64!=a&&(d+=String.fromCharCode(r));return Base64._utf8_decode(d)},_utf8_encode:function(e){e=e.replace(/rn/g,"n");for(var t="",n=0;n<e.length;n++){var r=e.charCodeAt(n);r<128?t+=String.fromCharCode(r):r>127&&r<2048?(t+=String.fromCharCode(r>>6|192),t+=String.fromCharCode(63&r|128)):(t+=String.fromCharCode(r>>12|224),t+=String.fromCharCode(r>>6&63|128),t+=String.fromCharCode(63&r|128))}return t},_utf8_decode:function(e){for(var t="",n=0,r=c1=c2=0;n<e.length;)(r=e.charCodeAt(n))<128?(t+=String.fromCharCode(r),n++):r>191&&r<224?(c2=e.charCodeAt(n+1),t+=String.fromCharCode((31&r)<<6|63&c2),n+=2):(c2=e.charCodeAt(n+1),c3=e.charCodeAt(n+2),t+=String.fromCharCode((15&r)<<12|(63&c2)<<6|63&c3),n+=3);return t}},__ez.dot.dataToStr=function(e){if(void 0===e)return[];try{for(var t in e)e[t].val=e[t].val+""}catch(e){}return e},__ez.dot.getCC=function(){var e="XX";return"undefined"!=typeof _ezaq&&_ezaq.hasOwnProperty("country")&&(e=_ezaq.country),e},__ez.dot.getDID=function(){var e="0";return"undefined"!=typeof _ezaq&&_ezaq.hasOwnProperty("domain_id")&&(e=_ezaq.domain_id.toString()),e},__ez.dot.getEpoch=function(e){return"undefined"!=typeof _ezaq&&_ezaq.hasOwnProperty("t_epoch")&&(e=_ezaq.t_epoch),e},__ez.dot.getPageviewId=function(){var e="";return"undefined"!=typeof _ezaq&&_ezaq.hasOwnProperty("page_view_id")&&(e=_ezaq.page_view_id),e},__ez.dot.getURL=function(e){return("undefined"!=typeof ezJsu&&1==ezJsu||"undefined"!=typeof _ez_sa&&1==_ez_sa||"undefined"!=typeof isAmp&&!0===isAmp||"undefined"!=typeof ezWp&&!0===ezWp||"undefined"!=typeof _ez_send_requests_through_ezoic&&!0===_ez_send_requests_through_ezoic)&&(e="//g.ezoic.net"+e),e},__ez.dot.isValid=function(e){for(var t=0;t<e.length;t++)if(e[t]instanceof __ezDotData==0)return console.error("Invalid data. ",e[t]),!1;return!0},__ez.dot.isDefined=function(){for(var e=0;e<arguments.length;e++)if(null==arguments[e])return console.error("Argument not defined. ",arguments),!1;return!0},__ez.dot.isAnyDefined=function(){for(var e=!1,t=0;t<arguments.length;t++)null!=arguments[t]&&(e=!0);return 0==e&&console.error("isAnyDefined Arguments not defined. ",arguments),e},__ez.dot.getSlotIID=function(e){var t="0";try{var n=__ez.dot.getTargetingMap(e);if(-1===__ez.dot.getElementId(e).indexOf("div-gpt-ad")&&void 0!==n.ap[0]&&9999!=n.ap[0])return t;if(void 0!==n)for(var r in n)if(-1!==r.indexOf("iid")&&void 0!==n[r][0]){t=n[r][0];break}}catch(e){}return t},__ez.dot.getElementId=function(e){var t="";if("string"!=typeof(t=void 0!==e.ElementId?e.ElementId:e.getSlotElementId())&&(t=""),-1!==t.indexOf("gpt_unit_")&&(parts=t.split("/"),parts.length>2)){var n=(t=parts[2]).lastIndexOf("_"),r=parseInt(t.substring(n+1));isNaN(r)||(t=t.substring(0,n))}return t},__ez.dot.getAdUnitPath=function(e){return void 0!==e.AdUnitPath?e.AdUnitPath:e.getAdUnitPath()},__ez.dot.getSizes=function(e){return void 0!==e.Sizes?e.Sizes:e.getSizes()},__ez.dot.getTargeting=function(e,t){return void 0!==e.Targeting?e.Targeting[t]:e.getTargeting(t)[0]},__ez.dot.getTargetingMap=function(t){if(void 0!==t.Targeting)return t.Targeting;var n=t.getTargetingMap();if("undefined"!=typeof Symbol&&Symbol&&Symbol.toStringTag&&"Map Iterator"===n[Symbol.toStringTag]){var r,o={},i=function(t,n){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=function(t,n){if(t){if("string"==typeof t)return e(t,n);var r=Object.prototype.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?e(t,n):void 0}}(t))||n&&t&&"number"==typeof t.length){r&&(t=r);var o=0,i=function(){};return{s:i,n:function(){return o>=t.length?{done:!0}:{done:!1,value:t[o++]}},e:function(e){throw e},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,d=!0,f=!1;return{s:function(){r=r.call(t)},n:function(){var e=r.next();return d=e.done,e},e:function(e){f=!0,a=e},f:function(){try{d||null==r.return||r.return()}finally{if(f)throw a}}}}(n);try{for(i.s();!(r=i.n()).done;){var a=r.value;o[a]=t.getTargeting(a)}}catch(e){i.e(e)}finally{i.f()}return o}return n},__ez.dot.getEzimFromElementId=function(e){if("undefined"==typeof _ezim_d)return null;for(var t=0,n=Object.values(_ezim_d);t<n.length;t++){var r=n[t];if(r.hasOwnProperty("div_id")&&r.div_id===e)return r}return null},__ez.dot.getAdUnit=function(e,t){return!0===__ez.template.isOrig||t?__ez.dot.getAdUnitPath(e).split("/").pop()+"|~ez~|"+__ez.dot.getElementId(e):__ez.dot.getElementId(e)},__ez.dot.Fire=function(e,t){var n=null!=t;if("undefined"==typeof navigator||"function"!=typeof navigator.sendBeacon){var r=new XMLHttpRequest;n?(r.open("POST",e,!0),r.setRequestHeader("Content-Type","application/json"),r.send(JSON.stringify(t))):(r.open("GET",e,!0),r.send())}else{var o=n?new Blob([JSON.stringify(t)],{type:"text/plain"}):null;navigator.sendBeacon(e,o)}}}();} catch(err) {var hREED = function(er) {return function() {reportEzError(er, "/parsonsmaize/abilene.js")}}; typeof reportEzError==="function"?hREED(err):window.addEventListener('reportEzErrorDefined',hREED(err), {once: true}); console.error(err);}