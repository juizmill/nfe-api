<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'id',
        'name',
        'fantasy',
        'company_identity',
        'cnpj',
        'cpf',
        'birth',
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
