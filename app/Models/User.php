<?php

namespace App\Models;

use App\Events\PriceOffer;
use App\Http\Filters\QueryFilter;
use App\Http\Filters\UserFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Optix\Media\HasMedia;
use Illuminate\Database\Eloquent\Builder;


/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $city
 * @property bool|null $verify
 * @property bool|null $calls_allowed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\Optix\Media\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read Collection|PhoneVerification[] $verifications
 * @property-read int|null $verifications_count
 * @property-read Collection|Driver[] $driver
 * @property-read Collection|Ride[] $ridesAsPassenger
 * @property-read int|null $ridesAsPassenger_count
 * @property-read Collection|Ride[] $ridesAsDriver
 * @property-read int|null $ridesAsDriver_count
 * @property-read Collection|Review[] $authorReview
 * @property-read int|null $authorReview_count
 * @property-read Collection|Review[] $addresseeReview
 * @property-read int|null $addresseeReview_count
 * @property-read Collection|Message[] $messages
 * @property-read int|null $messages_count
 * @property-read Collection|Offer[] $priceOffers
 * @property-read int|null $priceOffers_count
 * @method static Builder|User filter(UserFilter $filter)
 * @property-read mixed $last_verification
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasMedia;

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'city',
        'verify',
        'password',
        'calls_allowed'
    ];


    /**
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return HasMany
     */
    public function verifications(): HasMany
    {
        return $this->hasMany(PhoneVerification::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    /**
     * @return HasMany
     */
    public function ridesAsPassenger(): HasMany
    {
        return $this->hasMany(Ride::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function ridesAsDriver(): HasMany
    {
        return $this->hasMany(Ride::class, 'driver_id');
    }

    /**
     * @return HasMany
     */
    public function authorReview()
    {
        return $this->hasMany(Review::class, 'from_id');
    }

    /**
     * @return HasMany
     */
    public function addresseeReview()
    {
        return $this->hasMany(Review::class, 'to_id');
    }

    /**
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'author_id');
    }

    /**
     * @return HasMany
     */
    public function priceOffers()
    {
        return $this->hasMany(Offer::class, 'driver_id');
    }

    /**
     * Filter scope to use QueryFilter in requests
     *
     * @param Builder $builder
     * @param QueryFilter $filters
     * @return Builder
     */
    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    /**
     * @return Model|HasMany|object|null
     */
    public function getLastVerificationAttribute()
    {
        return $this->verifications()
            ->orderBy('created_at', 'desc')->first();
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->email == 'admin@poputi.com';
    }
}
