<?php
/**
 * This is an auto-generated script from src/action-types/frontend/focus.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({focus:{initAction:e=>{e.initActionFunction(()=>{var t=e.getTargets();if(t.length){var t=t[0];if(t.focus)try{t.focus()}catch(t){}document.activeElement!==t&&(t=t.querySelector('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'))&&t.focus()}})}}});
JS;
	