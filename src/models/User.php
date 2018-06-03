<?php
namespace SashaMart\TestAutorization\models;

class User
{
    //private $id;
    private $name;
    private $phone;

    public function __construct(string $name, string $phone)
    {
        $this->setName($name);
        $this->setPhone($phone);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getName()
    {
        return $this->name;
    }

    public function auth()
    {
        $_SESSION['USER'] = $this;
    }
}