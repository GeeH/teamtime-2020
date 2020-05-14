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

    protected function getPerson(Request $request): Person
    {
        $personId = (int)$request->route('person_id', 0);
        $person = Person::where([
            'id' => $personId,
            'user_id' => Auth::id(),
        ])->firstOrFail();

        return $person;
    }
}
