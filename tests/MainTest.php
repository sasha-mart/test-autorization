<?php

namespace SashaMart\TestAutorization;

use PHPUnit\Framework\TestCase;
use SashaMart\TestAutorization\models\Auth;

class MainTest extends TestCase
{
    public function testAuthValidate()
    {
        $auth = new Auth('Sasha', '+7 (111) 111-11-11');
        $this->assertEquals($auth->validatePhone(), true);

        $auth = new Auth('', '89261234567');
        $this->assertEquals($auth->validatePhone(), false);

        $auth = new Auth('Sasha', '+79261234567');
        $this->assertEquals($auth->validatePhone(), false);

        $auth = new Auth('Sasha', '79261234567');
        $this->assertEquals($auth->validatePhone(), false);

        $auth = new Auth('Sasha', '8(926)123-45-67');
        $this->assertEquals($auth->validatePhone(), false);

        $auth = new Auth('Sasha', '(495) 123 45 67');
        $this->assertEquals($auth->validatePhone(), false);

        $auth = new Auth('Sasha', '8-926-123-45-67');
        $this->assertEquals($auth->validatePhone(), false);

        $auth = new Auth('Sasha', '8 927 12 555 12');
        $this->assertEquals($auth->validatePhone(), false);
    }
}