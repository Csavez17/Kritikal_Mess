<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function show()
    {
        if(Gate::allows('admin-access')) {
            return '<h1>Hello admin!</h1>'; // EHELYETT ÉRDEMES EGY RENDES view('admin.dashboard')-ot VISSZADNI 
            // 
            // 
            // 
            // 
            abort(403, 'Unauthorized action.');
        }
    }
}
