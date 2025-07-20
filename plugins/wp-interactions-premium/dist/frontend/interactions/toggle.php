<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/toggle.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({toggle:{initTimeline:n=>{const r=n.getOption("preventDefault",!1);var e=n.getOption("buttonRole",!1);let i=0,s=null;const t=e=>{var t;e instanceof KeyboardEvent&&"Enter"!==e.key&&" "!==e.key||(r&&e.preventDefault(),t=i++%2==0?0:1,e.target.setAttribute("aria-pressed",0==t),n.timelines[t].hasActions&&(s?.destroy(!1),(s=n.createTimelineInstance(t))?.play()))},a=n.getCurrentTrigger();return e&&(a.setAttribute("role","button"),a.setAttribute("tabindex","0")),a.addEventListener("click",t),a.addEventListener("keydown",t),a.setAttribute("aria-pressed",!1),()=>{s?.destroy(),a.removeEventListener("click",t),a.removeEventListener("keydown",t),a.setAttribute("aria-pressed",!1)}}}});
JS;
	