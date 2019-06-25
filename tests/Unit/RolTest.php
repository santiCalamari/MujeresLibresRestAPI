<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RolTest extends TestCase
{

    /**
     * A show function
     *
     * @return void
     */
    public function test0()
    {
        $response = $this->call('GET', 'indexC');
        $this->assertEquals("indexC", $response->getContent());
    }

    public function test1()
    {
        $response = $this->call('GET', 'indexD');
        $this->assertEquals("indexD", $response->getContent());
    }

    public function test2()
    {
        $response = $this->call('GET', 'showD');
        $this->assertEquals("showD", $response->getContent());
    }

    public function test3()
    {
        $response = $this->call('GET', 'storeD');
        $this->assertEquals("storeD", $response->getContent());
    }

    public function test4()
    {
        $response = $this->call('GET', 'updateD');
        $this->assertEquals("updateD", $response->getContent());
    }

    public function test5()
    {
        $response = $this->call('GET', 'deleteD');
        $this->assertEquals("deleteD", $response->getContent());
    }

    public function test6()
    {
        $response = $this->call('GET', 'validarNameD');
        $this->assertEquals("validarNameD", $response->getContent());
    }

    public function test7()
    {
        $response = $this->call('GET', 'validarWebSiteD');
        $this->assertEquals("validarWebSiteD", $response->getContent());
    }

    public function test8()
    {
        $response = $this->call('GET', 'agregarHttpD');
        $this->assertEquals("agregarHttpD", $response->getContent());
    }

    public function test9()
    {
        $response = $this->call('GET', 'showF');
        $this->assertEquals("showF", $response->getContent());
    }

    public function test10()
    {
        $response = $this->call('GET', 'storeF');
        $this->assertEquals("storeF", $response->getContent());
    }

    public function test11()
    {
        $response = $this->call('GET', 'deleteF');
        $this->assertEquals("deleteF", $response->getContent());
    }

    public function test12()
    {
        $response = $this->call('GET', 'validarUserIdF');
        $this->assertEquals("validarUserIdF", $response->getContent());
    }

    public function test13()
    {
        $response = $this->call('GET', 'validarCentroAyudaIdF');
        $this->assertEquals("validarCentroAyudaIdF", $response->getContent());
    }

    public function test14()
    {
        $response = $this->call('GET', 'indexN');
        $this->assertEquals("indexN", $response->getContent());
    }

    public function test15()
    {
        $response = $this->call('GET', 'showN');
        $this->assertEquals("showN", $response->getContent());
    }

    public function test16()
    {
        $response = $this->call('GET', 'storeN');
        $this->assertEquals("storeN", $response->getContent());
    }

    public function test21()
    {
        $response = $this->call('GET', 'updateN');
        $this->assertEquals("updateN", $response->getContent());
    }

    public function test17()
    {
        $response = $this->call('GET', 'deleteN');
        $this->assertEquals("deleteN", $response->getContent());
    }

    public function test18()
    {
        $response = $this->call('GET', 'validarTitleN');
        $this->assertEquals("validarTitleN", $response->getContent());
    }

    public function test19()
    {
        $response = $this->call('GET', 'validarDescriptionN');
        $this->assertEquals("validarDescriptionN", $response->getContent());
    }

    public function test20()
    {
        $response = $this->call('GET', 'validarDateAtN');
        $this->assertEquals("validarDateAtN", $response->getContent());
    }

    public function test22()
    {
        $response = $this->call('GET', 'indexNov');
        $this->assertEquals("indexNov", $response->getContent());
    }

    public function test23()
    {
        $response = $this->call('GET', 'getAllNov');
        $this->assertEquals("getAllNov", $response->getContent());
    }

    public function test24()
    {
        $response = $this->call('GET', 'showNov');
        $this->assertEquals("showNov", $response->getContent());
    }

    public function test25()
    {
        $response = $this->call('GET', 'storeNov');
        $this->assertEquals("storeNov", $response->getContent());
    }

    public function test26()
    {
        $response = $this->call('GET', 'updateNov');
        $this->assertEquals("updateNov", $response->getContent());
    }

    public function test27()
    {
        $response = $this->call('GET', 'deleteNov');
        $this->assertEquals("deleteNov", $response->getContent());
    }

    public function test28()
    {
        $response = $this->call('GET', 'validarTitleNov');
        $this->assertEquals("validarTitleNov", $response->getContent());
    }

    public function test29()
    {
        $response = $this->call('GET', 'validarDescriptionNov');
        $this->assertEquals("validarDescriptionNov", $response->getContent());
    }

    public function test30()
    {
        $response = $this->call('GET', 'validarDateAtNov');
        $this->assertEquals("validarDateAtNov", $response->getContent());
    }

    public function test31()
    {
        $response = $this->call('GET', 'validarIsNewNov');
        $this->assertEquals("validarIsNewNov", $response->getContent());
    }

    public function test32()
    {
        $response = $this->call('GET', 'showCA');
        $this->assertEquals("showCA", $response->getContent());
    }

    public function test33()
    {
        $response = $this->call('GET', 'updateCA');
        $this->assertEquals("updateCA", $response->getContent());
    }

    public function test34()
    {
        $response = $this->call('GET', 'validarAverageGeneralCA');
        $this->assertEquals("validarAverageGeneralCA", $response->getContent());
    }

    public function test35()
    {
        $response = $this->call('GET', 'showO');
        $this->assertEquals("showO", $response->getContent());
    }

    public function test36()
    {
        $response = $this->call('GET', 'storeO');
        $this->assertEquals("storeO", $response->getContent());
    }

    public function test37()
    {
        $response = $this->call('GET', 'validarNameO');
        $this->assertEquals("validarNameO", $response->getContent());
    }

    public function test38()
    {
        $response = $this->call('GET', 'validarAverageO');
        $this->assertEquals("validarAverageO", $response->getContent());
    }

    public function test39()
    {
        $response = $this->call('GET', 'validarUserIdO');
        $this->assertEquals("validarUserIdO", $response->getContent());
    }

    public function test40()
    {
        $response = $this->call('GET', 'validarCentroAyudaIdO');
        $this->assertEquals("validarCentroAyudaIdO", $response->getContent());
    }

    public function test41()
    {
        $response = $this->call('GET', 'updateCentroAyudaO');
        $this->assertEquals("updateCentroAyudaO", $response->getContent());
    }

    public function test42()
    {
        $response = $this->call('GET', 'validarVotersCA');
        $this->assertEquals("validarVotersCA", $response->getContent());
    }

    public function test43()
    {
        $response = $this->call('GET', 'showP');
        $this->assertEquals("showP", $response->getContent());
    }

    public function test44()
    {
        $response = $this->call('GET', 'indexP');
        $this->assertEquals("indexP", $response->getContent());
    }

    public function test45()
    {
        $response = $this->call('GET', 'showR');
        $this->assertEquals("showR", $response->getContent());
    }

    public function test46()
    {
        $response = $this->call('GET', 'register');
        $this->assertEquals("register", $response->getContent());
    }

    public function test47()
    {
        $response = $this->call('GET', 'login');
        $this->assertEquals("login", $response->getContent());
    }

    public function test48()
    {
        $response = $this->call('GET', 'logout');
        $this->assertEquals("logout", $response->getContent());
    }

    public function test49()
    {
        $response = $this->call('GET', 'details');
        $this->assertEquals("details", $response->getContent());
    }

    public function test50()
    {
        $response = $this->call('GET', 'changePassword');
        $this->assertEquals("changePassword", $response->getContent());
    }

    public function test51()
    {
        $response = $this->call('GET', 'voluntario');
        $this->assertEquals("voluntario", $response->getContent());
    }

    public function test52()
    {
        $response = $this->call('GET', 'actualizarUsuario');
        $this->assertEquals("actualizarUsuario", $response->getContent());
    }

    public function test53()
    {
        $response = $this->call('GET', 'recuperarPassword');
        $this->assertEquals("recuperarPassword", $response->getContent());
    }
}
