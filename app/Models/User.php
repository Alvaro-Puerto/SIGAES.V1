<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'gender',
        'description',
        'picture',
        'birth_date',
        'dni',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student() {
        return $this->hasOne(Student::class);
    }

    public function fullName() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function teacher() {
        return $this->hasOne(Teacher::class);
    }

    public function tutor() {
        return $this->hasOne(ParentStudent::class);
    }

    public function events() {
        return $this->belongsToMany(Event::class, UserEvent::class);
    }
}
