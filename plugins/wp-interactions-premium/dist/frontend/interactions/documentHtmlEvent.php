<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/documentHtmlEvent.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({documentHtmlEvent:{initTimeline:n=>{const t=n.getOption("event","");if(t){let e=null;const i=()=>{e?.destroy(!1),(e=n.createTimelineInstance(0))?.play()};return document.addEventListener(t,i),()=>{e?.destroy(),document.removeEventListener(t,i)}}}}});
JS;
	