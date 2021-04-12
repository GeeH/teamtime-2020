<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Person;
use App\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', ['teams' => $this->getPeople()]);
    }

    public function json(): JsonResponse
    {
        return response()->json($this->getPeople());
    }

    public function getPeople(): Collection
    {
        return Team::whereHas(
            'person',
            function ($query) {
                $query->where('user_id', '=', auth()->user()->id);
            }
        )->with(
            [
                'person' => function ($query) {
                    $query->where('user_id', '=', auth()->user()->id);
                }
            ]
        )->orderBy('id')
            ->get();
    }
}
