<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SubItem extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->logOnly([
                'name',
            ]);
    }

    public function subSubItems(): HasMany
    {
        return $this->hasMany(SubSubItem::class);
    }
}
