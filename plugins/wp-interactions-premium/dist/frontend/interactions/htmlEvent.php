<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/htmlEvent.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({htmlEvent:{initTimeline:n=>{const t=n.getOption("event","");if(t){let e=null;const r=()=>{e?.destroy(!1),(e=n.createTimelineInstance(0))?.play()},i=n.getCurrentTrigger();return i.addEventListener(t,r),()=>{e?.destroy(),i.removeEventListener(t,r)}}}}});
JS;
	