<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    protected $connection = 'siff_db';

    protected $table='usuario';

    protected $primaryKey= 'Id';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Logica de autenticacion por roles
    public function isAdmin()
    {
        return $this->TipoUsuario === 'Administrador';
    }

    public function esConsultor()
    {
        return $this->TipoUsuario === 'Consultor';
    }

    public function esCoordinador()
    {
        return $this->TipoUsuario === 'Coordinador';
    }

    public function esGestor()
    {
        return $this->TipoUsuario === 'Gestor';
    }

    public function esJoven()
    {
        return $this->TipoUsuario === 'Joven';
    }

    public function esRRHH()
    {
        return $this->TipoUsuario === 'RRHH';
    }

    public function esUSAIDCI()
    {
        return $this->TipoUsuario === 'USAID-CI';
    }

    public function esUSAIDSE()
    {
        return $this->TipoUsuario === 'USAID-SE';
    }
    public function esUSAIDSI()
    {
        return $this->TipoUsuario === 'USAID-SI';
    }
    // Fin Logica de autenticacion por roles
}
