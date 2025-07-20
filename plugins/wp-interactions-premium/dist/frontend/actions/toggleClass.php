<?php
/**
 * This is an auto-generated script from src/action-types/frontend/toggleClass.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({toggleClass:{initAction:t=>{t.initActionFunction(()=>{const s=t.getValue("class"),e=t.getValue("action");s&&t.getTargets().forEach(t=>{"toggle"===e?t.classList.toggle(s):"add"===e?t.classList.add(s):"remove"===e&&t.classList.remove(s)})})}}});
JS;
	