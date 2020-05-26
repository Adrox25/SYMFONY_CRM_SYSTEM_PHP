<?php


namespace App\Partial;


interface IdAwareInterface
{

    public function getId(): ?int;

    public function setId(int $id): void;

}