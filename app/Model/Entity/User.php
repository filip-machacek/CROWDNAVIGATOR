<?php
declare(strict_types=1);

namespace App\Model\Entity;

class User
{
    public function __construct(
        public int $id,
        public string $username,
        public string $password,
        public string $role,
    ) {}

    public static function create(?\Nette\Database\Table\ActiveRow $activeRow): ?self
    {
        if ($activeRow === null)
            return null;

        return new User(...$activeRow->toArray());
    }
}