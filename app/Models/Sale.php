<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Sale extends Model
{
    use HasFactory;
    public static function createSaleSQL($format)
    {

        $product = DB::select("select stock from product where id = {$format->product_id}");
        $stock = $product[0]->stock - $format->qty;

        if ($stock <= -1) {
            return response(207);
        } else {
            $create = DB::table('sale')->insertGetId(
                [
                    'product_id' => $format->product_id,
                    'qty' => $format->qty,
                    'total' => $format->total,
                ]
            );

            $query = DB::table('product')->where('id', $format->product_id)->decrement('stock', $format->qty);

            $object =  DB::select("select * from product where id = {$format->product_id}");
            return $object[0];
        }
    }

    public static function getSalesSQL()
    {
        $query = DB::select("SELECT s.id, p.product_name, p.ref , p.price, s.qty, s.total, ca.category_name FROM sale s INNER JOIN product p ON p.id=s.product_id INNER JOIN category ca ON ca.id= p.category_id");
        return $query;
    }
}
