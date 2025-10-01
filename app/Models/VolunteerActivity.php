<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VolunteerActivity extends Model
{
    /** @use HasFactory<\Database\Factories\VolunteerActivityFactory> */
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function volunteerGroup(): BelongsTo
    {
        return $this->BelongsTo(VolunteerGroup::class);
    }
}
