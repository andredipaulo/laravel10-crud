<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'logradouro',
        'endereco',
        'bairro',
        'cep',
    ];

    public function getCliente(string $search = "")
    {
        $clientes = $this->where( function ($query) use ($search) {
            if ($search){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
                $query->orWhere('email', $search);
                $query->orWhere('email', 'LIKE', "%{$search}%");
            }
        })->paginate(10);

        return $clientes;

    }
}
