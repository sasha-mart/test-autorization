<?php
namespace SashaMart\TestAutorization;

use SashaMart\TestAutorization\models\Auth;
use SashaMart\TestAutorization\models\Code;

class Controller {

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
        }
    }

    public function index()
    {
        $name = 'auth';
        require_once __DIR__ . '/views/layout.php';
    }

    public function welcome()
    {
        if (isset($_SESSION['USER'])) {
            $name = 'welcome';
            $userName = $_SESSION['USER']->getName();
            require_once __DIR__ . '/views/layout.php';
        }
        else
        {
            header('HTTP/1.0 403 Forbidden');
            echo "Недостаточно прав";
        }
    }

    public function sendcode()
    {
        if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf_token'])
            die('Не пройдена csrf валидация');

        if (!isset($_POST['name']) || !isset($_POST['phone']))
            die('Не достаточно данных');

        $name = Utils::secureEntry($_POST['name']);
        $phone = Utils::secureEntry($_POST['phone']);

        $auth = new Auth($name, $phone);
        $validateName = $auth->validateName();
        $validatePhone = $auth->validatePhone();

        if ($validateName && $validatePhone) {
            $code = new Code($phone);
            $code->setValue();
            echo 'success';
        }
        else
            echo json_encode($auth->validateErrors);
    }

    public function entercode()
    {
        if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf_token'])
            die('Не пройдена csrf валидация');

        if (!isset($_POST['name']) || !isset($_POST['phone']) || !isset($_POST['code']))
            die('Не достаточно данных');

        $name = Utils::secureEntry($_POST['name']);
        $phone = Utils::secureEntry($_POST['phone']);
        $code = Utils::secureEntry($_POST['code']);

        $auth = new Auth($name, $phone, $code);
        if ($auth->validate())
        {
            $auth->login($name, $phone);
            echo 'success';
        }
        else
            echo json_encode($auth->validateErrors);
    }
}