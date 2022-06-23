<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsertTest extends TestCase
{
    //** @tests */
    function test_it_creates_a_new_champ(){
        $this->post('/usuarios/nuevo',[
            'nameChamp'=>'Zed',
            'descripcion'=>'un asesino mamalon',
            'posicion'=>'mid',
            'rolChamp'=>'asesino'
        ])->assertSee('parece que todo esta bien');
    }
}
