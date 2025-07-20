<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/hover.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({hover:{initTimeline:n=>{let t=null,r=null;const e=e=>{n.timelines[0].hasActions&&(e.preventDefault(),r?.destroy(!1),(t=n.createTimelineInstance(0))?.play())},i=e=>{n.timelines[1].hasActions&&(e.preventDefault(),t?.destroy(!1),(r=n.createTimelineInstance(1))?.play())},s=n.getCurrentTrigger();return s.addEventListener("mouseenter",e),s.addEventListener("mouseleave",i),()=>{r?.destroy(!1),t?.destroy(!1),s.removeEventListener("mouseenter",e),s.removeEventListener("mouseleave",i)}}}});
JS;
	