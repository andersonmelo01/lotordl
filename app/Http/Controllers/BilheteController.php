<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use App\Models\Premio;
use App\Models\Sorteio;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Event\TestSuite\Sorted;

class BilheteController extends Controller
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
    public function GerarBilhete(Request $request)
    {
        $qt = $request->qt_bilhete;
        for ($i=0; $i <= $qt; $i++){
            Bilhete::create([
                'numero' => rand(1000000000,2000000000),
                'id_sorteio' => $request->id_sorteio,
                'status' => 'ativo',
                'descricao' => $request->descricao,
                'valor' => $request->valor,
                //'id_user' => $request->id_user,
            ]);
        }
        return back()->with('mensagem', 'Bilhetes gerados com sucesso!');
    }
    public function SortearBilhete(Request $request)
    {
        $bilhete = DB::table('bilhete')->where('id_sorteio', $request->id_sorteio)
            ->whereNotNull('id_user')->get(); //total de usuarios que participaram do sorteio

        $SorteioBilhete = DB::table('bilhete')->where('id_sorteio', $request->id_sorteio)
            ->whereNotNull('id_user')->inRandomOrder()->first(); //sorteia aleatoricamente

        $premiado = $SorteioBilhete;

        $TotalUserBilhete = $bilhete->count(); //total de bilhetes do sorteio

        $DataHora = Carbon::now();
        DB::beginTransaction();
            Premio::create([
                'totalparticipantes' => $TotalUserBilhete,
                'id_user' => $premiado->id_user,
                'id_bilhete' => $premiado->id,
                'numerobilhete' => $premiado->numero,
                'id_sorteio' => $premiado->id_sorteio,
                'datahora' => $DataHora,
                'status' => 'premiado',
            ]); //registrar os premiados

            Sorteio::where('id', $premiado->id_sorteio)->update([
                'status' => 'sorteado',
            ]); //atualizar o campo status da tabela sorteio para premiado
            Bilhete::where('id', $premiado->id)->update([
                'status' => 'premiado',
            ]); //atualizar o campo status do bilhete premiado na tabela bilhete para premiado
        DB::commit();
        return back()->with('mensagem', "Bilhetes com ID: 000,  foi sorteado com sucesso!");
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
