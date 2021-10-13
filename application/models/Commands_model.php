<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Commands_model extends CI_Model
{
	public function insert_command($data)
    {
        $this->db->insert('commands', $data);
        $id = $this->db->insert_id();
        $this->db->where('commandid', $id);
        $query = $this->db->get('commands');

        return $query;
    }

    public function set_transaction($data)
    {
        $this->db->where("transactionid", $data['transactionid']);
        $this->db->set('commandid',$data['commandid']);
        $this->db->update('transactions');
    }

    public function initTransaction($data)
    {
        $this->db->insert('transactions', $data);
        $id = $this->db->insert_id();
        $this->db->where('transactionid', $id);
        $query = $this->db->get('transactions');

        foreach($query->result() as $row)
        {
            $transactionid = $row->transactionid;
        }

        return $transactionid;
    }

    public function aborttransaction($transactionid)
    {
        $this->db->where("transactionid", $transactionid);
        $this->db->set('transactionstatus','abort');
        $this->db->update('transactions');
    }

    public function succestransaction($transactionid)
    {
        $this->db->where("transactionid", $transactionid);
        $this->db->set('transactionstatus','succes');
        $this->db->update('transactions');
    }

    public function insert_menu_command($data)
    {
        $this->db->insert('menus_commands', $data);
    }

    public function listcommands($pseudo)
    {

        //ce code permet de récupérer le nombre de restaurant appartenant à un  gérant
        $this->db->select('restaurants.name');
        $this->db->from('restaurants')->join('users', 'users.userid = restaurants.userid')->where('users.pseudo', $pseudo);
        $query2  = $this->db->get();
        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // echo '<br>';

        //on stock dans un tableau les différents restaurant du gérant qu'on a récupéré
        $restaurantname = array();
        $i=0;
        foreach($query2->result() as $row)
        {
            $restaurantname[$i] = $row->name;
            $i++;
        }

        //la fonction count récupère le nombre de valeur d'un tableau
        $nommbrerestaurant = count($restaurantname);

        //cet ofset du tableau nous permet de mettre en place notre clause or_where
        $restaurantname[$nommbrerestaurant] = '';

        //si le nombre de restaurant est supérieur à un on ajoute une clause where sur le
        // premier restaurant et or_where sur le reste de restaurant
        if ($nommbrerestaurant > 1)
        {
            $this->db->where('commands.commandstatus','waiting');
            $this->db->where('restaurants.name',$restaurantname[0]);
            for($i=0; $i<$nommbrerestaurant; $i++)
            {
                $this->db->or_where('restaurants.name',$restaurantname[$i+1]);
            }
    
        }else
        {
            foreach($query2->result() as $row)
            {
                $restaurantname = $row->name;
            }
            $this->db->where('restaurants.name',$restaurantname);
            $this->db->where('commands.commandstatus','waiting');
        }

        $query = $this->db->select('
        menus.menuname,
        menus.price,
        menus.imagemenu,
        menus_commands.quantity,
        commands.commandid,
        commands.commandstatus,
        commands.commands_date,
        transactions.userid,
        users.pseudo,
        users.tel,
        users.localisation,
        users.email,
        restaurants.name')
        ->from('menus_commands')
        ->join('menus','menus.menuid = menus_commands.menuid')
        ->join('commands','commands.commandid = menus_commands.commandid')
        ->join('transactions','transactions.commandid = menus_commands.commandid')
        ->join('users','users.userid = transactions.userid')
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid')->get();


        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        
        return $query; 
    }

    public function listcommands_waiting()
    {
        $this->db->where('commands.commandstatus','waiting');
        $query = $this->db->select('
        menus.menuname,
        menus.price,
        menus.imagemenu,
        menus_commands.quantity,
        commands.commandid,
        commands.commandstatus,
        commands.commands_date,
        transactions.userid,
        users.pseudo,
        users.tel,
        users.localisation,
        restaurants.localisation as localisationresto,
        users.email,
        restaurants.name')
        ->from('menus_commands')->order_by('commands.commandid','ASC')
        ->join('menus','menus.menuid = menus_commands.menuid')
        ->join('commands','commands.commandid = menus_commands.commandid')
        ->join('transactions','transactions.commandid = menus_commands.commandid')
        ->join('users','users.userid = transactions.userid')
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid') 
        ->get();

        return $query;

    }

    public function postuler($data)
    {
        $this->db->insert('postuler', $data);
    }

    public function livreur($commandid)
    {
       $this->db->where('postuler.commandid',$commandid);

        $query = $this->db->distinct()->select('
            users.pseudo,
            users.age,
            users.sex,
            users.tel,
            users.email,
            users.localisation,
            postuler.commandid,
            postuler.userid
        ')
        ->from('postuler')
        ->join('users','users.userid = postuler.userid')
        ->get();

        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // die();
        return $query;
    }

    public function acceptdeliver($data)
    {
        $this->db->where("commandid", $data['commandid']);
 
        $this->db->set('deliverid',$data['userid']);
        $this->db->set('commandstatus',$data['commandstatus']);
        $this->db->update('commands');

    }

    public function addinterndeliver($data, $commandid)
    {
        $this->db->insert('interndeliver', $data);
        $id = $this->db->insert_id();
        $this->db->where("commandid", $commandid);
        $this->db->set('commandstatus','pending');
        $this->db->set('interndeliverid',$id);
        $this->db->update('commands');
    }

    public function setcommands($data)
    {
        $this->db->where("commandid", $data['commandid']);
        $query = $this->db->get('transactions');
        foreach($query->result() as $row)
        {
            $transactionid= $row->transactionid;
        }
        $this->db->where("commandid", $data['commandid']);
        $this->db->set('commandstatus',$data['commandstatus']);
        $this->db->update('commands');

        return $transactionid;
    }

    public function listcommandspending($pseudo)
    {
        $userid = $this->session->userdata('userid');
        $this->db->where('commands.commandstatus','pending');
        $this->db->where('users.userid',$userid);
        $query = $this->db->select('
        menus.menuname,
        menus.price,
        menus.imagemenu,
        menus_commands.quantity,
        commands.commandid,
        commands.amount,
        commands.commandstatus,
        commands.deliverid,
        commands.commands_date,
        transactions.userid,
        users.pseudo,
        usersdeliver.pseudo as pseudodeliver,
        usersdeliver.email as emaildeliver,
        usersdeliver.tel as teldeliver,
        users.tel,
        users.localisation,
        restaurants.localisation as localisationresto,
        users.email,
        restaurants.name')
        ->from('menus_commands')->order_by('commands.commandid','ASC')
        ->join('menus','menus.menuid = menus_commands.menuid')
        ->join('commands','commands.commandid = menus_commands.commandid')
        ->join('transactions','transactions.commandid = menus_commands.commandid')
        ->join('users','users.userid = transactions.userid')
        ->join('users as usersdeliver','usersdeliver.userid = commands.deliverid')
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid') 
        ->get();

        return $query;              
    }

    public function listcommandspending2($pseudo)
    {
        $userid = $this->session->userdata('userid');
        $this->db->where('users.userid',$userid);
        $query  = $this->db->select('
        commands.commandid,
        commands.amount,
        commands.deliverid,
        commands.commandstatus,
        transactions.userid,
        users.pseudo')
        ->from('commands')
        ->join('transactions','transactions.commandid = commands.commandid')
        ->join('users','users.userid = transactions.userid')
        ->get();

        if(!empty($query->result()))
        {
            foreach($query->result() as $row)
            {
                if($row->deliverid == null){
                    $this->db->where('commands.commandstatus','pending');
                    $this->db->where('users.userid',$userid);
                    $this->db->where('commands.deliverid',null);

                    $query2 = $this->db->select('
                    menus.menuname,
                    menus.price,
                    menus.imagemenu,
                    menus_commands.quantity,
                    commands.commandid,
                    commands.amount,
                    commands.commandstatus,
                    commands.commands_date,
                    interndeliver.delivername,
                    interndeliver.teldeliver,
                    transactions.userid,
                    users.pseudo,
                    users.tel,
                    users.localisation,
                    restaurants.localisation as localisationresto,
                    users.email,
                    restaurants.name')
                    ->from('menus_commands')->order_by('commands.commandid','ASC')
                    ->join('menus','menus.menuid = menus_commands.menuid')
                    ->join('commands','commands.commandid = menus_commands.commandid')
                    ->join('interndeliver','interndeliver.idinterndeliver = commands.interndeliverid')
                    ->join('transactions','transactions.commandid = menus_commands.commandid')
                    ->join('users','users.userid = transactions.userid')
                    ->join('restaurants','restaurants.restaurantid = menus.restaurantid') 
                    ->get();
                }
            }
            return $query2; 
        }
        
    }

    public function confirm($commandid)
    {
        $this->db->where('commands.commandid', $commandid);
        $query = $this->db->select('
            commands.amount,
            users.tel,
            commands.commandid,
            restaurants.name
        ')->from('commands')
        ->join('menus_commands','menus_commands.commandid = commands.commandid')
        ->join('menus','menus.menuid = menus_commands.menuid')
        ->join('restaurants','restaurants.restaurantid = menus.restaurantid')
        ->join('users','users.userid = restaurants.userid')
        ->get();

        // echo '<pre>';
        // print_r($query->result());
        // echo '</pre>';
        // die();
        return $query;
    }
}