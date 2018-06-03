<?php
namespace SashaMart\TestAutorization\models;

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
        if ($this->validatePhone() && $this->validateName() && $this->validateCode())
            return true;
        else
            return false;
    }

    public function validatePhone(): bool
    {
        if (preg_match('/^\+7 \(\d{3}\) \d{3}\-\d{2}\-\d{2}$/', $this->phone))
            return true;
        else {
            $this->validateErrors['phone'] = 'Телефон должен быть введен в формате +7 (111) 111-11-11';
            return false;
        }
    }

    public function validateName(): bool
    {
        if (!empty($this->name))
            return true;
        else {
            $this->validateErrors['name'] = 'Необходимо заполнить поле.';
            return false;
        }
    }

    public function validateCode(): bool
    {
        $code = new Code($this->phone);
        if (empty($this->code)) {
            $this->validateErrors['code'] = 'Необходимо ввести код подтверждения.';
            return false;
        }

        if ($this->code == $code->getCurrentValue()) {
            $code->setSuccess();
            return true;
        }
        else {
            $this->validateErrors['code'] = 'Неверно введен код подтверждения.';
            return false;
        }
    }

    public function login($name, $phone): void
    {
        $user = new User($name, $phone);
        $user->auth();
    }
}
