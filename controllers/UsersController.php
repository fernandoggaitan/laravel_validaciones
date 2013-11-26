<?php

class UsersController extends BaseController {
    public function index() {
        $users = User::all();
        return View::make('users.index')->with('users', $users);
    }
    public function show($id) {
        $user = User::find($id);
        return View::make('users.show')->with('user', $user);
    }
    public function create() {
        $user = new User();
        return View::make('users.save')->with('user', $user);
    }
    public function store() {
        $user = new User();
        $user->real_name = Input::get('real_name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->level = Input::get('level');
        $user->active = true;
        $validator = User::validate(array(
            'real_name' => Input::get('real_name'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'level' => Input::get('level'),
        ));
        if($validator->fails()){
            $errors = $validator->messages()->all();
            $user->password = null;
            return View::make('users.save')->with('user', $user)->with('errors', $errors);
        }else{
            $user->save();
            return Redirect::to('users')->with('notice', 'El usuario ha sido creado correctamente.');
        }
    }
    public function edit($id) {
        $user = User::find($id);
        return View::make('users.save')->with('user', $user);
    }
    public function update($id) {
        $user = User::find($id);
        $user->real_name = Input::get('real_name');
        $user->email = Input::get('email');
        $user->level = Input::get('level');
        $validator = User::validate(array(
            'real_name' => Input::get('real_name'),
            'email' => Input::get('email'),
            'password' => $user->password,
            'level' => Input::get('level'),            
        ), $user->id);
        if($validator->fails()){
            $errors = $validator->messages()->all();
            $user->password = null;
            return View::make('users.save')->with('user', $user)->with('errors', $errors);
        }else{
            $user->save();
            return Redirect::to('users')->with('notice', 'El usuario ha sido modificado correctamente.');
        }
    }
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return Redirect::to('users')->with('notice', 'El usuario ha sido eliminado correctamente.');
    }
}
?>
