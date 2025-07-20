<?php
/**
 * This is an auto-generated script from src/action-types/frontend/visibility.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({visibility:{initAction:t=>{t.initActionFunction(()=>{const e=t.getValue("visibility"),r=t=>{t.removeAttribute("hidden"),t.setAttribute("aria-hidden",!1),t.style.removeProperty("display")},n=t=>{t.setAttribute("hidden",!0),t.setAttribute("aria-hidden",!0),t.style.setProperty("display","none","important")};t.getTargets().forEach(t=>{var i=t.hasAttribute("hidden");"toggle"===e?(i?r:n)(t):"show"===e&&i?r(t):"hide"!==e||i||n(t)})})},initialStyles:t=>{t=t.getValue("visibility");if("hide"===t||"toggle"===t)return"display: none !important;"},runInitialScript:(t,i)=>{const n=t.getValue("visibility");i.forEach(t=>{var i=t=>{t.removeAttribute("hidden"),t.setAttribute("aria-hidden",!1),t.style.removeProperty("display")},e=t=>{t.setAttribute("hidden",!0),t.setAttribute("aria-hidden",!0),t.style.setProperty("display","none","important")},r=t.hasAttribute("hidden");"toggle"===n?(r?i:e)(t):"show"===n&&r?i(t):"hide"!==n||r||e(t)}),t.removeStartingStyles()}}});
JS;
	