<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Historic;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{
    private $totalPage = 4;

    public function index(Historic $historic){

        $balance = auth()->user()->balance;
        $carteira = $balance ? $balance->valor : 0;
        $historics = auth()->user()
                            ->historics()
                            ->paginate($this->totalPage);

        $types = $historic->type();

        return view('admin.balance.index', compact('carteira', 'historics', 'types'));
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request){
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->valor);

        if($response['success'])
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function saque(){
        return view('admin.balance.saque');
    }

    public function saqueStore(MoneyValidationFormRequest $request){       
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->saque($request->valor);

        if($response['success'])
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);

        return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function searchHistoric(Request $request, Historic $historic){
        $dataForm = $request->except('_token');
        $balance = auth()->user()->balance;
        $carteira = $balance ? $balance->valor : 0;

        $historics = $historic->search($dataForm, $this->totalPage);

        $types = $historic->type();

        return view('admin.balance.index', compact('carteira', 'historics', 'types','dataForm'));
    }

}
