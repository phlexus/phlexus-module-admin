<?php
declare(strict_types=1);

namespace Phlexus\Modules\BaseAdmin\Controllers;

use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Controller;

/**
 * Class AuthController
 *
 * @package Phlexus\Modules\Admin\Controllers
 */
class AuthController extends Controller
{
    /**
     * Login page
     *
     * @return void
     */
    public function loginAction(): void
    {
        $this->tag->setTitle('Phlexus CMS');
        $this->view->setMainView('layouts/base');
        
        $this->view->form = new \Phlexus\Modules\BaseAdmin\Form\LoginForm();
    }

    /**
     * Login POST request handler
     *
     * @return ResponseInterface
     */
    public function doLoginAction(): ResponseInterface
    {        
        $this->view->disable();

        if ($this->request->isPost()) {
            $form = new \Phlexus\Modules\BaseAdmin\Form\LoginForm();

            $data = $this->request->getPost();

            try {
                if (!$form->isValid($data)) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message->getMessage());
                    }

                    return $this->response->redirect('admin/auth');
                }

                $email = $data['email'];
                $password = $data['password'];
                
                $login = $this->auth->login([
                    'email' => $email,
                    'password' => $password,
                ]);
            } catch (AuthException $e) {
                $this->flash->error($e->getMessage());
            }
        }
        
        if ($login === false) {
            $this->flash->error('Invalid auth data!');
            return $this->response->redirect('admin/auth');
        }

        return $this->response->redirect('admin');
    }

    /**
     * Logout POST request handler
     *
     * @return ResponseInterface
     */
    public function logoutAction(): ResponseInterface
    {
        $this->view->disable();

        if ($this->auth->isLogged()) {
            $this->auth->logout();
        }

        return $this->response->redirect('admin/auth');
    }

    public function remindAction(): void
    {
        // TODO: implement
    }
}
