
    /*17-Sep-2023 02:17:51*/
      var vdo_analyticsID = 'G-8J9SC9WB3T';
    (function(v, d, o, ai) {
        ai = d.createElement('script');
        ai.async = true;
        ai.src = o;
        d.head.appendChild(ai);
    })(
        window,
        document,
        'https://www.googletagmanager.com/gtag/js?id=' + vdo_analyticsID
    );

    function vdo_analytics() {
        window.dataLayer.push(arguments);

    }
    (function () {
      window.dataLayer = window.dataLayer || [];
      vdo_analytics("js", new Date());
    })();
    vdo_analytics('event', 'loaded', { send_to: vdo_analyticsID, event_category: 'vdoaijs', event_label: 'v-itsolutionstuff' });

  window.vdo_ai_ = window.vdo_ai_ ? window.vdo_ai_ : {};
    window.vdo_ai_.dimensions = window.vdo_ai_.dimensions || [];
    window.vdo_ai_.customDimensions = window.vdo_ai_.customDimensions || {};
    if(window.vdo_ai_.dimensions.length) {
        var items = window.vdo_ai_.dimensions;
        window.vdo_ai_.dimensions = [];
        items.forEach(customDimensions);
    }
    window.vdo_ai_.dimensions.push = customDimensions;
    function customDimensions(arr) {
        try {
          var tagname = arr[0],
            dimentionName = arr[1],
            dimentionValue = arr[2];
      
          if (dimentionName && dimentionName != '') {
            var dimensionCount = parseInt(dimentionName.replace('dim', ''));
            if (dimensionCount && dimensionCount <= 0) {
              if (!window.vdo_ai_.customDimensions[tagname]) {
                window.vdo_ai_.customDimensions[tagname] = {};
              }
              window.vdo_ai_.customDimensions[tagname][dimentionName] =
                dimentionValue;
            }
          }
        } catch (error) {
          logError(error, 'v-itsolutionstuff');
        }
      }

function logPixel(requestObject){

    if(window.vdo_ai_.customDimensions && window.vdo_ai_.customDimensions['v-itsolutionstuff']) {
        requestObject.dimensions = window.vdo_ai_.customDimensions['v-itsolutionstuff'];
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'https://analytics.vdo.ai/logger', true);

    xhr.send(JSON.stringify(requestObject));
    xhr.onerror = () => {
        var xhrFailedRequest = new XMLHttpRequest();
        xhrFailedRequest.open('POST', 'https://analytics1.vdo.ai/logger', true);
        xhrFailedRequest.send(JSON.stringify(requestObject));
    };
}

var requestObject = {
  domainName: location.hostname,
  page_url:location.href,
  tagName: 'v-itsolutionstuff',
  event: 'loaded',
  eventData: 1,
  uid: ''
};

logPixel(requestObject);

function logError(e, tagname) {
if (typeof e === 'string') {
  e = {
    message: e,
    stack: e,
  };
} else {
  e = {
    message: btoa(e.message).substr(0, 10),
    stack: encodeURIComponent(e.stack),
  };
}vdo_analytics('event', 'Err:' + e.message, {
    send_to: vdo_analyticsID,
    event_label: tagname,
    event_category: 'VDOError',
  });
var oReq = new XMLHttpRequest();
oReq.open(
  'get',
  '//a.vdo.ai/core/logger.php?msg=' +
    e.stack +
    '&tag=' + tagname + '&code=' +
    e.message +
    '&url=' +
    encodeURIComponent(location.href) +
    '&func=vdo.ai.js',
  true
);
oReq.send();
var requestObject = {
  domainName: location.hostname,
  page_url: location.href,
  tagName: tagname,
  event: 'error',
  eventData: e.message,
  uid: '',
};
logPixel(requestObject);
}


