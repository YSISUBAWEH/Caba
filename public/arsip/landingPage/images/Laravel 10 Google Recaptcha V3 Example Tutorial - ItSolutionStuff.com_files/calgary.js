try { !function(a9,a,p,s,t,A,g){if(a[a9])return;function q(c,r){a[a9]._Q.push([c,r])}
a[a9]={init:function(){q("i",arguments)},fetchBids:function(){q("f",arguments)},setDisplayBids:function(){},targetingKeys:function(){return[]},_Q:[]};A=p.createElement(s);A.async=!0;A.src=t;g=p.getElementsByTagName(s)[0];g.parentNode.insertBefore(A,g)}("apstag",window,document,"script","//c.amazon-adsystem.com/aax2/apstag.js");var schain_domain='ezoic.ai';if(typeof __ez_nid!='undefined'&&__ez_nid==21732118914){schain_domain='ezoic.co.uk';}
var dom="";var observersList=[];if(typeof location.host!='undefined'){dom=location.host;}
window.amznVideoResponse={};apstag.init({pubID:__ezapid,adServer:'googletag',videoAdServer:'DFP',schain:{complete:1,ver:'1.0',nodes:[{asi:schain_domain,sid:__sellerid,domain:dom,hp:1}]}});function getAmazonSlotById(id){if(typeof __ezaps==='undefined'){return;}
for(var i=0;i<__ezaps.length;i++){var slot=__ezaps[i];if(typeof slot==='undefined'){continue;}
var slotID=slot.slotID;if(typeof slotID!=='undefined'&&slotID==id){var pageAdDiv=document.getElementById(id);if(!pageAdDiv){return slot;}
var responsiveSizes=getResponsiveSlotSize(slotID);if(responsiveSizes.length>0){slot.sizes=responsiveSizes;}
return slot;}}
return false;}
var ezrsCache={};function getResponsiveSlotSize(slotID){var clientWidth=document.documentElement.clientWidth;var clientHeight=document.documentElement.clientHeight;if(ezrsCache.clientWidth!=clientWidth||ezrsCache.clientHeight!=clientHeight){ezrsCache={clientWidth:document.documentElement.clientWidth,clientHeight:document.documentElement.clientHeight,slotSizes:{}};}
if(typeof ezrsCache.slotSizes[slotID]!=='undefined'){return ezrsCache.slotSizes[slotID];}
if(typeof window.ezoResponsiveSizes==='undefined'){return "";}
var responsiveSlotTemplate=ezoResponsiveSizes[slotID];if(!responsiveSlotTemplate||responsiveSlotTemplate.length===0){return "";}
var sizesCanShow=[];var sizeDirectiveBestFit="";for(var i=0;i<responsiveSlotTemplate.responsiveSizes.length;i++){var sizeDirective=responsiveSlotTemplate.responsiveSizes[i];var meetsViewportRequirements=(sizeDirective.minWidth<=clientWidth&&sizeDirective.minHeight<=clientHeight);var isLargerRequirementsThatPrev=(sizeDirectiveBestFit===""||(sizeDirective.minWidth>=sizeDirectiveBestFit.minWidth&&sizeDirective.minHeight>=sizeDirectiveBestFit.minHeight));if(meetsViewportRequirements&&isLargerRequirementsThatPrev){sizeDirectiveBestFit=sizeDirective;}}
if(sizeDirectiveBestFit!==""){sizesCanShow=sizeDirectiveBestFit.sizes;if(sizeDirectiveBestFit.altSizes){sizesCanShow.concat(sizeDirectiveBestFit.altSizes);}}else{sizesCanShow=[0,0];}
ezrsCache.slotSizes[slotID]=sizesCanShow;return sizesCanShow;}
function ezapsFetchBids(amazonSlots,adType){if(typeof amazonSlots==='undefined'||amazonSlots.length===0){return}
apstag.fetchBids({slots:amazonSlots,timeout:2e3},function(bids){setA9DisplayBids(bids);});}
function lazyLoadEzapsFetchBids(amazonSlots){if(typeof amazonSlots==='undefined'||amazonSlots.length===0){return}
if(typeof observersList!=='undefined'&&observersList.length>0){for(let i=0;i<observersList.length;i++){if(typeof observersList[i]===IntersectionObserver){observersList[i].disconnect();}}}
observersList=[];for(slot in amazonSlots){var options={root:null,rootMargin:'1000px',threshold:0};var amazonBidLL=new IntersectionObserver((entries,observer)=>{entries.forEach(function(entry){if(entry.isIntersecting){if(typeof observersList!=='undefined'&&typeof amazonBidLL!=='undefined'){var curIndex=observersList.indexOf(amazonBidLL);if(curIndex>-1){observersList.splice(curIndex,1);}
amazonBidLL.disconnect();}
apstag.fetchBids({slots:[getAmazonSlotById(entry.target.id)],timeout:2e3},function(bids){setA9DisplayBids(bids);});}});},options);var curElement=document.getElementById(amazonSlots[slot].slotID);if(typeof curElement!=='undefined'&&curElement!=null){amazonBidLL.observe(curElement);}
if(typeof observersList!=='undefined'&&typeof amazonBidLL!=='undefined'){observersList.push(amazonBidLL);}}}
function setA9VideoBids(bids){for(b in bids){var bid=bids[b];window.amznVideoResponse[bid.slotID].params=bid.qsParams;window.amznVideoResponse[bid.slotID].raw=bid;}}
function setA9DisplayBids(bids){if(typeof bids==='undefined'||bids.length==0){return;}
var keys=apstag.targetingKeys();for(var i=0;i<bids.length;i++){var bid=bids[i];for(var k=0;k<keys.length;k++){if(keys[k]in bid){ezSetSlotTargeting(bid.slotID,keys[k],bid[keys[k]]);}}}}
if(typeof __tcfapi!="undefined"){}else{if(typeof __ezapsVideo!='undefined'){ezapsFetchBids(__ezapsVideo,'video')}}} catch(err) {var hREED = function(er) {return function() {reportEzError(er, "/edmontonalberta/calgary.js")}}; typeof reportEzError==="function"?hREED(err):window.addEventListener('reportEzErrorDefined',hREED(err), {once: true}); console.error(err);}