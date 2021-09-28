<?php
declare(strict_types=1);
namespace App\Admin\Controller;

class UserController extends ControllerAdmin
{
    public function userEditAction()
    {
        if ($this->request->isPost()) {
            $username = $this->request->postParam('username');
            $userId = $this->request->postParam('userId');
            $isAdmin = $this->request->postParam('isAdmin');
        }
        $userId = (int) $this->request->getParam('id');
        $userParams = $this->userModel->userGet($userId);
        $this->view->render('userEdit', ['userParams' => $userParams]);
    }
}