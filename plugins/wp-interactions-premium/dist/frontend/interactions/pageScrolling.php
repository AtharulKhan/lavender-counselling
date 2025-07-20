<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/pageScrolling.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({pageScrolling:{initTimeline:e=>{const t=e.getOption("smoothness",200),o=e.createTimelineInstance(0,{}),n=e=>{var n=(document.body.scrollTop||document.documentElement.scrollTop)/(document.documentElement.scrollHeight-document.documentElement.clientHeight);o.seekPercentage(n,!0===e?0:t)};return window.addEventListener("scroll",n),n(!0),()=>{o.destroy(),window.removeEventListener("scroll",n)}}}});
JS;
	