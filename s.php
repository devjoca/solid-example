<?php

class Person {

	private $name;
	private $lastname;

	public function __construct($name,$lastname)
	{
		$this->name = $name;
		$this->lastname = $lastname;
	}

	public function getName()
	{
		return $this->name;	
	}

	public function getLastname()
	{
		return $this->lastname;
	}

	public function printFullName()
	{
		echo '<div>'.$this->name.' '.$this->lastname.'</div>';
	}

	public function getFullName()
	{
		return $this->name.' '.$this->lastname;
	}
}


class HTMLPrinter {
	public function printPerson(Person $p)
	{
		echo '<div>'.$p->getFullName().'</div>';
	}
}

$p = new Person('Joca','Pereyra');
$p->printFullName();
$printer = new HTMLPrinter;
$printer->printPerson($p);

?>
