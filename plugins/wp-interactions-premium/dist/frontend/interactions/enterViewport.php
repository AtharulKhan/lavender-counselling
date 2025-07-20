<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/enterViewport.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({enterViewport:{initTimeline:n=>{var e=n.getOption("threshold",.3);let t=null;const r=new IntersectionObserver(e=>{e.forEach(e=>{e=e.isIntersecting?0:1;n.timelines[e].hasActions&&(t?.destroy(!1),(t=n.createTimelineInstance(e))?.play())})},{threshold:e});return r.observe(n.getCurrentTrigger()),()=>{t?.destroy(),r.disconnect()}}}});
JS;
	