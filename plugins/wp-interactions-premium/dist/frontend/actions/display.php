<?php
/**
 * This is an auto-generated script from src/action-types/frontend/display.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({display:{initAction:i=>{i.initActionAnimation({display:i.getValue("display")})},initialStyles:i=>`display: \${i.getValue("display")};`}});
JS;
	