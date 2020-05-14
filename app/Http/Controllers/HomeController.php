<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $people =  Person::where('user_id', Auth::id())
            ->get();

        return view('home', ['people' => $people]);
    }
}
