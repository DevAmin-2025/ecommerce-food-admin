@extends('layout.master')
@section('title', 'About-Us Edit')

@section('link')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('script')
    <script type="text/javascript">
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageViewer', (src = '') => ({
                imageUrl: src,

                fileChosen(event) {
                    if (event.target.files.length == 0) return;

                    let file = event.target.files[0];
                    let reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => this.imageUrl = e.target.result
                }
            }))
        });
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ویرایش بخش درباره ما</h4>
    </div>
    <form action="{{ route('about-us.update', $aboutUs->id) }}" method="POST" class="row gy-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-4" x-data="imageViewer('{{ asset('images/about-us/' . $aboutUs->image_address) }}')">
                    <template x-if="imageUrl">
                        <img :src="imageUrl" class="rounded" width=350 height=320 alt="primary-image">
                    </template>
                    <input name="image_address" @change="fileChosen" type="file" class="form-control mt-3" />
                    <div class="form-text text-danger">
                        @error('image_address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px">
            <label class="form-label">عنوان</label>
            <input name="title" value="{{ $aboutUs->title }}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px">
            <label class="form-label">عنوان لینک</label>
            <input name="link_text" value="{{ $aboutUs->link_text }}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('link_text')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px">
            <label class="form-label">آدرس لینک</label>
            <input name="link_address" value="{{ $aboutUs->link_address }}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('link_address')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px">
            <label class="form-label">متن</label>
            <textarea name="body" class="form-control" rows="3">{{ $aboutUs->body }}</textarea>
            <div class="form-text text-danger">
                @error('body')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3" style="margin-bottom: 20px">
                ویرایش بخش درباره ما
            </button>
        </div>
    </form>
@endsection
