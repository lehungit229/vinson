<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['slide'] = slide(array('keyword' => 'main-slide'));
		$data['section'] = array(
			'intro' => layout_control(array(
				'layoutid' => 1,
				'post' => array(
					'flag' => TRUE,
					'post' => TRUE,
					'limit' => 5,
				),
			), FALSE),
			'category' => layout_control(array(
				'layoutid' => 2,
				'post' => array(
					'flag' => TRUE,
					'post' => TRUE,
					'limit' => 6,
				),
			), FALSE),
			'new' => layout_control(array(
				'layoutid' => 3,
				'post' => array(
					'flag' => TRUE,
					'post' => TRUE,
					'limit' => 8,
				),
			), FALSE),
			'event' => layout_control(array(
				'layoutid' => 4,
				'post' => array(
					'flag' => TRUE,
					'post' => TRUE,
					'limit' => 5,
				),
			), FALSE),
			'post' => layout_control(array(
				'layoutid' => 5,
				'post' => array(
					'flag' => TRUE,
					'post' => TRUE,
					'limit' => 2,
				),
			), FALSE),
		);

		// print_r($data['section']['product']);die();

		$data['canonical'] = base_url();
		$data['meta_title'] = $this->general['seo_meta_title'];
		$data['meta_description'] = $this->general['seo_meta_description'];
		$data['og_type'] = 'website';
		$data['template'] = 'homepage/frontend/home/index';
		$this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);
	}
}
