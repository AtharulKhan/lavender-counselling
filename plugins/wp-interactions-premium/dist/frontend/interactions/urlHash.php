<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/urlHash.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({urlHash:{initTimeline:a=>{let h=a.getOption("hash","");if(h){h="#"+h;let t=null;const e=e=>{var n=new URL(e.oldURL).hash,e=new URL(e.newURL).hash;n===e||n!==h&&e!==h||(n=e===h?0:1,t?.destroy(!1),(t=a.createTimelineInstance(n))?.play())};return addEventListener("hashchange",e),()=>{t?.destroy(),removeEventListener("hashchange",e)}}}}});
JS;
	