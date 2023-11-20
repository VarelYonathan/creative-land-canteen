<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Menu;
use Faker\Factory;
// use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;

class hapusMenuTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_that_true_is_true()
    // {
    //     $this->assertTrue(true);
    // }
    public function test1()
    {
        Menu::factory(1)->create();
        $menu = DB::table('menu')->latest('created_at')->first();
        $res = $this->post("/Penjual/Menu/Hapus/$menu->id");
        $res->assertRedirect("/HalamanUtamaPenjual");
    }
    public function test2()
    {
        $res = $this->post("/Penjual/Menu/Hapus/-1");
        $res->assertStatus(404);
    }
}