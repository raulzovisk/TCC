<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function register(UserRequest $request): JsonResponse
    {
        // Iniciar a transação
        DB::beginTransaction();

        try {

            // Cadastrar usuário no banco de dados
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retorna os dados do usuário criado e uma mensagem de sucesso com status 201
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!",
            ], 201);
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não cadastrado!",
            ], 400);
        }
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {

        // Iniciar a transação
        DB::beginTransaction();

        try {

            // Editar o registro no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retorna os dados do usuário editado e uma mensagem de sucesso com status 200
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário editado com sucesso!",
            ], 200);
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não editado!",
            ], 400);
        }
    }

    public function logout(User $user): JsonResponse
    {
        try{

            $user->tokens()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Deslogado com sucesso.',
            ], 200);

        } catch (Exception $e){

            return response()->json([
                'status' => false,
                'message' => 'Não deslogado.',
            ], 400);

        }
    }
}
