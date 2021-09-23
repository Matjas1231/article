<?php
declare(strict_types=1);
namespace App;

class View
{
    public function render(string $page, array $params = []): void
    {
        require_once('templates/layout.php');
    }

    private function escape(array $params): array
    {
      $escapeParams = [];
  
      foreach ($params as $key => $param) {
        if (is_array($param)) {
          $escapeParams[$key] = $this->escape($param);
        } else if ($param) {
          $escapeParams[$key] = htmlentities($param);
        } else {
          $escapeParams[$key] = $param;
        }
      }  
      return $escapeParams;
    }
}
