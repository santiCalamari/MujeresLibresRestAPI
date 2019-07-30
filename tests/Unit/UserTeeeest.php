<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase {

    public function testRequiereNicknameyContraseña() {
        $this->json('POST', 'api/login')
                ->assertStatus(422)
                ->assertJson([
                    'nickname' => ['El campo email es requerido.'],
                    'password' => ['El campo contraseña es requerido.'],
        ]);
    }

    public function testUsuarioLogueadoExitoso() {
        $user = factory(User::class)->create([
            'nickname' => 'scalamari',
            'password' => bcrypt('scalamari'),
        ]);

        $payload = ['nickname' => 'scalamari', 'password' => 'scalamari'];

        $this->json('POST', 'api/login', $payload)
                ->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'nickname',
                        'name',
                        'email',
                        'email_verified_at',
                        'created_at',
                        'updated_at',
                        'nickname',
                        'neighborhod',
                        'address',
                        'phone',
                        'cellphone',
                        'rol_id',
                        'es_voluntario',
                    ],
        ]);
    }

    public function testsRegistroExitoso() {
        $payload = [
            'nickname' => 'PeJo',
            'name' => 'Pepe Jose',
            'email' => 'pep@gmail.com',
            'password' => 'pepe123',
            'password_confirmation' => 'pepe123',
            'neighborhod' => 'Centro',
            'address' => 'Juan de Garay 3347',
            'phone' => '03424558540',
            'cellphone' => '0342155135137',
        ];
        $this->json('post', '/api/register', $payload)
                ->assertStatus(201)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'nickname',
                        'name',
                        'email',
                        'email_verified_at',
                        'created_at',
                        'updated_at',
                        'nickname',
                        'neighborhod',
                        'address',
                        'phone',
                        'cellphone',
                        'rol_id',
                        'es_voluntario',
                    ],
        ]);
        ;
    }

    public function testsRequierePasswordEmailYName() {
        $this->json('post', '/api/register')
                ->assertStatus(422)
                ->assertJson([
                    'nickname' => ['El nombre de usuario es requerido.'],
                    'name' => ['El campo nombre es requerido.'],
                    'email' => ['El campo email es requerido.'],
                    'password' => ['El campo contraseña es requerido.'],
        ]);
    }

    public function testsRequiereConfirmacionPassword() {
        $payload = [
            'nickname' => 'pejo',
            'password' => 'pepe123',
            'password_c' => 'pepe456',
        ];
        $this->json('post', '/api/register', $payload)
                ->assertStatus(422)
                ->assertJson([
                    'password' => ['Las contraseñas no coinciden. Vuelva a ingresarlas.'],
        ]);
    }

    public function testUsuarioCerrarSesionExitoso() {
        $user = factory(User::class)->create(['nickname' => 'PeJo']);
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $user = User::find($user->id);
        $this->assertEquals(null, $user->api_token);
    }

    public function testUsuarioTokenNulo() {
        // Simulating login
        $user = factory(User::class)->create(['nickname' => 'PeJo']);
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        // Simulating logout
        $user->api_token = null;
        $user->save();
        $this->json('get', '/api/novedad/todas', [], $headers)->assertStatus(401);
    }

}
