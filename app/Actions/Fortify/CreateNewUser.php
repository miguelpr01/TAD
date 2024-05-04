<?php

namespace App\Actions\Fortify;

use App\Models\Direccione;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'telefono' => ['required', 'regex:/[6|7][0-9]{8}/'],
            'fechaNacimiento' => ['required'],
        ])->validate();

        $user =  User::create([
            'nombre' => $input['nombre'],
            'apellidos' => $input['apellidos'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'telefono' => $input['telefono'],
            'fechaNacimiento'=> $input['fechaNacimiento'],
            'rol_id' => 2,
        ]);

        $direccion = Direccione::create([
            "calle"=>$input['calle'],
            "numero"=>$input['numero'],
            "piso"=>$input['piso'],
            "puerta"=>$input['puerta'],
            "codPostal"=>$input['codPostal'],
            "ciudad"=>$input['ciudad'],
            "provincia"=>$input['provincia'],
            'pais' => $input['pais'],
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
