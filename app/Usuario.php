<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model de usuÃ¡rio
 *
 * @author Deivid Staehr
 */
class Usuario extends Authenticatable implements JWTSubject {

    use Notifiable;

    /**
     * @var string
     */
    const STATUS_ATIVO = '1';

    /**
     * @var string
     */
    const STATUS_DESATIVADO = '0';

    /**
     * @var string
     */
    protected $table = 'tbusuario';

    /**
     * @var boolean
     */
    public $incrementing = false;

    /**
     * @var boolean
     */
    public $timestamps = false;

    public $primaryKey = 'usucodigo';

    /**
     * @var array
     */
    protected $fillable = [
        'usucodigo',
        'usunome',
        'usucpfcnpj',
        'usuendereco',
        'usubairro',
        'usutelefone',
        'usucidade',
        'usuestado',
        'usustatus',
        'usutipo',
        'password',
        'email'
    ];

    /**
     * @var array
     */
    protected $attributes = [
        'status' => self::STATUS_ATIVO
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * {@inheritdoc}
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getJWTCustomClaims() {
        return [];
    }

    /**
     * Criptografa a senha antes de salva no banco
     *
     * @param string $password
     */
    public function setPasswordAttribute($password) {
        if ($password !== null & $password !== "") {
            $this->attributes['password'] = bcrypt($password);
        }
    }

}