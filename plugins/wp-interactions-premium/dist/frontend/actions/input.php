<?php
/**
 * This is an auto-generated script from src/action-types/frontend/input.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({input:{initAction:e=>{e.initActionFunction(()=>{const a=e.getValue("value");e.getTargets().forEach(e=>{let t=e;(t=e.tagName&&e.tagName.toLowerCase().match(/^(input|textarea|select)$/)?t:e.querySelector("input, textarea, select"))&&("checkbox"===t.type||"radio"===t.type?a&&"false"!==a?t.checked=!0:t.checked=!1:t.value=a)})})}}});
JS;
	