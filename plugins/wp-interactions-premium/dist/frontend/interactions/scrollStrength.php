<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/scrollStrength.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({scrollStrength:{initTimeline:e=>{const o=e.getOption("smoothness",200),n=e.getOption("max_scroll",100),l=e.createTimelineInstance(0,{});let c=Math.max(document.body.scrollTop||document.documentElement.scrollTop,document.body.scrollLeft||document.documentElement.scrollLeft),r=0;const t=()=>{var e=Math.max(document.body.scrollTop||document.documentElement.scrollTop,document.body.scrollLeft||document.documentElement.scrollLeft),t=Math.abs(e-c);r=Math.min(t/n,1),l.seekPercentage(r,o),c=e};let s;const d=()=>{window.clearTimeout(s),s=setTimeout(function(){r=0,l.seekPercentage(r,o)},66)};return window.addEventListener("scroll",t),window.addEventListener("scroll",d),()=>{l.destroy(),window.removeEventListener("scroll",t),window.removeEventListener("scroll",d)}}}});
JS;
	