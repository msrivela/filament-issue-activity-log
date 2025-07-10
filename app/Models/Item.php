<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Item extends Model
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

    public function subItems(): HasMany
    {
        return $this->hasMany(SubItem::class);
    }

    public function subSubItems(): HasManyThrough
    {
        return $this->hasManyThrough(SubSubItem::class, SubItem::class);
    }
}
