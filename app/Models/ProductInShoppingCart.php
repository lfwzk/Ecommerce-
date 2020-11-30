<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInShoppingCart extends Model
{
    protected $fillable = [
	'shopping_cart_id','product_id',
];

    use HasFactory;
}
