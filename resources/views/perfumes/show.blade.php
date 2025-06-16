@extends('layouts.app')

@section('content')
    <h1>تفاصيل العطر</h1>

    @if ($perfume->image)
        <p><img src="{{ asset('storage/' . $perfume->image) }}" width="150" alt="صورة العطر"></p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>الاسم</th>
            <td>{{ $perfume->name }}</td>
        </tr>
        <tr>
            <th>الوصف</th>
            <td>{{ $perfume->description }}</td>
        </tr>
        <tr>
            <th>السعر ($)</th>
            <td>${{ number_format($perfume->price, 2) }}</td>
        </tr>
        <tr>
            <th>التصنيف</th>
            <td>{{ $perfume->category->name ?? 'بدون تصنيف' }}</td>
        </tr>
    </table>

    <br>
    <a href="{{ route('perfumes.index') }}">العودة إلى القائمة</a>
@endsection
