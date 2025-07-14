@extends('layout.master')
@section('title', 'Footer')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">بخش فوتر</h4>

        <a href="{{ route('footer.edit', $footer->id) }}" class="btn btn-sm btn-dark">ویرایش تنظیمات
            فوتر</a>
    </div>

    <form class="row gy-4">
        <div class="col-md-3">
            <label class="form-label">عنوان بخش تماس با ما</label>
            <input disabled name="contact_title" value="{{ $footer->contact_title }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">آدرس تماس با ما</label>
            <input disabled name="contact_address" value="{{ $footer->contact_address }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">شماره تلفن تماس با ما</label>
            <input disabled name="contact_phone" value="{{ $footer->contact_phone }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">ایمیل تماس با ما</label>
            <input disabled name="contact_email" value="{{ $footer->contact_email }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">عنوان بخش معرفی</label>
            <input disabled name="info_title" value="{{ $footer->info_title }}" class="form-control" />
        </div>
        <div class="col-md-9">
            <label class="form-label">متن بخش معرفی</label>
            <input disabled name="info_body" value="{{ $footer->info_body }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">عنوان روزهای کاری</label>
            <input disabled name="work_hours_title" value="{{ $footer->work_hours_title }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">روزهای کاری</label>
            <input disabled name="work_days" value="{{ $footer->work_days }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">ساعت شروع روز کاری</label>
            <input disabled name="work_hour_from" value="{{ $footer->work_hour_from }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">ساعت پایان روز کاری</label>
            <input disabled name="work_hour_to" value="{{ $footer->work_hour_to }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک تلگرام</label>
            <input disabled name="telegram_link" value="{{ $footer->telegram_link }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک واتس اپ</label>
            <input disabled name="whatsapp_link" value="{{ $footer->whatsapp_link }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک اینستاگرام</label>
            <input disabled name="instagram_link" value="{{ $footer->instagram_link }}" class="form-control" />
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک یوتیوب</label>
            <input disabled name="youtube_link" value="{{ $footer->youtube_link }}" class="form-control" />
        </div>
        <div class="col-md-6">
            <label class="form-label">متن کپی رایت </label>
            <input disabled name="copyright" value="{{ $footer->copyright }}" class="form-control" />
        </div>
    </form>
@endsection
