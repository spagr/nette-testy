<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

//$configurator->setDebugMode('23.75.345.200'); // enable for your remote IP
$configurator->enableDebugger(__DIR__ . '/../log');

$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;

function dd($var, $title='')
{
	$backtrace = debug_backtrace(null/*, 2*/); // Ready for PHP 5.4
	$source = (isset($backtrace[1]['class'])) ?
		$backtrace[1]['class'] : 
		basename($backtrace[0]['file']);
	$line = $backtrace[0]['line'];
	if($title !== '')
		$title .= ' – ';
	return \Tracy\Debugger::barDump($var, $title . $source . ' (' . $line .')');
}

