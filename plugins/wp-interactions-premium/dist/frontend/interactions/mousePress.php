<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/mousePress.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({mousePress:{initTimeline:n=>{const t=n.getOption("preventDefault",!1);let r=null,i=null,o=!1;const e=e=>{t&&e.preventDefault(),o=!0,n.timelines[0].hasActions&&(e.preventDefault(),i?.destroy(!1),(r=n.createTimelineInstance(0))?.play())},s=()=>{o=!1,n.timelines[1].hasActions&&(r?.destroy(!1),(i=n.createTimelineInstance(1))?.play())},a=e=>{o&&(t&&e.preventDefault(),s())},p=()=>{o&&s()},d=n.getCurrentTrigger();return d.addEventListener("pointerdown",e),d.addEventListener("pointerup",a),d.addEventListener("pointercancel",a),document.addEventListener("pointerup",p),()=>{r?.destroy(),i?.destroy(),d.removeEventListener("pointerdown",e),d.removeEventListener("pointerup",a),d.removeEventListener("pointercancel",a),document.removeEventListener("pointerup",p)}}}});
JS;
	