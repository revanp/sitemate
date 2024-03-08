<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class IssuesController extends Controller
{
    public function index(Request $request)
    {
        $issues = Issue::all();

        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $issues
        ], 200);
    }

    public function view($id)
    {
        $issue = Issue::find($id);

        if(!empty($issue)){
            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => $issue
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];

        $messages = [

        ];

        $attributes = [
            'title' => 'Title',
            'description' => 'Description',
        ];

        $validator = Validator::make($input, $rules, $messages, $attributes);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        try {
            DB::beginTransaction();

            $issue = new Issue();
            $issue = $issue->fill([
                'title' => $input['title'],
                'description' => $input['description'],
                'is_active' => true
            ])->save();

            $message = 'Issue created successfully';

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        $rules = [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];

        $messages = [

        ];

        $attributes = [
            'title' => 'Title',
            'description' => 'Description',
        ];

        $validator = Validator::make($input, $rules, $messages, $attributes);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $issue = Issue::find($id);
        if(empty($issue)){
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        try {
            DB::beginTransaction();

            $issue = Issue::find($id);
            $issue = $issue->fill([
                'title' => $input['title'],
                'description' => $input['description']
            ])->save();

            $message = 'Issue updated successfully';

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function delete($id)
    {
        $issue = Issue::find($id);

        if(!empty($issue)){
            $issue->delete();

            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => 'Issue deleted successfully'
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }
    }
}
