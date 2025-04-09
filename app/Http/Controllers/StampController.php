<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use Illuminate\Http\Request;

class StampController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', 'in:clock_in,break_start,break_end,clock_out'],
            'stamped_at' => ['required', 'date']
        ]);

        $stamp = Stamp::create([
            'user_id' => 1,
            'type' => $validated['type'],
            'stamped_at' => $validated['stamped_at']
        ]);

        return response()->json($stamp, 201);
    }
}
