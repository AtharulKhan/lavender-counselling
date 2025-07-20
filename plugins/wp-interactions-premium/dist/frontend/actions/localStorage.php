<?php
/**
 * This is an auto-generated script from src/action-types/frontend/localStorage.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({localStorage:{initAction:e=>{e.initActionFunction(()=>{localStorage.setItem(e.getValue("key"),e.getValue("value"))})},initialStyles:e=>{localStorage.setItem(e.getValue("key"),e.getValue("value"))}}});
JS;
	