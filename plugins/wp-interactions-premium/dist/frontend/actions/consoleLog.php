<?php
/**
 * This is an auto-generated script from src/action-types/frontend/consoleLog.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({consoleLog:{initAction:action=>{action.initActionFunction(targets=>{const isEditor=!!WPIRunner._editorConfig,value=action.getValue("value"),func=function(){const data=action.getAllProvidedData();try{return console.log("WP Interactions Log:",eval(value)),!0}catch{return!1}};targets.length||targets.push(document);let errored=!0;targets.forEach(t=>{!isEditor&&func.call(t)&&(errored=!1)}),errored&&console.log("WP Interactions Log:",value)})}}});
JS;
	