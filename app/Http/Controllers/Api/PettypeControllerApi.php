<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Pettype;

class PettypeControllerApi extends Controller
{
    public function pettype_list() {
        $pettype = Pettype::all();
        return response()->json(array ( 'ok' => true, 'pettype' => $pettype ));
    }
}
