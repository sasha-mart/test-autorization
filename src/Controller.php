<?php
namespace SashaMart\TestAutorization;

class Controller {

    public function __construct()
    {
        if (! isset($_SESSION['csrf_token'])) {
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
        $name = 'welcome';
        require_once __DIR__ . '/views/layout.php';
    }



}