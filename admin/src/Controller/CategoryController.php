<?php
declare(strict_types=1);
namespace App\Admin\Controller;

class CategoryController extends ControllerAdmin
{
    public function categoryEditAction()
    {
        if($this->request->isPost()) {
            $categoryParams = [
                'categoryName' => $this->request->postParam('categoryName'),
                'categoryId' => $this->request->postParam('categoryId')
            ];
            $this->categoryModel->editCategory($categoryParams);
            $this->redirect('/admin/?action=categoryList', []);
        }
        
        $catId = (int) $this->request->getParam('id');
        $category = $this->categoryModel->getCategory((int) $catId);
        $this->view->render('categoryEdit', ['category' => $category]);
    }
}