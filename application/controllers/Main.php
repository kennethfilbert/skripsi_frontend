<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->model('CustomerModel');
		
	}

	public function index()
	{
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		$this->load->view('loginClient', $data);
	}

	public function homepage()
	{
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		if($this->session->userdata['isUserLoggedIn']['isLoggedIn'] !=true ){
			redirect('/Main/index', 'refresh');
		}
		$this->load->view('home', $data);
	}

	public function forgetPassword()
	{
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		$this->load->view('forgetPassword', $data);
	}

	public function profile($id){
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		$data['profileData'] = $this->CustomerModel->getCustomerById($id);
		$data['ticketData'] = $this->CustomerModel->getCustomerTickets($id);
		if($this->session->userdata['isUserLoggedIn']['isLoggedIn'] !=true ){
			redirect('/Main/index', 'refresh');
		}
		$this->load->view('customerProfile', $data);
	}

	public function aboutUs(){
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		if($this->session->userdata['isUserLoggedIn']['isLoggedIn'] !=true ){
			redirect('/Main/index', 'refresh');
		}
		$this->load->view('aboutus', $data);
	}

	public function loginCustomer()
	{
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);

		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		/*if(isset($this->session->userdata['isUserLoggedIn'])){
			$this->load->view('home', $data);
		}else{
			$this->load->view('loginClient', $data);
		}*/

		$loginData = array(
			'customerEmail' => $this->input->post('email'),
			'customerPassword' => md5($this->input->post('password'))
		);
		$result = $this->CustomerModel->customerLogin($loginData);

		if($result==true){
			$custEmail = $this->input->post('email');
					$result = $this->CustomerModel->getCustomerInfo($custEmail);
					$sessionData = array(
						'customerID' => $result[0]->customerID,
						'customerUsername' => $result[0]->customerUsername,
						'customerEmail' => $result[0]->customerEmail,
						'isLoggedIn' => true
						);

					$this->session->set_userdata('isUserLoggedIn', $sessionData);
					$loggedInUser = $sessionData;	
					//$data['success_msg'] = 'Welcome, '.$result[0]->customerUsername.'!';
					$this->load->view('home', $data);
		}
		else if($result==false){
				$data['error_msg'] = 'Invalid username/password.';
				$this->load->view('loginClient', $data);
		}

		
	}

	public function logout()
	{
		$this->session->unset_userdata('isUserLoggedIn');
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
	}

	public function recoverPassword()
	{	
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);

		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$custEmail = $this->input->post('email');
		$result = $this->CustomerModel->getEmail($custEmail);

		if($result==true){
			$this->CustomerModel->updatePassword($custEmail);
			$data['success_msg'] = 'An e-mail containing your new password has been sent to '.$custEmail.'.';
			$this->load->view('forgetPassword', $data);
		}
		else{
			$data['error_msg'] = 'Entered e-mail does not exist';
			$this->load->view('forgetPassword', $data);
		}

	}

	public function changePassword($id){
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		$data['passData'] = $this->CustomerModel->getCustomerById($id);

		$this->form_validation->set_rules('newPass', 'Password', 'required');
		$this->form_validation->set_rules('confirmPass', 'confirm password', 'required|matches[newPass]');

		if($this->form_validation->run() == FALSE){
			$data['error_msg'] = "New password does not match";
			$this->load->view('changePassword', $data);
		}
		else{
			$currentPass = $this->input->post('oldPass');
			$newPass = $this->input->post('newPass');
		
			$result = $this->CustomerModel->changePassword($currentPass, $newPass, $id);

			if($result==true){
				$data['success_msg'] = 'Your password has been changed';
				//echo $currentPass, $newPass, $id;
				$this->load->view('changePassword', $data);
			}
			else{
				$data['error_msg'] = 'Old password is incorrect';
				$this->load->view('changePassword', $data);
			}
		}
		
	}

	public function addNewTicket()
	{
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}
		$id = $this->session->userdata['isUserLoggedIn']['customerID'];
		$email =  $this->session->userdata['isUserLoggedIn']['customerEmail'];

		//mkdir('./uploads/'.$email); <--buat di back end saat add user

		$target_dir = "http://192.168.0.10/uploads/".$email;
		$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$email;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['remove_spaces']		= 'TRUE';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('picture'))
                {
					$data['upload_status'] = 'No pictures.';
						//echo "Fail";
                }
                else
                {
					$data['upload_status'] = 'Picture too.';
					//echo "Success";
                }

		$uploadData = $this->upload->data();

		$data = array(
			'token' => rand(100,99999),
			'customerID' => $id,
			'status' => 1,
			'customerName' => $this->input->post('name'),
			'customerEmail' => $this->input->post('email'),
			'customerPhone' => $this->input->post('phone'),
			'ticketTitle' => $this->input->post('title'),
			'productName' => $this->input->post('product'),
			'inquiryType' => $this->input->post('inquiry'),
			'urgency' => $this->input->post('urgency'),

			'description' => $this->input->post('descriptiontext'),
			'picturePath' => $target_dir.'/'.$uploadData['file_name']
		);

		$result = $this->CustomerModel->insertNewTicket($data, $email);
		if($result==TRUE){
			//redirect(base_url('index.php/Main/index'));
			$data['success_msg'] = 'Ticket successfully submitted.';
			$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
			$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
			$this->load->view('home', $data);
		}
	}

	public function ticketDetails($ticketID){
		$data = array();
		$data['js'] = $this->load->view('include/script.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/style.php', NULL, TRUE);
		$data['details'] = $this->CustomerModel->getTicketById($ticketID);
		$data['changelog'] = $this->CustomerModel->getChangelog($ticketID);
		$adminID = $this->CustomerModel->getTicketById($ticketID);
		$data['adminDetails'] = $this->CustomerModel->getAdminInfo($adminID[0]['userID']);
		if($this->session->userdata['isUserLoggedIn']['isLoggedIn'] !=true ){
			redirect('/Main/index', 'refresh');
		}
		$this->load->view('ticketDetails', $data);
	}
}
?>
