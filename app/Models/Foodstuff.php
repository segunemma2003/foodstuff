<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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

		  public function category()
		  {
			  return $this->belongsTo(Foodstuffcategroie::class, 'category_id');
		  }
	
}



