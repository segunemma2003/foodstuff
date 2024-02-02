<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewShoppingList extends Model
{
    use HasFactory;
	protected $table = 'shopping_lists';

	protected $fillable = [
		'name',
		'quantity',
		'image',
		'price',
		'UUID',
        'product_id'
	];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function($model) {
            $model->UUID = auth()->user()->UUID;
        });
    }
}
