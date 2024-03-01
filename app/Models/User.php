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
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable ;

use Filament\Panel;


/**
 * Class User
 *
 * @property int $ID
 * @property string $UUID
 * @property string $UserEmail
 * @property string $AccountType
 * @property string $Image
 * @property string $Phone+
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
class User extends  Authenticatable implements FilamentUser, HasName
{

    use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'users';
	protected $primaryKey = 'ID';
	public $timestamps = false;


    protected $casts = [
        'email_verified_at' => 'datetime',
        'Passphrase' => 'hashed',
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
		'CartTotal',
        'email',
        'password'
	];


    public function getFilamentName(): string
    {
        return "{$this->Username}";
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Implement your logic here to determine if the user can access the panel
        // based on the provided $panel parameter.
        // For demonstration purposes, let's assume all users can access the panel.
        return true;
    }

    public function saveUser($request) : self
    {

        $this->UserEmail = $request["UserEmail"]?? $request['email'];
        $this->email = $request["UserEmail"]?? $request['email'];
        $this->AccountType = $request->AccountType ?? "Regular";
        $this->Passphrase =array_key_exists("password", $request)? Hash::make($request["password"]):Hash::make($request["Passphrase"]) ;
        $this->password = array_key_exists("Passphrase", $request)? Hash::make($request["Passphrase"]):Hash::make($request["password"]) ;
        $this->Image = $request->Image ?? "Default";
        $this->Phone = $request["Phone"];
        $this->Username = $request["Username"]??$this->UserEmail;
        $this->TempPin = Str::random(10);
        $this->Status = "active";
        $this->Credit = $request->Credit?? "0.00";
        $this->AffiliateID = $request->AffiliateID ?? Str::random(10);
        $this->EmailVerified = true;
        $this->PhoneVerified = true;
        $this->CartTotal = $request->CartTotal ?? "0";
        $this->UUID = Str::random(10);
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

    public function getAuthPassword()
    {
        return $this->Passphrase;
    }

    public function generateAndSaveApiAuthToken()
    {
        // Generate a new API token using Laravel's Str::random() method
        $apiToken = Str::random(80);

        // Save the generated API token to the user's record in the database
        $this->api_token = hash('sha256', $apiToken);
        $this->save();
        return $this;
    }

}
