<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Redirect;

class DeletePersonController extends AbstractPersonCrudController
{
    public function index(Person $person): View
    {
        return view('delete-person', ['person' => $person]);
    }

    public function handle(Person $person): RedirectResponse
    {
        $person->delete();
        return Redirect::route('home');
    }
}
