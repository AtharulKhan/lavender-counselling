<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/toggleAttribute.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({toggleAttribute:{initTimeline:l=>{const i=l.getOption("attribute",!1),r=l.getOption("value","");if(i){let e=null;const a=t=>{l.timelines[t].hasActions&&(e?.destroy(!1),(e=l.createTimelineInstance(t))?.play())},t=new MutationObserver(t=>{for(const n of t){var e=n.target,l=e.hasAttribute(i),e=e.getAttribute(i);l&&!r&&null===n.oldValue?a(0):l||r||null===n.oldValue?l&&n.oldValue!==r&&e===r?a(0):(l&&n.oldValue===r&&e!==r||!l&&n.oldValue===r)&&a(1):a(1)}});return t.observe(l.getCurrentTrigger(),{attributes:!0,attributeFilter:[i],attributeOldValue:!0}),()=>{e?.destroy(),t.disconnect()}}}}});
JS;
	