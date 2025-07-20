<?php
/**
 * This is an auto-generated script from src/interaction-types/frontend/localStorage.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
let overridden=!1;WPIRunner.addInteractionConfig({localStorage:{initTimeline:n=>{const a=n.getOption("key",""),l=n.getOption("value","");var e=n.getOption("onload");if(a){let o=localStorage.getItem(a);if(!overridden){overridden=!0;const m=localStorage.setItem,u=(localStorage.setItem=function(){var e=arguments[0],t=localStorage.getItem(e),n=arguments[1];m.apply(this,arguments),t!==n&&(e=new CustomEvent("wpi/storage-set-item",{detail:{key:e,oldValue:t,newValue:n}}),document.dispatchEvent(e))},localStorage.clear),g=(localStorage.clear=function(){document.dispatchEvent(new CustomEvent("wpi/storage-clear")),u.apply(this,arguments)},localStorage.removeItem);localStorage.removeItem=function(){var e=arguments[0],t=localStorage.getItem(e),e=(g.apply(this,arguments),{key:e,oldValue:t,newValue:null}),t=new CustomEvent("wpi/storage-set-item",{detail:e});document.dispatchEvent(t)}}let t=null;const i=e=>{n.timelines[e].hasActions&&(t?.destroy(!1),(t=n.createTimelineInstance(e))?.play())},r=(e,t,n)=>{o=n,e===a&&n!==t&&(l?n===l?i(0):t===l&&i(1):n?i(0):i(1))},s=e=>{r(e.detail.key,e.detail.oldValue,e.detail.newValue)},d=()=>{r(a,o,null)},c=e=>{null===e.key?r(a,o,null):r(e.key,o,e.newValue)};return document.addEventListener("wpi/storage-set-item",s),document.addEventListener("wpi/storage-clear",d),window.addEventListener("storage",c),e&&o&&r(a,null,o),()=>{t?.destroy(),document.removeEventListener("wpi/storage-set-item",s),document.removeEventListener("wpi/storage-clear",d),window.removeEventListener("storage",c)}}}}});
JS;
	