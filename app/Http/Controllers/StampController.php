<?php

namespace App\Http\Controllers;

use App\Models\Stamp;
use Illuminate\Http\Request;

class StampController extends Controller
{
    public function index(Request $request)
    {
        $query = Stamp::where('user_id', 1);

        if ($request->has('date')) {
            $query->whereDate('stamped_at', $request->date);
        } else {
            $query->whereDate('stamped_at', now());
        }

        if ($request->has('latest') && $request->boolean('latest')) {
            return response()->json($query->orderBy('stamped_at', 'desc')->first());
        }

        return response()->json($query->orderBy('stamped_at', 'desc')->get());
    }

    public function monthly(Request $request)
    {
        $query = Stamp::where('user_id', 1)
            ->whereMonth('stamped_at', now()->month)
            ->whereYear('stamped_at', now()->year)
            ->orderBy('stamped_at', 'desc');

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', 'in:clock_in,break_in,break_out,clock_out'],
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
