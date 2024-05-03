<?php

namespace App\Actions\Fortify;

use App\Models\Cliente;
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
            'apellidos' => ['required', 'string'],
            'username' => ['required', 'string'],
            'telefono' => ['required', 'string', 'regex:/[6|7][0-9]{8}/'],
            'fechaNacimiento' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'nombre' => $input['nombre'],
            'apellidos' => $input['apellidos'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $cliente = Cliente::create([
            'username' => $input['username'],
            'telefono' => $input['telefono'],
            'fechaNacimiento' => $input['fechaNacimiento'],
            'user_id' => $user->id
        ]);

        return $user;
    }
}
