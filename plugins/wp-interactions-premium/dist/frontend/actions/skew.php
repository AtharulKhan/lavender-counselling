<?php
/**
 * This is an auto-generated script from src/action-types/frontend/skew.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({skew:{initAction:e=>{e.initActionAnimation({skewX:e.getValue("x"),skewY:e.getValue("y")})},initialStyles:e=>`transform: skewX(\${e.getValue("x")}) skewY(\${e.getValue("y")});`}});
JS;
	