<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente =  $cliente;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesquisar =  $request->pesquisar;
        $clientes = $this->cliente->getCliente(search: $pesquisar ?? "");

        return view('clientes.lista', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('clientes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Cliente::create($data);
        Toastr::success('Cadastrado com sucesso', 'Cliente', ["positionClass" => "toast-top-right"]);
        return redirect('clientes');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.formedit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $cliente = Cliente::find($id);
        $cliente->update($data);
        Toastr::success('Atualizado com sucesso', 'Cliente', ["positionClass" => "toast-top-right"]);
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->delete();
        Toastr::success('Registro excluído com sucesso', 'Cliente', ["positionClass" => "toast-top-right"]);
        return response()->json(['success' => true]);
    }
}
