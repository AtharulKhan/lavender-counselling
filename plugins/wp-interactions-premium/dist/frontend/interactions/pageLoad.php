<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/pageLoad.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addInteractionConfig({pageLoad:{initTimeline:e=>{let t=null;var n=()=>{t?.destroy(!1),(t=e.createTimelineInstance(0))?.play()};if("undefined"!=typeof document)return"complete"===document.readyState||"interactive"===document.readyState?n():document.addEventListener("DOMContentLoaded",n),()=>{t?.destroy()}}}});
JS;
	