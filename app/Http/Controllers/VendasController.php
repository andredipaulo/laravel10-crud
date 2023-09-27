<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $vendas = $this->venda->getVendas(search: $pesquisar ?? "");

        return view ( 'vendas.lista', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $maxVenda = Venda::max( 'venda') + 1;
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view ('vendas.form', compact(['maxVenda', 'clientes', 'produtos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Venda::create($data);
        Toastr::success('Cadastrado com sucesso', 'Venda', ["positionClass" => "toast-top-right"]);
        return redirect('vendas');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venda = Venda::find($id);

        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view ('vendas.formedit', compact(['venda', 'clientes', 'produtos']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $venda = Venda::find($id);
        $venda->update($data);
        Toastr::success('Atualizado com sucesso', 'Venda', ["positionClass" => "toast-top-right"]);
        return redirect('vendas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $venda = Venda::find($request->id);
        $venda->delete();
        Toastr::success('Registro excluído com sucesso', 'Venda', ["positionClass" => "toast-top-right"]);
        return response()->json(['success' => true]);
    }
}
