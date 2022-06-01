<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Historic extends Model
{
    protected $fillable = [
        'type', 'valor', 'total_before', 'total_after', 'user_id_transaction', 'data'
    ];

    public function type($type = null){
        $types = [
            'D' => 'Depósito',
            'S' => 'Saque',
        ];

        if(!$type)
            return $types;
        
        return $types[$type];
    }

    public function getDataAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeUserAuth(){
        return $query->where('user_id', auth()->user()->id);
    }

    public function search(Array $data, $totalPage){
        
         $historics = $this->where(function($query) use ($data){
            
            if(isset($data['id']))
                $query->where('id', $data['id']);
            
            if(isset($data['data']))
                $query->where('data', $data['data']);
            
            if(isset($data['type']))
                $query->where('type', $data['type']);
        })
        //->toSql(); dd($historics);
        //->where('user_id', auth()->user()->id)
        ->userAuth()
        ->paginate($totalPage);

        return $historics;
    }
}
