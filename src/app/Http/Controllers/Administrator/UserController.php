<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Model\Page;
use App\Model\Seo;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function foo\func;

class UserController extends Controller
{
//    public function Index() {
//
//        $item = Auth::user();
//        return view('administrator.user.index', ['item' => $item]);
//    }

    public function Edit() {

        if(request()->method() == 'POST') {

            $form_post = request()->all();

            $id_auth_user = Auth::user()->id_user;
            $user = User::find($id_auth_user);

            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('user')->ignore($user->id_user, 'id_user')],
                'password' => ['required', 'string', 'min:5'],
                'password_confirm' => ['required', 'same:password'],
            ]);

            DB::transaction(function() use ($form_post, $user){

                if(!$user) {
                    dd('katastrofa ');
                }

                $user->name = $form_post['name'];
                $user->email = $form_post['email'];
                $user->password = Hash::make($form_post['password']);

                $user->save();

                request()->session()->flash('status', 'Pomyślnie zaktualizowano użytkownika!');
                request()->session()->flash('alert-class', 'success');

            });

            return redirect(route('administrator.user.edit'));
        }
        else {

            $id_auth_user = Auth::user()->id_user;
            $user = User::find($id_auth_user);

            return view('administrator.user.edit', ['item' => $user]);
        }
    }

}
