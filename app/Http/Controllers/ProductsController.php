<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ApiRepository; 

class ProductsController extends Controller
{
    public function index(ApiRepository $repository)    
    {
        $products = $repository->all();

        return view('welcome', compact('products')); 
    }
}