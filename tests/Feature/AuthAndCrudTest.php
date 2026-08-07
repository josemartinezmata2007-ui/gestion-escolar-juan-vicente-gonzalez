<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthAndCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_and_access_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@demo.com',
            'password' => 'secret123',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@demo.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_create_representative_and_inscription(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $repResponse = $this->post('/representantes', [
            'nombre' => 'Carlos',
            'apellido' => 'Pérez',
            'cedula' => '12345678',
            'telefono' => '04141234567',
            'email' => 'carlos@demo.com',
            'direccion' => 'Caracas',
        ]);

        $repResponse->assertRedirect('/representantes');
        $this->assertDatabaseHas('representantes', [
            'email' => 'carlos@demo.com',
        ]);

        $inscriptionResponse = $this->post('/inscripciones', [
            'representante_id' => 1,
            'nombre' => 'Ana',
            'apellido' => 'Pérez',
            'cedula' => '87654321',
            'grado' => '6to',
            'curso' => 'Matemática',
            'fecha_inscripcion' => '2026-08-07',
            'estado' => 'activa',
            'observaciones' => 'Primera inscripción',
        ]);

        $inscriptionResponse->assertRedirect('/inscripciones');
        $this->assertDatabaseHas('inscripciones', [
            'cedula' => '87654321',
        ]);
    }
}
