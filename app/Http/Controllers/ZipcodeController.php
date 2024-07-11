<?php

namespace App\Http\Controllers;

use App\Models\ZipcodeModel;
use App\Http\Requests\ZipcodeRequest;
use Illuminate\Http\JsonResponse;

class ZipcodeController extends Controller
{
    public function index() {
        return view('index');
    }


    public function checkZipcode(ZipcodeRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $newZipcode = ZipcodeModel::create([
                'zipcode' => $validatedData['zipcode'],
            ]);
            return response()->json(['success' => true, 'message' => 'Zip Code saved'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to validate Zip Code', 'error' => $e->getMessage()], 500);
        
        } catch (QueryException $e) {
            return response()->json(['success' => false, 'message' => 'Failed to validate Zip Code', 'error' => $e->getInfo[1]], 500);
        }
    }

}
