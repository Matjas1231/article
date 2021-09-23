<?php
declare(strict_types=1);
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CategoryModel;
use App\Model\UserModel;
use App\Request;
use App\View;

abstract class Controller
{
    protected const DEFAULT = 'list';

    protected Request $request;
    protected View $view;
    protected ArticleModel $articleModel;
    protected CategoryModel $categoryModel;
    protected UserController $userController;


    public function __construct(Request $request, array $configuration)
    {
        $this->request = $request;   
        $this->view = new View();
        $this->articleModel = new ArticleModel($configuration['db']);
        $this->categoryModel = new CategoryModel($configuration['db']);
        $this->userModel = new UserModel($configuration['db']);
    }

    public function run(): void
    {
        $action = $this->action() . 'Action';
        if(!method_exists($this, $action)) {
            $action = self::DEFAULT . 'Action';
        } else {
            $this->$action();
        }
    }

    final protected function redirect(string $to, array $params): void
    {
        $location = $to;

        if(count($params)) {
            $queryParams = [];
            foreach ($params as $key => $value) {
                $queryParams[] = urlencode($key) . '=' . urlencode($value);
            }
            $queryParams = implode('&', $queryParams);

            $location .= '?' . $queryParams;
        }
        header("Location: $location");  
        exit;      
    }

    private function action(): string
    {
        return $this->request->getParam('action', self::DEFAULT);
    }  

}