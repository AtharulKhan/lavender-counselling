<?php
/**
 * This is an auto-generated script from src/action-types/frontend/scrubVideo.js.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return <<<JS
WPIRunner.addActionConfig({scrubVideo:{initAction:a=>{var e=a.getTargets();let n=parseFloat(a.getValue("targetTime"));const r=e[0]?.querySelector("video");if(r){let i=r.paused??!1;e=()=>{i=r.paused,n=Math.min(n,r.duration),r.pause();var e=a.timeline.type;if("percentage"===e)a.initActionAnimation({targets:[r],currentTime:n,onUpdate:()=>{r.paused||r.pause()}});else if("time"===e){const t={time:r.currentTime??0};a.initActionAnimation({targets:[t],time:n,onUpdate:()=>{r.paused||r.pause(),r.currentTime=t.time}})}};1<=r.readyState?e():r.addEventListener("loadedmetadata",e,{once:!0}),window.addEventListener("wpi/timeline-stop-preview",()=>{setTimeout(()=>{i||r.play()})},{once:!0})}}}});
JS;
	