<?php

declare(strict_types=1);

namespace App\UI\Panel\Home;

use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private Nette\Database\Explorer $database,
    ) {
    }

    protected function startup()
    {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Login:default');
        }
    }

    public function renderDefault(): void
    {
        $this->template->title = 'Domů';
        $this->template->description = '';
        $this->template->robots = 'noindex, nofollow';

        $this->setLayout('layout');
    }
}
