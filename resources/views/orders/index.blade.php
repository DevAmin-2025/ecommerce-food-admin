@extends('layout.master')
@section('title', 'Orders')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">سفارشات</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>شماره سفارش</th>
                    <th>شماره کاریر</th>
                    <th>آدرس</th>
                    <th>وضعیت</th>
                    <th>وضعیت پرداخت</th>
                    <th>قیمت کل</th>
                    <th>تاریخ</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th>
                            {{ $order->id }}
                        </th>
                        <th>
                            {{ $order->user_id }}
                        </th>
                        <td>{{ $order->address->title }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <span class="{{ $order->getRawOriginal('payment_status') == 0 ? 'text-danger' : 'text-success' }}">
                                {{ $order->payment_status }}
                            </span>
                        </td>
                        <td>{{ number_format($order->paying_amount) }} تومان</td>
                        <td>{{ jdate($order->created_at)->format('Y/m/d') }}</td>
                        <td>
                            <div class="d-flex">
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $order->id }}">
                                        محصولات
                                    </button>

                                    <div class="modal fade" id="modal-{{ $order->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">محصولات سفارش
                                                        شماره {{ $order->id }}</h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table align-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>محصول</th>
                                                                <th>نام</th>
                                                                <th>قیمت</th>
                                                                <th>تعداد</th>
                                                                <th>قیمت کل</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->orderItems()->with('product')->get() as $item)
                                                                <tr>
                                                                    <th>
                                                                        <img class="rounded"
                                                                            src="images/products/{{ $item->product->primary_image }}"
                                                                            width="80" alt="Product Image" />
                                                                    </th>
                                                                    <td class="fw-bold">{{ $item->product->name }}</td>
                                                                    <td>{{ number_format($item->price) }} تومان</td>
                                                                    <td>
                                                                        {{ $item->quantity }}
                                                                    </td>
                                                                    <td>{{ number_format($item->subtotal) }} تومان</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-outline-info ms-2">ویرایش</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
