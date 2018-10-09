<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Module;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Module::with('permissions')->get();
        
        return $permissions;
    }
}
