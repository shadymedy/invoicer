<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function invoiceItems() {
        return $this->hasMany(InvoicesItem::class);
    }

    public function getTotalAmountAttribute() {
        $total = 0;
        foreach ($this->invoiceItems as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }
}
