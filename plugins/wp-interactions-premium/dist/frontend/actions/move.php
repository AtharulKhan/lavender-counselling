<?php
/**
 * This is an auto-generated script from src/action-types/frontend/move.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({move:{initAction:e=>{var t={};void 0!==e.getValue("x")&&(t.translateX=e.getValue("x")),void 0!==e.getValue("y")&&(t.translateY=e.getValue("y")),void 0!==e.getValue("z")&&(t.translateZ=e.getValue("z")),e.initActionAnimation(t)},initialStyles:e=>{var t=[];return void 0!==e.getValue("x")&&t.push(`translateX(\${e.getValue("x")}px)`),void 0!==e.getValue("y")&&t.push(`translateY(\${e.getValue("y")}px)`),void 0!==e.getValue("z")&&t.push(`translateZ(\${e.getValue("z")}px)`),0===t.length?"":`transform: \${t.join(" ")};`}}});
JS;
	