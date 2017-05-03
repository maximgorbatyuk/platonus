<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        $instances = User::all();
        return view('admin.users.index', ['instances'=>$instances]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes())
        {
            $user = new User();
            $user->name  = Input::get('name');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');

            $user->save();
            flash('Пользователь создан', Constants::Success);
            return redirect('/admin/users');
        }
        flash('Обнаружены проблемы валидации', Constants::Error);
        return redirect('/')
            ->withErrors($validator->errors());
    }

    public function show($id)
    {
        $instance = User::find($id);
        return view('admin.users.show', ['instance'=>$instance]);
    }

    public function edit($id)
    {
        throw new NotFoundHttpException();
    }

    public function update(Request $request, $id)
    {
        throw new NotFoundHttpException();
    }

    public function destroy($id)
    {
        /** @var User $instance */
        $instance = User::find($id);
        $instance->delete();
        return \Redirect::action('DocumentController@index')
            ->with('success', "Пользователь $id был удален");
    }
}
