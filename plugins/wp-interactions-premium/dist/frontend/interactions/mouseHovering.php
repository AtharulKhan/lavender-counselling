<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/mouseHovering.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({mouseHovering:{initTimeline:e=>{const r=e.getOption("smoothness",200),t=e.getOption("resetToCenter",!0),n=e.getOption("resetDelay",1e3),i=e.createTimelineInstance(0,{}),o=e.createTimelineInstance(1,{}),s=e.getCurrentTrigger();let a=null;const c=e=>{var t,n;e.currentTarget===s&&(clearTimeout(a),t=s.getBoundingClientRect(),n=e.clientX-t.left,e=e.clientY-t.top,n=n/t.width,e=e/t.height,i.seekPercentage(n,r),o.seekPercentage(e,r))},g=e=>{t&&e.currentTarget===s&&(clearTimeout(a),a=setTimeout(()=>{i.seekPercentage(.5,700),o.seekPercentage(.5,700)},n))};return s.addEventListener("mousemove",c),s.addEventListener("mouseleave",g),i.seekPercentage(.5),o.seekPercentage(.5),()=>{i?.destroy(),o?.destroy(),s.removeEventListener("mousemove",c),s.removeEventListener("mouseleave",g),clearTimeout(a)}}}});
JS;
	