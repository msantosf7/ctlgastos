<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateProfileFormRequest;
use App\Models\User;

class UsersController extends Controller{

    private $objUser;

    public function __construct(){
        $this->objUser = new User();
    }

    public function index(){
        $user = $this->objUser->all();
        return view('admin.user.index', compact('user'));
    }

    public function cadastro(){
        return view('admin.user.cadastro');
    }

    public function show($id){
        $user = $this->objUser->find($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id){
        $user = $this->objUser->find($id);
        return view('admin.user.cadastro', compact('user'));
    }

    public function update(UpdateProfileFormRequest $request, $id){
       $user = $this->objUser->where(['id' => $id])->update([
            'name' => $request->name,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($user)
            return redirect()
                        ->route('admin.clientes')
                        ->with('success', 'Cliente atualizado com sucesso!');
        
        return redirect()
                    ->back()
                    ->with('error', 'Erro ao tentar atualizar o cliente!');
    }

    public function store(UpdateProfileFormRequest $request){
        
        $user = $this->objUser->create([
            'name' => $request->name,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($user)
            return redirect()
                        ->route('admin.clientes')
                        ->with('success', 'Novo cliente cadastrado com sucesso!');
        
        return redirect()
                    ->back()
                    ->with('error', 'Erro ao tentar cadastro o novo cliente!');
    }

    public function destroy($id){
        $user = $this->objUser->findOrFail($id);
        $user->delete();

        if($user)
        return redirect()
                    ->route('admin.clientes')
                    ->with('success', 'Cliente excluido com sucesso!');
    
        return redirect()
                ->back()
                ->with('error', 'Erro ao tentar excluir cliente!');
    }

    
    public function profile(){
        return view('admin.user.profile');
    }
    
    public function updateProfile(UpdateProfileFormRequest $request){
        $user = auth()->user();
        
        $data = $request->all();
        //dd($data = $request->all());

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);
        
        /*$data['imagem'] = $user->image;
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            if($user->imagem){
                $name = $user->imagem;
                unlink(url('storage/users/'.$user->imagem));   
            }else{
                $name = $user->id.Str::kebab($user->email);
            }

            $extenstion = $request->imagem->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['imagem'] = $nameFile;

            $upload = $request->imagem->storeAs('public/users', $nameFile);
            
            if(!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer o upload da imagem!');
            
        }*/

        $update = $user->update($data);

        if($update)
            return redirect()
                        ->route('clientes.profile')
                        ->with('success', 'Sucesso ao atualizar os dados!');
        
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao tentar atualizar os dados!');
    }   
}
