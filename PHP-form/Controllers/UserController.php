<?php

namespace Controllers;

use Core\View\View;
use Models\ViewModel\UserRegisterViewModel;

class UserController
{
    public function test(): void
    {
        echo 123;
    }

    public function register(string $username, string $password): void
    {
        $viewModel = new UserRegisterViewModel($username, $password);
        $view = new View();
        $view->render("users\\register", $viewModel);
    }
}