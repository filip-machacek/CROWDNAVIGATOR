<?php declare(strict_types=1);

namespace App\Model;

use App\Model\Entity\User;
use App\Model\Service\UserService;
use Nette\Database\Explorer;
use Nette\Security\IIdentity;

class Authenticator implements \Nette\Security\Authenticator
{

    public function __construct(
        private \Nette\Database\Explorer $database,
        private \Nette\Security\Passwords $passwords,
    )
    {
    }

    public function authenticate(string $username, string $password): IIdentity
    {
        // 1. podívej se do databáze, existuje záznam pro $username? Pokud ne, vyhoď výjimku.
        $user = User::create($this->database->table('user')->where('username', $username)->fetch());

        if ($user === null)
            throw new \Nette\Security\AuthenticationException('User not found.');

        // 2. zahashuj $password. Odpovídá zahashovanému záznamu v databázi? Pokud ne, vyhoď výjimku.
        if ($this->passwords->verify($password, $user->password) === false)
            throw new \Nette\Security\AuthenticationException('Wrong password.');

        // 3. pokud vše dopadlo dobře, vytvoř a vrať SimpleIdentity
        return new ExtendedIdentity($user->id, $user->role, ['username' => $user->username]);
    }
}