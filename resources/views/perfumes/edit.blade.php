@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 30px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
    <h1 style="text-align: center; margin-bottom: 25px;">تعديل العطر</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px; border: 1px solid red; padding: 10px; border-radius: 5px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perfumes.update', $perfume->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name" style="font-weight: bold;">الاسم:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $perfume->name) }}" required 
               style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="description" style="font-weight: bold;">الوصف:</label><br>
        <textarea id="description" name="description" rows="4" 
                  style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description', $perfume->description) }}</textarea>

        <label for="price" style="font-weight: bold;">السعر ($):</label><br>
        <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $perfume->price) }}" required
               style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="category_id" style="font-weight: bold;">الصنف:</label><br>
        <select id="category_id" name="category_id" required
                style="width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">اختر صنف</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $perfume->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label style="font-weight: bold;">الصورة الحالية:</label><br>
        @if($perfume->image)
            <img src="{{ asset('storage/' . $perfume->image) }}" width="120" alt="صورة العطر" style="margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;"><br>
        @else
            <span style="color: #666; margin-bottom: 15px; display: inline-block;">لا توجد صورة</span><br>
        @endif

        <label for="image" style="font-weight: bold;">تغيير الصورة:</label><br>
        <input type="file" id="image" name="image" accept="image/*" style="margin-bottom: 20px;">

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border:none; border-radius: 5px; cursor: pointer;">
            تحديث
        </button>
    </form>

    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('perfumes.index') }}" style="color: #007bff; text-decoration: none;">عودة للقائمة</a>
    </div>
</div>
@endsection
