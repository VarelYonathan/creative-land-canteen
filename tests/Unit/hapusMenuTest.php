<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Menu;
// use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;

class hapusMenuTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test1()
    {
        $id = 12;
        $res = $this->post("/Penjual/Menu/Hapus/$id");
        $res->assertRedirect("/HalamanUtamaPenjual");
    }
    public function test2()
    {
        $res = $this->post("/Penjual/Menu/Hapus/-1");
        $res->assertStatus(404);
    }
}