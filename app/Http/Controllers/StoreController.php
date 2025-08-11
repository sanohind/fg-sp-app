<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * Show the store index page
     */
    public function index()
    {
        return view('store.index');
    }

    /**
     * Show the scan slot page
     */
    public function scanSlot()
    {
        return view('store.scan-slot');
    }

    /**
     * Show the scan box page
     */
    public function scanBox()
    {
        return view('store.scan-box');
    }

    /**
     * Process slot scan
     */
    public function processSlotScan(Request $request)
    {
        try {
            $request->validate([
                'part_no' => 'required|string|max:100',
                'rack' => 'required|string|max:50',
                'scan_data' => 'required|string|max:255'
            ]);

            // Log the slot scan
            Log::info('Slot scan processed', [
                'part_no' => $request->part_no,
                'rack' => $request->rack,
                'scan_data' => $request->scan_data,
                'operator' => auth()->user()->username ?? 'unknown',
                'timestamp' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Slot scan processed successfully',
                'data' => [
                    'part_no' => $request->part_no,
                    'rack' => $request->rack,
                    'scan_data' => $request->scan_data,
                    'timestamp' => now()->format('Y-m-d H:i:s')
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Slot scan error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error processing slot scan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Process box scan
     */
    public function processBoxScan(Request $request)
    {
        try {
            $request->validate([
                'box_id' => 'required|string|max:100',
                'box_type' => 'required|string|in:small,medium,large,pallet',
                'scan_data' => 'required|string|max:255'
            ]);

            // Log the box scan
            Log::info('Box scan processed', [
                'box_id' => $request->box_id,
                'box_type' => $request->box_type,
                'scan_data' => $request->scan_data,
                'operator' => auth()->user()->username ?? 'unknown',
                'timestamp' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Box scan processed successfully',
                'data' => [
                    'box_id' => $request->box_id,
                    'box_type' => $request->box_type,
                    'scan_data' => $request->scan_data,
                    'timestamp' => now()->format('Y-m-d H:i:s')
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Box scan error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error processing box scan: ' . $e->getMessage()
            ], 500);
        }
    }
}
