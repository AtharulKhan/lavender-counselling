<?php
/**
 * This is an auto-generated script from src/action-types/frontend/incrementDecrement.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({incrementDecrement:{initAction:o=>{o.initActionFunction(()=>{o.getTargets().forEach(t=>{var r="decrement"===o.getValue("mode")?-1:1,a=o.getValue("property");if(a){let e=parseInt(t.getAttribute(a));isNaN(e)&&(e=0),t.setAttribute(a,e+r)}else for(var a=t,n=r,e=document.createTreeWalker(a,NodeFilter.SHOW_TEXT,null,!1);e.nextNode();){var i=e.currentNode,l=i.parentNode.nodeName.toLowerCase();if(!["style","script","pre","code","svg","g","path","circle","ellipse","line","polygon","polyline","rect","text","use","defs","linearGradient","radialGradient","stop","image","view","animate","animateTransform","mask","pattern","clipPath","filter","feGaussianBlur","feOffset","feMerge","desc","title"].includes(l)){let e=i.nodeValue;var l=e.match(/\d+/g);if(l)return void(l=l[0],l=parseInt(l),e=e.replace(l,l+n),i.nodeValue=e)}}})})}}});
JS;
	