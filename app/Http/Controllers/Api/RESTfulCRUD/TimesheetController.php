<?php

namespace App\Http\Controllers\Api\RESTfulCRUD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timesheet;

class TimesheetController extends Controller
{
    public function index()
    {
        return Timesheet::all();
    }

    public function show(Timesheet $timesheet)
    {
        return $timesheet;
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string',
            'date' => 'required|date',
            'hours' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $timesheet = Timesheet::create($request->all());

        return response()->json($timesheet, 201);
    }

    public function update(Request $request, Timesheet $timesheet)
    {
        $request->validate([
            'task_name' => 'sometimes|string',
            'date' => 'sometimes|date',
            'hours' => 'sometimes|integer',
            'user_id' => 'sometimes|exists:users,id',
            'project_id' => 'sometimes|exists:projects,id',
        ]);

        $timesheet->update($request->all());

        return response()->json($timesheet, 200);
    }

    public function destroy(Timesheet $timesheet)
    {
        $timesheet->delete();

        return response()->json(['message' => 'Deleted Successfully' ], 200);
    }
}
