<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function add()
    {
        $this->load->library('cart');
        $data = array(
            'id'  =>  $_POST['menuid'],
            'name'  =>  $_POST['menuname'],
            'qty'  =>  $_POST['quantity'],
            'price'  =>  $_POST['price'],
            'options'  =>  array('restaurantname' => $_POST['restaurantname'], 'imagemenu' => $_POST['imagemenu']),
            
        );

        $this->cart->insert($data); //return rowid

        echo $this->view();
    }

    public function view()
    {
        $this->load->library('cart');
        $output = '';
        $output .= '
        <div class="table-responsive">
    <div align="rigth">
        <button type="buttpon" id="clear_cart" class="btn btn-warning">Vider le panier</button>
    </div>
    <br>
    <table class="table table-bordered" style="text-align:center">
        <tr>
            <th></th>
            <th width="20%">Restaurant</th>
            <th width="20%">Nom</th>
            <th width="10%">prix</th>
            <th width="10%">Quantité</th>
            <th width="10%">Total</th>
            <th width="30%">Action</th>
        </tr>
        ';
        $count = 0;
        $i = 1;
        foreach($this->cart->contents() as $items)
        {
            $count++;

            $output .= '
                <tr>
                    <td><input type = "hidden" value="'.$items["rowid"].'" id="rowid" /></td>
                    <td>'.$items["options"]['restaurantname'].'</td>
                    <td>'.$items["name"].'</td>
                    <td>'.$items["price"].' </td>
                    <td><input style="width:50px" type="number" min="1" value = "'.$items["qty"].'" id="" class="form-control-sm  form-control itemQty" /></td>
                    <td>'.$items["subtotal"].' </td>
                    <td><button type="button"  name = "remove" class="btn btn-danger btn-xs remove_inventory" 
                    id = "'.$items["rowid"].'">Rétirer du panier</button></td>
                </tr>
            ';
            $i++;
        }
        $output .='
                <tr>
                    <td colspan="6" align="rigth">Total</td>
                    <td>'.$this->cart->total().' FCFA</td>
                    '.$this->session->pay = $this->cart->total().'
                </tr>
            </table>

            </div>
        ';  
        
        if($count == 0)
        {
            $output .= '<h5 align="center"> Le panier est vide</h5>';
        }
        return $output;
    }
    
   public function load()
   {
       echo $this->view();
   }


   //fonction permettant de rétirer un menu du panier
   public function remove()
   {
        $this->load->library('cart');
        $row_id = $_POST['rowid'];
        $data = array(
            'rowid'  => $row_id,
            'qty'    => 0 
        );
        $this->cart->remove($row_id);
        echo $this->view();
   }


  //fonction permettant de modifier la quantité d'un menu dans le panier
   public function update()
   {
        $this->load->library('cart');
        $row_id = $_POST['rowid'];
        $data = array(
            'rowid'  => $row_id,
            'qty'    => $this->input->post('quantity')
        );
        $this->cart->update($data);
        echo $this->view();
   }

  //fonction permet de vider le panier
   public function clear()
   {
    $this->load->library('cart');
    $this->cart->destroy();
    echo $this->view();
   }


   //cette function retourne la vue checkout à fin que le client entre ses information de paiement
   public function checkout()
   {
    $this->load->library('cart');
    if(count($this->cart->contents()) == 0)
    {
       redirect('menu'); 
    }
    else
    {
        if(empty($this->session->pay)){
            redirect('menu');
        }
        else
        {
            if($this->session->userdata('pseudo') != '')
                {

                    $this->load->library('cart');
                    $data['name'] = 'checkout';
                    $data['panier'] = count($this->cart->contents());
                    $this->load->view('home_view', $data);   
                }
                else
                {
                    redirect("connect");
                }
        }     
    }
        
   }

   
   public function payment()
   {
       if(empty($this->session->pay)){
           redirect('menu');
       }
       else
       {
           if($this->session->userdata('pseudo') != '')
            {
                $this->load->library('cart');
                $data['name'] = 'payment';
                $data['panier'] = count($this->cart->contents());
                $this->load->view('home_view', $data);   
            }
            else
            {
                redirect("connect");
            }
       }     
   }

   //cette fonction me permet de de retourner
   // une div dans un compte gérant permetant d'éffectuer une transaction
   public function confirm()
   {
      $commandid = $this->input->post('commandid');
      $this->load->model('commands_model');
      $requete = $this->commands_model->confirm($commandid);
     
      foreach($requete->result() as $row)
      {
          $amount = $row->amount;
          $tel = $row->tel;
          $commandid = $row->commandid;
      }


      $numero = (string) $tel;
            $newtel =  '237'.$numero;
            $service = "";
            if(substr( $newtel,0,6) === "237650" ||
                substr( $newtel,0,6) === "237651" ||
                substr( $newtel,0,6) === "237652" ||
                substr( $newtel,0,6) === "237653" ||
                substr( $newtel,0,6) === "237654" ||
                substr( $newtel,0,5) === "23767" ||
                substr( $newtel,0,5) === "23768")
            {
                $service = 'MTN';
            }
            elseif(substr( $newtel,0,6) === "237655" ||
            substr( $newtel,0,6) === "237656" ||
            substr( $newtel,0,6) === "237657" ||
            substr( $newtel,0,6) === "237658" ||
            substr( $newtel,0,6) === "237659" ||
            substr( $newtel,0,5) === "23769")
            {
                $service = 'ORANGE';
            }
            
        $curl = curl_init();
        
        $appKey = '57af24d87365baee326e3e7a12dce17e76f49c5c';
        $appPIN = '8908';
        $apiKey = '77dd38a98a39305953d74a8492e3d9d7bc8b27a8';
        $url = "https://mesomb.hachther.com/en/api/v1.0/applications/$appKey/deposit/";
        $data = array(
        'amount' => $amount,
        'receiver' => $newtel,
        'service' => $service,
        'pin' => $appPIN
        );

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "User-Agent: Mozilla",
                "Authorization: Token $apiKey"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
     $this->load->model('commands_model');
        $datas = array(
            'commandstatus' => 'succes',
            'commandid' => $commandid
        );
        $transactionid = $this->commands_model->setcommands($datas);

        $this->commands_model->succestransaction($transactionid);
    }


    // cette fonction annule la transaction lorsque l'utilisateur clique sur le bouton annuler à la page de paiement
    public function abort()
    {
        $transactionid = $this->input->post('transactionid');

     $this->load->model('commands_model');
        $this->commands_model->aborttransaction($transactionid);

        $this->load->library('cart');
        $this->cart->destroy();

    }

}




 