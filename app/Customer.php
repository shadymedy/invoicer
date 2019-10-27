<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function customer_fields() {
        return $this->hasMany(CustomersField::class);
    }
}
