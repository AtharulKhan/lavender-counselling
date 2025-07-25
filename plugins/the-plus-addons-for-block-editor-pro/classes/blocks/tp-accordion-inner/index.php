<?php
/* Block : TP Accordion Inner
 * @since : 2.0.0
 */
defined( 'ABSPATH' ) || exit;

function tpgb_tp_accr_inner_render_callback( $attributes, $content) {
	$pattern = '/\btpgb-accor-item/';
    
	if (preg_match($pattern, $content)) {
		if( class_exists('Tpgb_Blocks_Global_Options') ){
            $global_blocks = Tpgb_Blocks_Global_Options::get_instance();
            $content = $global_blocks::block_row_conditional_render($attributes,$content);
        }
	   return $content;
	}
	$output = '';
	$block_id = (!empty($attributes['block_id'])) ? $attributes['block_id'] : uniqid("title");
	$title = (!empty($attributes['title'])) ? $attributes['title'] : '';
	$toggleIcon = (!empty($attributes['toggleIcon'])) ? $attributes['toggleIcon'] :false;
 	$innerIcon = (!empty($attributes['innerIcon'])) ? $attributes['innerIcon'] :false;
	$iniconFonts = (!empty($attributes['iniconFonts'])) ? $attributes['iniconFonts'] : '';
	$innericonName = (!empty($attributes['innericonName'])) ? $attributes['innericonName'] : '';
	$iconFont = (!empty($attributes['iconFont'])) ? $attributes['iconFont'] : 'font_awesome';
	$iconName = (!empty($attributes['iconName'])) ? $attributes['iconName'] : 'fas fa-plus';
	$ActiconName = (!empty($attributes['ActiconName'])) ? $attributes['ActiconName'] : 'fas fa-minus';
	$iconAlign = (!empty($attributes['iconAlign'])) ? $attributes['iconAlign'] : 'end';
	$titleTag = (!empty($attributes['titleTag'])) ? $attributes['titleTag'] : 'h3';
	$titleAlign = (!empty($attributes['titleAlign'])) ? $attributes['titleAlign'] : '';
	$hrefLink = (!empty($attributes['hrefLink'])) ? $attributes['hrefLink'] : '';
	$index = (!empty($attributes['index'])) ? $attributes['index'] : '';
	$defaultAct = (!empty($attributes['defaultAct'])) ? $attributes['defaultAct'] : '';
	$markupSch = (!empty($attributes['markupSch'])) ? $attributes['markupSch'] : false;

	$blockClass = Tp_Blocks_Helper::block_wrapper_classes( $attributes );
	//Get Toogle icon
	$tgicon = '';
	if(!empty($toggleIcon)){	
		$tgicon .= '<div class="accordion-toggle-icon">';
			$tgicon .= '<span class="close-toggle-icon toggle-icon">';
				if($iconFont == 'font_awesome'){
					$tgicon .=  '<i class="'.esc_attr($iconName).'"></i>' ; 
				}
			$tgicon .= '</span>';
			$tgicon .= '<span class="open-toggle-icon toggle-icon">';
				if($iconFont == 'font_awesome'){
					$tgicon .= '<i class="'.esc_attr($ActiconName).'"></i>' ; 
				}
			$tgicon .= '</span>';
		$tgicon .= '</div>';
	}

	$active = '';
	if($index == $defaultAct){
		$active = ' active';
	}

	//call Schema Markup
	$schemaAttr = $schemaAttr1 = $schemaAttr2 = $schemaAttr3 = '';
	if(!empty($markupSch)) {
		$schemaAttr = 'itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"';
		$schemaAttr1 = 'itemprop="name"';
		$schemaAttr2 = 'itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"';
		$schemaAttr3 = 'itemprop="text"';
	}

	$output .= '<div class="tpgb-accor-item tpgb-relative-block '.esc_attr($blockClass).'" '.$schemaAttr.'>';
		$output .= '<div id="'.esc_attr($hrefLink).'" class="tpgb-accordion-header tpgb-trans-linear-before '.esc_attr($titleAlign).' '.esc_attr($active).'" role="tab" data-tab="'.esc_attr($index).'">';
			if($iconAlign == 'start'){
				$output .= $tgicon;
			}
			$output .= '<span class="accordion-title-icon-wrap">';
				if(!empty($innerIcon)){
					$output .= '<span class="accordion-tab-icon">';
						if($iniconFonts == 'font_awesome'){
							$output .= '<i class="'.esc_attr($innericonName).'"></i>';
						}
					$output .= '</span>';
				}
				$output .= '<'.Tp_Blocks_Helper::validate_html_tag($titleTag).' class="accordion-title" '.$schemaAttr1.'>'.wp_kses_post($title).'</'.Tp_Blocks_Helper::validate_html_tag($titleTag).'>';
			$output .= '</span>';
			if($iconAlign == 'end'){
				$output .= $tgicon;
			}
		$output .= '</div>';
		$output .= '<div class="tpgb-accordion-content '.esc_attr($active).'" role="tabpanel" data-tab="'.esc_attr($index).'" '.$schemaAttr2.'>';
			$output .= '<div class="tpgb-content-editor" '.$schemaAttr3.'>';
				$output .= $content;
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';
    
	return $output;
}

