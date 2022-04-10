<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public static function getProducts()
    {
        $query = Product::getProductsSQL();
        return $query;
    }

    public static function createProduct(Request $request)
    {
        $format = json_decode($request->getContent());
        $query = Product::createProductSQL($format);
        return $query;
    }
    public static function updateProduct(Request $request, $id)
    {
        $format = json_decode($request->getContent());
        $query = Product::updateProductSQL($format, $id);
        return $query;
    }
    public static function deleteProduct($id)
    {
        $query = Product::deleteProductSQL($id);
    }
}
