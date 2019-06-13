<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class LoginForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('Usuario', Field::TEXT, [
                'rules' => 'required'
            ])
            ->add('Contraseña', Field::PASSWORD, [
                'rules' => 'required|min:6'
            ])
            ->add('submit', 'submit', ['label' => 'Iniciar Sesión']
        );
    }
}
