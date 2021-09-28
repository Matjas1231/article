<?php
declare(strict_types=1);
namespace App\Admin\Controller;

use App\Admin\Model\CategoryModel;
use App\Admin\Model\UserModel;
use App\Admin\Request;
use App\Admin\View;

abstract class ControllerAdmin
{
    const DEFAULT = 'dashboard';
    
    protected Request $request;
    protected View $view;
    protected CategoryModel $categoryModel;
    protected UserModel $userModel;

    public function __construct(Request $request, array $configuration)
    {
        $this->request = $request;   
        $this->view = new View();
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