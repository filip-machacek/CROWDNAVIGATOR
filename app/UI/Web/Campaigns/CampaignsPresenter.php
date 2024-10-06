<?php

declare(strict_types=1);

namespace App\UI\Web\Campaigns;

use Nette;


final class CampaignsPresenter extends Nette\Application\UI\Presenter
{
    public function renderDefault(): void
    {
        $this->template->title = 'Kampaně';
        $this->template->description = '';
        $this->template->robots = 'noindex, nofollow';

        $this->setLayout('layout');
    }
}
