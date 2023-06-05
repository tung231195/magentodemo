<?php

namespace Ecommage\HelloWorld\Plugin;

class ExamplePlugin{
    public function beforeSetTitle(\Ecommage\HelloWorld\Controller\Index\Example $subject, $title)
	{  
		$title = $title . " to  aaaaaaaa";
		echo __METHOD__ . "</br>";

		return [$title];
	}

    public function afterGetTitle(\Ecommage\HelloWorld\Controller\Index\Example $subject, $result)
	{

		echo __METHOD__ . "</br>";

		return '<h1>'. $result . 'Ecommage.com' .'</h1>';

		
	}


	public function aroundGetTitle(\Ecommage\HelloWorld\Controller\Index\Example $subject, callable $proceed)
	{

		echo __METHOD__ . " - Before proceed() </br>";
		 $result = $proceed();
		echo __METHOD__ . " - After proceed() </br>";


		return $result;
	}
}
