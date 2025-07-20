<?php
/**
 * This is an auto-generated script from src/action-types/frontend/cssRule.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({cssRule:{initAction:e=>{var t=e.getValue("property"),i=()=>e.getValue("value",e.getValue("property"));if(CSS.supports(t,i())||CSS.supports(t,i()+"px"))return e.initActionAnimation({[t]:i,onBegin:e=>e.refresh()})},initialStyles:e=>`\${e.getValue("property")}: \${e.getValue("value")};`}});
JS;
	