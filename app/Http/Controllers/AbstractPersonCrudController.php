<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class AbstractPersonCrudController extends Controller
{
    protected array $validationRules = [
        'person-name' => 'required',
        'person-timezone' => 'required',
    ];
}
