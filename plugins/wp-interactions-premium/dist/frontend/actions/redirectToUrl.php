<?php
/**
 * This is an auto-generated script from src/action-types/frontend/redirectToUrl.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({redirectToUrl:{initAction:i=>{i.initActionFunction(()=>{window.location.href=i.getValue("url")})}}});
JS;
	