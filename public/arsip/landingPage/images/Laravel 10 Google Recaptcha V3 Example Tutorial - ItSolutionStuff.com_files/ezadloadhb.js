try { __ez.fads.adLoadHB=(__ez.fads.adLoadHB&&__ez.fads.adLoadHB.loaded===true)?__ez.fads.adLoadHB:{loaded:true,timeoutSet:false,auctionStatus:{},init:function(vp_ht,doc_ht){__ez_fad_pb();},LoadAd:function(id,count){if(!this.auctionRunning(id)){var slot=this.GetHBSlotById(id);if(typeof slot!=='undefined'){this.setTimeout(700);this.requestBids(id,[slot]);}else if(count<15){setTimeout(function(){__ez.fads.adLoadHB.LoadAd(id,count+1)},100);}else{this.auctionStatus[id]='complete';}}},requestBids:function(id,adUnits){this.auctionStatus[id]='running';if(typeof epbjs==='undefined'||typeof epbjs.requestBids!=='function'||typeof epbjs.addAdUnits!=='function'){setTimeout(function(){__ez.fads.adLoadHB.requestBids(id,adUnits)},100);return;}
if(typeof window.ezoResponsiveSizes!=="undefined"){for(var i=0;i<adUnits.length;i++){adUnits[i]=window.epbjsApplyResponsiveSizes(adUnits[i]);}}
epbjs.addAdUnits(adUnits);epbjs.requestBids({adUnits:adUnits,bidsBackHandler:function(bidResponses){__ez.fads.adLoadHB.bidResponse(bidResponses,id);},});},bidResponse:function(bidResponses,id){this.auctionStatus[id]='complete';if(typeof window.ezosethbbids=="function"){window.ezosethbbids(bidResponses);}else{window.ezosethbbidsInterval=setInterval(function(bidResponses){if(typeof ezosethbbids=="function"){ezosethbbids(bidResponses);}},130,bidResponses,);}},auctionComplete:function(id){if(typeof this.auctionStatus[id]=='undefined'){return false;}else{return this.auctionStatus[id]=='complete';}},auctionRunning:function(id){if(typeof this.auctionStatus[id]=='undefined'){return false;}else{return this.auctionStatus[id]=='running';}},setTimeout:function(timeout){if(this.timeoutSet){return;}
this.timeoutSet=true;if(typeof epbjs!=='undefined'&&typeof epbjs.mergeConfig==='function'){epbjs.mergeConfig({bidderTimeout:timeout});}},GetHBSlotById:function(id){if(typeof epbjs!=='undefined'&&typeof epbjs.ezAdUnits!=='undefined'){return epbjs.ezAdUnits.find(unit=>unit.code===id);}else{}},};var __ez_fad_ezpbinitd=false;function __ez_fad_pb(){if(__ez_fad_ezpbinitd==false&&typeof __ez_fad_ezpbinit=='function')
{__ez_fad_ezpbinitd=true;__ez_fad_ezpbinit();}else if(__ez_fad_ezpbinitd==false)
{setTimeout(function(){__ez_fad_pb()},100);}}} catch(err) {var hREED = function(er) {return function() {reportEzError(er, "/porpoiseant/ezadloadhb.js")}}; typeof reportEzError==="function"?hREED(err):window.addEventListener('reportEzErrorDefined',hREED(err), {once: true}); console.error(err);}