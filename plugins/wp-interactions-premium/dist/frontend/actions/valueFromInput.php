<?php
/**
 * This is an auto-generated script from src/action-types/frontend/valueFromInput.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({valueFromInput:{initAction:i=>{i.initActionFunction(()=>{var t=i.getTargets();t.length&&("INPUT"===(t=t[0]).tagName?i.provideData("id",t.value):(t=t.querySelector("input"))&&i.provideData("id",t.value))})}}});
JS;
	