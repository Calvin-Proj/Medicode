<?php

namespace App\Http\Controllers;

use App\Models\Misconduct;
use Illuminate\Http\Request;

class MisconductController extends Controller
{
    public function getMisconduct(Request $request, Misconduct $misconduct)
    {
        $data = $module->getData();
        return \DataTables::of($data)->make(true);
    }
}
