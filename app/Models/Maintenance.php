<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'device_id',
        'description',
        'scheduled_at',
        'completed',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
