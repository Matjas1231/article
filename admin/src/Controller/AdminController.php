<?php
declare(strict_types=1);
namespace App\Admin\Controller;

class AdminController extends ControllerAdmin
{
    public function dashboardAction()
    {
        $this->view->render('dashboard', ['test'=>'TEST']);
    }

    public function userListAction()
    {
        $users = $this->userModel->userList();
        $this->view->render('userList', ['users' => $users]);
    }

    public function categoryListAction()
    {
        if ($this->request->hasPost()) {
            $categoryName = $this->request->postParam('categoryName');
            $this->categoryModel->createCategory($categoryName);
            $this->redirect('/admin/?action=categoryList', []);
        }
        $this->view->render('categoryList', ['categories'=> $this->categoryModel->listCategory()]);
    }
}
