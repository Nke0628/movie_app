<?php

namespace Package\Movie\Domain\FormRequest;

interface MovieRequestInterface
{
    public function getMovieName(): string;

    public function getStartDate() :string;

    public function getEndDate() :string;

    public function getDescription() :string;
}
