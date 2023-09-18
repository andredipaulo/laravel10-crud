<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'valor',
    ];

    public function getProduto(string $search = "")
    {
        $produto = $this->where( function ($query) use ($search) {
            if ($search){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
                $query->orWhere('descricao', $search);
                $query->orWhere('descricao', 'LIKE', "%{$search}%");
            }
        })->paginate(10);

        return $produto;
    }
}
