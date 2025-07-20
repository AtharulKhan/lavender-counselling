<?php
/**
 * This is an auto-generated script from src/action-types/frontend/scale.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({scale:{initAction:e=>{e.initActionAnimation({scaleX:e.getValue("x"),scaleY:e.getValue("y")})},initialStyles:e=>`transform: scaleX(\${e.getValue("x")}) scaleY(\${e.getValue("y")});`}});
JS;
	