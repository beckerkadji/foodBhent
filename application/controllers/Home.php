<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {



	public function index()
	{
		$this->load->library('cart');
		$data['panier'] = count($this->cart->contents());
		$this->load->model(array('menus_model'));
		$data['menus'] = $this->menus_model->getlastMenus();
		$data['name'] = 'home';
		$this->load->view('home_view', $data);
	}

	public function order_view()
	{
		$this->load->library('cart');
		$data['panier'] = count($this->cart->contents());
		$this->load->model('menus_model');
		$data['menus'] = $this->menus_model->getlastMenus();
		$data['menu'] = $this->menus_model->getall();
		$data['name'] = 'order_view';
		$this->load->view('home_view', $data);
	}

	public function payment_view()
	{
		if($this->session->userdata('pseudo') != '')
        {
			$this->load->library('cart');
			$data['panier'] = count($this->cart->contents());
			$data['name'] = 'payment';
			$data['message'] = '';
			$data['erreur'] = " ";
			$this->load->view('home_view', $data);
		}
		else
		{
			redirect('connect');
		}
	}

	public function payment_view_faild()
	{
		
		$data['erreur'] = $_GET['erreur'];
		$this->load->library('cart');
		$data['panier'] = count($this->cart->contents());
		$data['name'] = 'payment';
		$data['message'] = '';
		$this->load->view('home_view', $data);
	}

	public function payment_view_success()
	{
		$data['message'] = $_GET['message'];
		$this->load->library('cart');
		$data['panier'] = count($this->cart->contents());
		$data['name'] = 'payment';
		$data['erreur'] = '';
		$this->load->view('home_view', $data);

	}


	
}
