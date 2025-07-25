<?php
/* Block : Row(Section)
 * @since : 1.3.0
 */
defined( 'ABSPATH' ) || exit;

function tpgb_tp_section_row_render_callback( $attributes, $content) {
	$output = '';
    $block_id = (!empty($attributes['block_id'])) ? $attributes['block_id'] : uniqid("title");
    $stretchRow = (!empty($attributes['stretchRow'])) ? $attributes['stretchRow'] : false;
    $height = (!empty($attributes['height'])) ? $attributes['height'] : '';
	$columnPosition = (!empty($attributes['columnPosition'])) ? $attributes['columnPosition'] : '';
    $sectionWidth = (!empty($attributes['sectionWidth'])) ? $attributes['sectionWidth'] : '';
    $shapeTop = (!empty($attributes['shapeTop'])) ? $attributes['shapeTop'] : '';
    $shapeBottom = (!empty($attributes['shapeBottom'])) ? $attributes['shapeBottom'] : '';
    $customClass = (!empty($attributes['customClass'])) ? $attributes['customClass'] : '';
	$customId = (!empty($attributes['customId'])) ? 'id="'.esc_attr($attributes['customId']).'"' : '';
	
	$liveCopy = (!empty($attributes['liveCopy'])) ? 'yes' : 'no';
    $currentID = (!empty($attributes['currentID'])) ? $attributes['currentID'] : get_queried_object_id();

	$deepBgopt = (!empty($attributes['deepBgopt'])) ? $attributes['deepBgopt'] : '';
	$colorList = (!empty($attributes['colorList'])) ? $attributes['colorList'] : [];
	$animdur = (!empty($attributes['animdur'])) ? (int) $attributes['animdur'] : 3;
	$animDelay = (isset($attributes['animDelay'])) ? ($attributes['animDelay']) : 0;
	$imgeffect = (!empty($attributes['imgeffect'])) ? $attributes['imgeffect'] : '';
	$intensity = (!empty($attributes['intensity'])) ? $attributes['intensity'] : '';
	$Scale = (!empty($attributes['Scale'])) ? $attributes['Scale'] : '' ;
	$perspective = (!empty($attributes['perspective'])) ? $attributes['perspective'] : '';
	$invert = (!empty($attributes['inverted'])) ? 'true' : 'false';
	$scrollPara = (!empty($attributes['scrollPara'])) ? $attributes['scrollPara'] : false;
	$craBgeffect = (!empty($attributes['craBgeffect'])) ? $attributes['craBgeffect'] : 'columns_simple_image' ;
	$movedir = (!empty($attributes['movedir'])) ? $attributes['movedir'] : 'left';
	$trasispeed = (!empty($attributes['trasispeed'])) ? $attributes['trasispeed'] : '';
	$kburnseffect = (!empty($attributes['kburnseffect'])) ? $attributes['kburnseffect'] : false;
	$Kbeffctdir = (!empty($attributes['Kbeffctdir'])) ? $attributes['Kbeffctdir'] : '';
	$effctDure = (!empty($attributes['effctDure'])) ? $attributes['effctDure'] : '';
	$videosour = (!empty($attributes['videosour'])) ? $attributes['videosour'] : 'youtube';
	$youtubeId = (!empty($attributes['youtubeId'])) ? Tpgbp_Pro_Blocks_Helper::tpgb_dynamic_val($attributes['youtubeId']) : 'QrI0jo5JZSs';
	$videoImg = (!empty($attributes['videoImg'])) ? $attributes['videoImg'] : '';
	$vimeoId = (!empty($attributes['vimeoId'])) ? Tpgbp_Pro_Blocks_Helper::tpgb_dynamic_val($attributes['vimeoId']) : '';
	$rowImgs= (!empty($attributes['rowImgs'])) ? $attributes['rowImgs'] : [] ;
	$scrollchg = (!empty($attributes['scrollchg'])) ? $attributes['scrollchg'] : 'no';
	
	$midOption = (!empty($attributes['midOption'])) ? $attributes['midOption'] : '';
	$topOption = (!empty($attributes['topOption'])) ? $attributes['topOption'] : '';
	
	$wrapLink = (!empty($attributes['wrapLink'])) ? $attributes['wrapLink'] : false;

	$equalHeightAtt = Tpgbp_Pro_Blocks_Helper::global_equal_height( $attributes );
	$equalHclass = '';
	if(!empty($equalHeightAtt)){
		$equalHclass = ' tpgb-equal-height';
	}

	$blockClass = Tp_Blocks_Helper::block_wrapper_classes( $attributes );
	$sectionClass = '';
	if( !empty( $height ) ){
		$sectionClass .= ' tpgb-section-height-'.$height;
	}
	if( !empty( $stretchRow ) ){
		$sectionClass .= ' tpgb-section-stretch-row alignfull';
	}
	
	// Toogle Class For wrapper Link

	$linkdata = '';
	if(!empty($wrapLink)){
		$rowUrl = (!empty($attributes['rowUrl'])) ? $attributes['rowUrl'] : '';
		$sectionClass .= ' tpgb-row-link';
		
		if( !empty($rowUrl) && isset($rowUrl['url']) && !empty($rowUrl['url']) ){
			$linkdata .= 'data-tpgb-row-link="'.esc_url($rowUrl['url']).'" ';
		}
		if(!empty($rowUrl) && isset($rowUrl['target']) && !empty($rowUrl['target'])){
			$linkdata .= 'data-target="_blank" ';
		}else{
			$linkdata .= 'data-target="_self" ';
		}
		$linkdata .= Tpgbp_Pro_Blocks_Helper::add_link_attributes($attributes['rowUrl']);
	}

	$containerClass ='';
	
	if($columnPosition!='' && !empty( $height )){
		$containerClass .= ' tpgb-align-items-'.$columnPosition;
	}
	if($sectionWidth=='full'){
		$containerClass .= ' tpgb-container-fluid';
	}else{
		$containerClass .= ' tpgb-container';
	}
	
	
	$shapeContent = '';
	$shapePath = TPGB_PATH . 'assets/images/shape-divider';
	if(!empty($shapeTop)){
		$TInvert = (!empty($attributes['shapeTInvert'])) ? '-invert' : '';
		$shapeUrl = $shapePath . '/'.esc_attr($shapeTop).esc_attr($TInvert).'.svg';
		$bringFront = (!empty($attributes['shapeTFront'])) ? 'bring-front' : '';
		$shapeTFlip = (!empty($attributes['shapeTFlip'])) ? 'shape-flip' : '';
		$shapeContent .= '<div class="tpgb-section-divider section-top-divider shape-'.esc_attr($shapeTop).' '.esc_attr($bringFront).' '.esc_attr($shapeTFlip).'">'.file_get_contents($shapeUrl).'</div>';
	}
	if(!empty($shapeBottom)){
		$BInvert = (!empty($attributes['shapeBInvert'])) ? '-invert' : '';
		$shapeUrl = $shapePath . '/'.esc_attr($shapeBottom).esc_attr($BInvert).'.svg';
		$bringFront = (!empty($attributes['shapeBFront'])) ? 'bring-front' : '';
		$shapeBFlip = (!empty($attributes['shapeBFlip'])) ? 'shape-flip' : '';
		$shapeContent .= '<div class="tpgb-section-divider section-bottom-divider shape-'.esc_attr($shapeBottom).' '.esc_attr($bringFront).' '.esc_attr($shapeBFlip).'">'.file_get_contents($shapeUrl).'</div>';
	}

	//Set Row Backgroung Attr

	$dataAttr=$classname=$rowBgClass=$rowclass=$cssrule=$videoattr=$videoUrl=$midclass=$dataAttr2=$midlayer=$loop =$midclass1 = '';
	$colors = array();
	if(!empty($deepBgopt) && ($deepBgopt == 'bg_color' || $deepBgopt == 'bg_animate_gradient' || $deepBgopt == 'scroll_animate_color' )){
		if(!empty($colorList)){
			$i = 0;
			$scrolltra = (!empty($attributes['scrolltra'])) ? $attributes['scrolltra'] : '0.7';

			foreach($colorList as $index => $item) {
				$actclass = '';
				if($deepBgopt == 'bg_color' || $deepBgopt == 'bg_animate_gradient'){
					$colors[] = $item['aniColor'];
				}else{
					if(!empty($item['aniColor']) && empty($item['scrollImg']['url']) ) {
						$colors[] = $item['aniColor'];
						if($i==0){
							$cssrule = 'background:'.esc_attr($item['aniColor']).';';
							$actclass = 'active';
						}
						if(!empty($scrollchg) && $scrollchg=='no'){
							$loop .='<div class="tp-repeater-item-'.esc_attr($item['_key']).' tpgb-section-bg-scrolling '.esc_attr($actclass).'" style="background:'.esc_attr($item['aniColor']).';transition-duration: '.esc_attr($scrolltra).'s"></div>';
						}
					}
					if(!empty($scrollchg) && $scrollchg=='no' && !empty($item['scrollImg']) && !empty($item['scrollImg']['url'])) {
						$colors[] = $item['scrollImg']['url'];
						if($i==0){
							$cssrule='background:url('.esc_url($item['scrollImg']['url']).');';
							$actclass='active';
						}
						if(!empty($scrollchg) && $scrollchg=='no'){
							$loop .= '<div class="tp-repeater-item-'.esc_attr($item['_key']).' tpgb-section-bg-scrolling '.esc_attr($actclass).'" style="background:url('.esc_url($item['scrollImg']['url']).');transition-duration : '.esc_attr($scrolltra).'s"></div>';
						}
					}
					if( isset($item['aniBgtype']) && !empty($item['aniBgtype']) && isset($item['aniBgtype']['openBg']) &&  $item['aniBgtype']['openBg'] == 1 ) {
						$loop .= '<div class="tp-repeater-item-'.esc_attr($item['_key']).' tpgb-section-bg-scrolling '.esc_attr($actclass).'"></div>';
					}
				}
				$i++;
			}
		}
		
		if($deepBgopt == 'bg_color') {
			$dataAttr .= ' data-bg="'.htmlspecialchars(wp_json_encode($colors)).'" data-bg-delay="'.esc_attr($animDelay).'" data-bg-duration="'.esc_attr($animdur).'" ';
			$classname = 'row-animat-bg';
		}else if($deepBgopt == 'bg_animate_gradient'){
			$bgRotation = (!empty($attributes['bgRotation'])) ? $attributes['bgRotation'] : '';
			$bgduration = (!empty($attributes['bgduration'])) ? $attributes['bgduration'] : '';
			$fullBggra = (!empty($attributes['fullBggra'])) ? 'yes' : 'no';
			$bgposition = (!empty($attributes['bgposition'])) ? $attributes['bgposition'] : '';
			
			if($colors!=''){	
				$first = reset($colors);
				$last = end($colors);
				$grad_colors=implode (",", $colors);
			}else{
				$first = '#ff2d60';	$last = '#1deab9';
				$grad_colors= '#ff2d60,#ff9132,#ff61fa,#6caafd,#29ccff,#1deab9';
			}
			$classname = "tpgb-row-bg-gradient";
			$cssrule = 'filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='.esc_attr($first).', endColorstr='.esc_attr($last).');background-image: linear-gradient('.esc_attr($bgRotation).'deg,'.$grad_colors.');animation-duration: '.esc_attr($bgduration).'s;';
			$dataAttr = 'data-full-page="'.esc_attr($fullBggra).'" data-position="'.esc_attr($bgposition).'"';
		}else if($deepBgopt == 'scroll_animate_color'){
			if(!empty($scrollchg) && $scrollchg=='yes'){
				$cssrule .= 'transition-duration:0s';
			}
			$classname = 'tpgb-row-scrollbg';
			$dataAttr = ' data-bgcolors="'.htmlspecialchars(wp_json_encode($colors)).'" data-scrolling-effect="'.esc_attr($scrollchg).'" ';
		}
	}else if(!empty($deepBgopt) && $deepBgopt == 'bg_image' && $craBgeffect == 'columns_simple_image' && $imgeffect == 'style-1' ){

		$rowBgClass = ' tpgb-img-parallax-mouse';
		$classname = 'tpgb-img-parallax-hover';
		$dataAttr .= ' data-type="tilt" data-amount="'.esc_attr($intensity).'" data-scale="'.esc_attr($Scale).'" data-perspective="'.esc_attr($perspective).'" data-inverted="'.esc_attr($invert).'" data-opacity="1" ';
	}else if(!empty($deepBgopt) && $deepBgopt == 'bg_image' && $craBgeffect == 'columns_simple_image' && $imgeffect == 'style-2' ){
		$rowBgClass = ' tpgb-img-parallax-mouse';
		$classname = 'tpgb-img-parallax-hover';
		$dataAttr .= ' data-type="move" data-amount="'.esc_attr($intensity).'" data-scale="'.esc_attr($Scale).'"  data-inverted="'.esc_attr($invert).'" data-opacity="1" ';
	}else if(!empty($deepBgopt) && $deepBgopt == 'bg_image' && $craBgeffect == 'columns_animated_bg'){
		$classname .= $craBgeffect ;
		$classname .= ' row-bg-'.$movedir.'';
		$dataAttr .= ' data-direction="'.esc_attr($movedir).'" data-trasition="'.esc_attr($trasispeed).'" ';
	}else if(!empty($deepBgopt) && $deepBgopt == 'bg_video'){
		$classname = 'tpgb-video-'.esc_attr($videosour);
		if($videosour == 'youtube'){
			$videoattr .= !empty($attributes['videoMute']) ? 'data-muted=1' : 'data-muted=0';
			$videoUrl .= !empty($attributes['videoloop']) ? '&amp;loop=1&amp;playlist='.esc_attr($youtubeId) : '';
		}
		if($videosour == 'vimeo'){
			$videoattr .= !empty($attributes['videoMute']) ? 'data-muted=1' : 'data-muted=0';
			$videoUrl .= !empty($attributes['videoloop']) ? '&amp;loop=1' : '';
		}
		if($videosour == 'self-hosted'){
			//$videoattr .= (!empty($videoImg) && !empty($videoImg['url']) ? 'poster="'. esc_url($videoImg['url']) .'"' : '' );
			$videoattr .= !empty($attributes['videoMute']) ? ' muted=true' : '';
			$videoattr .= !empty($attributes['videoloop']) ? ' loop=true' : ' loop=true';
			if(!empty($attributes['mp4Url'])) {
				$mp4url = Tpgbp_Pro_Blocks_Helper::tpgb_dynamic_val($attributes['mp4Url']);
				$videoUrl .= ' src="'.esc_url($mp4url).'"';
			}
			if(!empty($attributes['WebMUrl'])){
				$weburl = Tpgbp_Pro_Blocks_Helper::tpgb_dynamic_val($attributes['WebMUrl']);
				$videoUrl .= ' src="'.esc_url($weburl).'"';
			}
			
		}
	}else if(!empty($deepBgopt) && $deepBgopt == 'bg_gallery'){
		$classname = 'row-img-slide';
	}

	if(!empty($midOption) ){
		if($midOption == 'canvas') {
			$canvasSty = (!empty($attributes['canvasSty'])) ? $attributes['canvasSty'] :'style-1';
			$patiColor =  (!empty($attributes['patiColor'])) ? $attributes['patiColor'] :'';
			$canShape =  (!empty($attributes['canShape'])) ? $attributes['canShape'] :'';
			$ctmJson = (!empty($attributes['ctmJson'])) ? $attributes['ctmJson'] : '';

			$midclass = 'canvas-'.$canvasSty.$block_id;

			$midclass = 'canvas-'.$canvasSty.$block_id;
			if( $canvasSty == 'style-1' || $canvasSty == 'style-4' || $canvasSty == 'style-8' ){
				$midclass1 .= ' canvas-'.esc_attr($canvasSty).'';
			}

			$canvasarr = array();
			if($canvasSty == 'style-1'){
				$particleList = (!empty($attributes['particleList'])) ? $attributes['particleList'] : [] ;
				if($particleList != ''){
					foreach($particleList as $item) {
						if(isset($item['bubbleColor']) && $item['bubbleColor'] != '') {			
							$canvasarr[] = $item['bubbleColor'];
						}else{
							$canvasarr =array('#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be');
						}
					}
				}
				
				for($ij=1;$ij<=50;$ij++) {	
					$size= wp_rand(1,30).'px';
					$midlayer .='<div class="tpgb-bubble" style="height: '.esc_attr($size).';width: '.esc_attr($size).';animation-delay: -'.($ij*0.2).'s;-webkit-transform:translate3d( '.wp_rand(-2000,2000).'px,  '.wp_rand(-1000,2000).'px, '.wp_rand(-1000,2000).'px);transform: translate3d( '.wp_rand(-2000,2000).'px,  '.wp_rand(-1000,2000).'px, '.wp_rand(-1000,2000).'px);background: '.$canvasarr[array_rand($canvasarr)].';"></div>'; 
				}
			}else if($canvasSty == 'style-2' || $canvasSty == 'style-3' || $canvasSty == 'style-4'){
				$dataAttr2 = 'data-color="'.esc_attr($patiColor).'" ';
			}else if($canvasSty == 'style-5' || $canvasSty == 'style-6' || $canvasSty == 'style-7'){
				$dataAttr2 = 'data-color="'.esc_attr($patiColor).'" data-type="'.esc_attr($canShape).'" ';
			}else if($canvasSty == 'style-8'){
				$dataAttr2 = 'data-color="'.esc_attr($patiColor).'" ';
				$midlayer .= '<canvas class="tpgb-snow-particles"></canvas>';
			}else{
				$dataAttr2 = 'data-patijson="'.esc_attr($ctmJson).'" ';
			}
		}else if( $midOption == 'mordern_image_effect' || $midOption == 'moving_image' ){
			$midimgList = (!empty($attributes['midimgList'])) ? $attributes['midimgList'] : [] ;
			$midclass = ($midOption == 'mordern_image_effect' ? 'tpgb-mordernimg-effect tpgb-mordern-parallax' : ($midOption == 'moving_image' ? 'tpgb-automove-img' : '' ) );
			$animCss = '';
			if(!empty($midimgList)){
				foreach($midimgList as $item) {
					$imgsrc=$visibility=$imgcss='';
					if(!empty($item['resVisib'])){
						$visibility .= (!empty($item['desHide']) ? 'desktop-hide ' : '' );							
						$visibility .= (!empty($item['tabHide']) ? 'tablet-hide ' : '' );
						$visibility .= (!empty($item['moHide']) ? 'mobile-hide ' : '' );
					}
					$Effectin = !empty($item['Effectin']) ? (int)$item['Effectin'] : 0;

					if(!empty($item['parallaxImg']) && !empty($item['parallaxImg']['url'] )){
						$imgsrc = $item['parallaxImg']['url'] ;
					}
					if($midOption == 'moving_image'){
						$imgcss .= 'background-image: url('.esc_url($imgsrc).');background-size:'.(!empty($item['imgSize']) ? esc_attr($item['imgSize']) : '' ).' ';
					}

					//Set Transforn origin
					if( isset($item['modImgeff']) && !empty($item['modImgeff']) && $item['modImgeff'] == 'rotating' && !empty($item["tranOrigin"]) ){
						$animCss .= '-webkit-transform-origin: '.esc_attr($item["tranOrigin"]).';-moz-transform-origin:'.esc_attr($item["tranOrigin"]).';-ms-transform-origin:'.esc_attr($item["tranOrigin"]).';-o-transform-origin:'.esc_attr($item["tranOrigin"]).';transform-origin:'.esc_attr($item["tranOrigin"]).';';
					}
					$midlayer .= '<div class="tpgb-parlximg-wrap tp-repeater-item-'.esc_attr($item['_key']).' '.(($midOption == 'mordern_image_effect' ? 'tpgb-repet-img' : '')).' '.esc_attr($visibility).'" style="'.esc_attr($imgcss).'" data-direction="'.(!empty($item['imgDire']) ? esc_attr($item['imgDire']) : '' ).'" data-trasition="'.esc_attr($Effectin).'">';
						if( $midOption == 'mordern_image_effect' ){
							$altText = (isset($item['modImgeff']['alt']) && !empty($item['modImgeff']['alt'])) ? esc_attr($item['modImgeff']['alt']) : ((!empty($item['modImgeff']['title'])) ? esc_attr($item['modImgeff']['title']) : esc_attr__('Parallax Image','tpgbp'));

							$midlayer .=  '<img class="tpgb-parlximg '.(isset($item['modImgeff']) && !empty($item['modImgeff'] && $midOption == 'mordern_image_effect' ) ? 'tpgb-imgeffect tpgb-'.$item['modImgeff'] : '').'" src="'.esc_url($imgsrc).'" alt="'.$altText.'" data-parallax="'.esc_attr($Effectin).'" style="'.$animCss.'" />';
						}
					$midlayer .= '</div>';
				}
			}
		}
	}

	if(!empty($deepBgopt) && $deepBgopt == 'bg_image' && !empty($scrollPara)){
		$rowclass = ' tpgb-scroll-parallax';
		$classname .= ' img-scroll-parallax';
	}
	if(!empty($kburnseffect)){
		$cssrule .='-webkit-animation: bg-kenburns-effect '.esc_attr($Kbeffctdir).'s cubic-bezier(0.445, 0.050, 0.550, 0.950) infinite '.esc_attr($Kbeffctdir).' both;animation: bg-kenburns-effect '.esc_attr($effctDure).'s cubic-bezier(0.445, 0.050, 0.550, 0.950) infinite '.esc_attr($Kbeffctdir).' both;';
	}
	
	if( defined('TPGBP_DEVELOPER') && TPGBP_DEVELOPER && $liveCopy == 'yes' ){
		$linkdata .= ' data-tpcp__live="'.esc_attr($liveCopy).'"';
		$linkdata .= ' data-post-id="'.esc_attr($currentID ).'"';
	}

	$output .= '<div '.$customId.' class="tpgb-section tpgb-block-'.esc_attr($block_id).' '.esc_attr($sectionClass).' '.esc_attr($customClass).' '.esc_attr( $rowclass ).' '.esc_attr($blockClass).' '.esc_attr($equalHclass).'" data-id="'.esc_attr($block_id).'" '.$linkdata.' '.$equalHeightAtt.'>';
		
		/* Row Background Start  */
		if(!empty($deepBgopt) || !empty($midOption) || !empty($topOption)) {
		
			$output .= '<div class="tpgb-row-background '.esc_attr($rowBgClass).' '.(!empty($attributes['parallax']) && $deepBgopt == 'bg_video'  ? 'fixed-bg-video' : '' ).'">';
			
				if(!empty($deepBgopt)){
				
					$output .= '<div id="'.esc_attr($block_id).'" class="tpgb-deep-layer '.esc_attr($block_id).' '.esc_attr($classname).'" '.$dataAttr.' style="'.esc_attr($cssrule).'">';
					
						if($deepBgopt == 'bg_video'){
							$videoImgUrl = (isset($videoImg['dynamic'])) ? Tpgbp_Pro_Blocks_Helper::tpgb_dynamic_repeat_url($videoImg) : (!empty($videoImg['url']) ? $videoImg['url'] : '');
							$iframeTitle = (!empty($attributes['iframeTitle'])) ? esc_attr($attributes['iframeTitle']) : esc_attr__('My Video','tpgbp');

							$vposterCss = '';
							if(!empty($videoImgUrl)){
								$vposterCss = 'style="background-image: url('.esc_url($videoImgUrl).');"';
							}

							$output .= '<div class="video-poster-img video-tpgb-iframe-'.esc_attr($block_id).' '.(!empty($videoImg) && !empty($videoImg['url']) ? 'tp-loading' : '').'" '.( !empty($vposterCss) ? $vposterCss : '' ).'>';
								$output .= '<div class="tpgb-video-wrap">';
									if($videosour == 'youtube'){
										$output .= '<iframe class="tpgb-iframe" id="tpgb-iframe-'.esc_attr($block_id).'" width="100%" height="100%" '.esc_attr($videoattr).' src="https://www.youtube.com/embed/'.esc_attr($youtubeId).'?wmode=opaque&amp;enablejsapi=1&amp;showinfo=0&amp;controls=0&amp;rel=0'.esc_attr($videoUrl).'" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" title="'.$iframeTitle.'"></iframe>';
									}
									if($videosour == 'vimeo'){
										$output .= '<iframe class="tpgb-iframe" id="tpgb-iframe-'.esc_attr($block_id).'" width="100%" height="100%" '.esc_attr($videoattr).' src="//player.vimeo.com/video/'.esc_attr($vimeoId).'?api=1&amp;autoplay=1;portrait=0&amp;rel=0&amp;controls=0'.esc_attr($videoUrl).'" frameborder="0" allowfullscreen title="'.$iframeTitle.'"></iframe>';
									}
									if($videosour == 'self-hosted'){
										$output .= '<video class="self-hosted-video" id="'.esc_attr($block_id).'"  data-autoplay="true" preload="auto" width="100%" height="100%" autoplay="true" playsinline '.esc_attr($videoattr).' data-setup="{}" '.$videoUrl.'></video>';
									}
								$output .= '</div>';
							$output .= '</div>';
						
						}
						
						if($deepBgopt == 'bg_gallery'){
							
							$img_list = [];
							$gallery_opt = [];
							if(!empty($rowImgs)){
								foreach($rowImgs as $img) {
									if(!empty($img)) {
										$img_list[] = array("src" => esc_url($img['url']) );
									}
								}		
							}

							$gallery_opt['transition'] = (!empty($attributes['transieffect'])) ? $attributes['transieffect'] : '';
							$gallery_opt['transduration'] = (!empty($attributes['transdur'])) ? (int) $attributes['transdur'] : 2000;
							$gallery_opt['duration'] = (!empty($attributes['slidetime'])) ? (int) $attributes['slidetime'] : 3000;
							$gallery_opt['animation'] = (!empty($attributes['animation'])) ?  $attributes['animation'] : 'random';
							$gallery_opt['textureoly'] = (!empty($attributes['textureoly']) && $attributes['textureoly'] != 'none' ) ? TPGB_URL.'assets/images/overlays/'.$attributes['textureoly'].'.png'  : '';
							
							$output .= '<div class="row-bg-slide" data-imgdata= \'' .wp_json_encode($img_list). '\' data-galleryopt=\'' .wp_json_encode($gallery_opt). '\'>';
							$output .= '</div>';
						}

						$output .= $loop;
					$output .= '</div>';
				}
				
				if(!empty($midOption)){
				
					$output .= '<div id="'.($midOption == 'canvas' ? esc_attr($midclass) : '').'" class="tpgb-middle-layer '.esc_attr($midclass).esc_attr($midclass1).'" '.$dataAttr2.'>';
						$output .= $midlayer;
					$output .= '</div>';
					
				}
				
				if(!empty($topOption)){
						
					$textureImg  =  (!empty($attributes['textureImg'])) ? $attributes['textureImg'] : TPGB_ASSETS_URL.'assets/images/tpgb-placeholder.jpg';
					$teximgPosition  =  (!empty($attributes['teximgPosition'])) ? $attributes['teximgPosition'] : '' ;
					$teximgAtta  =  (!empty($attributes['teximgAtta'])) ? $attributes['teximgAtta'] : '';
					$teximgRepeat  =  (!empty($attributes['teximgRepeat'])) ? $attributes['teximgRepeat'] : '' ;
					$teximgSize  =  (!empty($attributes['teximgSize'])) ? $attributes['teximgSize'] : '';
					$topimgsrc = $topbgcss = '' ;
					
					if($topOption == 'texture-img' && !empty($textureImg) && !empty($textureImg['url'])){
						$topimgsrc = $textureImg['url'];

						$topbgcss .= '.tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer{ background-image: url('.(!empty($topimgsrc) ? esc_url($topimgsrc) : '').'); }';

						// Position Css
						if( isset($teximgPosition['md']) && !empty($teximgPosition['md']) ){
							$topbgcss .= '@media (min-width:1024px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-position : '.esc_attr($teximgPosition['md']).'; } }';
						}
						
						if( isset($teximgPosition['sm']) && !empty($teximgPosition['sm']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-position : '.esc_attr($teximgPosition['sm']).'; } }';
						}else if( isset($teximgPosition['md']) && !empty($teximgPosition['md']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-position : '.esc_attr($teximgPosition['md']).'; } }';
						}

						if( isset($teximgPosition['xs']) && !empty($teximgPosition['xs']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-position : '.esc_attr($teximgPosition['xs']).'; } }';
						}else if( isset($teximgPosition['sm']) && !empty($teximgPosition['sm']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-position : '.esc_attr($teximgPosition['sm']).'; } }';
						}else if( isset($teximgPosition['md']) && !empty($teximgPosition['md']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-position : '.esc_attr($teximgPosition['md']).'; } }';
						}
						
						// Attachment
						if( isset($teximgAtta['md']) && !empty($teximgAtta['md']) ){
							$topbgcss .= '@media (min-width:1024px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-attachment : '.esc_attr($teximgAtta['md']).'; } }';
						}
						
						if( isset($teximgAtta['sm']) && !empty($teximgAtta['sm']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px) { .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-attachment : '.esc_attr($teximgAtta['sm']).'; } }';
						}else if( isset($teximgAtta['md']) && !empty($teximgAtta['md']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px) { .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-attachment : '.esc_attr($teximgAtta['md']).'; } }';
						}

						if( isset($teximgAtta['xs']) && !empty($teximgAtta['xs']) ){
							$topbgcss .= '@media (max-width: 767px) { .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-attachment : '.esc_attr($teximgAtta['xs']).'; } }';
						}else if( isset($teximgAtta['sm']) && !empty($teximgAtta['sm']) ){
							$topbgcss .= '@media (max-width: 767px) { .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-attachment : '.esc_attr($teximgAtta['sm']).'; } }';
						}else if( isset($teximgAtta['md']) && !empty($teximgAtta['md']) ){
							$topbgcss .= '@media (max-width: 767px) { .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-attachment : '.esc_attr($teximgAtta['md']).'; } }';
						}

						// Repeat
						if( isset($teximgRepeat['md']) && !empty($teximgRepeat['md']) ){
							$topbgcss .= '@media (min-width:1024px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-repeat : '.esc_attr($teximgRepeat['md']).'; } }';
						}
						
						if( isset($teximgRepeat['sm']) && !empty($teximgRepeat['sm']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-repeat : '.esc_attr($teximgRepeat['sm']).'; } }';
						}else if( isset($teximgRepeat['md']) && !empty($teximgRepeat['md']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-repeat : '.esc_attr($teximgRepeat['md']).'; } }';
						}

						if( isset($teximgRepeat['xs']) && !empty($teximgRepeat['xs']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-repeat : '.esc_attr($teximgRepeat['xs']).'; } }';
						}else if( isset($teximgRepeat['sm']) && !empty($teximgRepeat['sm']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-repeat : '.esc_attr($teximgRepeat['sm']).'; } }';
						}else if( isset($teximgRepeat['md']) && !empty($teximgRepeat['md']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-repeat : '.esc_attr($teximgRepeat['md']).'; } }';
						}

						// Size
						if( isset($teximgSize['md']) && !empty($teximgSize['md']) ){
							$topbgcss .= '@media (min-width:1024px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-size : '.esc_attr($teximgSize['md']).'; } }';
						}
						
						if( isset($teximgSize['sm']) && !empty($teximgSize['sm']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-size : '.esc_attr($teximgSize['sm']).'; } }';

						}else if( isset($teximgSize['md']) && !empty($teximgSize['md']) ){
							$topbgcss .= '@media (max-width: 1024px) and (min-width:768px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-size : '.esc_attr($teximgSize['md']).'; } }';
						}

						if( isset($teximgSize['xs']) && !empty($teximgSize['xs']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-size : '.esc_attr($teximgSize['xs']).'; } }';
						}else if( isset($teximgSize['sm']) && !empty($teximgSize['sm']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-size : '.esc_attr($teximgSize['sm']).'; } }';
						}else if( isset($teximgSize['md']) && !empty($teximgSize['md']) ){
							$topbgcss .= '@media (max-width: 767px){ .tpgb-block-'.esc_attr($block_id).' .tpgb-row-background .tpgb-top-layer { background-size : '.esc_attr($teximgSize['md']).'; } }';
						}

						
					}						
					
					$output .= '<div class="tpgb-top-layer"></div>';

					if(!empty($topbgcss)){
						$output .= '<style>'.$topbgcss.'</style>';
					}
					
				}
				
			$output .= "</div>";
			
		}
		/* Row Background Start  */
		
		$output .= $shapeContent;
		$output .= '<div class="tpgb-section-wrap '.esc_attr($containerClass).'">';
			$output .= $content;
		$output .= "</div>";
		
	$output .= "</div>";
	
	
	if ( class_exists( 'Tpgb_Blocks_Global_Options' ) ) {
		$global_block = Tpgb_Blocks_Global_Options::get_instance();
		if ( !empty($global_block) && is_callable( array( $global_block, 'block_row_conditional_render' ) ) ) {
			$output = Tpgb_Blocks_Global_Options::block_row_conditional_render($attributes, $output);
		}
	}
    return $output;
}

