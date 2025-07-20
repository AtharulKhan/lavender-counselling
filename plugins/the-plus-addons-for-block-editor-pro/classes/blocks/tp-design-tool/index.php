<?php
/* Block : TP Design Tool
 * @since : 1.3.2
 */
defined( 'ABSPATH' ) || exit;

function tpgb_tp_design_tool_render_callback( $attributes ) {
	$output = '';
    $block_id = (!empty($attributes['block_id'])) ? $attributes['block_id'] : uniqid("title");
	$designToolOpt = (!empty($attributes['designToolOpt'])) ? $attributes['designToolOpt'] : 'grid_stystem';
	$gridSystemOpt = (!empty($attributes['gridSystemOpt'])) ? $attributes['gridSystemOpt'] : 'gs_default';
	$gridDirection = (!empty($attributes['gridDirection'])) ? $attributes['gridDirection'] : 'ltr';
	$gridOnFront = (!empty($attributes['gridOnFront'])) ? $attributes['gridOnFront'] : false;
	
	$blockClass = Tp_Blocks_Helper::block_wrapper_classes( $attributes );

    $output .= '<div class="tpgb-design-tool tpgb-block-'.esc_attr($block_id).' '.esc_attr($blockClass).'"></div>';
	
	$output = Tpgb_Blocks_Global_Options::block_Wrap_Render($attributes, $output);
	
    return $output;
}

/**
 * Render for the server-side
 */
function tpgb_tp_design_tool() {
	/* $attributesOptions = array(
			'block_id' => array(
                'type' => 'string',
				'default' => '',
			),
			'designToolOpt' => [
				'type' => 'string',
				'default' => 'grid_stystem',	
			],
			'gridSystemOpt' => [
				'type' => 'string',
				'default' => 'gs_default',	
			],
			'gridDirection' => [
				'type' => 'string',
				'default' => 'ltr',	
			],
			'gridMaxWidth' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => '1140',
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'gridSystemOpt', 'relation' => '==', 'value' => 'gs_custom' ]],
						'selector' => 'html {--tp_grid_cont_max_width: {{gridMaxWidth}} !important; }',
					],
				],
				'scopy' => true,
			],
			'gridColumn' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => '12',
					"unit" => '',
				],
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'gridSystemOpt', 'relation' => '==', 'value' => 'gs_custom' ]],
						'selector' => 'html {--tp_grid_columns: {{gridColumn}} !important; }',
					],
				],
				'scopy' => true,
			],
			'gridBGcolor' => [
				'type' => 'string',
				'default' => '#8072fc40',
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'gridSystemOpt', 'relation' => '==', 'value' => 'gs_custom' ]],
						'selector' => 'html { --tp_grid_color: {{gridBGcolor}} !important; }',
					],
				],
				'scopy' => true,
			],
			'alleySpace' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => '30',
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'gridSystemOpt', 'relation' => '==', 'value' => 'gs_custom' ]],
						'selector' => 'html {--tp_grid_alley: {{alleySpace}} !important; }',
					],
				],
				'scopy' => true,
			],
			'alleyBGcolor' => [
				'type' => 'string',
				'default' => '#00000000',
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'gridSystemOpt', 'relation' => '==', 'value' => 'gs_custom' ]],
						'selector' => 'html { --tp_grid_alley_color: {{alleyBGcolor}} ; }',
					],
				],
				'scopy' => true,
			],
			'gridOffset' => [
				'type' => 'object',
				'default' => (object) [ 
					'md' => '30',
					"unit" => 'px',
				],
				'style' => [
					(object) [
						'condition' => [(object) ['key' => 'gridSystemOpt', 'relation' => '==', 'value' => 'gs_custom' ]],
						'selector' => 'html { --tp_grid_left_right_offset: {{gridOffset}} !important; }',
					],
				],
				'scopy' => true,
			],
			'gridOnFront' => [
				'type' => 'boolean',
				'default' => false,	
				'scopy' => true,
			],
		);
	$attributesOptions = array_merge($attributesOptions);
	
	register_block_type( 'tpgb/tp-design-tool', array(
		'attributes' => $attributesOptions,
		'editor_script' => 'tpgb-block-editor-js',
		'editor_style'  => 'tpgb-block-editor-css',
        'render_callback' => 'tpgb_tp_design_tool_render_callback'
    ) ); */
	if(method_exists('Tpgb_Blocks_Global_Options', 'merge_options_json')){
		$block_data = Tpgb_Blocks_Global_Options::merge_options_json(__DIR__, 'tpgb_tp_design_tool_render_callback');
		register_block_type( $block_data['name'], $block_data );
	}
}
add_action( 'init', 'tpgb_tp_design_tool' );