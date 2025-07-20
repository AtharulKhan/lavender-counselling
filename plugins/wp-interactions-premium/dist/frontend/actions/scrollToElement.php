<?php
/**
 * This is an auto-generated script from src/action-types/frontend/scrollToElement.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({scrollToElement:{initAction:e=>{const t={pos:0};e.initActionAnimation({targets:t,pos:()=>{var n=e.getTargets();if(n.length){var{top:n,height:o}=n[0].getBoundingClientRect();let t=n+window.scrollY;n=e.getValue("scrollPosition");return"center"===n?t-=window.innerHeight/2-o/2:"bottom"===n&&(t-=window.innerHeight-o),t+=e.getValue("offset")||0,[window.scrollY,t]}},onUpdate:()=>{window.scrollTo(0,t.pos)}})}}});
JS;
	