<?php

declare(strict_types=1);

namespace App\UI\Web\Home;

use Nette;


final class HomePresenter extends Nette\Application\UI\Presenter
{

    public function renderDefault(): void
    {
        $this->template->title = 'Váše navigace ve světě komunitního financování';
        $this->template->description = 'Jsme vaší spolehlivou cestou k úspěšným investicím, inovativním projektům a růstu prostřednictvím síly komunitního financování.';
        $this->template->robots = 'noindex, nofollow';
        $this->setLayout('layout');
    }


}
