<?php
/**
 * This is an auto-generated script from src/action-types/frontend/rotate3d.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({rotate3d:{initAction:e=>{var t={perspective:"1500px"};void 0!==e.getValue("x")&&(t.rotateX=e.getValue("x")),void 0!==e.getValue("y")&&(t.rotateY=e.getValue("y")),void 0!==e.getValue("z")&&(t.rotateZ=e.getValue("z")),e.initActionAnimation(t)},initialStyles:e=>{var t=["perspective(1500px)"];return void 0!==e.getValue("x")&&t.push(`rotateX(\${e.getValue("x")}deg)`),void 0!==e.getValue("y")&&t.push(`rotateY(\${e.getValue("y")}deg)`),void 0!==e.getValue("z")&&t.push(`rotateZ(\${e.getValue("z")}deg)`),1===t.length?"":`transform: \${t.join(" ")};`}}});
JS;
	