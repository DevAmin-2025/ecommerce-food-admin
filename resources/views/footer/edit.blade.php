@extends('layout.master')
@section('title', 'Footer Edit')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ویرایش تنظیمات فوتر</h4>
    </div>

    <form action="{{ route('footer.update', $footer->id) }}" method="POST" class="row gy-4">
        @csrf
        @method('PUT')
        <div class="col-md-3">
            <label class="form-label">عنوان بخش تماس با ما</label>
            <input name="contact_title" type="text" value="{{ $footer->contact_title }}" class="form-control" />
            <div class="form-text text-danger">
                @error('contact_title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">آدرس تماس با ما</label>
            <input name="contact_address" type="text" value="{{ $footer->contact_address }}" class="form-control" />
            <div class="form-text text-danger">
                @error('contact_address')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">شماره تلفن تماس با ما</label>
            <input name="contact_phone" type="text" value="{{ $footer->contact_phone }}" class="form-control" />
            <div class="form-text text-danger">
                @error('contact_phone')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">ایمیل تماس با ما</label>
            <input name="contact_email" type="text" value="{{ $footer->contact_email }}" class="form-control" />
            <div class="form-text text-danger">
                @error('contact_email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">عنوان بخش معرفی</label>
            <input name="info_title" type="text" value="{{ $footer->info_title }}" class="form-control" />
            <div class="form-text text-danger">
                @error('info_title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-9">
            <label class="form-label">متن بخش معرفی</label>
            <input name="info_body" type="text" value="{{ $footer->info_body }}" class="form-control" />
            <div class="form-text text-danger">
                @error('info_body')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">عنوان روزهای کاری</label>
            <input name="work_hours_title" type="text" value="{{ $footer->work_hours_title }}" class="form-control" />
            <div class="form-text text-danger">
                @error('work_hours_title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">روزهای کاری</label>
            <input name="work_days" type="text" value="{{ $footer->work_days }}" class="form-control" />
            <div class="form-text text-danger">
                @error('work_days')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">ساعت شروع روز کاری</label>
            <input name="work_hour_from" type="text" value="{{ $footer->work_hour_from }}" class="form-control" />
            <div class="form-text text-danger">
                @error('work_hour_from')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">ساعت پایان روز کاری</label>
            <input name="work_hour_to" type="text" value="{{ $footer->work_hour_to }}" class="form-control" />
            <div class="form-text text-danger">
                @error('work_hour_to')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک تلگرام</label>
            <input name="telegram_link" type="text" value="{{ $footer->telegram_link }}" class="form-control" />
            <div class="form-text text-danger">
                @error('telegram_link')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک واتس اپ</label>
            <input name="whatsapp_link" type="text" value="{{ $footer->whatsapp_link }}" class="form-control" />
            <div class="form-text text-danger">
                @error('whatsapp_link')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک اینستاگرام</label>
            <input name="instagram_link" type="text" value="{{ $footer->instagram_link }}" class="form-control" />
            <div class="form-text text-danger">
                @error('instagram_link')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label">لینک یوتیوب</label>
            <input name="youtube_link" type="text" value="{{ $footer->youtube_link }}" class="form-control" />
            <div class="form-text text-danger">
                @error('youtube_link')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">متن کپی رایت </label>
            <input name="copyright" type="text" value="{{ $footer->copyright }}" class="form-control" />
            <div class="form-text text-danger">
                @error('copyright')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش تنظیمات فوتر
            </button>
        </div>
    </form>
@endsection
