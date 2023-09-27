<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all()->count();
        $clientes = Cliente::all()->count();
        $vendas = Venda::all()->count();
        return view('dashboard.dashboard', compact('produtos', 'clientes', 'vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function totalProdutosCadastrado()
    {

    }
}
