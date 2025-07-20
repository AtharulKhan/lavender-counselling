<?php
/**
 * This is an auto-generated script from src/action-types/frontend/toggleVideo.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({toggleVideo:{initAction:i=>{i.initActionFunction(()=>{var e=i.getTargets();let a=parseFloat(i.getValue("startTime"));const t=i.getValue("mode"),o=e[0]?.querySelector("video");o&&(o.preload="auto",e=()=>{switch(a=Math.min(a,o.duration),t){case"play":a&&(o.currentTime=a),o.play();break;case"pause":o.pause();break;case"toggle":o.paused?o.play():o.pause()}},1<=o.readyState?e():o.addEventListener("loadedmetadata",e,{once:!0}))})}}});
JS;
	