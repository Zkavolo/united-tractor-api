<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function category_product() {
        return $this->belongsTo(CategoryProduct::class, "product_category_id", "id");
    }
}
