@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ route('invoices.create') }}">Add new invoice</a>
                    <br><br>
                    <table class="table">
                        <tr>
                            <th>Invoice Date</th>
                            <th>Invoice Number</th>
                            <th>Customer</th>
                            <th>Total Amount</th>
                            <th></th>
                        </tr>
                        @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->customer->name }}</td>
                            <td>{{ number_format($invoice->total_amount, 2) }}</td>
                            <td><a href="{{ route('invoices.show', $invoice ) }}" class="btn btn-info">View Invoice</a> </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
