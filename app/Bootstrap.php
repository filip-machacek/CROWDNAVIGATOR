<?php

declare(strict_types=1);

namespace App;

use Nette\Bootstrap\Configurator;


class Bootstrap
{
	public static function boot(): Configurator
	{
		$configurator = new Configurator;
		$rootDir = dirname(__DIR__);

		$configurator->setDebugMode('109.183.197.12'); // enable for your remote IP
		$configurator->enableTracy($rootDir . '/log');
        \Tracy\Debugger::log('hello');

		$configurator->setTempDirectory($rootDir . '/temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addConfig($rootDir . '/config/common.neon');
		$configurator->addConfig($rootDir . '/config/services.neon');

		return $configurator;
	}
}
