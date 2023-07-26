<?php

require 'BuildQuery.php';

class ContactsModel{
    public function __construct() {
        session_status() === PHP_SESSION_ACTIVE ?: session_start();
    }

    public function list(int $rows_per_page = 0, int $page = 0) : ?array {
        $build_query = new BuildQuery();
        $user_id = $_SESSION['user_id'];
        $contacts = ($build_query
            ->Select('*')
            ->From('contacts')
            ->Where("user_id = {$user_id}")
            ->Limit($rows_per_page)
            ->Offset($page)
            ->GetResult('array')
        );
        
        return $contacts;
    }

    public function paginateContacts() : object {
        $build_query = new BuildQuery();
        $user_id = $_SESSION['user_id'];
        $contact_count = json_decode($build_query
            ->Select('Count(*) as total')
            ->From('contacts')
            ->Where("user_id = {$user_id}")
            ->GetResult('json')
        );
    
        return $contact_count;
    }

    public function insert( array $columns , array $values) : int|bool {
        $build_query = new BuildQuery();
        $success = $build_query
            ->Insert('contacts')
            ->Columns($columns)
            ->Values($values)
            ->GetResult('bool');
        return($success);
    }

    public function update(int $contact_id, string $first_name, string $last_name, string $middle_name, string $company, string $phone, string $email) : int|bool {
        $build_query = new BuildQuery();
        $user_id = $_SESSION['user_id'];
        $success = $build_query
            ->Update('contacts')
            ->Set( 
                    "first_name = '{$first_name}'",
                    "last_name = '{$last_name}'",
                    "middle_name = '{$middle_name}'",
                    "company = '{$company}'",
                    "phone = '{$phone}'",
                    "email = '{$email}'"
                )
            ->Where(
                    "user_id = {$user_id}",
                    "contact_id = {$contact_id}"
                )
            ->GetResult('bool');
        return($success);
    }
}