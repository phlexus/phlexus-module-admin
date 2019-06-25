<?php declare(strict_types=1);

namespace Phlexus\Modules\Admin\Controllers;

use Phalcon\Mvc\Controller;

final class AuthController extends Controller
{
    public function initialize(): void
    {

    }

    public function loginAction(): void
    {

    }

    public function doLoginAction(): void
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $login = $this->auth->login([
            'email' => $email,
            'password' => $password,
        ]);
        var_dump($login); exit;
    }

    public function remindAction(): void
    {

    }

    public function logoutAction(): void
    {

    }
}
