<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'notes',
        'photo',
        'dob',
        'gender',
        'address',
        'role',
        'status',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }







    //     public function lawyerProfile(){
    //         return $this->hasOne(Lawyer::class);

    //     }


    //     public function clientProfile(){
    //         return $this ->hasOne(Client::class);
    //     }

    //     public function clientCases(){
    //         return $this->hasMany(CourtCase::class, 'client_id');
    //     }

    //     public function lawyerCases(){
    //         return $this->hasMany(CourtCase::class, 'lawyer_id');
    //     }
    //     public function clientAppointments(){
    //         return $this-> hasMany(CourtCase::class);
    //     }
    //     public function lawyerAppointments(){
    //         return $this->hasMany(Appointment::class);

    //     }
    //     public function 


    // One-to-One (if user is a lawyer)
    public function lawyerProfile()
    {
        return $this->hasOne(Lawyer::class);
    }

    // One-to-One (if user is a client)
    public function clientProfile()
    {
        return $this->hasOne(Client::class);
    }

    // One-to-Many (Cases where user is a client)
    public function clientCases()
    {
        return $this->hasMany(CourtCase::class, 'client_id');
    }

    // One-to-Many (Cases where user is a lawyer)
    public function lawyerCases()
    {
        return $this->hasMany(CourtCase::class, 'lawyer_id');
    }

    // Appointments (as client)
    public function clientAppointments()
    {
        return $this->hasMany(Appointment::class, 'client_id');
    }

    // Appointments (as lawyer)
    public function lawyerAppointments()
    {
        return $this->hasMany(Appointment::class, 'lawyer_id');
    }

    // User’s uploaded documents
    public function documents()
    {
        return $this->hasMany(Document::class, 'uploaded_by');
    }

    // Reviews made by the user (if client)
    public function reviewsGiven()
    {
        return $this->hasMany(Review::class, 'client_id');
    }

    // Reviews received (if lawyer)
    public function reviewsReceived()
    {
        return $this->hasMany(Review::class, 'lawyer_id');
    }

    // Notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function isAdmin(){
        return $this->role === 'admin';
    }

    public function isLawyer(){
        return $this->role === 'lawyer';
    }

    public function isClient(){
        return $this->role === 'client';
    }

    

}
