<?php
/**
 * This is an auto-generated script from src/action-types/frontend/click.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({click:{initAction:n=>{n.initActionFunction(()=>{n.getTargets().forEach(n=>{n.dispatchEvent(new MouseEvent("click",{bubbles:!0,cancelable:!0,view:window}))})})}}});
JS;
	