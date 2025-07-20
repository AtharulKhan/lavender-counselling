<?php
/**
 * This is an auto-generated script from src/action-types/frontend/stop.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({stop:{initAction:r=>{r.initActionFunction(()=>{var e=r.getValue("value"),i=r.getValue("condition"),t=r.getValue("comparison_value"),n=r.getValue("comparison_multi_value").split("\\n").map(e=>e.trim());if("equals"===i){if(e===t)return!1}else if("not-equals"===i){if(e!==t)return!1}else if("contains"===i){if(e.includes(t))return!1}else if("not-contains"===i){if(!e.includes(t))return!1}else if("greater-than"===i){if(t<e)return!1}else if("greater-than-or-equal-to"===i){if(t<=e)return!1}else if("less-than"===i){if(e<t)return!1}else if("less-than-or-equal-to"===i){if(e<=t)return!1}else if("is-empty"===i){if(""===e)return!1}else if("is-not-empty"===i){if(""!==e)return!1}else if("matches-regex"===i){if(new RegExp(t).test(e))return!1}else if("does-not-match-regex"===i){if(!new RegExp(t).test(e))return!1}else if("is-truthy"===i){if(e)return!1}else if("is-falsey"===i){if(!e)return!1}else if("is-in"===i){if(n.includes(e))return!1}else if("is-not-in"===i&&!n.includes(e))return!1})}}});
JS;
	