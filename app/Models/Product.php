<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    public static function getProductsSQL()
    {
        $products = DB::select('select * from product');
        return $products;
    }
    public static function createProductSQL($format)
    {

        $create = DB::table('product')->insertGetId(
            [
                'product_name' => "$format->product_name",
                'ref' => "$format->ref",
                'price' => $format->price,
                'weight' => $format->weight,
                'stock' => $format->stock,
                'category_id' => $format->category_id
            ]

        );

        $object =  DB::select("select * from product where id = {$create}");

        return $object[0];
    }
    public static function updateProductSQL($format, $id)
    {
        $create = DB::table('product')->where('id', $id)->update([
            'product_name' => "$format->product_name",
            'ref' => "$format->ref",
            'price' => $format->price,
            'weight' => $format->weight,
            'stock' => $format->stock,
            'category_id' => $format->category_id
        ]);

        /* ("update product set product_name = '{$format->product_name}', ref ='{$format->ref}', price={$format->price}, weight={$format->weight}, stock={$format->stock}, category_id={$format->category_id} where id = {$id}"); */

        $object = DB::select("select * from product where id = {$id}");
        return $object[0];
    }
    public static function deleteProductSQL($id)
    {
        $create = DB::delete("delete from product where id = {$id}");
        return $create;
    }
}
