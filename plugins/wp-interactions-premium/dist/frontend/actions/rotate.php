<?php
/**
 * This is an auto-generated script from src/action-types/frontend/rotate.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({rotate:{initAction:t=>{t.initActionAnimation({rotate:t.getValue("rotate")})},initialStyles:t=>`transform: rotate(\${t.getValue("rotate")}deg);`}});
JS;
	