<?php
/**
 * This is an auto-generated script from src/action-types/frontend/renderShortcode.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({renderShortcode:{initAction:o=>{o.initActionFunction(()=>{const{interactionKey:e,key:i}=o;return new Promise((t,n)=>{fetch(wpi.restUrl+"wpi/v1/render-shortcode",{method:"POST",mode:"same-origin",credentials:"same-origin",headers:{"Content-Type":"application/json","X-WP-Nonce":wpi.restNonce},body:JSON.stringify({interaction_key:e,action_key:i,data:o.getAllProvidedData()})}).then(e=>{if(e.ok)return e.text();n(e)}).then(e=>{o.provideData("id",e),t(e)}).catch(e=>{n(e)})})})}}});
JS;
	