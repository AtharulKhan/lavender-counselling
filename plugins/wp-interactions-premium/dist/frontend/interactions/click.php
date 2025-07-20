<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/click.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({click:{initTimeline:t=>{const r=t.getOption("preventDefault",!1);var e=t.getOption("buttonRole",!1);const n=1<t.getTriggers().length;let i=null;const a=e=>{e instanceof KeyboardEvent&&"Enter"!==e.key&&" "!==e.key||(r&&e.preventDefault(),i?.destroy(!1),(i=t.createTimelineInstance(0))?.play(),n&&(t.getTriggers().forEach(e=>{e.setAttribute("aria-selected","false")}),t.getCurrentTrigger().setAttribute("aria-selected","true")))};var s=t.getCurrentTrigger();return e&&(s.setAttribute("role","button"),s.setAttribute("tabindex","0")),s.addEventListener("click",a),s.addEventListener("keydown",a),n&&s.setAttribute("aria-selected",t.getTriggers()[0]===s?"true":"false"),()=>{i?.destroy();var e=t.getCurrentTrigger();e.removeEventListener("click",a),e.removeEventListener("keydown",a)}}}});
JS;
	