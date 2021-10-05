<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliver extends CI_Controller {
    //function
    public function index()
    {
        if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'deliver_content_view';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->view('deliver_view/dashboard_deliver_include_view', $data);
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

    public function deliver_content_view()
	{
		if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'deliver_content_view';
			$data['pseudo'] = $this->session->userdata('pseudo');	
			$this->load->view('deliver_view/dashboard_deliver_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
	}

    public function order_waiting_view()
	{
		if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'order_waiting_view';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->model('commands_model');
			$data['listcommands'] = $this->commands_model->listcommands_waiting($data['pseudo']);	
			$this->load->view('deliver_view/dashboard_deliver_include_view', $data);
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
			$this->load->view('deliver_view/dashboard_deliver_include_view', $data);
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

