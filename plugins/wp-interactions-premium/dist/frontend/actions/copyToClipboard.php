<?php
/**
 * This is an auto-generated script from src/action-types/frontend/copyToClipboard.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({copyToClipboard:{initAction:t=>{t.initActionFunction(()=>{var e;navigator.clipboard?navigator.clipboard.writeText(t.getValue("text")):((e=document.createElement("textarea")).value=t.getValue("text"),document.body.appendChild(e),e.select(),document.execCommand("copy"),document.body.removeChild(e))})}}});
JS;
	