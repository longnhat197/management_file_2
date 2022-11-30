<?php

namespace App\Services\Login;

interface LoginServiceInterface
{
    public function loginExpert($request);
    public function loginAdmin($request);
}
