<?php
/**
 * This is an auto-generated script from src/action-types/frontend/textFromElement.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({textFromElement:{initAction:t=>{t.initActionFunction(()=>{var n=t.getTargets();n.length&&(n=n[0].innerText,t.provideData("id",n||""))})}}});
JS;
	