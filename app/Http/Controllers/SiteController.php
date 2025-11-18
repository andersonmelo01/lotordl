<?php

namespace App\Http\Controllers;

use App\Mail\EnviarEmailAposta;
use App\Models\Bilhete;
use App\Models\Premio;
use App\Models\Sorteio;
use App\Models\User;
use Countable;
use Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\PseudoTypes\FloatValue;

use function Illuminate\Log\log;
use function Laravel\Prompts\alert;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $usuario = User::where('id', $id)->first();

        return view('adm/update_usuarios', ['usuario' => $usuario]);
    }
    public function home()
    {
        $sorteio = Sorteio::all();
        $premio = Premio::orderBy('id', 'desc')->get();

        return view('home', ['sorteio' => $sorteio, 'premio' => $premio]);
    }
    public function bilhete(Request $request)
    {
       try {
            
            $bilhete = Bilhete::where('id_sorteio', $request->id_sorteio)->get(); // filtra pelo id do sorteio
            
            $TotalBilhete = $bilhete->count(); //total de bilhetes do sorteio

            $Total = DB::table('bilhete')->where('id_sorteio', $request->id_sorteio)
                ->whereNotNull('id_user')->get(); //total de usuarios que participaram do sorteio

            $TotalUserBilhete = $Total->count();
            
            $SorteioBilhete = DB::table('bilhete')->where('id_sorteio', $request->id_sorteio)
                ->whereNotNull('id_user')->inRandomOrder()->first(); //variavel que guarda o sorteio

            $PorcentagemOrigem = DB::table('sorteio')->select('porcentagem')->where('id', $request->id_sorteio)->get();
            //$PorcentagemOrigem = Sorteio::where('id', $request->id_sorteio)->first();
            //$PorcentagemOrigem = $PorcentagemOrigem->porcentagem->get();
             
            $Porcentagem = 0;
            $quantidade = $request->qt_bilhete;
            if ($TotalUserBilhete > 0) {
                $Porcentagem = ($TotalUserBilhete * 100) / $quantidade;
            }

            if ($bilhete) {
                return view('adm.bilhete', [
                    'bilhete' => $bilhete,
                    'TotalBilhete' => $TotalBilhete,
                    'TotalUserBilhete' => $TotalUserBilhete,
                    'Porcentagem' => $Porcentagem,
                    'SorteioBilhete' => $SorteioBilhete,
                    'PorcentagemOrigem' => $PorcentagemOrigem,
                ]);
            }    
            
        } catch (Exception $e) {
            Log::error('Erro ao tentar Localizar os Bilhetes: ' . $e->getMessage());
            return view('/erro')->with('erro', 'Nenhumm Bilhete Gerado até o momento!  >>' . $e->getMessage());
        }
        
    }
    public function apostar(Request $request)
    {
        $UserSorteado = DB::table('bilhete')->where('id_sorteio', $request->id_sorteio)
                                            ->where('status', 'premiado')->get(); //faz um filtro para verificar todos os bilhetes do sorteio .
        foreach ($UserSorteado as $UserSorteados){
            if ($UserSorteados->status === 'premiado') {
                return redirect('/dashboard')->with('status', 'Como o sorteio já aconteceu, você foi redirecionado para o DASHBOARD!!!');; //('<script>alert("Nenhum Bilhete Valido, Sorteio já aconteceu")</script>');
            }            
        }

        $bilheteUser = DB::table('bilhete')->select('id_user')
            ->where('id', $request->id)->get(); //faz um filtro para verificar se a chave estrangeira do usuario esta associada .

        $bilhetePremiado = DB::table('bilhete')->select('status')
            ->where('id', $request->id)->get(); //faz um filtro para verificar se a chave estrangeira do usuario esta associada .

        foreach ($bilheteUser as $bilheteUse) {
            if ($bilheteUse->id_user != '') {
                //if(preg_replace("/[^0-9.]/", "", $bilhete) !== '') { //verifica se a chave estrangeira é diferente de VAZIO
                return back()->with('indisponivel', 'Bilhete não disponivel!');
            } else { // se a chave estrangeira for diferente de VAZIO pertite que o usuario compre o Bilhete.
                DB::beginTransaction();
                Bilhete::where('id', $request->id)->update([
                    'id_user' => $request->id_user,
                    'status' => 'indisponivel'
                ]); //Apos o usuario realaizar a aposta o bilhete ficará indisponivel

                $usuario = User::find($request->id_user);
                $usuario->decrement('saldo', $request->valor); //Subtrai o valor no saldo atual do usuário
                DB::commit();

                return back()->with('mensagem', 'Aquisição do Bilhete realizado com sucesso!');
            }
        }
        
    }

    public function usuarios()
    {
        $usuario = User::all();

        return view('adm.usuarios', ['usuario' => $usuario]);
    }

    public function AtualizarTipoUsuario(Request $request)
    {
        User::where('id', $request->id)->update([
            'access_level' => $request->level,
        ]);
        return back()->with('mensagem', 'Status do Usuario Atualizado!');
    }

    public function sorteio()
    {
        $sorteio = Sorteio::latest()->take(7)->get(); //somento os 7 ultimos

        return view('adm.sorteio', ['sorteio'=>$sorteio]);
    }
    public function dashboard()
    {
        $sorteio = Sorteio::latest()->take(7)->get(); //somento os 7 ultimos

        return view('dashboard', ['sorteio'=>$sorteio]);
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
}
