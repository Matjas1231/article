<?php
declare(strict_types=1);
namespace App\Controller;

class UserController extends Controller
{
    public function createUserAction(): void
    {   
        if ($this->request->hasPost()) {
            $username = $this->request->postParam('username');
            $pasword = $this->request->postParam('password');
            $this->userModel->createUser($username, $pasword);
            $this->redirect('/' ,[]);
        }
        $this->view->render('createUser', []);
    }

    public function loginAction(): void
    {
        if ($this->request->isPost()) {
            $username = $this->request->postParam('username');
            $pasword = $this->request->postParam('password');
            $this->userModel->searchUser($username, $pasword);
            $this->redirect('/',[]);
        }

        $this->view->render('login', []);
    }

    public function logoutAction(): void
    {
        session_destroy();
        $this->redirect('/', []);
    }
}