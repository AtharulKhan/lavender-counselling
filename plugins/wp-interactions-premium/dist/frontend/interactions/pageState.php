<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/pageState.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({pageState:{initTimeline:t=>{const a=t.getOption("state","");let n=null;const i=e=>{t.timelines[e].hasActions&&(n?.destroy(!1),(n=t.createTimelineInstance(e))?.play())},e=e=>{let{oldValue:t="",newValue:n=""}=e.detail;t=t.toLowerCase(),(n=n.toLowerCase())===a&&t!==a?i(0):n!==a&&t===a&&i(1)};return addEventListener("wpi/page-state",e),()=>{n?.destroy(),removeEventListener("wpi/page-state",e)}}}});
JS;
	