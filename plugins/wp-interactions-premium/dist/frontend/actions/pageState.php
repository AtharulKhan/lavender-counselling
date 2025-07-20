<?php
/**
 * This is an auto-generated script from src/action-types/frontend/pageState.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
let currentPageState="";WPIRunner.addActionConfig({pageState:{initAction:t=>{t.initActionFunction(()=>{dispatchEvent(new CustomEvent("wpi/page-state",{detail:{oldValue:currentPageState,newValue:t.getValue("state")}})),currentPageState=t.getValue("state")})},initialStyles:t=>{currentPageState=t.getValue("state")}}});
JS;
	