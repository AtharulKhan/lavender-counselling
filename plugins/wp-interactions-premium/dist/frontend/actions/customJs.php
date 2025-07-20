<?php
/**
 * This is an auto-generated script from src/action-types/frontend/customJs.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({customJs:{initAction:action=>{action.initActionFunction(targets=>new Promise(resolve=>{const code=action.getValue("code"),func=function(){const data=action.getAllProvidedData();try{return eval(code)}catch(err){throw err}},results=[];targets.length||targets.push(document),targets.forEach(t=>{t=func.call(t);results.push(t)}),1===results.length?action.provideData("id",results[0]):action.provideData("id",results),resolve()}))}}});
JS;
	