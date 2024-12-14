<!-- <?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'surname', 'phone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPhoneAttribute($value) {
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }
} -->