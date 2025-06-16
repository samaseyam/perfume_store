<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfumeController extends Controller
{
    // عرض كل العطور
    public function index()
    {
        $perfumes = Perfume::with('category')->get();
        return view('perfumes.index', compact('perfumes'));
    }

    // صفحة إنشاء عطر جديد
    public function create()
    {
        $categories = Category::all();
        return view('perfumes.create', compact('categories'));
    }

    // تخزين عطر جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'category_id', 'price', 'quantity']);

        if ($request->hasFile('image')) {
             $data['image_url'] = $request->file('image')->store('perfumes', 'public');
        }

        Perfume::create($data);

        return redirect()->route('perfumes.index')->with('success', 'تم إضافة العطر بنجاح!');
    }

    // صفحة تعديل عطر
    public function edit($id)
    {
        $perfume = Perfume::findOrFail($id);
        $categories = Category::all();
        return view('perfumes.edit', compact('perfume', 'categories'));
    }

    // تحديث العطر
    public function update(Request $request, $id)
    {
        $perfume = Perfume::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'category_id', 'price', 'quantity']);

        if ($request->hasFile('image')) {
            if ($perfume->image) {
                Storage::disk('public')->delete($perfume->image);
            }
            $data['image'] = $request->file('image')->store('perfumes', 'public');
        }

        $perfume->update($data);

        return redirect()->route('perfumes.index')->with('success', 'تم تحديث العطر بنجاح!');
    }
    

    // حذف العطر
    public function destroy($id)
    {
        $perfume = Perfume::findOrFail($id);

        if ($perfume->image) {
            Storage::disk('public')->delete($perfume->image);
        }

        $perfume->delete();

        return redirect()->route('perfumes.index')->with('success', 'تم حذف العطر بنجاح!');
    }
}
