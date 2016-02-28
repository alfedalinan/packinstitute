<?php

	class Examinee_model extends CI_Model
	{
		private $id;
		private $first_name;
		private $middle_name;
		private $last_name;
		private $address;
		private $birthday;
		private $contact;
		private $email;
		private $date_exam;
		private $time_exam;
		private $created_at;
		private $updated_at;

		function __construct()
		{
			parent::__construct();

		}

		//ID
		public function getID() {
			return $this->id;
		}

		public function setID($id) {
			$this->id = $id;
		}

		//First Name
		public function getFirstName() {
			return $this->first_name;
		}

		public function setFirstName($first_name) {
			$this->first_name = $first_name;
		}

		// Middle Name
		public function getMiddleName() {
			return $this->middle_name;
		}

		public function setMiddleName($middle_name) {
			$this->middle_name = $middle_name;
		}

		// Last Name
		public function getLastName() {
			return $this->last_name;
		}

		public function setLastName($last_name) {
			$this->last_name = $last_name;
		}

		// Address
		public function getAddress() {
			return $this->address;
		}

		public function setAddress($address) {
			$this->address = $address;
		}

		// Birthday
		public function getBirthday() {
			return $this->birthday;
		}

		public function setBirthday($birthday) {
			$this->birthday = $birthday;
		}

		// Contact
		public function getContact() {
			return $this->contact;
		}

		public function setContact($contact) {
			$this->contact = $contact;
		}

		// E-mail
		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}		

		// Date of Exam
		public function getDateExam() {
			return $this->date_exam;
		}

		public function setDateExam($date_exam) {
			$this->date_exam = $date_exam;
		}

		// Time of Exam
		public function getTimeExam() {
			return $this->time_exam;
		}

		public function setTimeExam($time_exam) {
			$this->time_exam = $time_exam;
		}

		// Created
		public function getCreatedAt() {
			return $this->created_at;
		}

		public function setCreatedAt($created_at) {
			$this->created_at = $created_at;
		}

		// Updated
		public function setUpdatedAt($updated_at) {
			$this->updated_at = $updated_at;
		}

		public function getUpdatedAt() {
			return $this->updated_at;
		}

	}

?>