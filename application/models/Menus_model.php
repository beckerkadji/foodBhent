<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class Menus_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menus_model');
    }

	public function fetch_single_menu($menuid)
	{
        $query = $this->db->select('menus.menuid,restaurants.name,menus.restaurantid,
        menus.menudescription,menus.category,menus.price,menus.imagemenu,menus.menuname')
        ->from('menus')->join('restaurants','restaurants.restaurantid = menus.restaurantid')
        ->where("menuid", $menuid)
        ->get()->result();
		// echo '<pre>';
		// print_r($query);
		// echo '</pre>';
		// die();
		return $query;
	}
	

    public function get_menus($pseudo)
    {

        $query = $this->db->select('
        restaurants.name, menus.imagemenu, menus.menuname,menus.menudescription,
        menus.category,menus.price,menus.restaurantid,menus.menuid')
        ->from('menus')->order_by('menus.menuid', 'DESC')
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid')
        ->join('users','users.userid = restaurants.userid')
        ->where('users.pseudo',$pseudo)
        ->get();

        return $query;
    }

    public function insert_menu($insert_data)
    {
        $this->db->insert("menus", $insert_data);    
    }
    public function update_menus($menuid, $data)
    {
        $this->db->where("menuid", $menuid);
        // $menu = $this->db->get('menus');
        // echo $data['imagemenu'];
        // echo '<pre>';
		// print_r($menu->result());
		// echo '</pre>';
		// die();
        if($data['imagemenu'] != ''){
            $this->db->set('menuname',$data['menuname']);
            $this->db->set('menudescription',$data['menudescription']);
            $this->db->set('category',$data['category']);
            $this->db->set('price',$data['price']);
            $this->db->set('restaurantid',$data['restaurantid']);
            $this->db->set('imagemenu',$data['imagemenu']);
            $this->db->where("menuid", $menuid);
            $this->db->update('menus');
        }else{
            $this->db->set('menuname',$data['menuname']);
            $this->db->set('menudescription',$data['menudescription']);
            $this->db->set('category',$data['category']);
            $this->db->set('price',$data['price']);
            $this->db->set('restaurantid',$data['restaurantid']);
            $this->db->where("menuid", $menuid);
            $this->db->update('menus');
        }

        
    }


    public function delete_single_menu($menuid)
    {
        $this->db->where("menuid", $menuid);
        $this->db->delete('menus');
    }

    public function getlastMenus()
    {
        $query = $this->db->select('restaurants.name, menus.imagemenu, menus.menuname,menus.menudescription,
        menus.category,menus.price,menus.restaurantid,menus.menuid')
        ->from('menus')->order_by('menus.menuid', 'RANDOM')->limit(8)
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid')
        ->get();
        return $query;
    }

    public function getall()
    {
        $query = $this->db->select('restaurants.name, menus.imagemenu, menus.menuname,menus.menudescription,
        menus.category,menus.price,menus.restaurantid,menus.menuid')
        ->from('menus')->order_by('restaurants.name')
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid')
        ->get();
        return $query;
    }

}

