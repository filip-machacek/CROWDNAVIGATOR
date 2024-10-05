<?php

declare(strict_types=1);

namespace App\UI\Web\Home;

use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{

    public function renderDefault(): void
    {
        $this->setLayout('layout');
    }


}
