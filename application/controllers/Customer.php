<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    //function
    public function index()
    {
        if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'customer_content_view';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->view('customer_view/dashboard_customer_include_view', $data);
		}
		else
		{
			redirect('connect');
		}

    }
    public function dashboard()
	{
        // $data['name'] = 'manager_content_view';
		// $data['pseudo'] = $this->session->userdata('pseudo');
		$this->index();
	}

	public function listcommands()
	{
		if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'command_view';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->model('commands_model');
			$data['listcommands'] = $this->commands_model->listcommands($data['pseudo']);	
			$this->load->view('manager_view/dashboard_manager_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
	}

	public function listcommandepending()
	{
		if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'commandpending';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->model('commands_model');
			$data['listcommandpending'] = $this->commands_model->listcommandspending($data['pseudo']);
			$data['listcommandpending2'] = $this->commands_model->listcommandspending2($data['pseudo']);	
			$this->load->view('customer_view/dashboard_customer_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
	}

	public function menu()
	{
		if($this->session->userdata('pseudo') != '')
		{
			redirect('menu');
		}
		else
		{
			redirect('connect');
		}
	}

   
}

