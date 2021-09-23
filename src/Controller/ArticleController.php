<?php
declare(strict_types=1);
namespace App\Controller;

class ArticleController extends Controller
{    
    public function createAction()
    {
        if($this->request->hasPost()) {
            $status = $this->request->postParam('articleStatus');
            $status === 'on' ? $status = 1 : $status = 0;
            $categoryName = $this->request->postParam('catName');
            if (!empty($categoryName)) { 
                $categoryId = $this->categoryModel->getId($categoryName);
            }
            $this->articleModel->create([
                'title' => $this->request->postParam('articleTitle'),
                'description' => $this->request->postParam('articleDescription'),
                'status' => $status,
                'categoryId' => $categoryId,
            ]);
            $this->redirect('/', []);
        }
        $this->view->render('create', ['categories' => $this->categoryModel->list()]);
    }

    public function editAction()
    {
        if($this->request->isPost()) {
            
            $articleId = (int) $this->request->getParam('id');
            $status = $this->request->postParam('articleStatus');
            $status === 'on' ? $status = 1 : $status = 0;
            $categoryName = $this->request->postParam('catName');
            $categoryId = $this->categoryModel->getId($categoryName);

            $this->articleModel->edit(
                [
                    'articleId' => $articleId,
                    'articleTitle' => $this->request->postParam('articleTitle'),
                    'articleDescription' => $this->request->postParam('articleDescription'),
                    'articleStatus' => $status,
                    'categoryId' => $categoryId,
                ]
            );
            $this->redirect('/', []);
        }
        $this->view->render('edit', [
            'article' => $this->getArticle(),
            'categories' => $this->categoryModel->list()
        ]);
    }

    public function showAction()
    {
        $this->view->render('show', ['article' => $this->getArticle()]);
    }

    public function deleteAction()
    {  
        if ($this->request->isPost()) {
            $articleId = (int) $this->request->getParam('id');
            $this->articleModel->delete($articleId);
            $this->redirect('/', []);
        }

        $this->view->render('confirm', ['article' => $this->getArticle()]);
    }

    public function listAction()
    {
        $recordSize = (int) $this->request->getParam('recordSize', 15); 
        $pageNumber = (int) $this->request->getParam('page', 1);       
        $phrase = $this->request->getParam('phrase');
        $sortBy = $this->request->getParam('sortby', 'id');
        $sortOrder = $this->request->getParam('sortorder', 'asc');

        if ($phrase) {
            $articlesList = $this->articleModel->search($phrase, $recordSize, $pageNumber, $sortBy, $sortOrder);
            $articlesCount = $this->articleModel->searchCount($phrase);
        } else {
            $articlesList = $this->articleModel->list($recordSize, $pageNumber, $sortBy, $sortOrder);
            $articlesCount = $this->articleModel->count();
        }
        

        $this->view->render('list', [ 
            'articles' => $articlesList,
            'page' => [
                'size' => $recordSize,
                'number' => $pageNumber,
                'pages' => (int) ceil($articlesCount / $recordSize)
            ],
            'phrase' => $phrase,
            'sort' => ['by' => $sortBy, 'order' => $sortOrder],
        ]);
    } 

    public function seederAction(): void
    {
        if ($this->request->hasPost()) {
            $number = (int) $this->request->postParam('seederNumber');
            $this->articleModel->truncate();
            for ($i = 0; $i < $number; $i++) {
                $this->articleModel->create([
                    'title' => 'title' . $i,
                    'description' => 'description' . $i,
                    'status' => random_int(0,1),
                    'catId' => random_int(1,4),
                ]);
            }
            $this->redirect('/', []);
        }
        $this->view->render('seeder', []);
    }

    private function getArticle(): array
    {
        $articleId = (int) $this->request->getParam('id');
        return $this->articleModel->get($articleId);
    }

        // private function array_flatten($array) { 
    //     if (!is_array($array)) return FALSE; 
    //     $result = array(); 
    //     foreach ($array as $key => $value) { 
    //       if (is_array($value)) 
    //         $result = array_merge($result, $this->array_flatten($value)); 
    //       else $result[$key] = $value; 
    //     } 
    //     return $result; 
    //   }
}
