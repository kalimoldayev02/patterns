<?php

interface StrategyInterface
{
    public function drive(string $transport): void;
}

class Context
{
    private StrategyInterface $strategy;

    public function setStrategy(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function drive(string $model)
    {
        $this->strategy->drive($model);
    }
 }

 class Car implements StrategyInterface
 {
     public function drive(string $model): void
     {
        echo "Car: {$model}" . PHP_EOL;
     }
 }
 class Bike implements StrategyInterface
 {
     public function drive(string $model): void
     {
        echo "Bike: {$model}" . PHP_EOL;
     }
 }

$context = new Context();

$context->setStrategy(new Car());
$context->drive('Toyota');

$context->setStrategy(new Bike());
$context->drive('Yamaha');