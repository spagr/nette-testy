<?php

namespace Nette\Application\UI\Control;

use Nette\Application\UI\Control;
/**
* 
*/
class BoxControl extends Control
{
	
	function __construct()
	{
		# code...
	}

	public function render()
	{
		$this->template->setFile(__DIR__ . '/BoxControl.latte');
		$this->template->render();
	}

	protected function createComponentFoo()
	{
		return new BoxControl();
	}
}