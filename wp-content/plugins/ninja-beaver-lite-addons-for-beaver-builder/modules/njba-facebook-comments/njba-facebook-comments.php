<?php
/**
 * @class NjbaFBCommentsModule
 */
class NjbaFBCommentsModule extends FLBuilderModule {
	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __( 'Facebook Comments', 'bb-njba' ),
			'description'   	=> __( 'A module to embed facebook comments.', 'bb-njba' ),
			'group'         => __('NJBA Module', 'bb-njba'),
            'category'      => __('Social Modules - NJBA', 'bb-njba'),
            'dir'           	=> NJBA_MODULE_DIR . 'modules/njba-facebook-comments/',
			'url'           	=> NJBA_MODULE_URL . 'modules/njba-facebook-comments/',
			'editor_export' 	=> true, // Defaults to true and can be omitted.
			'enabled'       	=> true, // Defaults to true and can be omitted.
		));
	}
}
/**
 * 
 */
$njba_fb_setting=new njba_fb_setting();
FLBuilder::register_module( 'NjbaFBCommentsModule', array(
	'general'       => array( // Tab
		'title'         => __( 'General', 'bb-njba' ), // Tab title
		'description'	=> $njba_fb_setting->njba_get_fb_module_desc(),
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => __( 'Comments Box', 'bb-njba' ), // Section Title
				//'description'	=> $njba_fb_setting->njba_get_fb_app_id_documentation(),
				'fields'        => array( // Section Fields
					'comments_number'	=> array(
						'type'          	=> 'text',
						'label'         	=> __( 'Comment Count', 'bb-njba' ),
						'size'				=> 10,
						'default'			=> 10,
						'help'          => __('Minimum number of comments: 5', 'bb-njba')
					),
					'order_by'  => array(
						'type'			=> 'select',
						'label'         => __( 'Order By', 'bb-njba' ),
						'default'       => 'social',
						'options'       => array(
							'reverse_time'      => __( 'Reverse Time', 'bb-njba' ),
							'time'      		=> __( 'Time', 'bb-njba' ),
							'social'			=> __( 'Social', 'bb-njba' ),
						),
					),
					'url_type'  => array(
						'type'			=> 'select',
						'label'         => __( 'Target URL', 'bb-njba' ),
						'default'       => 'current_page',
						'options'       => array(
							'current_page'      => __( 'Current Page', 'bb-njba' ),
							'custom'			=> __( 'Custom', 'bb-njba' ),
						),
						'toggle'	=> array(
							'custom'	=> array(
								'fields'	=> array( 'url' ),
							),
						),
					),
					'url'	=> array(
						'type'          	=> 'text',
						'label'         	=> __( 'URL', 'bb-njba' ),
						'placeholder'		=> __( 'http://your-website-link.com', 'bb-njba' ),
						'connections'   	=> array( 'url' ),
					),
					'width'	=> array(
						'type'			=> 'text',
						'label'     	=> __( 'Width', 'bb-njba' ),
						'description'	=> __( 'px', 'bb-njba' ),
						'default'		=> '500',
						'size'			=> 5,
					),
				),
			),
		),
	),
));