<?php
/**
 * This is an auto-generated script from src/action-types/frontend/getPostData.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({getPostData:{initAction:i=>{i.initActionFunction(()=>new Promise((e,a)=>{var t={post_id:"current-post"===i.getValue("post")?wpi.currentPostId:i.getValue("post_id"),data_type:i.getValue("data_type"),meta_key:"meta"===i.getValue("data_type")?i.getValue("meta_key"):void 0};fetch(wpi.restUrl+"wpi/v1/get-post-data",{method:"POST",mode:"same-origin",credentials:"same-origin",headers:{"Content-Type":"application/json","X-WP-Nonce":wpi.restNonce},body:JSON.stringify(t)}).then(t=>{if(t.ok)return t.text();a(t)}).then(t=>{i.provideData("id",t),e(t)}).catch(t=>{a(t)})}))}}});
JS;
	