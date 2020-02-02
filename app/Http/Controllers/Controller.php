<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    const ERROR_STORE = 'Não foi possível cadastrar. Tente novamente!';
    const ERROR_SHOW = 'Não foi possível localizar. Tente novamente!';
    const ERROR_UPDATE = 'Não foi possível atualizar. Tente novamente!';
    const ERROR_DESTROY = 'Não foi possível remover. Tente novamente!';

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
