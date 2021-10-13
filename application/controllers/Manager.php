<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {


	public function index()
	{
		
		if($this->session->userdata('pseudo') != '')
		{
			$this->load->model('commands_model');
			$data['name'] = 'manager_content_view';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->view('manager_view/dashboard_manager_include_view', $data);
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

	public function livreur()
	{
		$commandid = $this->input->post('commandid');
		$this->load->model('commands_model');
		$requete =  $this->commands_model->livreur($commandid);
		
		echo json_encode($requete->result_array());
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
			$this->load->view('manager_view/dashboard_manager_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
	}

	public function listpostuler()
    {
		if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'postuler';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$this->load->view('manager_view/dashboard_manager_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
    }

	public function addinterndeliver()
	{
		$commandid = $this->input->post('commandid');
		$tel = $this->input->post('tel');
		$delivername = $this->input->post('delivername');
		$data = array(
			'delivername' => $delivername,
			'teldeliver' => $tel,
		);
		$this->load->model('commands_model');
		$this->commands_model->addinterndeliver($data, $commandid);
	}

    public function addrestaurant()
    {
		$this->load->model('users_model');
		if($this->session->userdata('pseudo') != '')
		{
			$data['name'] = 'addrestaurant';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$data['fetchs_data'] = $this->users_model->fetch_data($data['pseudo']);
			$this->load->view('manager_view/dashboard_manager_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
    }

	public function fetch_restaurant(){

		$this->load->model('users_model');
		if($this->session->userdata('pseudo') != '')
		{
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$pseudo = $this->session->userdata('pseudo');
			$this->load->model('restaurant_model');
			$fetch_data = $this->restaurant_model->get_all_data($pseudo);
			$data = array();
			foreach($fetch_data->result() as $row)
			{
				$sub_array = array();
				$sub_array[] = '<img src="'.base_url().'assets/img/manager_dashboard/upload/'.$row->logo.'"
					class="img-thumbnail" width="50" height="35" />'; 
				$sub_array[] = $row->name;
				$sub_array[] = $row->localisation;
				$sub_array[] = $row->description;
				$sub_array[] = '<input type="button" data-toggle="modal" data-target="#restaurantModal2" name="update" value="Modifier" class="btn btn-success btn-xs update" id="'.$row->restaurantid.'" />';
				$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id = "'.$row->restaurantid.'" >Supprimer</button>';
				$data[] = $sub_array;
			}

			$output = array(
				"draw"  			=>  $draw,
				"recordsTotal"  	=>  $fetch_data->num_rows(),
				"recordsFiltered"   =>  $fetch_data->num_rows(),
				"data"				=>  $data
			);
			echo json_encode($output);
		}
		else
		{
			redirect('connect');
		}
	}

	public function menus()
	{
		$this->load->model('users_model');
		if($this->session->userdata('pseudo') != '')
		{
			$pseudo = $this->session->userdata('pseudo');
			$this->load->model('restaurant_model');
		
			$data['restaurantid'] = $this->restaurant_model->selectidrestaurant($pseudo);
			$data['name'] = 'addmenus';
			$data['pseudo'] = $this->session->userdata('pseudo');
			$data['fetchs_data'] = $this->users_model->fetch_data($data['pseudo']);
			$this->load->view('manager_view/dashboard_manager_include_view', $data);
		}
		else
		{
			redirect('connect');
		}
	}

	public function menus_pages()
	{
		$this->load->model('users_model');
		if($this->session->userdata('pseudo') != '')
		{
			//Datatables Variables
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
			$pseudo = $this->session->userdata('pseudo');

			$this->load->model('menus_model');
			$menus = $this->menus_model->get_menus($pseudo);
			
			$data = array();
			foreach($menus->result() as $r){
				$sub_array = array();
				$sub_array[] = $r->name;
				$sub_array[] = '<img src="'.base_url().'assets/img/manager_dashboard/upload/'.$r->imagemenu.'"
				class="img-thumbnail" width="50" height="35" />';
				$sub_array[] = $r->menuname;
				$sub_array[] = $r->menudescription;
				$sub_array[] = $r->category;
				$sub_array[] = $r->price;
				$sub_array[] = '<input type="button" data-toggle="modal" data-target="#menuModal2" name="update" value="Modifier" class= "btn btn-success btn-xs update" id="'.$r->menuid.'" />';
				$sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$r->menuid.'" >Supprimer</button>';
				$data[] = $sub_array;
			}

			$output = array(
				"draw" 				=> $draw,
				"recordsTotal" 		=> $menus->num_rows(),
				"recordsFiltered" 	=> $menus->num_rows(),
				"data" 				=> $data
			);
			echo json_encode($output);	
		}
		else
		{
			redirect('connect');
		}
	}

	public function menus_action()
	{
		$menuname = $this->input->post('menuname');
		$description = $this->input->post('menudescription');
		$category = $this->input->post('category');
		$price = $this->input->post('price');
		$restaurantid = $this->input->post('restaurantid');
		$menu_image = $this->input->post('extension');
		$action = $this->input->post('action');
		if($action == 'Ajouter')
		{
			$insert_data = array (
				"menuname" 			=> $this->input->post('menuname'),
				"menudescription" 	=> $this->input->post('menudescription'),
				"category" 			=> $this->input->post('category'),
				"price" 			=> $this->input->post('price'),
				"restaurantid" 		=> $this->input->post('restaurantid'),
				"imagemenu" 		=> $this->upload_image()
			);
			$this->load->model('menus_model');
			$this->menus_model->insert_menu($insert_data);

			echo 'Menu ajouté';
			exit();
		}
		if($action == 'Modifier')
		{
			if($_FILES['menuimage']['name'] != '')
			{
				$menu_image = $this->upload_image();
			}
			else
			{
				$menu_image = $this->input->post('upload');
			}
			$updated_data = array(
				"menuname" 			=> $menuname,
				"menudescription" 	=> $description,
				"category" 			=> $category,
				"price" 			=> $price,
				"restaurantid" 		=> $restaurantid,
				"imagemenu" 		=> $menu_image
			);
			$this->load->model('menus_model');
			$this->menus_model->update_menus($this->input->post('menuid2'), $updated_data);
			exit();
		}
	}

	public function upload_image()
	{
		if(isset($_FILES['menuimage']))
		{
			$extension = explode('.', $_FILES['menuimage']['name']);
			$new_name = rand() . '.' . $extension[1];
			//$destination = ''.base_url().'assets/img/manager_dashboard/upload/'. $new_name ;
			$destination = ''.$_SERVER['DOCUMENT_ROOT'] .'/assets/img/manager_dashboard/upload/'. $new_name ;
			move_uploaded_file($_FILES['menuimage']['tmp_name'], $destination);
			return $new_name;
		}
	}

	public function fetch_single_menu()
	{
		$output = array();
		$this->load->model("menus_model");
		$menuid = $this->input->post('menuid');
		//$menuid = $_POST['menuid'];
		$data = $this->menus_model->fetch_single_menu($menuid);
		foreach($data as $row)
		{
			$output['restaurantid'] = $row->restaurantid;
			$output['menuname'] = $row->menuname;
			$output['menudescription'] = $row->menudescription;
			$output['category'] = $row->category;
			$output['price'] = $row->price;
			if($row->imagemenu != '')
			{
				$output['imagemenu'] = '<img src = "'.base_url().'assets/img/manager_dashboard/upload/'.$row->imagemenu.'"
				class="img-thumbnail" width="50" height="35" /><input type ="hidden" name="hidden_image_menu" value="'.$row->imagemenu.'" />'	;
			}
			else 
			{
				$output['imagemenu'] = '<input type="hidden" name="hidden_image_menu" value="" />';	;
			}
			
		}
		echo json_encode($output);
	}

	public function delete_single_menu()
	{
		$menuid = $this->input->post('menuid');
		$this->load->model("menus_model");
		$this->menus_model->delete_single_menu($menuid);
		echo 'menu supprimer';
	}


	public function restaurant_action()
	{
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$localisation = $this->input->post('localisation');
		$restaurantid = $this->input->post('restaurantid');
		$logo = $this->input->post('extension');

		$output = array();
		$pseudo=$this->session->userdata('pseudo');
		$this->load->model('users_model');
		$userid = $this->users_model->getuserid($pseudo);
		foreach ($userid as $row)
		{
			$output['userid'] = $row->userid;
		}
		$action = $this->input->post('action');
		
		
		if($action == 'Ajouter')
		{
			$insert_data = array (
				"name" 			=> $this->input->post('name'),
				"description" 	=> $this->input->post('description'),
				"localisation" 	=> $this->input->post('localisation'),
				"userid" 		=> $output['userid'],
				"logo" 		=> $this->upload_logo()
			);
			$this->load->model('restaurant_model');
			$this->restaurant_model->insert_restaurant($insert_data);

			echo 'Restaurant ajouté';
			exit();
		}
		if($action == 'Modifier')
		{
			if($_FILES['logo']['name'] != '')
			{
				$logo = $this->upload_logo();
			}
			else
			{
				$logo = $this->input->post('upload');
			}
			$updated_data = array(
				"name" 			=> $name,
				"description" 	=> $description,
				"localisation" 	=> $localisation,
				"logo" 			=> $logo
			);
			$this->load->model('restaurant_model');
			$this->restaurant_model->update_restaurant($restaurantid, $updated_data);

			exit();
		}
	}
	public function upload_logo()
	{
		if(isset($_FILES['logo']))
		{
			$extension = explode('.', $_FILES['logo']['name']);
			$new_name = rand() . '.' . $extension[1];
			//$destination = ''.base_url().'assets/img/manager_dashboard/upload/'. $new_name ;
			$destination = ''.$_SERVER['DOCUMENT_ROOT'] .'/assets/img/manager_dashboard/upload/'. $new_name ;
			move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
			return $new_name;
		}
	}

	public function fetch_single_restaurant()
	{
		$output = array();
		$this->load->model("restaurant_model");
		$restaurantid = $this->input->post('restaurantid');
		$data = $this->restaurant_model->fetch_single_restaurant($restaurantid);
		foreach($data as $row)
		{
			$output['name'] = $row->name;
			$output['description'] = $row->description;
			$output['localisation'] = $row->localisation;
			if($row->logo != '')
			{
				$output['logo'] = '<img src = "'.base_url().'assets/img/manager_dashboard/upload/'.$row->logo.'"
				class="img-thumbnail" width="50" height="35" /><input type ="hidden" name="hidden_image_restaurant" value="'.$row->logo.'" />'	;
			}
			else 
			{
				$output['logo'] = '<input type="hidden" name="hidden_image_restaurant" value="" />';	;
			}
			
		}
		echo json_encode($output);
	}

	public function delete_single_restaurant()
	{
		$restaurantid = $this->input->post('restaurantid');
		$this->load->model("restaurant_model");
		$this->restaurant_model->delete_single_restaurant($restaurantid);
		echo 'restaurant supprimé';
	}

	public function acceptdeliver()
	{
		$commandid = $this->input->post('commandid');
		$userid = $this->input->post('userid');

		$data = array(
			'commandid' => $commandid,
			'userid' => $userid,
			'commandstatus' => 'pending'
		);

		$this->load->model('commands_model');
		$this->commands_model->acceptdeliver($data, $commandid);

		echo 'operation effectuée';
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