try {



function insideSafeFrame() {
  try {
    if(top != self && window.innerWidth > 10 && window.innerHeight > 10) {
      return true;
    }
    if(top.location.href) {
      return false;
    }
  } catch (error) {
    return true;
  }
}



var w_vdo = (insideSafeFrame()) ? window : window.top,
d_vdo = w_vdo.document;
(function (window, document, deps, publisher) {
  var protocol = window.location.protocol;

  window.vdo_ai_ = window.vdo_ai_ || {};
  window.vdo_ai_.cmd = window.vdo_ai_.cmd || [];

    function loadPlayerDiv(id,parentId,iframeBurst=false) {
    if (!iframeBurst) {
      if(document.getElementById(id) == null) {
        var s = document.createElement('div');
        s.id = id;
      } else{
        var s = document.getElementById(id);
      }
       if (parentId != '') {
         var parentDiv = document.getElementById(parentId);
         parentDiv.style.display = "block";
         parentDiv.style.width = "100%";
         if (document.getElementById(parentId).parentNode.offsetWidth < 350){
           var margin = (352 - document.getElementById(parentId).parentNode.clientWidth )/2 ;
           parentDiv.style.marginLeft = '-'+margin + 'px';
         }
         parentDiv.appendChild(s);
       } else{
         document.body.appendChild(s);
       }

    } else{

      var parentIframes = top.document.querySelectorAll('iframe');
      for (var i=0; i < parentIframes.length; i++) {
        var el = parentIframes[i];
        if (el.contentWindow === self) {
            // here you can create an expandable ad
            var s = document.createElement('div');
            s.style.zIndex=111;
            s.style.margin = "0 auto";
            s.style.display = "block";
            s.style.position = "relative";
            s.width = 'fit-content';
            s.id = id;
            var googleDiv = el.parentNode;


            if (parentId != '') {
              var parentDiv = document.createElement('div');
              parentDiv.id = parentId;
              parentDiv.style.display = "block";
              parentDiv.style.width = "100%";
              parentDiv.appendChild(s);
              googleDiv.insertBefore(parentDiv, el);
            } else{
              googleDiv.insertBefore(s, el);
            }


            googleDiv.style.width = "auto";
            googleDiv.parentNode.style.width='auto';
            googleDiv.parentNode.style.height='auto';
            
            el.style.height = "0px";
            el.style.width = "0px";
        }
      }
    }
  }

  

  var playerLoaded = false;
  var adframeConfig = {"desktop":{"show":true,"muted":true,"width":455,"height":256,"bottomMargin":130,"topMargin":10,"unitType":"content-floating","leftOrRight":{"position":"right","margin":10},"cancelTimeoutType":{"type":"timeout","eventtype":"readyforpreroll","cancelTimeout":60000},"passback":{"allow":false,"src":null,"string":"","timeout":30000,"type":"timeout","value":30000},"smallWidth":456,"smallHeight":257,"crossSize":17,"dispose_off":false,"bannerOff":false,"companionOff":false,"autoResize":false},"mobile":{"dispose_off":false,"show":true,"muted":true,"width":333,"height":250,"bottomMargin":130,"topMargin":"0","unitType":"content-floating","leftOrRight":{"position":"right","margin":10},"cancelTimeoutType":{"type":"timeout","eventtype":"readyforpreroll","cancelTimeout":60000},"passback":{"allow":false,"type":"timeout","value":30000,"src":null,"string":"","timeout":30000},"smallWidth":256,"smallHeight":192,"crossSize":24,"bannerOff":false,"companionOff":false,"mobile_floater_background":"#ffffff","autoResize":true},"bottomMargin":10,"showOnlyOnAd":false,"disposeOnSkip":false,"unitStyle":"single","cancelTimeout":10000,"id":"vdo_ai_6645","muted":true,"playsinline":true,"autoplay":true,"preload":true,"video_clickthrough_url":"","pubId":"912","brandLogo":{"img":"","url":""},"coppa":false,"add_on_page_ready":"no","showLogo":false,"adbreak_offsets":[0,5,10,15,20,25],"show_on_ad":false,"autoReplay":true,"close_after_first_ad_timer":0,"canAutoplayCheck":true,"autoplay_player":true,"float_after_cross_click":true,"playAdsOnly":false,"dfp_companion":true,"vast_copy":true,"playlist_url":"","playlistType":"local","ga_event":true,"use_global_hls":false,"freqCap":"none","vast_ad_gap":0,"domain":"itsolutionstuff.com","path":"a.vdo.ai\/core\/v-itsolutionstuff\/adframe.js","unitId":"_vdo_ads_player_ai_3621","tag_type":"other","parent_div":"v-itsolutionstuff","content_sources":[{"video":"uploads\/videos\/16576098417162cd1e71406fe.m3u8","img":"uploads\/thumbnails\/16576098417162cd1e71406fe.png"},{"video":"uploads\/videos\/1664176920446331531855cac.m3u8","img":"uploads\/thumbnails\/1664176920446331531855cac.png"},{"video":"uploads\/videos\/166305146316632026c7703eb.m3u8","img":"uploads\/thumbnails\/166305146316632026c7703eb.png"},{"video":"uploads\/videos\/168129125357643677f5cafcd.m3u8","img":"uploads\/thumbnails\/168129125357643677f5cafcd.png"}],"playlist_id":null,"allowed_dims":0,"pubId_vdo":"912","pubId_atlas":"912","pubId_wc":"912","t_map":80,"hls":false,"showOnlyFirst":false,"media_url":"https:\/\/h5.vdo.ai\/media_file\/v-itsolutionstuff\/source\/","show_on":"ads-ad-started","tagType":"video","google_mcm":"22565357933","google_mcm_apac":"22565357933","bidders":{"0":{"banner":{"amazon":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}}],"prebid":[{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}}]},"bids":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}},{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}},{"bidder":"Smaato_EBDA","params":{"placementId":"vdo_ai"}}]},"5":{"banner":{"amazon":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}}],"prebid":[{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}}]},"bids":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}},{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}},{"bidder":"Smaato_EBDA","params":{"placementId":"vdo_ai"}}]},"10":{"banner":{"amazon":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}}],"prebid":[{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}}]},"bids":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}},{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}},{"bidder":"Smaato_EBDA","params":{"placementId":"vdo_ai"}}]},"15":{"banner":{"amazon":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}}],"prebid":[{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}}]},"bids":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}},{"bidder":"onetag","params":{"pubId":"62e564782c44a66"}},{"bidder":"Smaato_EBDA","params":{"placementId":"vdo_ai"}}]},"20":{"banner":{"amazon":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}}]},"bids":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}},{"bidder":"Smaato_EBDA","params":{"placementId":"vdo_ai"}}]},"25":{"banner":{"amazon":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}}]},"bids":[{"bidder":"amazon","params":{"placementId":"itsolutionstuff.com","floor":0}},{"bidder":"Smaato_EBDA","params":{"placementId":"vdo_ai"}}]}},"targeting":[],"waterfallTags":{"0":["pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/vdoai-dfp-parent-adunit\/z1_dfp_v_itsolutionstuff_v_pre_1v&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_First_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_pre_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1"],"5":["pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Second_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid1_1v&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Second_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid1_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1"],"10":["pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_third_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid2_1v&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_third_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid2_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1"],"15":["pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Fourth_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid3_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Fourth_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid3_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1"],"20":["pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Fifth_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid4_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Fifth_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid4_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1"],"25":["pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Sixth_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid4_2&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Sixth_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid4_2&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1"]},"adx":[],"s2s":false,"overflow_size":false,"handle_url_change":true,"style":"","ver":"v3.9.3","vast":{"0":[{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/vdoai-dfp-parent-adunit\/z1_dfp_v_itsolutionstuff_v_pre_1v&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm","floor":null},{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_First_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_pre_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm_apac","floor":null}],"5":[{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Second_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid1_1v&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm","floor":null},{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Second_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid1_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm_apac","floor":null}],"10":[{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_third_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid2_1v&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm","floor":null},{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_third_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid2_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm_apac","floor":null}],"15":[{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Fourth_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid3_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm","floor":null},{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Fourth_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid3_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm_apac","floor":null}],"20":[{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Fifth_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid4_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm","floor":null},{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Fifth_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid4_1&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm_apac","floor":null}],"25":[{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/26001828,22565357933\/DFP_Z1_Parent_Sixth_AdBreak\/z1_dfp_v_itsolutionstuff_v_mid4_2&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm","floor":null},{"ad_url":"pubads.g.doubleclick.net\/gampad\/ads?iu=\/22100121508,22565357933\/DFP_APAC_Parent_Sixth_AdBreak\/ellipsis_dfp_v_itsolutionstuff_v_mid4_2&description_url=http%3A%2F%2Fitsolutionstuff.com&tfcd=0&npa=0&gdfp_req=1&output=vast&unviewed_position_start=1&env=vp&impl=s&correlator=&vpos=preroll&sz=288x162%7C300x250%7C400x300%7C419x236%7C640x360%7C640x480%7C1x1","partner":"google_mcm_apac","floor":null}]}};

  var checkTimer;


  function callAdframe() {
    if(!playerLoaded) {
        playerLoaded = true;
        clearInterval(checkTimer);
        window.vdo_ai_.cmd.push(function() {
          window.initVdo(adframeConfig);
        });

    }
  }


  function loadScriptSync(src, id) {
    return new Promise(function(resolve, reject) {

        if(src.indexOf('ima3.js') > 0 && document.querySelector('script[src*="imasdk.googleapis.com/js/sdkloader/ima3.js"]')) {
          if(window.google && window.google.ima) {

            resolve();
            return false;
          } else {
            document.querySelector('script[src*="imasdk.googleapis.com/js/sdkloader/ima3.js"]').addEventListener('load', resolve);
            return false;
          }
        }
        var s = document.createElement("script");
        s.id = id;
        var existingScript = document.getElementById(id);

        s.async = true;
        s.src = protocol + src;
        document.body.appendChild(s);
        var timestamp = Date.now();

        s.onload = function(e) {
          
          vdo_analytics('event', 'timing_complete', {
            name: 'load_' + (src.indexOf('vdo.min.js') >= 0 ? 'vdo.min.js' : 'ima3.js'),
            value: Date.now() - timestamp,
            event_category: 'video',
            send_to: vdo_analyticsID,
            event_label: "v-itsolutionstuff",
          });

          resolve();
        };

      s.onerror = function (e) {
        if (src.includes("ima3.js")) {
          var blockedImaObject = {
            domainName: location.hostname,
            page_url: location.href,
            tagName: "v-itsolutionstuff",
            event: "blocked_ima",
            eventData: 1,
          };
          logPixel(blockedImaObject);
          vdo_analytics("event", "blocked_ima", {
            send_to: vdo_analyticsID,
            event_category: "vdoaijs",
            event_label: "v-itsolutionstuff",
            page_location: location.href,
            page_title: document.title,
          });
        }
        resolve();
      };
      
      })
  }

  function inIframe(){try{return self!==top}catch(r){return!0}}var iframe_Burst=inIframe() ? insideSafeFrame() ? false : true : false;



  //#region full_dependencies testing
  function startTag(version){

                    loadPlayerDiv('_vdo_ads_player_ai_3621','v-itsolutionstuff',iframe_Burst);
                    loadGptCompanion('v-itsolutionstuff');
                checkTimer = setInterval(function() {
                    if(window.initVdo && typeof window.google != 'undefined' && window.google.ima) {
                     callAdframe();
                    }
                }, 1000);
       if(typeof window.initVdo !== 'function') {  // Check for existing dependencies
            Promise.all([
              loadScriptSync(deps + "dependencies_hbv4_latest/vdo.min.js?v="+((typeof version === 'undefined') ? '' : version), "_vdo_ads_css_5654_"),
              loadScriptSync("//imasdk.googleapis.com/js/sdkloader/ima3.js", "_vdo_ads_sdk_5654_")
            ]).then(function() {
               callAdframe();
          }).catch(function (e) {
            if (e.target) {
              var msg =
              "error_" +
              (e.target.src.indexOf("vdo.min.js") >= 0
              ? "vdo.min.js"
              : "ima3.js");
            } else {
              var msg = e;
            }
            logError(msg,"v-itsolutionstuff");
       })
        }

  }
  function loadGptCompanion(parentDivId) {
    let countryTargeting = ["US","CA","AU","KR","MX","CL","BR","AE","QA","GB","DE","ES","SA"];
    if (!countryTargeting.includes(adframeConfig.country) || adframeConfig.allowed !== 'true')
      return;
    let parentDiv = document.getElementById(parentDivId);
    if (parentDiv) {
      adframeConfig.desktop.companionOff = true;
      adframeConfig.mobile.companionOff = true;
      var availableWidth = parentDiv.clientWidth;
      var allSizes = [[300, 50], [320, 50], [468, 60], [728, 90], [320, 100], [300, 100], [970, 90]];
      var sizes = allSizes.filter(function (size) {
        if (size[0] <= availableWidth) {
          return true;
        }
        return false;
      });
      var slotName = "/26001828," + adframeConfig.google_mcm + "/z1_dfp_ron_display_companion_b_pre";
      if (sizes.length) {
        let previousCompanionDiv = document.getElementById("vdo-banner-ad");
        let companionAd = document.createElement("div");
        companionAd.id = "vdo-banner-ad";
        companionAd.style.order = "1";
        companionAd.style.textAlign = "center";
        companionAd.style.marginTop = "10px";
        parentDiv.insertAdjacentElement("afterend", companionAd);
        let gptScript = document.createElement("script");
        gptScript.async = true;
        gptScript.src = "https://securepubads.g.doubleclick.net/tag/js/gpt.js";
        document.head.appendChild(gptScript);
        window.googletag = window.googletag || {
          cmd: [],
        };
        window.googletag.cmd = window.googletag.cmd || [];
        window.googletag.cmd.push(function () {
          if (previousCompanionDiv) {
            window.googletag.destroySlots([window.vdoCompanionGptSlot]);
            clearTimeout(window.vdoCompanionRefreshTimer);
            previousCompanionDiv.remove();
          }
          window.vdoCompanionGptSlot = window.googletag.defineSlot(slotName, sizes, "vdo-banner-ad").addService(window.googletag.pubads()).setTargeting("site", [adframeConfig.domain]);
          window.googletag.pubads().set("page_url", window.location.href);
          window.googletag.enableServices();
        });
        window.googletag.cmd.push(function () {
          refreshInterval = 60000;
          window.googletag.display("vdo-banner-ad");
          if (window.googletag.pubads().isInitialLoadDisabled()) {
            window.googletag.pubads().refresh([window.vdoCompanionGptSlot]);
          }
          var timestamp;
          var isCreativeViewable = false;
          if (!window.vdo_companion_event) {
            window.vdo_companion_event = true;
            window.googletag.pubads().addEventListener("slotRenderEnded", function (event) {
              if (event.slot.getAdUnitPath() === slotName) {
                var containsAd = !event.isEmpty;
                isCreativeViewable = false;
                if (event.size && event.size[0]) {
                  let companionAdDiv = document.getElementById("vdo-banner-ad");
                  companionAdDiv.style.maxWidth = event.size[0] + "px";
                  companionAdDiv.style.margin = "2px auto";
                }
                if (containsAd) {
                  refreshInterval = 30000;
                  timestamp = Date.now();
                } else {
                  window.vdoCompanionRefreshTimer = setTimeout(function () {
                    isCreativeViewable = false;
                    window.googletag.pubads().refresh([window.vdoCompanionGptSlot]);
                  }, refreshInterval);
                }
              }
            });
            window.googletag.pubads().addEventListener("slotVisibilityChanged", function (event) {
              if (event.slot.getAdUnitPath() === slotName && !isCreativeViewable) {
                var timeFromRender = Date.now() - timestamp;
                if (event.inViewPercentage >= 50) {
                  isCreativeViewable = true;
                  if (timeFromRender >= refreshInterval) {
                    window.vdoCompanionRefreshTimer = setTimeout(function () {
                      window.googletag.pubads().refresh([window.vdoCompanionGptSlot]);
                    }, 1000);
                  } else {
                    window.vdoCompanionRefreshTimer = setTimeout(function () {
                      window.googletag.pubads().refresh([window.vdoCompanionGptSlot]);
                    }, refreshInterval - timeFromRender);
                  }
                }
              }
            });
          }
        });
      }
    }
  }
  var current_url = location.host + location.pathname;
  current_url = current_url.replace(/(\/*)$/, '').replace(/^(?:https?:\/\/)?(?:www\.)?/i, "");
  var failsafeCheck = false;
  var oReq = new XMLHttpRequest();
  oReq.onload = function() {    vdo_analytics('event', 'timing_complete', {
      name: 'load_allowed_url.php',
      value: Date.now() - allowedUrlTimestamp,
      event_category: 'video',
      send_to: vdo_analyticsID,
      event_label: "v-itsolutionstuff",
    });    try {
    if(!failsafeCheck) {
      failsafeCheck = true;
      clearTimeout(failsafeTimeout);
      var response = JSON.parse(this.response);

      if(response.agent=="false"){
        

          adframeConfig = Object.assign(adframeConfig, response);
          if(typeof custom_placement_id !== 'undefined'){
            var feedReq = new XMLHttpRequest();
            feedReq.onerror = function() { 
              startTag(adframeConfig.ver);
            }
            feedReq.onload = function() { 
              try{
                var feedResponse = JSON.parse(this.response);
                console.log(feedResponse)
                adframeConfig = Object.assign(adframeConfig, feedResponse);
              
              }catch(r){
              
              }
              startTag(adframeConfig.ver);
            }.bind(feedReq);
            feedReq.open('get', '//a.vdo.ai/core/v-itsolutionstuff/dynamic_feed?playlist_id=' + custom_placement_id, true);
            feedReq.send();  
          }
          else{
            startTag(adframeConfig.ver);
          }
    

      }
      else{
        var requestObject = {
          domainName: location.hostname,
          page_url:location.href,
          tagName: 'v-itsolutionstuff',
          event: 'blocked_agent',
          eventData: 1,
          uid: ''
        };

        logPixel(requestObject);        vdo_analytics('event', 'blocked_agent', { send_to: vdo_analyticsID, event_category: 'vdoaijs', event_label: 'v-itsolutionstuff' });
      }
    }
  } catch (e) {
    logError(e,'v-itsolutionstuff');
  }
}.bind(oReq);
  oReq.open("get", "https://targeting.vdo.ai/allowed_url.php?type=json&url=" + encodeURIComponent(current_url) + "&tag=v-itsolutionstuff&domain=" + adframeConfig.domain, true);
  var allowedUrlTimestamp = Date.now();
  oReq.send();

  var failsafeTimeout = setTimeout(function() {
    if(!failsafeCheck) {
      failsafeCheck = true;
      var response = {"allowed":"true","agent":"false","ip_address":"null","country":"unknown"}; // Hardcoded default response in case of call takes more than 3seconds
      adframeConfig = Object.assign(adframeConfig, response);
      startTag(adframeConfig.ver);
    }
  }, 3000);


  //#endregion

})(w_vdo, d_vdo, '//a.vdo.ai/core/', 'v-itsolutionstuff');


} catch (e) {
  logError(e,'v-itsolutionstuff');
}