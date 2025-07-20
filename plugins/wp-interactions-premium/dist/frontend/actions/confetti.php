<?php
/**
 * This is an auto-generated script from src/action-types/frontend/confetti.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({confetti:{initAction:e=>{e.initActionFunction(()=>{var i={x:.5,y:.65},n=e.getTargets();let t=n.length?n[0]:window;(t=0===t.clientHeight&&0===t.clientWidth?window:t)!==window&&t!==document&&(n=t.getBoundingClientRect(),i.x=(n.left+n.width/2)/window.innerWidth,i.y=(n.top+n.height/2+20)/window.innerHeight),window.wpi.confetti(i)})}}});
JS;
	