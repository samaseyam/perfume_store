@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center"> إضافة عطر جديد</h2>

    {{-- عرض الأخطاء --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perfumes.store') }}" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
        @csrf

        {{-- الاسم --}}
        <div class="mb-3">
            <label for="name" class="form-label">الاسم:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        {{-- الوصف --}}
        <div class="mb-3">
            <label for="description" class="form-label">الوصف (اختياري):</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        {{-- السعر --}}
        <div class="mb-3">
            <label for="price" class="form-label">السعر ($):</label>
            <input type="number" id="price" name="price" step="0.01" class="form-control" value="{{ old('price') }}" required>
        </div>

        {{-- الصنف --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">الصنف:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="">-- اختر صنف --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- الصورة --}}
        <div class="mb-3">
            <label for="image" class="form-label">الصورة:</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        {{-- الكمية --}}
        <div class="mb-4">
            <label for="quantity" class="form-label">الكمية:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        {{-- زر الإرسال --}}
        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">إضافة العطر</button>
        </div>
    </form>
</div>
@endsection
