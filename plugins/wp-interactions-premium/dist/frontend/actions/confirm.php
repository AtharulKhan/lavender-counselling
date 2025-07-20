<?php
/**
 * This is an auto-generated script from src/action-types/frontend/confirm.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({confirm:{initAction:n=>{n.initActionFunction(()=>{if(!window.confirm(n.getValue("message")))return!1})}}});
JS;
	