@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin-top: 40px;">
    <h1 class="text-center mb-4" style="font-weight: 700; color: #333;">قائمة العطور</h1>

    <div class="mb-3 text-center">
        <a href="{{ route('perfumes.create') }}" class="btn btn-primary" style="padding: 10px 25px; font-weight: 600;">
            إضافة عطر جديد
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center" style="font-size: 1rem; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive" style="box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden;">
        <table class="table table-bordered text-center align-middle mb-0" style="background-color: #fff;">
            <thead class="table-dark" style="font-size: 1rem;">
                <tr>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>السعر ($)</th>
                    <th>الصنف</th>
                    <th>الصورة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody style="font-size: 0.95rem;">
                @foreach($perfumes as $perfume)
                <tr>
                    <td>{{ $perfume->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($perfume->description, 50, '...') }}</td>
                    <td>{{ $perfume->price }}</td>
                    <td>{{ $perfume->category->name ?? 'بدون صنف' }}</td>


                    <td>

            @php
           $categoryName = $perfume->category->name ?? 'default';
            $imageName = match($categoryName) {
            'Men' => 'Men1.jpg',
            'Women' => 'Women1.jpg',
            'Kids' => 'Kids1.jpg',
            'Natural' =>'natural2.jpg',
           };
              @endphp
   
              <img src="{{ asset('images/' . $imageName) }}" width="70" alt="صورة العطر" class="img-thumbnail" style="border-radius: 6px;">
</td>


                    <td>
                        <a href="{{ route('perfumes.edit', $perfume->id) }}" class="btn btn-sm btn-warning" style="margin-bottom: 5px; min-width: 60px;">تعديل</a>
                        <form action="{{ route('perfumes.destroy', $perfume->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('هل أنت متأكد؟')" type="submit" class="btn btn-sm btn-danger" style="min-width: 60px;">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
