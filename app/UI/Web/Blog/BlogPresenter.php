<?php

declare(strict_types=1);

namespace App\UI\Web\Blog;

use Nette;


final class BlogPresenter extends Nette\Application\UI\Presenter
{
    public function renderDefault(): void
    {
        $this->template->title = 'Blog';
        $this->template->description = '';
        $this->template->robots = 'noindex, nofollow';

        $this->setLayout('layout');
    }
}
