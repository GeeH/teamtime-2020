<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class AddPersonController extends AbstractPersonCrudController
{
    public function index(): View
    {
        $person = new Person();
        return view('add-edit-person', ['person' => $person, 'route' => 'add-person-handler']);
    }

    public function handle(Request $request): RedirectResponse
    {
        $request->validate($this->validationRules);

        $person = new Person();
        $person->name = $request->post('person-name');
        $person->timezone = $request->post('person-timezone');
        $person->uuid = Uuid::uuid4();
        $person->user_id = Auth::id();
        $person->save();

        return \Redirect::route('home');
    }
}
