<?php
class Restaurant_model extends CI_Model
{
   var $table = 'restaurants';
   var $select_column = array("restaurantid","logo","name", "localisation","description");
   var $order_column = array(null,null,"name","localisation","description");
   var $restaurantidmenu = '';

   function get_all_data($pseudo)
   {
       $this->db->select('restaurants.restaurantid, restaurants.name, restaurants.logo, restaurants.localisation, restaurants.description');
       $this->db->from($this->table)->join('users', 'users.userid = restaurants.userid')->where('users.pseudo', $pseudo);
       $query  = $this->db->get();
	   return $query;
   }

   public function insert_restaurant($insert_data)
   {
       $this->db->insert("restaurants", $insert_data);    
   }

   public function selectidrestaurant($pseudo)
   {
       $query = $this->db->distinct()->select('
       restaurants.name, restaurants.restaurantid')
       ->from('restaurants')
       ->join('users','users.userid = restaurants.userid')
       ->where('users.pseudo',$pseudo)
       ->get();

       return $query;
   }

   public function fetch_single_restaurant($restaurantid)
   {
      $query = $this->db->select('restaurants.name,restaurants.description,
        restaurants.localisation,restaurants.logo')
        ->from('restaurants')->where("restaurantid", $restaurantid)
        ->get()->result();
		return $query;
   }

   public function update_restaurant($restaurantid, $data)
   {
      $this->db->where("restaurantid", $restaurantid);

        if($data['logo'] != ''){
            $this->db->set('name',$data['name']);
            $this->db->set('description',$data['description']);
            $this->db->set('localisation',$data['localisation']);
            $this->db->set('logo',$data['logo']);
            $this->db->update('restaurants');
        }else{
         $this->db->set('name',$data['name']);
         $this->db->set('description',$data['description']);
         $this->db->set('localisation',$data['localisation']);
         $this->db->update('restaurants');
        }
   }

   public function delete_single_restaurant($restaurantid)
   {
      $restaurantidmenu = $restaurantid;
      $this->delete_menu_restaurant();
      $this->db->where("restaurantid", $restaurantid);
      $this->db->delete('restaurants');
   }

   public function delete_menu_restaurant(){
      $this->db->where("restaurantid", $restaurantidmenu);
      $this->db->delete('menus');
   }

}
