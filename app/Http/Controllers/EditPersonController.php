<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Redirect;

class EditPersonController extends AbstractPersonCrudController
{
    public function index(Person $person): View
    {
        return view('add-edit-person', ['person' => $person, 'route' => 'edit-person-handler']);
    }

    public function handle(Request $request, Person $person): RedirectResponse
    {
        $request->validate($this->validationRules);

        $person->name = $request->post('person-name');
        $person->timezone = $request->post('person-timezone');
        $person->save();

        return Redirect::route('home');
    }
}
