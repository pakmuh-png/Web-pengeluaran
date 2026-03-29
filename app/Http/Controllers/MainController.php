<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Pabrik;
use App\Models\Area;
use App\Models\Pelanggan;
use App\Models\Planner;
use App\Models\Order;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function orderrutin(Request $request)
    {
        // Get search parameters
        $searchMaterial = $request->get('search_material');
        $searchNpk = $request->get('search_npk');
        $searchPlanner = $request->get('search_planner');
        $searchPabrik = $request->get('search_pabrik');
        $searchArea = $request->get('search_area');

        // Query materials with optional search filter
        $materialsQuery = Material::orderBy('material_code');
        if ($searchMaterial) {
            $materialsQuery->where(function($query) use ($searchMaterial) {
                $query->where('material_code', 'LIKE', '%' . $searchMaterial . '%')
                      ->orWhere('description', 'LIKE', '%' . $searchMaterial . '%');
            });
        }
        $materials = $materialsQuery->get();

        // Query pabriks with optional search filter
        $pabriksQuery = Pabrik::orderBy('nama_pabrik');
        if ($searchPabrik) {
            $pabriksQuery->where('nama_pabrik', 'LIKE', '%' . $searchPabrik . '%');
        }
        $pabriks = $pabriksQuery->get();

        // Query areas with optional search filter
        $areasQuery = Area::orderBy('nama_area');
        if ($searchArea) {
            $areasQuery->where('nama_area', 'LIKE', '%' . $searchArea . '%');
        }
        $areas = $areasQuery->get();

        // Query pelanggans with optional search filter
        $pelanggansQuery = Pelanggan::orderBy('npk');
        if ($searchNpk) {
            $pelanggansQuery->where(function($query) use ($searchNpk) {
                $query->where('npk', 'LIKE', '%' . $searchNpk . '%')
                      ->orWhere('nama', 'LIKE', '%' . $searchNpk . '%');
            });
        }
        $pelanggans = $pelanggansQuery->get();

        // Query planners with optional search filter
        $plannersQuery = Planner::orderBy('name');
        if ($searchPlanner) {
            $plannersQuery->where(function($query) use ($searchPlanner) {
                $query->where('name', 'LIKE', '%' . $searchPlanner . '%')
                      ->orWhere('phone', 'LIKE', '%' . $searchPlanner . '%');
            });
        }
        $planners = $plannersQuery->get();

        return view('pages.orderrutin', compact('materials', 'pabriks', 'areas', 'pelanggans', 'planners'));
    }
    public function orderta(Request $request)
    {
        // Get search parameters
        $searchMaterial = $request->get('search_material');
        $searchNpk = $request->get('search_npk');
        $searchPlanner = $request->get('search_planner');
        $searchPabrik = $request->get('search_pabrik');
        $searchArea = $request->get('search_area');

        // Query materials with optional search filter
        $materialsQuery = Material::orderBy('material_code');
        if ($searchMaterial) {
            $materialsQuery->where(function($query) use ($searchMaterial) {
                $query->where('material_code', 'LIKE', '%' . $searchMaterial . '%')
                      ->orWhere('description', 'LIKE', '%' . $searchMaterial . '%');
            });
        }
        $materials = $materialsQuery->get();

        // Query pabriks with optional search filter
        $pabriksQuery = Pabrik::orderBy('nama_pabrik');
        if ($searchPabrik) {
            $pabriksQuery->where('nama_pabrik', 'LIKE', '%' . $searchPabrik . '%');
        }
        $pabriks = $pabriksQuery->get();

        // Query areas with optional search filter
        $areasQuery = Area::orderBy('nama_area');
        if ($searchArea) {
            $areasQuery->where('nama_area', 'LIKE', '%' . $searchArea . '%');
        }
        $areas = $areasQuery->get();

        // Query pelanggans with optional search filter
        $pelanggansQuery = Pelanggan::orderBy('npk');
        if ($searchNpk) {
            $pelanggansQuery->where(function($query) use ($searchNpk) {
                $query->where('npk', 'LIKE', '%' . $searchNpk . '%')
                      ->orWhere('nama', 'LIKE', '%' . $searchNpk . '%');
            });
        }
        $pelanggans = $pelanggansQuery->get();

        // Query planners with optional search filter
        $plannersQuery = Planner::orderBy('name');
        if ($searchPlanner) {
            $plannersQuery->where(function($query) use ($searchPlanner) {
                $query->where('name', 'LIKE', '%' . $searchPlanner . '%')
                      ->orWhere('phone', 'LIKE', '%' . $searchPlanner . '%');
            });
        }
        $planners = $plannersQuery->get();

        return view('pages.orderTA', compact('materials', 'pabriks', 'areas', 'pelanggans', 'planners'));
    }

    // API endpoint for real-time filtering
    public function filterMaterials(Request $request)
    {
        $search = $request->get('search', '');
        $materials = Material::where(function($query) use ($search) {
            $query->where('material_code', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
        })->orderBy('material_code')->limit(50)->get();

        return response()->json($materials);
    }

    public function filterPelanggans(Request $request)
    {
        $search = $request->get('search', '');
        $pelanggans = Pelanggan::where(function($query) use ($search) {
            $query->where('npk', 'LIKE', '%' . $search . '%')
                  ->orWhere('nama', 'LIKE', '%' . $search . '%');
        })->orderBy('npk')->limit(50)->get();

        return response()->json($pelanggans);
    }

    public function filterPlanners(Request $request)
    {
        $search = $request->get('search', '');
        $planners = Planner::where(function($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('phone', 'LIKE', '%' . $search . '%');
        })->orderBy('name')->limit(50)->get();

        return response()->json($planners);
    }

    public function filterPabriks(Request $request)
    {
        $search = $request->get('search', '');
        $pabriks = Pabrik::where('nama_pabrik', 'LIKE', '%' . $search . '%')
                        ->orderBy('nama_pabrik')->limit(50)->get();

        return response()->json($pabriks);
    }

    public function filterAreas(Request $request)
    {
        $search = $request->get('search', '');
        $areas = Area::where('nama_area', 'LIKE', '%' . $search . '%')
                    ->orderBy('nama_area')->limit(50)->get();

        return response()->json($areas);
    }

    public function postOrder(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'material_code' => 'required|exists:materials,material_code',
            'npk' => 'required|exists:pelanggans,npk',
            'planner_id' => 'required|exists:planners,id',
            'pabrik_id' => 'required|exists:pabriks,id',
            'area_id' => 'required|exists:areas,id',
            'quantity' => 'required|integer|min:1',
            'no_reservation' => 'required|string|max:255',
        ]);


        if(now()->hour >= 7 && now()->hour < 15) {
            $shift = 'rutin';
        } else {
            $shift = 'ta';
        }

        $pelanggan = Pelanggan::where('npk', $validatedData['npk'])->first();

        $order = Order::create([
            'order_code' => 'ORD-' . strtoupper(uniqid()),
            'material_id' => Material::where('material_code', $validatedData['material_code'])->first()->id,
            'pelanggan_id' => $pelanggan->id,
            'area_id' => $validatedData['area_id'],
            'pabrik_id' => $validatedData['pabrik_id'],
            'order_date' => now(),
            'quantity' => $validatedData['quantity'],
            'no_reservation' => $validatedData['no_reservation'],
            'status' => 'false',
            'shift' => $shift,
            'planner_id' => $validatedData['planner_id'],
        ]);

        return response()->json(['message' => 'Order placed successfully']);
    }
}
