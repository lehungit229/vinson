<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	// public function sleep(){
	// 	sleep(2);
	// }

	public function bookmark(){
		// echo 1;die;

		$id = $this->input->post('idContact');
		$bookmark = $this->input->post('bookmark');
		$_update['bookmark'] = ($bookmark == 0) ? 1 : 0 ;
		$this->Autoload_Model->_update(array(
			'where' => array('id' => $id),
			'table' => 'contact',
			'data' => $_update,
		));
	}

	public function viewed(){
		$id = $this->input->post('id');
		$viewed = $this->input->post('viewed');
		// echo $viewed; die();
		if($viewed == 0){
			$viewed =1;
			$_update['viewed'] = $viewed;
			$result = $this->Autoload_Model->_update(array(
				'where' => array('id' => $id),
				'table' => 'contact',
				'data' => $_update,
			));
			echo $result; die();
		}
	}

	public function listContact(){
		$page = (int)$this->input->get('page');
		$data['from'] = 0;
		$data['to'] = 0;

		$perpage = ($this->input->get('perpage')) ? $this->input->get('perpage') : 5;
		$keyword = $this->db->escape_like_str($this->input->get('keyword'));
		$catalogueid = (int)$this->input->get('catalogueid');
		if($catalogueid > 0){
			$config['total_rows'] = $this->Autoload_Model->_get_where(array(
				'select' => 'id',
				'table' => 'contact',
				'count' => TRUE,
				// 'where' => array('catalogueid' => $catalogueid),
				'where' => ($catalogueid ==0) ? '' : array( 'catalogueid' => $catalogueid) ,
				'keyword' => '(fullname LIKE \'%'.$keyword.'%\')',
			));
		}else{
			$config['total_rows'] = $this->Autoload_Model->_get_where(array(
				'select' => 'id',
				'table' => 'contact',
				'count' => TRUE,
				'keyword' => '(fullname LIKE \'%'.$keyword.'%\')',
			));
		}
		$html = '';
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['base_url'] = base_url('contact/backend/contact/view');
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = $perpage;
			$config['cur_page'] = $page;
			$config['page'] = $page;
			$config['uri_segment'] = 5;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination no-margin">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a class="btn-primary">';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$listPagination = $this->pagination->create_links();
			$totalPage = ceil($config['total_rows']/$config['per_page']);
			$page = ($page <= 0)?1:$page;
			$page = ($page > $totalPage)?$totalPage:$page;
			$page = $page - 1;
			$data['from'] = ($page * $config['per_page']) + 1;
			$data['to'] = ($config['per_page']*($page+1) > $config['total_rows']) ? $config['total_rows']  : $config['per_page']*($page+1);

			$listContact = $this->Autoload_Model->_get_where(array(
				'select' => 'id, file, viewed, fullname, email, phone, created, subject, message, bookmark,(SELECT title FROM contact_catalogue WHERE contact_catalogue.id = contact.catalogueid) as catalogueTitle',
				'table' => 'contact',
				'where' => ($catalogueid ==0) ? '' : array( 'catalogueid' => $catalogueid) ,
				'keyword' => '(fullname LIKE \'%'.$keyword.'%\')',
				'start' => $page * $config['per_page'],
				'limit' => $config['per_page'],
				'order_by' => 'viewed asc, created desc',
			), TRUE);
			if(isset($listContact) && is_array($listContact) && count($listContact)){
				foreach($listContact as $key => $val){
					$html = $html .'<tr class="gradeX" id="">';
					$html = $html .'<td class="pd-top text-center pdt25" >';
					$html = $html .'<input type="checkbox" name="checkbox[]" value="'.$val['id'].'" class="checkbox-item">';
					$html = $html .'<label for="" class="label-checkboxitem"></label>';
					$html = $html .'</td>';
					$html = $html .'<td class="pd-top text-center pdt25"><i class="fa fa-star '.(($val['bookmark'] == 1) ? ' text-yellow' : '').'" data-id="'.$val['id'].'" data-bookmark="'.$val['bookmark'].'"></i>';
					$html = $html .'</td>';
					$html = $html .'<td class="pd-top text-center pdt25">';
					if(strlen($val['file']) > 0){
						$html = $html .'<i class="fa fa-paperclip"></i>';
					}
					$html = $html .'</td>';
					$html = $html .'<td class="pd-top">';
					$html = $html .'<a data-id="'.$val['id'].'" data-viewed="'.$val['viewed'].'" class="detail-contact title-1 '.(($val['viewed'] == 0) ? ' text-blue' : '').'" href="" >'.$val['fullname'].'</a>';
					$html = $html .'<div class="">';
					$html = $html .'<a data-id="'.$val['id'].'" data-viewed="'.$val['viewed'].'" href="" class="detail-contact subtitle-1 '.(($val['viewed'] == 0) ? ' text-blue-1' : '').'" title="'.$val['phone'].'" class="subtitle-1">';
					$html = $html .''.$val['phone'].'';
					$html = $html .'</a>';
					$html = $html .'</div>';
					$html = $html .'</td> ';
					$html = $html .'<td class="pd-top">';
					$html = $html .'<a data-id="'.$val['id'].'" data-viewed="'.$val['viewed'].'" class="maintitle detail-contact title-1 '.(($val['viewed'] == 0) ? ' text-blue' : '').'" style="" href="" title="">';
					$html = $html .''.$val['subject'].'';
					$html = $html .'</a>';
					$html = $html .'<div class="">';
					$html = $html .'<a data-id="'.$val['id'].'" data-viewed="'.$val['viewed'].'" href="" class="detail-contact subtitle-1 '.(($val['viewed'] == 0) ? ' text-blue-1' : '').'" title="">';
					$html = $html .''.$val['message'].'';
					$html = $html .'</a>';
					$html = $html .'</div>';
					$html = $html .'</td>';
					$html = $html .'<td class="pd-top text-center">'.gettime($val['created'],'d/m/Y h:i:s').'</td> ';
					$html = $html .'<td class="text-center actions" style="padding-top:18px;">';
					$html = $html .'<a  type="button" class="btn btn-danger btn-delete ajax-delete"  data-id="'.$val['id'].'" data-title="Lưu ý: Khi bạn xóa nhóm, toàn bộ thành viên trong nhóm này sẽ bị xóa. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!" data-router="" data-module="contact" data-child=""><i class="fa fa-trash"></i></a>';
					$html = $html .'</td>';
					$html = $html .'</tr>';
				}
			}
		}else{
			$html = $html .'<tr><td colspan="9"><small class="text-danger">Không có dữ liệu phù hợp</small></td></tr> ';
		}
		echo json_encode(array(
			'pagination' => (isset($listPagination)) ? $listPagination : '',
			'html' => (isset($html)) ? $html : '',
			'total' => $config['total_rows'],
		));die();
	}



	/* ================ delete ======================= */
	public function ajax_delete(){
		$param['module'] = $this->input->post('module');
		$param['id'] = (int)$this->input->post('id');
		$param['child'] = (int)$this->input->post('child');

		$flag = $this->Autoload_Model->_delete(array(
			'where' => array('id' => $param['id']),
			'table' => $param['module']
		));
		echo $flag; die();
	}

	public function ajax_group_delete(){
		$param = $this->input->post('param');
		if(isset($param['list']) && is_array($param['list']) && count($param['list'])){
			foreach($param['list'] as $key => $val){
				$result = $this->Autoload_Model->_delete(array(
					'where' => array('id' => $val),
					'table' => $param['module'],
				));
				if($result > 0){
					$countChild = $this->Autoload_Model->_get_where(array(
						'where' => array('catalogueid' => $val),
						'table' => 'contact',
						'count' => TRUE,
					));
					if($countChild >0){
						$resultChild = $this->Autoload_Model->_delete(array(
							'where' => array('catalogueid' => $val),
							'table' => 'contact',
						));
						if($resultChild <= 0){
							$error = array(
								'flag' => 1,
								'message' => 'Xóa không thành công phần tử con trong nhóm',
							);
							echo json_encode(array(
								'error' => $error,
							));die;
						}
					}else{
						$error = array(
							'flag' => 1,
							'message' => 'Xóa không thành công',
						);
						echo json_encode(array(
							'error' => $error,
						));die;
					}
				}
				$error = array(
					'flag' => 0,
					'message' => '',
				);
				echo json_encode(array(
					'error' => $error,
				));die;
			}
		}
	}


	public function save_info_contact(){
		if($this->input->post()){
			$data = $this->input->post('data');
			$validate = $this->input->post('validate');

			// print_r($data);die;

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', ' / ');

			if (isset($validate) && is_array($validate) && count($validate)) {
				foreach($validate as $key => $val){
					$this->form_validation->set_rules($val['name'], $val['label'], $val['rule']);
				}
			}
			if($this->form_validation->run($this)){
				$error = '';
				//validate thành công tiến hành lưu thông tin vào db contact
				if (isset($data) && is_array($data) && count($data)) {
					foreach($data as $key => $val){
						$_insert[$val['name']] = $val['value'];
					}
				}
				$_insert['created'] = gmdate('Y-m-d H:i:s', time() + 7*3600);

				$insertId = $this->Autoload_Model->_create(array(
					'table' => 'contact',
					'data' => $_insert,
				));

				if($insertId > 0){
					// gửi mail cho người quản trị

					$html = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<section class="mail-content" style="border: 1px solid #E5E5E5;">
									<div class="header" style="background: #0077bc; padding: 15px;border-bottom: 1px solid #E5E5E5;">
										<h2><span style="display: block; color: #fff; font-size: 18px;text-transform: uppercase;text-align: center;">Thông tin liên hệ</span></h2>
									</div>
									<div class="content" style="padding: 0 15px;">';
										if (isset($data) && is_array($data) && count($data)) {
											foreach ($data as $key => $val) {
												$html.= '<p style="margin-bottom: 10px;"><label class="md-label" style="font-size: 13px;font-weight: 600; margin-right: 20px;">'.$validate[$key]['label'].': </label><span style="">'.$val['value'].'</span></p>';
											}
										}
					$html .= 		'</div>
								</section>';


					$this->load->library('mailbie');
					$this->mailbie->sent(array(
						'to' => $this->general['contact_email'],
						'cc' => '',
						'subject' => 'Yêu cầu "'.$_insert['subject'].'" từ hệ thống '.$this->general['contact_website'],
						'message' => $html,
					));

					echo json_encode(array(
						'error' => $error,
					));die;
				}

				echo json_encode(array(
					'error' => 'Đã có lỗi xảy ra. Xin vui lòng quay lại sau ít phút !',
				));die;

			}else{
				echo json_encode(array(
					'error' => validation_errors(),
				)); die;
			}

		}
	}

}
