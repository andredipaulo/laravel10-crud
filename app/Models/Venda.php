<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'venda',
        'cliente_id',
        'produto_id',
    ];

    public function produto(): BelongsTo
    {
     return $this->belongsTo(Produto::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function getVendas(string $search = "")
    {
        $vendas = $this->where( function ($query) use ($search) {
            if ($search){
                $query->where('venda', $search);
                $query->orWhere('venda', 'LIKE', "%{$search}%");
                $query->orWhere('clientes.nome', $search);
                $query->orWhere('clientes.nome', 'LIKE', "%{$search}%");
                $query->orWhere('produtos.nome', $search);
                $query->orWhere('produtos.nome', 'LIKE', "%{$search}%");
            }
        })
        ->join('clientes', 'clientes.id', 'vendas.cliente_id')
        ->join('produtos', 'produtos.id', 'vendas.produto_id')
        ->paginate(10);

        return $vendas;
    }
}
