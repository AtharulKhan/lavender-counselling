<?php
/**
 * This is an auto-generated script from src/action-types/frontend/addUrlHash.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({addUrlHash:{initAction:n=>{n.initActionFunction(()=>{window.location.hash=n.getValue("hash")})}}});
JS;
	