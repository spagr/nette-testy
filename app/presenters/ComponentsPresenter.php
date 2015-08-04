<?php

namespace App\Presenters;

use Nette;
use App\Model,
	Nette\Application\UI\Control\BoxControl;


class ComponentsPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';

		$control = $this->getComponent('node');

		//dd($control);
		//dd($this['node-a-x']);
		dd($control->getComponents());
		dd($control->getParent());

		$control = $this['node']['foo']['foo']['foo']['foo']['foo']['foo'];

	}

	protected function createComponentNode()
	{
		$control = new BoxControl;

		$control->addComponent(new BoxControl, 'a');
		$control->addComponent(new BoxControl, 'b');
		$control->addComponent(new BoxControl, 'c');
		$control->addComponent(new BoxControl, 'd');

		$a = $control->getComponent('a');
		$a->addComponent(new BoxControl, 'x');
		$a->addComponent(new BoxControl, 'y');
		$a->addComponent(new BoxControl, 'z');

		$control->removeComponent($control['b']);
		//$control->removeComponent



		return $control;
	}
}

