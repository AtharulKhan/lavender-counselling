<?php
/**
 * This is an auto-generated script from src/action-types/frontend/insertHtml.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({insertHtml:{initAction:n=>{n.initActionFunction(()=>{n.getTargets().forEach(t=>{t.insertAdjacentHTML(n.getValue("position"),n.getValue("html"))})})}}});
JS;
	