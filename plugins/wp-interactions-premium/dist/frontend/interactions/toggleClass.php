<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/toggleClass.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({toggleClass:{initTimeline:n=>{const i=n.getOption("class",!1);if(i){let t=null;const r=e=>{n.timelines[e].hasActions&&(t?.destroy(!1),(t=n.createTimelineInstance(e))?.play())},e=new MutationObserver(e=>{for(const s of e){var t=s.target,n=s.oldValue.split(" "),t=Array.from(t.classList);t.includes(i)&&!n.includes(i)?r(0):!t.includes(i)&&n.includes(i)&&r(1)}});return e.observe(n.getCurrentTrigger(),{attributes:!0,attributeFilter:["class"],attributeOldValue:!0}),()=>{t?.destroy(),e.disconnect()}}}}});
JS;
	