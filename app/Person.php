<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Uuid;

/**
 * App\Person
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $timezone
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Person whereUuid($value)
 */
class Person extends Model
{
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public static function create(string $name, string $timezone, int $userId, array $teams = []): self
    {
        $person = new self();
        $person->name = $name;
        $person->timezone = $timezone;
        $person->uuid = Uuid::uuid4();
        $person->user_id = $userId;
        $person->save();
        foreach ($teams as $team) {
            $person->teams()->attach(\App\Team::where('name', '=', $team)->first()->id);
        }
        return $person;
    }
}
