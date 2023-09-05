{{-- Trong file phong.blade.php --}}

{{-- Lấy danh sách các phòng từ bảng phong --}}
@php
    $phongs = App\Models\Phong::all();
@endphp

{{-- Hiển thị danh sách các phòng --}}
<ul>
    @foreach ($phongs as $phong)
        <li>{{ $phong->ten }}</li>
    @endforeach
</ul>