/**
 * Render for the server-side
 */
function tpgb_tp_accr_inner() {
	
	/* $attributesOptions = [
			'block_id' => [
                'type' => 'string',
				'default' => '',
			],
			'className' => [
				'type' => 'string',
				'default' => '',
			],
			'uniqueKey' => [
				'type' => 'string',
				'default' => '',
			],
			'accordianList' => [
				'type'=> 'array',
				'repeaterField' => [
					(object) [
						'title' => [
							'type' => 'string',
							'default' => 'Accordion'
						],
						'desc' => [
							'type' => 'string',
							'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
						],
						'innerIcon' => [
							'type' => 'boolean',
							'default' => false
						],
						'UniqueId' => [
							'type' => 'string',
							'default' => ''
						],
						'iconFonts' => [
							'type' => 'string',
							'default' => 'font_awesome'
						],
						'innericonName' => [
							'type'=> 'string',
							'default'=> 'fas fa-home',
						],
						'contentType' => [
							'type' => 'string',
							'default' => 'content'
						],
						'stepImage' => [
							'type' => 'string'
						],
					],
				],
				'default' => [
					[
						"_key" => '0',
						"title" => 'Accordion 1',
						"contentType" => 'content',
						'desc' => 'This is just dummy content. Put your relevant content over here. We want to remind you, smile and passion are contagious, be a carrier.',
						'innerIcon' => false,
						'iconFonts' => 'font_awesome',
						'innericonName' => 'fas fa-home',
					],
					[
						"_key" => '1',
						"title" => 'Accordion 2',
						"contentType" => 'content',
						'desc' => 'Enter your relevant content over here. This is just dummy content.  We want to remind you, smile and passion are contagious, be a carrier.',
						'innerIcon' => false,
						'iconFonts' => 'font_awesome',
						'innericonName' => 'fas fa-home',
					],
				],
			],
			'title' => [
				'type' => 'string',
				'default' => '',
			],
			'index' => [
				'type' => 'number',
				'default' => '',
			],
			'defaultAct' => [
				'type' => 'number',
				'default' => '',
			],
			'toggleIcon' => [
				'type' => 'boolean',
				'default' => false,	
			],
			'iconFont' => [
				'type' => 'string',
				'default' => 'font_awesome',	
			],
			'iconName' => [
				'type'=> 'string',
				'default'=> 'fas fa-plus ',
			],
			'ActiconName' => [
				'type'=> 'string',
				'default'=> 'fas fa-minus',
			],
			'titleTag' => [
				'type' => 'string',
				'default' => '',
			],
			'titleAlign' => [
				'type' => 'string',
				'default' => 'text-left',
				'scopy' => true,
			],
			'innerIcon' => [
				'type' => 'boolean',
				'default' => false
			],
			'iniconFonts' => [
				'type' => 'string',
				'default' => 'font_awesome'
			],
			'innericonName' => [
				'type'=> 'string',
				'default'=> 'fas fa-home',
			],
			'iconAlign' => [
				'type' => 'string',
				'default' => 'end',
			],
			'markupSch' => [
				'type' => 'boolean',
				'default' => false,	
			],
			'hrefLink' => [
				'type' => 'string',
				'default' => '',
			],
		];
		
	$attributesOptions = array_merge( $attributesOptions );
	
	register_block_type( 'tpgb/tp-accordion-inner', array(
		'attributes' => $attributesOptions,
		'editor_script' => 'tpgb-block-editor-js',
		'editor_style'  => 'tpgb-block-editor-css',
        'render_callback' => 'tpgb_tp_accr_inner_render_callback'
    ) ); */
	if(method_exists('Tpgb_Blocks_Global_Options', 'merge_options_json')){
		$block_data = Tpgb_Blocks_Global_Options::merge_options_json(__DIR__, 'tpgb_tp_accr_inner_render_callback');
		register_block_type( $block_data['name'], $block_data );
	}
}
add_action( 'init', 'tpgb_tp_accr_inner' );