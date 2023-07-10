<?php

interface SetValue
{
    public function set(int $value): void;
}

interface MeterInterface
{
    public function getMeter(): int;
}

interface CentimeterInterface
{
    public function getCentimeter(): int;
}

class Meter implements MeterInterface, SetValue
{
    private int $meter;

    public function set(int $value): void
    {
        $this->meter = $value;
    }

    public function getMeter(): int
    {
        return $this->meter;
    }
}

class Centimeter implements CentimeterInterface, SetValue
{
    private int $centimeter;

    public function set(int $value): void
    {
        $this->centimeter = $value;
    }

    public function getCentimeter(): int
    {
        return $this->centimeter;
    }
}

class ShowPreview
{
    private MeterInterface $meter;

    public function __construct(MeterInterface $meter)
    {
        $this->meter = $meter;
    }

    public function getMeter(): int
    {
        return $this->meter->getMeter();
    }
}

class CentimeterAdapter implements MeterInterface
{
    private Centimeter $centimeter;

    public function __construct(Centimeter $centimeter)
    {
        $this->centimeter = $centimeter;
    }

    public function getMeter(): int
    {
        return $this->centimeter->getCentimeter() / 100;
    }
}

$meter = new Meter();
$meter->set(25);

$centimeter = new Centimeter();
$centimeter->set(2500);

$adapter = new CentimeterAdapter($centimeter);

$preview = new ShowPreview($meter);
$preview2 = new ShowPreview($adapter);
echo $preview->getMeter() . PHP_EOL;
echo $preview2->getMeter() . PHP_EOL;