<?php

class Facade
{
    private FirstClass $firstClass;
    private SecondClass $secondClass;

    /**
     * В зависимости от потребностей приложения мы можем предоставить
     * фасаду существующие объекты подсистемы или заставить фасада создать их
     * самостоятельно.
     */
    public function __construct(FirstClass $firstClass, SecondClass $secondClass)
    {
        $this->firstClass = $firstClass ?? new FirstClass();
        $this->secondClass = $secondClass ?? new SecondClass();
    }

    public function operation()
    {
        echo $this->firstClass->execute();
        echo $this->secondClass->execute();
    }
}

class FirstClass
{
    public function execute(): string
    {
        return 'FirstClass';
    }
}

class SecondClass
{
    public function execute(): string
    {
        return 'SecondClass';
    }
}


$facade = new Facade(new FirstClass(), new SecondClass());
$facade->operation();