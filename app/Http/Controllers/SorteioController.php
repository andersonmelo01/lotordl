<?php

namespace App\Http\Controllers;

use App\Models\Sorteio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SorteioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CasdastroSorteio(Request $request)
    {
        Sorteio::create([
            'descricao' => $request->descricao,
            'premio' => $request->premio,
            'valor' => $request->valor,
            'status' => $request->status,
            'qt_bilhete' => $request->quantidade,
            'porcentagem' => $request->porcentagem,
            'datahora' => $request->datahora,
        ]);
        return back()->with('mensagem', 'Sorteio Cadastrado com sucesso!');
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
}
