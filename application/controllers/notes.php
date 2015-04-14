<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Note');
	}

	public function index()
	{
    $notes = $this->Note->get_all_notes();
 		$this->load->view('/notes/index', array('notes'=>$notes));
	}

  public function create(){
    $this->Note->create($this->input->post());
    $notes = $this->Note->get_all_notes();
    $this->load->view('/notes/partial', array('notes'=>$notes));
  }

  public function update(){
    $this->Note->update($this->input->post());
    $notes = $this->Note->get_all_notes();
    $this->load->view('/notes/partial', array('notes'=>$notes));
  }

  public function delete(){
    $this->Note->delete($this->input->post());
    $notes = $this->Note->get_all_notes();
    $this->load->view('/notes/partial', array('notes'=>$notes));
  }
}