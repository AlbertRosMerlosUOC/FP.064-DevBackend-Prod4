<?php

    namespace App\Models;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;


    class User extends Authenticatable implements MustVerifyEmail {
        use HasApiTokens, HasFactory, Notifiable;

        public $timestamps = true;
        protected $primaryKey = 'id';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'Nombre',
            'Apellido1',
            'Apellido2',
            'User',
            'email',
            'password',
            'Id_tipo_usuario',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**SS
         * The attributes that should be cast.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
    }

