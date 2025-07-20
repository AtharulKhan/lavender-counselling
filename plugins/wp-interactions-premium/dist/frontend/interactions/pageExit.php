<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/pageExit.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({pageExit:{initTimeline:n=>{if(!("ontouchstart"in window||navigator.maxTouchPoints)){var e=n.getOption("delay",2),e=1e3*parseFloat(e);let t=null;const o=e=>{null===e.toElement&&null===e.relatedTarget&&(t?.destroy(!1),(t=n.createTimelineInstance(0))?.play())};return setTimeout(()=>{document.addEventListener("mouseout",o)},e),()=>{t?.destroy(),document.removeEventListener("mouseout",o)}}}}});
JS;
	