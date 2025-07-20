<?php
/**
 * This is an auto-generated script from src/action-types/frontend/getParameterUrl.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({getParameterUrl:{initAction:a=>{a.initActionFunction(()=>{var t=a.getValue("parameter"),t=new URLSearchParams(window.location.search).get(t);t&&(t=t.replace(/[<>"'`]/g,t=>({"<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","`":"&#x60;"})[t]),a.provideData("id",t))})}}});
JS;
	