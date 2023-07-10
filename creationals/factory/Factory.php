<?php

/*
 * фабрика состоит из создателей (это сами фабрики) и продукты (объекты которые создают фабрики)
 * */

interface Transport // интерфейс для продуктов/подклассов
{
    public function load(): void;

    public function deliver(string $cargo): void;

    public function unload(): void;
}

class Plane implements Transport // продукт
{

    public function load(): void
    {
        echo "The plane is loading... \n";
    }

    public function deliver(string $cargo): void
    {
        echo "The plane delivering $cargo \n";
        }

    public function unload(): void
    {
        echo "The plane is unloading...\n";
    }
}

class Truck implements Transport // продукт
{

    public function load(): void
    {
        echo "The truck is loading... \n";
    }

    public function deliver(string $cargo): void
    {
        echo "The truck delivering $cargo \n";
    }

    public function unload(): void
    {
        echo "The truck is unloading...\n";
    }
}

abstract class Logistic
{
    abstract public function getTransport(): Transport;

    public function deliverCargo(string $cargo): void
    {
        $transport = $this->getTransport(); // возвращает Plane/Truck

        $transport->load();
        $transport->deliver($cargo);
        $transport->unload();
    }
}

class AirLogistic extends Logistic // фабрика
{
    public function getTransport(): Transport
    {
        return new Plane();
    }
}

class RoadLogistic extends Logistic // фабрика
{
    public function getTransport(): Transport
    {
        return new Truck();
    }
}

function deliver(Logistic  $logistic, string $cargo)
{
    $logistic->deliverCargo($cargo);
}


// вывод
deliver(new AirLogistic(), "bike");
echo PHP_EOL;
deliver(new RoadLogistic(), "bike");