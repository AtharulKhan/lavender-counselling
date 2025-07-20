<?php
/**
 * This is an auto-generated script from src/action-types/frontend/replaceHtml.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({replaceHtml:{initAction:t=>{t.initActionFunction(()=>{t.getTargets().forEach(n=>{n.innerHTML=t.getValue("html")})})}}});
JS;
	