<?php
/**
 * This is an auto-generated script from src/action-types/frontend/dataFromAttribute.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({dataFromAttribute:{initAction:n=>{n.initActionFunction(()=>{var e=n.getValue("attribute"),i=n.getTargets();if(i.length&&e){let t=i[0].getAttribute(e);null===t&&(i=i[0].querySelector(`[\${e}]`))&&(t=i.getAttribute(e)),n.provideData("id",t)}})}}});
JS;
	