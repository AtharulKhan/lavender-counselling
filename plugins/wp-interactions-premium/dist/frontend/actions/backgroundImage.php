<?php
/**
 * This is an auto-generated script from src/action-types/frontend/backgroundImage.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({backgroundImage:{initAction:i=>{i.initActionAnimation({backgroundImage:`url(\${i.getValue("image")})`})},initialStyles:i=>`background-image: url(\${i.getValue("image")});`}});
JS;
	