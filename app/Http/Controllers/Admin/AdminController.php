<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use View;
use Auth;

use App\Category;
use App\Product;
use App\Order;
use App\User;

class AdminController extends Controller
{
    public function index() {
        return view('admincp/admincp');
    }    
}
