<?php
/**
 * This is an auto-generated script from src/action-types/frontend/opacity.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({opacity:{initAction:i=>{i.initActionAnimation({opacity:i.getValue("opacity")})},initialStyles:i=>`opacity: \${i.getValue("opacity")};`}});
JS;
	