@extends('layout.master')
@section('title', 'Transactions')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">تراکنش ها</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th>مبلغ</th>
                    <th>وضعیت</th>
                    <th>شماره پیگیری</th>
                    <th>تاریخ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th>
                            {{ $transaction->id }}
                        </th>
                        <td>{{ number_format($transaction->amount) }} تومان</td>
                        <td>
                            <span
                                class="{{ $transaction->getRawOriginal('status') ? 'text-success' : 'text-danger' }}">{{ $transaction->status }}</span>
                        </td>
                        <td>{{ $transaction->ref_number ? $transaction->ref_number : 'null' }}</td>
                        <td>{{ jdate($transaction->created_at)->format('Y/m/d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
