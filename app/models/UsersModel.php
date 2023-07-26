<?php
require 'BuildQuery.php';

class UsersModel{
    public function Verify(string $email) : ?object {
        $db = new BuildQuery();
        $user =  json_decode($db
            ->Select('*')
            ->From('users')
            ->Where("email = '{$email}'")
            ->GetResult('json'));

        return $user;
    }

    public function insert(array $columns, array $values) : int|bool{
        $db = new BuildQuery();
        $inserted = $db
            ->Insert('users')
            ->Columns($columns)
            ->Values($values)
            ->GetResult('bool');
        return $inserted;
    } 
    
}