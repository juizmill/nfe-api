<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'id',
        'regime',
        'token_ibpt',
        'csc_id',
        'key_csc',
        'certified',
        'password_certified',
        'ambient',
        'logo_nfe',
        'email_nfe',
        'password_email_nfe',
        'name',
        'fantasy',
        'identity',
        'cnpj',
        'active',
        'type',
        'cell_phone',
        'phone',
        'email',
        'neighborhood',
        'cep',
        'complement',
        'address',
        'city',
        'establishment_number',
        'state',
        'uf',
        'created_at',
        'updated_at'
    ];
}
