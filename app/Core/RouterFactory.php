<?php

declare(strict_types=1);

namespace App\Core;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
        $router->add(self::createPanelRouter());
        $router->add(self::createWebRouter());


		return $router;
	}

    private static function createPanelRouter(): RouteList{
        $panelRouter = new RouteList('Panel');
        $panelRouter->addRoute('panel/<presenter>/<action>[/<id>]', 'Home:default');

        return $panelRouter;
    }

    private static function createWebRouter(): RouteList{
        $webRouter = new RouteList('Web');
        $webRouter->addRoute('<presenter>/<action>[/<id>]', 'Home:default');

        return $webRouter;
    }


}
