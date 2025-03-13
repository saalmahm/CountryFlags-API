<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FlagController extends Controller
{
    public function store(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        if ($request->hasFile('flag')) {
            $file = $request->file('flag');
            $path = $file->store('flags');

            $flag = Flag::updateOrCreate(
                ['country_id' => $country->id],
                [
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]
            );

            return response()->json($flag, 201);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }

    public function show($id)
    {
        $flag = Flag::where('country_id', $id)->firstOrFail();
        return response()->download(storage_path('app/' . $flag->file_path));
    }
}