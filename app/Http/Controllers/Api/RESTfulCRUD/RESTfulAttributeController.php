<?php

namespace App\Http\Controllers\Api\RESTfulCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;

class RESTfulAttributeController extends Controller
{
    public function index()
    {
        return Attribute::all();
    }

    public function show(Attribute $attribute)
    {
        return $attribute;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:text,date,number,select',
        ]);

        $attribute = Attribute::create($request->all());

        return response()->json($attribute, 201);
    }

    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'type' => 'sometimes|in:text,date,number,select',
        ]);

        $attribute->update($request->all());

        return response()->json($attribute, 200);
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return response()->json(['message' => 'Deleted Successfully' ], 200);
    }
}
