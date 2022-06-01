<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $valor) : Array{
        
        DB::beginTransaction();
        
        $totalBefore = $this->valor ? $this->valor : 0;
        $this->valor += number_format($valor, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                 => 'D',
            'valor'                =>  $valor, 
            'total_before'         => $totalBefore,
            'total_after'          => $this->valor,
            'user_id_transaction',
            'data'                 => date('Ymd'),
        ]);

        if($deposit && $historic){

            DB::commit();

            return[
                'success' => true,
                'message' => 'Sucesso ao fazer o depósito',
            ];
        }else{

            DB::rollback();

            return[
                'success' => false,
                'message' => 'Erro ao tentar fazer o depósito',
            ];
        }
            
    }

    public function saque(float $valor) : Array{
        if($this->valor < $valor)
            return [
                'success' => false,
                'message' => 'Saldo insuficiente',
            ];
        
        DB::beginTransaction();
        
        $totalBefore = $this->valor ? $this->valor : 0;
        $this->valor -= number_format($valor, 2, '.', '');
        $saque = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                 => 'S',
            'valor'                =>  $valor, 
            'total_before'         => $totalBefore,
            'total_after'          => $this->valor,
            'user_id_transaction',
            'data'                 => date('Ymd'),
        ]);

        if($saque && $historic){

            DB::commit();

            return[
                'success' => true,
                'message' => 'Sucesso ao fazer o saque',
            ];
        }else{

            DB::rollback();

            return[
                'success' => false,
                'message' => 'Erro ao tentar fazer o saque',
            ];
        }
    }
}
