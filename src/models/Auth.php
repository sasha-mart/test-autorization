<?php
namespace SashaMart\TestAutorization;

class Auth
{
    private $name;
    private $phone;
    private $code;

    public $validateErrors = [];

    public function __construct(string $name, string $phone, string $code = null)
    {
        $this->setName($name);
        $this->setPhone($phone);
        $this->setCode($code);
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function validate(): bool
    {

    }

    private function validatePhone(): bool
    {
        if (preg_match('', $this->phone))
            return true;
        else {
            $this->validateErrors['phone'] = 'Телефон должен быть введен в формате +7 (111) 111-11-11';
            return false;
        }
    }

    private function validateCode(): bool
    {

    }
}
