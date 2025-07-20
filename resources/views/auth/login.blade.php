<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <title>Foodtopia || Admin Panel - Login</title>
</head>

<body>
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body py-5">
                    <h4 class="mb-5 text-center">ورود به پنل ادمین</h4>
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label htmlFor="email" class="form-label">ایمیل</label>
                            <input name="email" type="email" value="{{ old('email') }}" class="form-control" id="email" />
                            <div class="form-text text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label htmlFor="password" class="form-label">رمز عبور</label>
                            <input name="password" type="password" class="form-control" />
                            <div class="form-text text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">
                            ورود
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    })

    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}',
        })
    @elseif (session('error'))
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}',
        })
    @elseif (session('warning'))
        Toast.fire({
            icon: 'warning',
            title: '{{ session('warning') }}',
        })
    @endif
</script>

</html>
