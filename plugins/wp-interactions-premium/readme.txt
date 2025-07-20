=== WP Interactions ===
Contributors: bfintal, gambitph
Tags: interaction, interactivity, trigger, blocks, gutenberg
Requires at least: 6.6
Tested up to: 6.8.1
Requires PHP: 7.0
Stable tag: 1.2.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Make your blocks interactive! Effortlessly set triggers that do actions

== Description ==

Make your blocks interactive! Effortlessly set triggers that do actions

== Changelog ==

= 1.2.0 =
* New: Scroll strength interaction
* New: Toggle video action
* New: Get URL Parameter action
* Fixed: Rotate 3d action - default easing is now linear #76
* Fixed: Move & Rotate 3d actions - zero values are now valid #72
* Fixed: Interactions with optional targets no longer warn about missing trigger #24
* Fixed: If an interaction fails to load, continue loading the rest of the interactions #cc29210

= 1.1.2 =
* Fixed: Better error handling when an interaction fails to load #56
* Fixed: Action label does not update when changing interaction trigger types #61
* Fixed: License key is now hidden when managing license keys #67
* Fixed: License key sync has been removed #67

= 1.1.1 =
* Fixed: Editor error when creating a page interaction without a block selected #62
* Fixed: Scrub Video action: can now be previewed in the editor #59

= 1.1.0 =
* New: Scrub Video action
* New: WordPress 6.8 compatibility
* Fixed: Possible console error when using Scroll to Element Action #48

= 1.0.3 =
* New: Get text from element action #20
* New: Add post ID in Get Post Data action #34
* New: Added max-width utility classes
* Fixed: Now works if the main script is deferred by optimization plugins #4
* Fixed: When duplicating an interaction, the save button doesn't disappear #22
* Fixed: Previewing the interaction doesn't show properly if you have a starting state #27
* Fixed: Safari issue, buttons do not open the popup after the first time #28
* Fixed: When the block target is not available, the element interactions incorrectly uses the body as the target #31
* Fixed: When adding a number or symbol after text, the editor causes an error #29
* Fixed: Using commas in the applied to selector and using a "matching" option now works properly
* Fixed: interactions that are not applied to the current page, but match a block are visible in the block toolbar add interaction button