/**
 * Render for the server-side
 */
function tpgb_tp_section_row() {
	
	$displayRules = [];
	if ( class_exists( 'Tpgb_Display_Conditions_Rules' ) ) {
		$display_Conditions = Tpgb_Display_Conditions_Rules::get_instance();
		if ( !empty($display_Conditions) && is_callable( array( $display_Conditions, 'tpgb_display_option' ) ) ) {
			$displayRules = Tpgb_Display_Conditions_Rules::tpgb_display_option();
		}
	}
	$globalEqualHeightOptions = Tpgbp_Plus_Extras_Opt::load_plusEqualHeight_options();
	$attributesOptions = [
			'block_id' => [
                'type' => 'string',
				'default' => '',
			],
			'className' => [
				'type' => 'string',
				'default' => '',
			],
			'stretchRow' => [
                'type' => 'boolean',
				'default' => false,
			],
			'colDir' => [
				'type' => 'string',
				'default' => '',
			],
			'columns' => [
                'type' => 'number',
				'default' => '',
			],
			'sectionWidth' => [
				'type' => 'string',
				'default' => 'boxed',	
			],
			'height' => [
				'type' => 'string',
				'default' => '',	
			],
			'minHeight' => [
				'type' => 'object',
				'default' => [ 
					'md' => 300,
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'condition' => [ (object) ['key' => 'height', 'relation' => '==', 'value' => 'min-height'] ],
						'selector' => '{{PLUS_WRAP}} > .tpgb-section-wrap{ min-height: {{minHeight}}; }',
					],
				],
			],
			'columnPosition' => [
                'type' => 'string',
				'default' => 'center',
			],
			'verticalPosition' => [
                'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} > .tpgb-section-wrap .tpgb-column-editor > .tpgb-column-wrap > .tpgb-column-inner,{{PLUS_WRAP}} > .tpgb-section-wrap > .tpgb-column > .tpgb-column-wrap > .tpgb-column-inner{ align-content: {{verticalPosition}};align-item: {{verticalPosition}}; }',
					],
				],
			],
			'gutterSpace' => [
				'type' => 'object',
				'default' => [ 
					'md' => 15,
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}.tpgb-section-editor > .tpgb-section-wrap > .block-editor-inner-blocks > .block-editor-block-list__layout > [data-type="tpgb/tp-column"] > .tpgb-column-resizable > .tpgb-column > .tpgb-column-wrap { padding: {{gutterSpace}}; } {{PLUS_WRAP}} > .tpgb-section-wrap > .tpgb-column > .tpgb-column-wrap, {{PLUS_WRAP}} > .tpgb-section-wrap > .tpgb-column > .inner-wrapper-sticky > .tpgb-column-wrap{ padding: {{gutterSpace}}; }',
					],
				],
			],
			'tagName' => [
                'type' => 'string',
				'default' => 'div',
			],
			'overflow' => [
                'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}.tpgb-section{ overflow: {{overflow}}; }',
					],
				],
			],
			'liveCopy' => [
				'type' => 'boolean',
				'default' => false,
			],
			'currentID' => [
					'type' => 'number',
					'default' => '',
			],
			'customClass' => [
				'type' => 'string',
				'default' => '',	
			],
			'customId' => [
				'type' => 'string',
				'default' => '',	
			],
			'customCss' => [
				'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'selector' => '',
					],
				],
			],
			
			'shapeTop' => [
                'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'shapeTColor' => [
                'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} .section-top-divider .shape-fill{ fill: {{shapeTColor}}; }',
					],
				],
				'scopy' => true,
			],
			'shapeTWidth' => [
				'type' => 'object',
				'default' => [ 
					'md' => '',
					"unit" => '',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} .section-top-divider svg{ width: calc( {{shapeTWidth}}% + 1.2px ); }',
					],
				],
				'scopy' => true,
			],
			'shapeTHeight' => [
				'type' => 'object',
				'default' => [ 
					'md' => '',
					"unit" => '',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} .section-top-divider svg{ height: {{shapeTHeight}}px; }',
					],
				],
				'scopy' => true,
			],
			'shapeTFlip' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'shapeTInvert' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'shapeTFront' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			
			'shapeBottom' => [
                'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'shapeBColor' => [
                'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} .section-bottom-divider .shape-fill{ fill: {{shapeBColor}}; }',
					],
				],
				'scopy' => true,
			],
			'shapeBWidth' => [
				'type' => 'object',
				'default' => [ 
					'md' => '',
					"unit" => '',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} .section-bottom-divider svg{ width: calc( {{shapeBWidth}}% + 1.2px ); }',
					],
				],
				'scopy' => true,
			],
			'shapeBHeight' => [
				'type' => 'object',
				'default' => [ 
					'md' => '',
					"unit" => '',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}} .section-bottom-divider svg{ height: {{shapeBHeight}}px; }',
					],
				],
				'scopy' => true,
			],
			'shapeTFlip' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'shapeBInvert' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'shapeBFront' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			
			'NormalBg' => [
				'type' => 'object',
				'default' => (object) [
					'openBg'=> 0,
					'bgType' => '',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}',
					],
				],
				'scopy' => true,
			],
			'HoverBg' => [
				'type' => 'object',
				'default' => (object) [
					'openBg'=> 0,
					'bgType' => '',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}:hover',
					],
				],
				'scopy' => true,
			],
			'NormalBorder' => [
				'type' => 'object',
				'default' => (object) [
					'openBorder' => 0,
					'type' => '',
					'color' => '',
					'width' => (object) [
						'md' => [
							"top" => '',
							'bottom' => '',
							'left' => '',
							'right' => '',
						],
						"unit" => "",
					],
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}',
					],
				],
				'scopy' => true,
			],
			'HoverBorder' => [
				'type' => 'object',
				'default' => (object) [
					'openBorder' => 0,
					'type' => '',
					'color' => '',
					'width' => (object) [
						'md' => [
							"top" => '',
							'bottom' => '',
							'left' => '',
							'right' => '',
						],
						"unit" => "",
					],
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}:hover',
					],
				],
				'scopy' => true,
			],
			'NormalBradius' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => [
						"top" => '',
						'bottom' => '',
						'left' => '',
						'right' => '',
					],
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}},{{PLUS_WRAP}} .tpgb-row-background{ border-radius: {{NormalBradius}}; }',
					],
				],
				'scopy' => true,
			],
			'HoverBradius' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => [
						"top" => '',
						'bottom' => '',
						'left' => '',
						'right' => '',
					],
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}:hover,{{PLUS_WRAP}}:hover .tpgb-row-background{ border-radius: {{HoverBradius}}; }',
					],
				],
				'scopy' => true,
			],
			'NormalBShadow' => [
				'type' => 'object',
				'default' => (object) [
					'openShadow' => 0,
					'inset' => 0,
					'horizontal' => 0,
					'vertical' => 4,
					'blur' => 8,
					'spread' => 0,
					'color' => "rgba(0,0,0,0.40)",
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}',
					],
				],
				'scopy' => true,
			],
			'HoverBShadow' => [
				'type' => 'object',
				'default' => (object) [
					'openShadow' => 0,
					'inset' => 0,
					'horizontal' => 0,
					'vertical' => 4,
					'blur' => 8,
					'spread' => 0,
					'color' => "rgba(0,0,0,0.40)",
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}:hover',
					],
				],
				'scopy' => true,
			],
			'Margin' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => [
						"top" => '',
						'bottom' => '',
						'left' => '',
						'right' => '',
					],
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}{margin: {{Margin}};}',
					],
				],
				'scopy' => true,
			],
			'Padding' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => [
						"top" => '',
						'bottom' => '',
						'left' => '',
						'right' => '',
					],
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}{padding: {{Padding}} !important;}',
					],
				],
				'scopy' => true,
			],
			'ZIndex' => [
				'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'selector' => '{{PLUS_WRAP}}{z-index: {{ZIndex}};}',
					],
				],
				'scopy' => true,
			],
			
			'HideDesktop' => [
				'type' => 'boolean',
				'default' => false,
				'style' => [
					(object) [
						'selector' => '@media (min-width: 1201px){ .edit-post-visual-editor {{PLUS_WRAP}},.editor-styles-wrapper {{PLUS_WRAP}}{display: block;opacity: .5;} {{PLUS_WRAP}}{ display:none } }',
					],
				],
				'scopy' => true,
			],
			'HideTablet' => [
				'type' => 'boolean',
				'default' => false,
				'style' => [
					(object) [
						'selector' => '@media (min-width: 768px) and (max-width: 1200px){ .edit-post-visual-editor {{PLUS_WRAP}},.editor-styles-wrapper {{PLUS_WRAP}}{display: block;opacity: .5;} {{PLUS_WRAP}}{ display:none } }',
					],
				],
				'scopy' => true,
			],
			'HideMobile' => [
				'type' => 'boolean',
				'default' => false,
				'style' => [
					(object) [
						'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width: 767px){ .edit-post-visual-editor {{PLUS_WRAP}},.editor-styles-wrapper {{PLUS_WRAP}}{display: block !important;opacity: .5;} {{PLUS_WRAP}}{ display:none !important; } }',
					],
				],
				'scopy' => true,
			],
			'deepBgopt' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'DeepBgcolor' => [
				'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'deepBgopt', 'relation' => '==', 'value' => 'bg_normal_color']],
						'selector' => '{{PLUS_WRAP}} .tpgb-deep-layer { background : {{DeepBgcolor}}; }',
					],
				],
				'scopy' => true,
			],
			'DeepGrecolor' => [
				'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'deepBgopt', 'relation' => '==', 'value' => 'bg_gradientcolor']],
						'selector' => '{{PLUS_WRAP}} .tpgb-deep-layer{background: {{DeepGrecolor}};}',
					],
				],
				'scopy' => true,
			],
			'colorList' => [
				'type' => 'array',
				'repeaterField' => [
					(object) [
						'aniColor' => [
							'type' => 'string',
							'default' => ''
						],
						'aniBgtype' =>[
							'type' => 'object',
							'default' => (object) [
								'openBg'=> 0,
							],
							'style' => [
								(object) [
									'selector' => '.tpgb-deep-layer .tpgb-section-bg-scrolling{{TP_REPEAT_ID}}',
								],
							],
						],
						'scrollImg' => [
							'type' => 'object',
							'default' => [
								'url' => '',
							],
						],
					]
				],
				'default' => [
					[
						"_key" => '0',
						"aniColor" => '#8072fc',
						"aniBgtype" => '',
					],
					[
						"_key" => '1',
						"aniColor" => '#6fc784',
						"aniBgtype" => '',
					],
					[
						"_key" => '2',
						"aniColor" => '#ff5a6e',
						"aniBgtype" => '',
					],
				],
			],
			'animdur' => [
				'type' => 'string',
				'default' => 3,
				'scopy' => true,
			],
			'animDelay' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'crativeImg' => [
				'type' => 'object',
				'default' => (object) [
					'openBg'=> 0,
					'bgType' => 'image',
				],
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'deepBgopt', 'relation' => '==', 'value' => 'bg_image']],
						'selector' => '{{PLUS_WRAP}} .tpgb-deep-layer',
					],
				],
				'scopy' => true,
			],
			'craBgeffect' => [
				'type' => 'string',
				'default' => 'columns_simple_image',
				'scopy' => true,
			],
			'imgeffect' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'intensity' => [
				'type' => 'string',
				'default' => '30',
				'scopy' => true,
			],
			'perspective' => [
				'type' => 'string',
				'default' => '1000',
				'scopy' => true,
			],
			'Scale' => [
				'type' => 'string',
				'default' => '1',
				'scopy' => true,
			],
			'scrollPara' => [
				'type' => 'boolean',
				'default' => false,
			],
			'inverted' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'scrollPara' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'kburnseffect' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'Kbeffctdir' => [
				'type' => 'string',
				'default' => 'normal',
				'scopy' => true,
			],
			'effctDure' => [
				'type' => 'string',
				'default' => '14',
				'scopy' => true,
			],
			'respoImg' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'tabImage' => [
				'type' => 'object',
				'default' => (object) [
					'openBg'=> 0,
				],
				'style' => [
					(object) [
						'selector' => '@media (max-width:1024px){ {{PLUS_WRAP}} .tpgb-deep-layer }',
					],
				],
				'scopy' => true,
			],
			'mobileImg' => [
				'type' => 'object',
				'default' => (object) [
					'openBg'=> 0,
				],
				'style' => [
					(object) [
						'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width:767px){ {{PLUS_WRAP}} .tpgb-deep-layer }',
					],
				],
				'scopy' => true,
			],
			'movedir' => [
				'type' => 'string',
				'default' => 'right',
				'scopy' => true,
			],
			'trasispeed' => [
				'type' => 'string',
				'default' => '30',
				'scopy' => true,
			],
			'videosour' => [
				'type' => 'string',
				'default' => 'youtube',
			],
			'mp4Url' => [
				'type' => 'string',
				'default' => '',
			],
			'WebMUrl' => [
				'type' => 'string',
				'default' => '',
			],
			'youtubeId' => [
				'type' => 'string',
				'default' => '',
			],
			'vimeoId' => [
				'type' => 'string',
				'default' => '',
			],
			'iframeTitle' => [
				'type' => 'string',
				'default' => '',
			],
			'videoloop' => [
				'type' => 'boolean',
				'default' => false,
			],
			'videoMute' => [
				'type' => 'boolean',
				'default' => false,
			],
			'videoImg' => [
				'type' => 'object',
				'default' => [
					'url' => '',
				],
			],
			'parallax' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'rowImgs' => [
				'type' => 'array',
				'default' => [
					[ 
						'url' => TPGB_ASSETS_URL.'assets/images/tpgb-placeholder.jpg',
						'Id' => '',
					],
				],
			],
			'transieffect' => [
				'type' => 'string',
				'default' => 'fade2',
				'scopy' => true,
			],
			'transdur' => [
				'type' => 'string',
				'default' => 3000,
				'scopy' => true,
			],
			'slidetime' => [
				'type' => 'string',
				'default' => 2000,
				'scopy' => true,
			],
			'textureoly' => [
				'type' => 'string',
				'default' => 'none',
				'scopy' => true,
			],
			'animation' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'bgduration' => [
				'type' => 'string',
				'default' => '15',
				'scopy' => true,
			],
			'bgRotation' => [
				'type' => 'string',
				'default' => '120',
				'scopy' => true,
			],
			'fullBggra' => [
				'type' => 'boolean',
				'default' => false,
				'scopy' => true,
			],
			'bgposition' => [
				'type' => 'string',
				'default' => 'inherit',
				'scopy' => true,
			],
			'scrollchg' => [
				'type' => 'string',
				'default' => 'no',
				'scopy' => true,
			],
			'scrolltra' => [
				'type' => 'string',
				'default' => '0.7',
				'scopy' => true,
			],
			'midOption' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'canvasSty' => [
				'type' => 'string',
				'default' => 'style-1',
				'scopy' => true,
			],
			'particleList' => [
				'type'=> 'array',
				'repeaterField' => [
					(object) [
						'bubbleColor' => [
							'type' => 'string',
							'default' => '',
						],
					],
				],
				'default' => [
					[
						"_key" => '0',
						"bubbleColor" => '#8072fc',
					],
					[
						"_key" => '1',
						"bubbleColor" => '#6fc784',
					],
					[
						"_key" => '2',
						"bubbleColor" => '#ff5a6e',
					],
				],

			],
			'patiColor' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'canShape' => [
				'type' => 'string',
				'default' => 'circle',
				'scopy' => true,
			],
			'ctmJson' => [
				'type' => 'string',
				'default' => '',
			],
			'midimgList' => [
				'type'=> 'array',
				'repeaterField' => [
					(object) [
						'parallaxImg' => [
							'type' => 'object',
							'default' => [
								'url' => TPGB_ASSETS_URL.'assets/images/tpgb-placeholder.jpg',
							],
						],
						'leftPos' => [
							'type' => 'string',
							'default' => 20,
							'style' => [
								(object) [
									'condition' => [(object) ['key' => 'DleftAuto', 'relation' => '==', 'value' => true]],
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {left:{{leftPos}}%;}',
								],
							],
						],
						'righttPos' => [
							'type' => 'string',
							'style' => [
								(object) [
									'condition' => [(object) ['key' => 'DrightAuto', 'relation' => '==', 'value' => true]],
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {right:{{righttPos}}%;}',
								],
							],
						],
						'topPos' => [
							'type' => 'string',
							'default' => 25,
							'style' => [
								(object) [
									'condition' => [(object) ['key' => 'DtopAuto', 'relation' => '==', 'value' => true]],
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {top:{{topPos}}%;}',
								],
							],
						],
						'bottomPos' => [
							'type' => 'string',
							'style' => [
								(object) [
									'condition' => [(object) ['key' => 'DbottomAuto', 'relation' => '==', 'value' => true]],
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {bottom:{{bottomPos}}%;}',
								],
							],
						],
						'DimgWidth' => [
							'type' => 'string',
							'default' => '150',
							'style' => [
								(object) [
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img { max-width : {{DimgWidth}}px;}',
								],
							],
						],
						'TleftPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'TabRespo', 'relation' => '==', 'value' => true],
										['key' => 'TleftAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width:1024px){ {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {left:{{TleftPos}}%;} }',
								],
							],
						],
						'TtopPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'TabRespo', 'relation' => '==', 'value' => true],
										['key' => 'TtopAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width:1024px){ {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {top:{{TtopPos}}%;} }',
								],
							],
						],
						'TrightPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'TabRespo', 'relation' => '==', 'value' => true],
										['key' => 'TrightAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width:1024px){ {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {right:{{TrightPos}}%;} }',
								],
							],
						],
						'TbottomPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'TabRespo', 'relation' => '==', 'value' => true],
										['key' => 'TbottomAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width:1024px){ {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {bottom:{{TbottomPos}}%;} }',
								],
							],
						],
						'TimgWidth' => [
							'type' => 'string',
							'default' => '100',
							'style' => [
								(object) [
									'condition' => [(object) ['key' => 'TabRespo', 'relation' => '==', 'value' => true]],
									'selector' => '@media (max-width:1024px){ {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img img{ max-width :{{TimgWidth}}px;} }',
								],
							],
						],
						'MleftPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'MobRespo', 'relation' => '==', 'value' => true],
										['key' => 'MleftAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width:767px) { {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {left:{{MleftPos}}%;} }',
								],
							],
						],
						'MrightPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'MobRespo', 'relation' => '==', 'value' => true],
										['key' => 'MrightAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width:767px) { {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {right:{{MrightPos}}%;} }',
								],
							],
						],
						'MtopPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'MobRespo', 'relation' => '==', 'value' => true],
										['key' => 'MtopAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width:767px) { {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {top:{{MtopPos}}%;} }',
								],
							],
						],
						'MbottomPos' => [
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'MobRespo', 'relation' => '==', 'value' => true],
										['key' => 'MbottomAuto', 'relation' => '==', 'value' => true]
									],
									'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width:767px) { {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img {bottom:{{MbottomPos}}%;} }',
								],
							],
						],
						'MimgWidth' => [
							'type' => 'string',
							'default' => '50',
							'style' => [
								(object) [
									'condition' => [
										(object) ['key' => 'MobRespo', 'relation' => '==', 'value' => true]],
									'selector' => '@media (max-width: 1024px){.text-center{text-align: center;}}@media (max-width:767px) { {{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img img{ max-width :{{MimgWidth}}px;} }',
								],
							],
						],
						'Effectin' => [
							'type' => 'string',
							'default' => '',
						],
						'imgOpa' => [
							'type' => 'string',
							'default' => '',
							'style' => [
								(object) [
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img img,{{PLUS_WRAP}} .tpgb-automove-img {{TP_REPEAT_ID}}{ opacity : {{imgOpa}} ;}',
								],
							],
						],
						'ImgZind' => [
							'type' => 'string',
							'default' => '',
							'style' => [
								(object) [
									'selector' => '{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img img,{{PLUS_WRAP}} .tpgb-middle-layer {{TP_REPEAT_ID}}.tpgb-repet-img { z-index : {{ImgZind}} ;}',
								],
							],
						],
						'resVisib' => [
							'type' => 'boolean',
							'default' => false,	
						],
						'desHide' => [
							'type' => 'boolean',
							'default' => false,	
						],
						'tabHide' => [
							'type' => 'boolean',
							'default' => false,	
						],
						'moHide' => [
							'type' => 'boolean',
							'default' => false,	
						],
						'imgSize' => [
							'type' => 'string',
							'default' => '',
						],
						'imgDire' => [
							'type' => 'string',
							'default' => '',
						],
						'modImgeff' => [
							'type' => 'string',
							'default' => '',
						],
						'imgeffdur' => [
							'type' => 'string',
							'style' => [
								(object) [
									'condition' => [(object) ['key' => 'modImgeff', 'relation' => '!=', 'value' => '']],
									'selector' => '{{PLUS_WRAP}} .tpgb-mordernimg-effect {{TP_REPEAT_ID}} img.tpgb-imgeffect { animation-duration :{{imgeffdur}}s; -webkit-animation-duration: {{imgeffdur}}s; }',
								],
							],
						],
						'tranOrigin' => [
							'type' => 'string',
							'default' => 'center center',
						],
					],
				],
				'default' => [
					[
						"_key" => '0',
						"parallaxImg" => [ 'url' => TPGB_ASSETS_URL.'assets/images/tpgb-placeholder.jpg' ],
						'DleftAuto' => true,
						'leftPos' => 20,
						'topPos' => 25,
						'DtopAuto' => true,
						'DimgWidth' => 150,
						'imgDire' => 'left',
						'modImgeff' => '',
						'tranOrigin' => 'center center',
					],
					[
						"_key" => '1',
						"parallaxImg" => [ 'url' => TPGB_ASSETS_URL.'assets/images/tpgb-placeholder.jpg' ],
						'DleftAuto' => true,
						'leftPos' => 35,
						'topPos' => 25,
						'DtopAuto' => true,
						'DimgWidth' => 150,
						'imgDire' => 'right',
						'modImgeff' => '',
						'tranOrigin' => 'center center',
					],
				],

			],
			'topOption' => [
				'type' => 'string',
				'default' => '',
				'scopy' => true,
			],
			'topBgtype' => [
				'type' => 'object',
				'default' => (object) [
					'openBg'=> 0,
					'bgType' => 'color',
				],
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'topOption', 'relation' => '==', 'value' => 'color' ]],
						'selector' => '{{PLUS_WRAP}} .tpgb-top-layer'
					],
				],
				'scopy' => true,
			],
			'textureImg' => [
				'type' => 'object',
				'default' => [
					'url' => '',
					'Id' => '',
				],
			],
			'teximgPosition' => [
				'type' => 'object',
				'default' => [ 'md' => '','sm' => '','xs' => '' ],
			],
			'teximgAtta' => [
				'type' => 'object',
				'default' => [ 'md' => '','sm' => '','xs' => '' ],
			],
			'teximgRepeat' => [
				'type' => 'object',
				'default' => [ 'md' => '','sm' => '','xs' => '' ],
			],
			'teximgSize' => [
				'type' => 'object',
				'default' => [ 'md' => '','sm' => '','xs' => '' ],
			],
			'timgOpacity' => [
				'type' => 'string',
				'default' => '',
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'topOption', 'relation' => '==', 'value' => 'texture-img' ]],
						'selector' => '{{PLUS_WRAP}} .tpgb-top-layer{opacity : {{timgOpacity}} }'
					],
				],
				'scopy' => true,
			],
			'wrapLink' => [
				'type' => 'boolean',
				'default' => false,
			],
			'rowUrl' => [
				'type'=> 'object',
				'default'=> [
					'url' => '',
					'target' => '',
					'nofollow' => ''
				],
			],
 		];
		
	$attributesOptions = array_merge( $attributesOptions, $displayRules,$globalEqualHeightOptions );
	
	register_block_type( 'tpgb/tp-row', array(
		'attributes' => $attributesOptions,
		'editor_script' => 'tpgb-block-editor-js',
		'editor_style'  => 'tpgb-block-editor-css',
        'render_callback' => 'tpgb_tp_section_row_render_callback'
    ) );
}
add_action( 'init', 'tpgb_tp_section_row' );