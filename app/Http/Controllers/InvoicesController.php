<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomersField;
use App\Invoice;
use App\InvoicesItem;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function create() {
        return view('invoices.create');
    }

    public function store(Request $request) {
        $customer = Customer::create($request->customer);
        $invoice = Invoice::create($request->invoice + ['customer_id' => $customer->id]);
        for ($i=0; $i < count($request->product); $i++) {
            if ( isset($request->qty[$i]) && isset($request->price[$i]) ) {
                InvoicesItem::create([
                    'invoice_id' => $invoice->id,
                    'name' => $request->product[$i],
                    'quantity' => $request->qty[$i],
                    'price' => $request->price[$i],
                ]);
            }
        }

        for ($i=0; $i < count($request->customer_fields); $i++) {
            if ( isset($request->customer_fields[$i]['field_key']) && isset($request->customer_fields[$i]['field_value']) ) {
                CustomersField::create([
                    'customer_id' => $customer->id,
                    'field_key' => $request->customer_fields[$i]['field_key'],
                    'field_value' => $request->customer_fields[$i]['field_value'],
                ]);
            }
        }
    }
}
