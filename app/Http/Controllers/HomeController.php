<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $people =  Person::where('user_id', Auth::id())
            ->get();

        return view('home', ['people' => $people]);
    }
}
