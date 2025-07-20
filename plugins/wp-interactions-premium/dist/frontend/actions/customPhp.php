<?php
/**
 * This is an auto-generated script from src/action-types/frontend/customPhp.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({customPhp:{initAction:o=>{o.initActionFunction(()=>{const{interactionKey:t,key:n}=o;return new Promise((e,i)=>{fetch(wpi.restUrl+"wpi/v1/custom-php",{method:"POST",mode:"same-origin",credentials:"same-origin",headers:{"Content-Type":"application/json","X-WP-Nonce":wpi.restNonce},body:JSON.stringify({interaction_key:t,action_key:n,data:o.getAllProvidedData()})}).then(t=>{if(t.ok)return t.text();i(t)}).then(t=>{o.provideData("id",t),e(t)}).catch(t=>{i(t)})})})}}});
JS;
	