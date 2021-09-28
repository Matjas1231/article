<?php
declare(strict_types=1);
namespace App\Model;

use PDO;

class UserModel extends Model
{
    public function createUser(string $username, string $password): void
    {
        $user = $this->connection->quote($username, PDO::PARAM_STR);
        $passwordUser = $this->connection->quote(password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        // dd($passwordUser);
        $query = "INSERT INTO users(username, password) VALUES($user, $passwordUser)";
        $this->connection->query($query);
    }

    public function searchUser(string $username, string $password): bool
    {        
        $user = $this->connection->quote($username, PDO::PARAM_STR);
        $query = "SELECT username, password, is_admin FROM users WHERE username=$user";
        $result = $this->connection->query($query, PDO::FETCH_ASSOC)->fetch();
        if(password_verify($password, $result['password']) === false) {
            dd('HASŁO SIĘ NIE ZGADZA');            
        }
        $isAdminNumber = (int) $result['is_admin'];
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = $this->isAdmin($isAdminNumber);
        return true;
    }

    private function isAdmin(int $number): bool
    {
        return true ? $number == 1 : false;
    }
    
}