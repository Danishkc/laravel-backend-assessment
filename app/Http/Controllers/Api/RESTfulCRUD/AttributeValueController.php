<?php

namespace App\Http\Controllers\Api\RESTfulCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttributeValue;

class AttributeValueController extends Controller
{
    public function index()
    {
        return AttributeValue::all();
    }

    public function show(AttributeValue $attributeValue)
    {
        return $attributeValue;
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'entity_id' => 'required|exists:projects,id',
            'value' => 'required|string',
        ]);

        $attributeValue = AttributeValue::create($request->all());

        return response()->json($attributeValue, 201);
    }

    public function update(Request $request, AttributeValue $attributeValue)
    {
        $request->validate([
            'attribute_id' => 'sometimes|exists:attributes,id',
            'entity_id' => 'sometimes|exists:projects,id',
            'value' => 'sometimes|string',
        ]);

        $attributeValue->update($request->all());

        return response()->json($attributeValue, 200);
    }

    public function destroy(AttributeValue $attributeValue)
    {
        $attributeValue->delete();

        return response()->json(['message' => 'Deleted Successfully' ], 200);
    }
}
