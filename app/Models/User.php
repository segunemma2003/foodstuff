<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Helper\Tokenable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;



/**
 * Class User
 *
 * @property int $ID
 * @property string $UUID
 * @property string $UserEmail
 * @property string $AccountType
 * @property string $Image
 * @property string $Phone
 * @property string $Username
 * @property string $Passphrase
 * @property string $TempPin
 * @property string $Status
 * @property string $Credit
 * @property Carbon $RegDateTime
 * @property string $AffiliateID
 * @property string $EmailVerified
 * @property string $PhoneVerified
 * @property string $DefaultPickUpAddressID
 * @property string $CartTotal
 *
 * @package App\Models
 */
class User extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Tokenable;

	protected $table = 'users';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'RegDateTime' => 'datetime'
	];

	protected $fillable = [
		'UUID',
		'UserEmail',
		'AccountType',
		'Image',
		'Phone',
		'Username',
		'Passphrase',
		'TempPin',
		'Status',
		'Credit',
		'RegDateTime',
		'AffiliateID',
		'EmailVerified',
		'PhoneVerified',
		'CartTotal'
	];

    public function saveUser($request) : self
    {
        $this->UserEmail = $request->UserEmail;
        $this->AccountType = $request->AccountType;
        $this->Passphrase = Hash::make($request->Passphrase);
        $this->Image = $request->Image ?? "Default";
        $this->Phone = $request->Phone;
        $this->Username = $request->Username;
        $this->TempPin = $request->TempPin;
        $this->Status = "active";
        $this->Credit = $request->Credit?? "0.00";
        $this->AffiliateID = $request->AffiliateID ?? Str::random(10);
        $this->EmailVerified = true;
        $this->PhoneVerified = true;
        $this->CartTotal = $request->CartTotal ?? "0";
        $this->UUID = uniqid();
        $this->save();

        return $this;
    }

    public function saveGoogleUser($request) : self
    {
        $this->UserEmail = $request->UserEmail;
        $this->AccountType = $request->AccountType;
        $this->Image = $request->Image ?? "Default";
        $this->Username = $request->Username;
        $this->Status = "active";
        $this->Phone = "0000";
        $this->Credit = $request->Credit?? "0.00";
        $this->AffiliateID = $request->AffiliateID ?? Str::random(10);
        $this->EmailVerified = true;
        $this->PhoneVerified = true;
        $this->CartTotal = $request->CartTotal ?? "0";
        $this->UUID = uniqid();
        $this->save();

        return $this;
    }

}
