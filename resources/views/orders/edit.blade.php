@extends('layout.master')
@section('title', 'Order Edit')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ویرایش سفارش</h4>
    </div>
    <form action="{{ route('order.update', $order->id) }}" method="POST" class="row gy-4">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-select">
                <option {{ $order->getRawOriginal('status') == 0 ? 'selected' : ''}} value="0">در انتظار پرداخت</option>
                <option {{ $order->getRawOriginal('status') == 1 ? 'selected' : ''}} value="1">در حال پردازش</option>
                <option {{ $order->getRawOriginal('status') == 2 ? 'selected' : ''}} value="2">ارسال شده</option>
                <option {{ $order->getRawOriginal('status') == 3 ? 'selected' : ''}} value="3">کنسل شده</option>
                <option {{ $order->getRawOriginal('status') == 4 ? 'selected' : ''}} value="4">مرجوع شده</option>
            </select>
            <div class="form-text text-danger">
                @error('status')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش سفارش
            </button>
        </div>
    </form>
@endsection
