<?php
/**
 * This is an auto-generated script from src/action-types/frontend/backgroundColor.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({backgroundColor:{initAction:o=>{o.initActionAnimation({backgroundColor:o.getValue("color")})},blockElementSelector:(o,t)=>t.isBlock("core/cover")?o+" > .wp-block-cover__background":t.isBlock("core/button")?o+" > .wp-element-button":t.isBlock("stackable/button")?o+" > .stk-button":o,initialStyles:o=>`background-color: \${o.getValue("color")};`}});
JS;
	