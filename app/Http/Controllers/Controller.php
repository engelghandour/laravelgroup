<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Base Controller for Laravel Group Project
 * ICT Academy - Powered by Eng. Mohamed Mansour
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}