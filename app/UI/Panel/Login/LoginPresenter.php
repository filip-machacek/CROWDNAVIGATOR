<?php

declare(strict_types=1);

namespace App\UI\Panel\Login;

use Nette;


final class LoginPresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private Nette\Database\Explorer $database,
    ) {
    }


    public function renderDefault(): void
    {
        $this->template->title = 'Příhlášení';
        $this->template->description = '';
        $this->template->robots = 'noindex, nofollow';

        $this->setLayout('login');
    }

    protected function createComponentSignInForm(): Nette\Application\UI\Form
    {
        $form = new Nette\Application\UI\Form();
        $form->addText('username', 'Uživatelské jméno');
        $form->addPassword('password', 'Heslo');
        $form->addSubmit('send', 'Přihlásit se');
        $form->onSuccess[] = [$this, 'signInFormSuccess'];

        return $form;
    }
    public function signInFormSuccess(Nette\Application\UI\Form $form)
    {
        $values = $form->getValues();
        try {
            $this->getUser()->login($values->username, $values->password);
        } catch (Nette\Security\AuthenticationException $e) {
            $this->flashMessage($e->getMessage(), 'danger');
            $this->redirect('Login:default');
        }

        $this->redirect('Home:default');
    }
}
