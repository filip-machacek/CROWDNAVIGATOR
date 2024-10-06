<?php

declare(strict_types=1);

namespace App\UI\Web\Post;

use Nette;


final class PostPresenter extends Nette\Application\UI\Presenter
{
    public function renderDefault(): void
    {
        $this->template->title = 'Článek';
        $this->template->description = '';
        $this->template->robots = 'noindex, nofollow';

        $this->setLayout('layout');
    }
}
