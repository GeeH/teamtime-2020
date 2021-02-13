<?php

namespace App\Http\Livewire;

use App\Person;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TimezoneDropdown extends Component
{
    public ?Person $person;
    public ?string $timezone = '';
    public array $typeahead = [];

    protected $listeners = [
        'typeaheadClicked' => 'updateTimezoneToClicked',
        'downKeyPressed' => 'increaseSelected',
    ];

    public function mount()
    {
        $this->timezone = $this->person->timezone;
    }

    public function updateTimezoneToClicked(string $timeZone)
    {
        $this->timezone = $timeZone;
        $this->typeahead = [];
    }

    public function render()
    {
        if ($this->timezone !== "" && $this->timezone !== $this->person->timezone) {
            $this->typeahead = DB::table('zone')
                ->where('zone_name', 'LIKE', '%'.$this->timezone.'%')
                ->pluck('zone_name')
                ->toArray();
        }
        return view('livewire.timezone-dropdown');
    }

}
