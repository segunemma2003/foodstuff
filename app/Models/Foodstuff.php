<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
/**
 * Class Foodstuff
 *
 * @property int $ID
 * @property string $Name
 * @property string $Image
 * @property string $ProductID
 * @property string $Price
 * @property string $Weight
 * @property string $Unit
 * @property string $Description
 * @property string $Brand
 * @property string $Shipping
 * @property string $ProductPolicy
 * @property string $Status
 * @property string $Category
 * @property string $Tags
 * @property Carbon $AddDate
 *
 * @package App\Models
 */
class Foodstuff extends Model
{
	protected $table = 'foodstuffs';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'AddDate' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'Image',
		'ProductID',
		'Price',
		'Weight',
		'Unit',
		'Description',
		'Brand',
		'Shipping',
		'ProductPolicy',
		'Status',
		'Category',
		'Tags',
		'AddDate'
	];

	public function scopeFilter($query, array $filter){
		if($filter["keyboard"] ?? false){
		 $query->where("Name", "like", '%' . request("keyboard") . '%');
		}

		if($filter["search"] ?? false){
		 $query->where("Category", "like", '%' . request("Category") . '%');
		}
		  }

          // Use the "creating" event to generate the unique alphanumeric ProductID
          protected static function boot()
          {
              parent::boot();

              static::creating(function ($foodstuff) {
                  $foodstuff->ProductID = static::generateUniqueId();
              });
          }

          // Define a method to generate the unique alphanumeric identifier
          protected static function generateUniqueId()
          {
              // You can customize the format of the identifier as needed
              $timestamp = now()->format('YmdHis');
              $randomPart = Str::random(4); // Adjust the length as needed

              return "F{$timestamp}{$randomPart}";
          }


}



