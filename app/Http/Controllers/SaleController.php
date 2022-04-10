<?php

namespace App\Http\Controllers;

use App\Models\Sale;


use Illuminate\Http\Request;

class SaleController extends Controller
{
    public static function createSale(Request $request)
    {
        $format = json_decode($request->getContent());
        $query = Sale::createSaleSQL($format);
        return $query;
    }

    public static function getSales()
    {
        $query = Sale::getSalesSQL();
        return $query;
    }
}
