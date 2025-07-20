<?php
/**
 * This is an auto-generated script from src/action-types/frontend/updateAttribute.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({updateAttribute:{initAction:t=>{t.initActionFunction(()=>{const e=t.getValue("attribute"),i=t.getValue("value"),u=t.getValue("action");e&&t.getTargets().forEach(t=>{"toggle"===u?t.getAttribute(e)===i?t.removeAttribute(e):t.setAttribute(e,i):"update"===u?t.setAttribute(e,i):"remove"===u&&t.removeAttribute(e)})})}}});
JS;
	