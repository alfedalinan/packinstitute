<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examinee Extends CI_Controller {

	public function __construct() {

		header('Access-Control-Allow-Origin: *');
    	header("Access-Control-Allow-Methods: *");		
    	// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");		
		parent::__construct();
		$this->load->model('examinee_model', 'examinee');

	}

	public function index() {

		$this->load->view('api_welcome');

	}

	// POST - examinee/addExamAppointment
	public function addExamAppointment() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$created_at = date("Y-m-d h:i:sa");
			$updated_at = date("Y-m-d h:i:sa");

			$this->examinee->setFirstName($this->input->post('first_name'));
			$this->examinee->setMiddleName($this->input->post('middle_name'));
			$this->examinee->setLastName($this->input->post('last_name'));
			$this->examinee->setAddress($this->input->post('address'));
			$this->examinee->setBirthday($this->input->post('birthday'));
			$this->examinee->setContact($this->input->post('contact'));
			$this->examinee->setEmail($this->input->post('email'));
			$this->examinee->setDateExam($this->input->post('date_exam'));
			$this->examinee->setTimeExam($this->input->post('time_exam'));
			$this->examinee->setCreatedAt($created_at);
			$this->examinee->setUpdatedAt($updated_at);

			$data = array(
				'first_name' => $this->examinee->getFirstName(),
				'middle_name' => $this->examinee->getMiddleName(),
				'last_name' => $this->examinee->getLastName(),
				'address' => $this->examinee->getAddress(),
				'birthday' => $this->examinee->getBirthday(),
				'contact' => $this->examinee->getContact(),
				'email' => $this->examinee->getEmail(),
				'date_exam' => $this->examinee->getDateExam(),
				'time_exam' => $this->examinee->getTimeExam(),
				'created_at' => $this->examinee->getCreatedAt(),
				'updated_at' => $this->examinee->getUpdatedAt()
			);

			$add_exam = $this->db->insert('examinee', $data);

			if ($add_exam) {
				if ($this->sendEmail($data) == true) {
					echo json_encode("A new appointment has been saved successfully.");
				}
				else {
					echo json_encode("Error in sending e-mail.");
				}
			}
			else {
				echo json_encode("An error has occured while saving the record.");
			}

		}
		else {
			show_error("No direct access allowed.");
		}

	}

	// POST - examinee/listExamAppointment
	public function listExamAppointment() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->examinee->setDateExam($this->input->post('date_exam'));
			$date_exam = $this->examinee->getDateExam();

			$this->db->select('
				first_name,
				middle_name,
				last_name,
				address,
				birthday,
				contact, 
				email,
				date_exam,
				time_exam
			');
			$this->db->where('date_exam', $date_exam);
			$appointments = $this->db->get('examinee');

			echo json_encode($appointments->result_array());

		}
		else {
			show_error("No direct access allowed.");
		}

	}

	public function sendEmail($data) {

		$this->email->from('admission@packuniversity.com', 'Pack University Admission');
		$this->email->to($data['email']);
		$this->email->subject('Admission: Welcome to Pack University');
		
		$this->email->message(
			"Dear " . $data['first_name']. " " . $data['last_name'] . ",".
			"<br>".
			"<br>".
			"Your application for entrance examination at Pack University Institute has been received.".
			"<br>".
			"<br>".
			"Your examination schedule is as follows:".
			"<br>".
			"Date: ". date('M d, Y', strtotime($data['date_exam'])) .
			"<br>".
			"Time: ". $data['time_exam'] .
			"<br>".
			"<br>".
			"Thank you for choosing our institution,".
			"<br>".
			"<br>".
			"Pack University - Admission"
		);

		$send = $this->email->send();

		if ($send) {
			return true;
		}
		else {
			return false;
		}

	}

}