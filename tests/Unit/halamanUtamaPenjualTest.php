<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Request;
use Tests\TestCase;

class halamanUtamaPenjualTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // private $user =
    public function test_1()
    {
        $this->post('/Login/penjual', [
            'username'     => "penjual3",
            'password'  => 'password',
        ])->assertRedirect("/");
    }

    public function test_2()
    {
        $res = $this->post('/Login/penjual', [
            'username'     => "penjual1",
            'password'  => 'password',
        ]);
        $res->assertRedirect("/HalamanUtamaPenjual");
        $res->assertDontSee("Tersedia");
        $res->assertDontSee("Tidak Tersedia");
    }

    public function test_3()
    {
        $res = $this->post('/Login/penjual', [
            'username'     => "penjual1",
            'password'  => 'password',
        ]);
        $res->assertRedirect("/HalamanUtamaPenjual");
        $res->assertDontSeeText("Gerai Kosong");
    }
}