<?php
/**
 * This is an auto-generated script from src/action-types/frontend/replaceText.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({replaceText:{initAction:n=>{n.initActionFunction(()=>{n.getTargets().forEach(e=>{for(var t=n.getValue("text"),r=document.createTreeWalker(e,NodeFilter.SHOW_TEXT,null,!1);r.nextNode();){var a=r.currentNode,i=a.parentNode.nodeName.toLowerCase();if(!["style","script","pre","code","svg","g","path","circle","ellipse","line","polygon","polyline","rect","text","use","defs","linearGradient","radialGradient","stop","image","view","animate","animateTransform","mask","pattern","clipPath","filter","feGaussianBlur","feOffset","feMerge","desc","title"].includes(i))return void(a.nodeValue=t)}})})}}});
JS;
	