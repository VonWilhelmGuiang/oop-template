<?php

require dirname(__DIR__, 1).'/models/ContactsModel.php';


class Contacts{
    public function __construct(){
        session_status() === PHP_SESSION_ACTIVE ?: session_start();
        
        //dont allow users to access other contacts
        if(empty($_SESSION['user_logged_in'])){
            die( (object)[
                'status_code' => 401,
                'message'=>'Unauthorized Access!'
            ]);
        }
    }

    public function getlist(int $rows_per_page = 1, int $page = 1) : ?object {
        $user_contacts = new ContactsModel();
        $page = ($page-1) * $rows_per_page;
        $contacts  = $user_contacts -> list( ($rows_per_page), ($page));
        
        //from apps/helpers/helpers.js
        jsonResponse( (object)[
            'status_code'=>200,
            'contacts'=>$contacts
        ] );
    }

    public function pagecount(int $rows_per_page = 10) : int{
        $user_contacts = new ContactsModel();
        $contacts_count = $user_contacts->paginateContacts(); 
        $page_count = ceil($contacts_count->total/$rows_per_page);
        jsonResponse( (object)[
            'status_code' =>   200,
            'page_count'  => $page_count
        ]) ;
    }

    public function new(): object {
        
        $data = array(
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'middle_name' => $_POST['middle_name'],
            'company' => $_POST['company'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'user_id' => intval($_SESSION['user_id'])
        );

        if(!empty($_POST['first_name']) && !empty( $_POST['last_name'])){
            $columns = array_keys($data);
            $values = array_values($data);

            $contacts = new ContactsModel();
            $insert = $contacts-> insert( $columns , $values );

            //from apps/helpers/helpers.js
            jsonResponse( (object)[
                'status_code'=>200,
                'success'=>$insert
            ] );
        }else{

            //from apps/helpers/helpers.js
            jsonResponse( (object)[
                'status_code'=>400,
                'success'=>false,
                "message"=> "Required fields are empty."
            ] );
        }
    }

    public function update() : object {
        
        $contact_id = $_POST['contact_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $middle_name = $_POST['middle_name'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if(!empty($first_name) && !empty($last_name )){
            $contacts = new ContactsModel();
            $updated = $contacts->update($contact_id, $first_name, $last_name, $middle_name, $company, $phone, $email);
            
            //from apps/helpers/helpers.js
            jsonResponse( (object)[
                'status_code'=>200,
                'success'=>$updated
            ] );
        }else{
            
            //from apps/helpers/helpers.js
            jsonResponse( (object)[
                'status_code'=>400,
                'success'=>false,
                "message"=> "Required fields are empty."
            ] );
        }
    }
}