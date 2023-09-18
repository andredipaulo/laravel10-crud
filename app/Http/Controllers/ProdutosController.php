<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoFormRequest;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto  = $produto;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar =  $request->pesquisar;
        $produtos = $this->produto->getProduto(search: $pesquisar ?? "");

        return view('produtos.lista', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoFormRequest $request)
    {
        $data = $request->all();
        $componentes = new Componentes();
        $data['valor'] =  $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
        Produto::create($data);
        Toastr::success('Cadastrado com sucesso', 'Produto', ["positionClass" => "toast-top-right"]);
        return redirect('produtos');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        return view('produtos.formedit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoFormRequest $request, string $id)
    {
        $data = $request->all();
        $componentes = new Componentes();
        $data['valor'] =  $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
        $produto = Produto::find($id);
        $produto->update($data);
        Toastr::success('Atualizado com sucesso', 'Produto', ["positionClass" => "toast-top-right"]);
        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $produto = Produto::find($request->id);
        $produto->delete();

        return response()->json(['success' => true]);
    }
}
