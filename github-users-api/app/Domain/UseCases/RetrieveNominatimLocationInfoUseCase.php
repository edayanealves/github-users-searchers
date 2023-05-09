<?php

namespace App\Domain\UseCases;

interface RetrieveNominatimLocationInfoUseCase
{
    public function handle(string $location): array;
}
