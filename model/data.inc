<?php 
class pool
{
    public $id;
    public $name;
    public $supplier;
    public $prefs;
}

class project
{
    public $id;
    public $url;
    public $signature;
    public $authenticator;
    public $share;
}

class user
{
    public $id;
    public $password;
    public $role;
    public $supplier;
}

?>