<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Redirect;

class EditPersonController extends Controller
{
    public function index(Request $request): View
    {
        $person = $this->getPerson($request);
        return view('edit-person', ['person' => $person]);
    }

    public function handle(Request $request): RedirectResponse
    {
        $request->validate([
            'person-name' => 'required',
            'person-timezone' => 'required',
        ]);

        $person = $this->getPerson($request);
        $person->name = $request->post('person-name');
        $person->timezone = $request->post('person-timezone');
        $person->save();

        return Redirect::route('home');
    }

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
