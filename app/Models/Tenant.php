<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Tenant extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected function nameFin(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => 
                sprintf('%s - %s', $attributes['name'], $attributes['fin']),
        );
    }

    public function tenancy_agreements(): HasMany
    {
        return $this->hasMany(TenancyAgreement::class);
    }
}
