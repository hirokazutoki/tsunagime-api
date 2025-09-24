<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class HelpRequest extends Model
{
    /** @use HasFactory<\Database\Factories\HelpRequestFactory> */
    use HasFactory;

    protected $attributes = [
        'process_status' => 'pending',
        'geocode_status' => 'pending',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return HasManyThrough
     */
    public function chatMessages(): HasManyThrough
    {
        return $this->hasManyThrough(
            ChatMessage::class,
            Client::class,
            'id',
            'client_id',
            'client_id',
            'id'
        );
    }


    public function needLabels(): BelongsToMany
    {
        return $this->belongsToMany(NeedLabel::class);
    }

    /**
     * @return HasMany
     */
    public function volunteerActivities(): HasMany
    {
        return $this->hasMany(VolunteerActivity::class);
    }
}
