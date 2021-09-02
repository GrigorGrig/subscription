<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'url '
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscription()
    {
        return $this->hasMany('App\Models\Subscription');
    }
}
