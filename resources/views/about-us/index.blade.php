@extends('layout.master')
@section('title', 'About-Us')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">بخش درباره ما</h4>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>عنوان لینک</th>
                    <th>آدرس لینک</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('images/about-us/' . $item->image_address) }}" class="rounded" width="100"
                            alt="product-image">
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->body }}</td>
                    <td>{{ $item->link_text }}</td>
                    <td class="dir-ltr" style="text-align: right">{{ $item->link_address }}</td>
                    <td>
                        <a href="{{ route('about-us.edit', $item->id) }}" class="btn btn-sm btn-outline-info me-2">ویرایش</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
