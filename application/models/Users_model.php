<?php
class Users_model extends CI_Model
{
    public function test_register()
    {
        echo 'model de la page inscription: ici on ecrit nos requêtes php vers la base de données';
    }

    public function create_user($data)
    {
        $query = $this->db->select('pseudo,email')->get('users');
        $erreur = '';
        $success = 'effectuer';
        foreach($query->result() as $row)
        {
            if($data['pseudo'] == $row->pseudo)
            {
               $erreur = 'ce nom d\'utilisateur  existe  deja! réessayez avec un autre';
            }
            
        }
        if($erreur == 'ce nom d\'utilisateur  existe  deja! réessayez avec un autre')
        {
            return $erreur;
        }else{
            $this->db->insert("users", $data);
            return $success;
        }  
    }

    public function fetch_data($pseudo)
    {
        $this->db->where('pseudo', $pseudo);
        $query = $this->db->get('users');

        return $query;
    }

    public function can_login($pseudo, $password)
    {
        $this->db->where('pseudo', $pseudo);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        //SELECT * FROM users WHERE pseudo = '$pseudo' AND password = '$password';

        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getuserid($pseudo)
    {
        $this->db->select('userid');
        $this->db->where('pseudo', $pseudo);
        $query = $this->db->get('users')->result();

        return $query;
    }
    public function setinfolivraison($pseudo, $data)
    {
        $this->db->where('pseudo', $pseudo);
        $this->db->set('email',$data['email']);
        $this->db->set('localisation',$data['localisation']);
        $this->db->set('tel',$data['tel']);
        $this->db->update('users');
    }

    public function setnumtel($data)
    {
        $this->db->where('userid', $data['userid']);
        $this->db->set('tel',$data['tel']);
        $this->db->update('users');
    }
}