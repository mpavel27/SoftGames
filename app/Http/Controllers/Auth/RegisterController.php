<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;

class RegisterController extends Controller
{
    private function existsUser(string $email)
    {
        try {
            $user = User::select('id', 'email')->where('email', $email)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return false;
        }

        if ($user) {
            return true;
        }
        return false;
    }

    public function register(RegisterRequest $request)
    {
        if ($request->validated()) {
            if ($this->existsUser($request->email)) {
                toastr()->error('E-mail-ul pe care l-ați introdus este deja folosit.');
                return redirect()->back();
            }
            $create = User::create($request->except(['_token', 'repassword']));
            if ($create) {
                Auth::login($create);
                $pterodactyl = new ApiController();
                $createPterodactyl = $pterodactyl->createAccount([
                    'username' => "{$request->first_name}_{$request->last_name}",
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'password' => $request->password
                ], 'users');
                if(isset($createPterodactyl->object) && $createPterodactyl->object == 'user') {
                    $create->pterodactyl_id = $createPterodactyl->attributes->id;
                    $create->pterodactyl_uuid = $createPterodactyl->attributes->uuid;
                    $create->pterodactyl_username = $createPterodactyl->attributes->username;
                    $create->save();
                    toastr()->success('Te-ai înregistrat cu succes!');
                } else {
                    $create->delete();
                    toastr()->error('Ceva nu a mers bine! #0-51');
                }
            }
        }
        return redirect('/');
    }
}
