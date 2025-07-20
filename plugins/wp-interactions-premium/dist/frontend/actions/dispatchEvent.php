<?php
/**
 * This is an auto-generated script from src/action-types/frontend/dispatchEvent.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({dispatchEvent:{initAction:e=>{e.initActionFunction(()=>{e.getTargets().forEach(t=>{t.dispatchEvent(new CustomEvent(e.getValue("event"),{detail:e.getValue("value")}))})})}}});
JS;
	