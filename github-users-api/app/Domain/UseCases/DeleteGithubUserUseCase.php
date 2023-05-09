<?php

namespace App\Domain\UseCases;

interface DeleteGithubUserUseCase
{
    public function handle(int $githubUserid, int $userId) : void;
}
