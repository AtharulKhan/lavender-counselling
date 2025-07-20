<?php
/**
 * This is an auto-generated script from src/action-types/frontend/textColor.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({textColor:{initAction:t=>{t.initActionAnimation({color:t.getValue("color")})},blockElementSelector:(t,o)=>o.isBlock("core/button")?t+" > .wp-element-button":o.isBlock("stackable/button")?t+" .stk-button__inner-text":t,initialStyles:t=>`color: \${t.getValue("color")};`}});
JS;
	