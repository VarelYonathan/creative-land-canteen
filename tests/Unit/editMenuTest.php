<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;

class editMenuTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test1()
    {
        $this->post("/Penjual/Menu/Edit/1", [
            'idMenu' => 1,
            'namaMenu'     => "Menu Edit",
            'hargaMenu'  => '10000',
            'gerai' => 1
        ])->assertRedirect("/Penjual/Menu/1");
    }
    public function test2()
    {
        $this->post("/Penjual/Menu/Edit/1", [
            'idMenu' => 1,
            'namaMenu'     => "Menu Edit",
            'hargaMenu'  => '10000'
        ])->assertRedirect("/HalamanUtamaPenjual");
    }
}