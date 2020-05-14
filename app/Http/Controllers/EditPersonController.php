<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Redirect;

class EditPersonController extends AbstractPersonCrudController
{
    public function index(Request $request): View
    {
        $person = $this->getPerson($request);
        return view('add-edit-person', ['person' => $person, 'route' => 'edit-person-handler']);
    }

    public function handle(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules);

        $person = $this->getPerson($request);
        $person->name = $request->post('person-name');
        $person->timezone = $request->post('person-timezone');
        $person->save();

        return Redirect::route('home');
    }
}
