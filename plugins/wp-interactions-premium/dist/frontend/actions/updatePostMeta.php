<?php
/**
 * This is an auto-generated script from src/action-types/frontend/updatePostMeta.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({updatePostMeta:{initAction:o=>{o.initActionFunction(()=>{const{interactionKey:n,key:a}=o;return new Promise((t,i)=>{var e={interaction_key:n,action_key:a,post_id:"current-post"===o.getValue("post")?wpi.currentPostId:o.getValue("post_id"),meta_key:o.getValue("meta_key"),update_type:o.getValue("update_type"),value:o.getValue("value")};fetch(wpi.restUrl+"wpi/v1/update-post-meta",{method:"POST",mode:"same-origin",credentials:"same-origin",headers:{"Content-Type":"application/json","X-WP-Nonce":wpi.restNonce},body:JSON.stringify(e)}).then(e=>{if(e.ok)return e.text();i(e)}).then(e=>{o.provideData("id",e),t(e)}).catch(e=>{i(e)})})})}}});
JS;
	