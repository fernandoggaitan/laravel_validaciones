<?php
class User extends Eloquent {    
    public static $rules = array(
        'real_name' => 'required|min:2',
        'email' => 'required|email|unique:users,email,id',
        'password' => 'required',
        'level' => 'required|numeric'
    );
    public static $messages = array(
        'real_name.required' => 'El nombre es obligatorio.',
        'real_name.min' => 'El nombre debe contener al menos dos caracteres.',
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'El email debe contener un formato válido.',
        'email.unique' => 'El email pertenece a otro usuario.',
        'password.required' => 'La contraseña es obligatoria.',
        'level.required' => 'El nivel es obligatorio.',
        'level.numeric' => 'El nivel debe ser numérico.'
    );
    public static function validate($data, $id=null){
        $reglas = self::$rules;
        $reglas['email'] = str_replace('id', $id, self::$rules['email']);
        $messages = self::$messages;
        return Validator::make($data, $reglas, $messages);
    }
}
?>