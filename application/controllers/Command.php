<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command extends CI_Controller {


	public function insertCommand()
	{
        $pseudo = $this->session->userdata('pseudo');
		$infos = array(
            'email' => $this->input->post('email'),
            'tel' => $this->input->post('tel'),
            'localisation' => $this->input->post('localisation')
        );

        //enregistrement des informations pour la livraison
        $this->load->model('users_model');
        $this->users_model->setinfolivraison($pseudo, $infos);

        //initialisation de la transaction par l'utilisateur
        $userid = $this->session->userdata('userid');
        $transactionstatus = 'init';
        $datatransaction = array(
            'userid' => $userid,
            'transactionstatus' => $transactionstatus
        );
        $this->load->model('Commands_model');
        $transactionid = $this->Commands_model->initTransaction($datatransaction);
        echo $transactionid;
       redirect('payment?transactionid='.$transactionid);

	}

    public function commandsPostuler()
    {
        $commandid =  $this->input->post('commandid');
        $tel =  $this->input->post('tel');
        $email =  $this->input->post('email');
        $localisation =  $this->input->post('localisation');

        $pseudo = $this->session->userdata('pseudo');
		$infos = array(
            'email' => $email,
            'tel' => $tel,
            'localisation' => $localisation
        );
        //enregistrement des informations du livreur
        $this->load->model('users_model');
        $this->users_model->setinfolivraison($pseudo, $infos);

        $userid = $pseudo = $this->session->userdata('userid');

        $postlivreur = array(
            'commandid' => $commandid,
            'userid' => $userid,
        );
        $this->load->model('commands_model');
        $this->commands_model->postuler($postlivreur);
        die();
    }

    public function payment()
    {
        if($this->session->userdata('pseudo') != '')
        {
            $transactionid =  $this->input->post('transactionid');
            
            $this->load->library('cart');
            $amount = $this->cart->total();

            //on converti le numéro en chaine de caractère et on vérifie si c'est un numéro MTN ou ORANGE
            $numero = (string) $this->input->post('tel');
            $tel = '237'.$numero;
            $service = "";
            if(substr( $tel,0,6) === "237650" ||
                substr( $tel,0,6) === "237651" ||
                substr( $tel,0,6) === "237652" ||
                substr( $tel,0,6) === "237653" ||
                substr( $tel,0,6) === "237654" ||
                substr( $tel,0,5) === "23767" ||
                substr( $tel,0,5) === "23768")
            {
                $service = 'MTN';
            }
            elseif(substr( $tel,0,6) === "237655" ||
            substr( $tel,0,6) === "237656" ||
            substr( $tel,0,6) === "237657" ||
            substr( $tel,0,6) === "237658" ||
            substr( $tel,0,6) === "237659" ||
            substr( $tel,0,5) === "23769")
            {
                $service = 'ORANGE';
            }
                    
            $curl = curl_init();

            $url = 'https://mesomb.hachther.com/api/v1.0/payment/online/';
            $appKey = '8df3af5251340883f78eed7377795ac22f1a1933';
            $data = array(
            'amount' => $amount,
            'payer' => $tel,
            'fees' => true,
            'service' => $service,
            'currency' => 'XAF',
            'message' => "Message"
            );

            curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 70,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "User-Agent: Mozilla",
                "X-MeSomb-Application: $appKey"
            ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) 
            {
                if($err === 'Operation timed out after 30001 milliseconds with 0 bytes received')
                {
                    $error = 'delais d\'operation dépassé, veillez réessayer';
                    redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                }
                else
                {
                    echo "cURL Error #:" . $err;
                    $error = 'transaction échouée, veillez réessayer';
                    redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                    die();
                }
                
            }elseif($response === '{"detail":"This account does not exist","code":"subscriber-not-found"}')
            {
                $error = 'ce compte n\'existe pas, entrez un numéro de télephone ayant un compte';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"insufficient balance in the account","code":"subscriber-insufficient-balance"}')
            {
                $error = 'votre solde est insuffisant pour éffectuer cette opération, rechargez votre compte';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"Invalid secret code","code":"subscriber-invalid-secret-code"}')
            {
                $error = 'code secret invalide, réessayer avec le bon code secret';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"Transaction retrieved successfully","code":"generic-error"}')
            {
                $error = 'erreur lors de la transaction, veillez réessayer';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"This account has reached his limit","code":"subscriber-limit-reached"}')
            {
                $error = 'ce compte a atteind ses limites, réessayer avec un autre compte';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"The phone number of this account is invalid","code":"subscriber-withdrawal-failed"}')
            {
                $error = 'le numéro de téléphone de ce compte est invalide, essayez avec un autre numéro de téléphone';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"Operation timeout","code":"subscriber-timeout"}')
            {
                $error = 'le delai alloué pour l\'operation a expiré';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"The transaction amount exceed the max allowed","code":"subscriber-invalid-max-amount"}')
            {
                $error = 'Le montant de la transaction dépasse le maximum autorisé';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"Error during the processing","code":"generic-error"}')
            {
                $error = 'erreur lors de l\'opération';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"Transaction amount is invalid","code":"invalid-amount"}' || $response === '{"detail":"The amount should be greater than zero","code":"invalid-amount"}')
            {
                $error = 'votre panier est vide! selectionnez des menus et passez votre commande';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"detail":"Issue during the processing. it can be: insufficient fund, timeout, wrong secret code...","code":"subscriber-internal-error"}')
            {
                $error = 'Problème lors du traitement. cela peut être : fonds insuffisant, délais de traitement dépassé, code secret erroné...';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"payer":["Payment should be on the local formaat"],"code":{"payer":["invalid"]}}')
            {
                $error = 'le paiement doit s\'effectuer avec un numéro de téléphone locale(Orange ou Mtn). entrez un numéro de téléphone valide';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);   
                die();
            }
            elseif($response === '{"service":["This field may not be null."],"payer":["Payment should be on the local formaat"],"code":{"service":["null"],"payer":["invalid"]}}')
            {
                $error = 'le paiement doit s\'effectuer avec un numéro de téléphone locale(Orange ou Mtn). entrez un numéro de téléphone valide';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            elseif($response === '{"service":["This field may not be null."],"code":{"service":["null"]}}')
            {
                $error = 'le paiement doit s\'effectuer avec un numéro de téléphone locale(Orange ou Mtn). entrez un numéro de téléphone valide';
                redirect('FaildTransaction?erreur='.$error.'&transactionid='.$transactionid);
                die();
            }
            else
            {
                echo $response;
                $command_status = "waiting";

                $data = array(
                    'amount' => $amount,
                    'commandstatus' => 'waiting'
                );

                //enregistrement de la commande
                $this->load->model('commands_model');
                $last_inserted = $this->commands_model->insert_command($data);

                foreach($last_inserted->result() as $row)
                {
                    $commandid = $row->commandid;
                }



                //modification de la transaction initié par l'utilisateur
                $userid = $this->session->userdata('userid');

                $transaction_data = array(
                    'commandid' => $commandid,
                    'transactionid' => $transactionid
                );

                $this->commands_model->set_transaction($transaction_data);

                $cart_item = $this->cart->contents();

                $ordItemData = array();
                $i=0;
                foreach($cart_item as $item)
                {
                    $ordItemData[$i]['transaction_id']  = $commandid;
                    $ordItemData[$i]['menuid']  = $item['id'];
                    $ordItemData[$i]['name']  = $item['name'];
                    $ordItemData[$i]['quantity']  = $item['qty'];
                    $ordItemData[$i]['price']  = $item['price'];
                    $ordItemData[$i]['restaurantname']  = $item["options"]['restaurantname'];
                    $ordItemData[$i]['menuimage']  = $item["options"]['imagemenu'];
                    $ordItemData[$i]['subtotal']  = $item["subtotal"];

                    // insertion dans la table menu_commande
                    $menu_command = array(
                        'menuid' => $ordItemData[$i]['menuid'],
                        'commandid' => $ordItemData[$i]['transaction_id'],
                        'quantity' => $ordItemData[$i]['quantity']
                    );

                    $this->commands_model->insert_menu_command($menu_command);
                    $i++;
                }

                $this->cart->destroy();
                $operation = 'Achat éffectuée avec succès';
                redirect('paymentSuccess?message='.$operation.'&transactionid='.$transactionid);
            }
        }
        else
        {
            redirect('connect');
        }
    }
	
}
