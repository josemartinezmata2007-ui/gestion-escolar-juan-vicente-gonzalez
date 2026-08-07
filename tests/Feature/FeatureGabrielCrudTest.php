<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeatureGabrielCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_inscripciones_index_page_loads(): void
    {
        $response = $this->get('/feature/gabriel/inscripciones');

        $response->assertStatus(200);
    }

    public function test_representantes_index_page_loads(): void
    {
        $response = $this->get('/feature/gabriel/representantes');

        $response->assertStatus(200);
    }

    public function test_can_create_inscripcion(): void
    {
        $response = $this->post('/feature/gabriel/inscripciones', [
            'representante_id' => 1,
            'estudiante_nombre' => 'Gabriel',
            'estudiante_apellido' => 'Pérez',
            'grado' => '5to grado',
            'periodo' => '2026-2027',
            'estado' => 'Pendiente',
            'observaciones' => 'Primer registro de prueba',
            'fecha_inscripcion' => '2026-08-05',
        ]);

        $response->assertRedirect('/feature/gabriel/inscripciones');
        $this->assertDatabaseHas('inscripciones', [
            'estudiante_nombre' => 'Gabriel',
            'periodo' => '2026-2027',
        ]);
    }
}
