<?php

namespace App\Http\Controllers\Api\RESTfulCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;

class RESTfulProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        // Filtering by regular fields
        if ($request->has('filters')) {
            foreach ($request->filters as $field => $value) {
                if (in_array($field, ['name', 'status'])) {
                    $query->where($field, $value);
                }
            }
        }

        // Filtering by EAV attributes:
        if ($request->has('eav_filters')) {
            foreach ($request->eav_filters as $attributeName => $filter) {
                $query->whereHas('attributeValues', function ($q) use ($attributeName, $filter) {
                    $q->whereHas('attribute', function ($q) use ($attributeName) {
                        $q->where('name', $attributeName);
                    });

                    // Applying operator
                    if (isset($filter['operator']) && isset($filter['value'])) {
                        switch ($filter['operator']) {
                            case '=':
                                $q->where('value', $filter['value']);
                                break;
                            case '>':
                                $q->where('value', '>', $filter['value']);
                                break;
                            case '<':
                                $q->where('value', '<', $filter['value']);
                                break;
                            case 'LIKE':
                                $q->where('value', 'LIKE', '%' . $filter['value'] . '%');
                                break;
                            default:
                                // Invalid operator..
                                break;
                        }
                    }
                });
            }
        }

        return $query->with('attributeValues.attribute')->get();
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'sometimes|string',
        ]);

        $project = Project::create($request->all());

        return response()->json($project, 201);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'status' => 'sometimes|string',
        ]);

        $project->update($request->all());

        return response()->json($project, 200);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json(['message' => 'Deleted Successfully' ], 200);
    }
}
