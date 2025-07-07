<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index()
    {
        return response()->json(Perfume::all());
    }

    public function show($id)
    {
        $perfume = Perfume::find($id);
        if (!$perfume) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($perfume);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);

        $perfume = Perfume::create($validated);
        return response()->json($perfume, 201);
    }

    public function update(Request $request, $id)
    {
        $perfume = Perfume::find($id);
        if (!$perfume) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $perfume->update($request->all());
        return response()->json($perfume);
    }

    public function destroy($id)
    {
        $perfume = Perfume::find($id);
        if (!$perfume) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $perfume->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
