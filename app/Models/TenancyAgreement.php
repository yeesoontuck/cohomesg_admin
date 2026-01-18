<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Carbon\Carbon;

class TenancyAgreement extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    
    protected function casts(): array
    {
        return [
            'data' => 'array',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    protected function currentStatus(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $now = Carbon::now();
                
                $start = $this->start_date;
                $end = $this->end_date;

                if (!$start || !$end) {
                    return 'unknown';
                }

                if ($now->lt($start)) {
                    return 'future';
                }

                if ($now->gt($end)) {
                    return 'ended';
                }

                return 'active';
            },
        );
    }
    
    protected function statusColor(): Attribute
    {
        return Attribute::make(
            get: fn () => match($this->current_status) {
                'active' => 'text-success',
                'ended'  => 'text-gray-500',
                'future' => 'text-amber-500',
                default  => 'text-dark',
            },
        );
    }
}
