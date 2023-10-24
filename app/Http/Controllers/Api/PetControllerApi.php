<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pettype;

class PetControllerApi extends Controller
{
    public function pet_list($pettype_id = null)
    {
       if ($pettype_id) {
            $pet = Pet::where('pettype_id', $pettype_id)->get();
        } else {
            $pet= Pet::all();
        }
        return response()->json(array('ok' => true, 'pet' => $pet));
    }


    public function product_search(Request $request)
    {
        $query = $request->search_query;

        if ($query) {
            $pet = Pet::where('petname', 'like', '%' . $query . '%')->get();
            // $products = Product::where('code', 'like', '%'.$query.'%')
            // ->orWhere('name', 'like', '%'.$query.'%')->get();
        } else {
            $pet = Pet::all();
        }

        return response()->json(
            array(
                'ok' => true,
                'pet' => $pet,
            )
        );
    }
}
