<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CentroAyudaTest extends TestCase
{

    /**
     * A show function
     *
     * @return void
     */
    public function testShow()
    {
        $crawler = static::$client->request('GET', '/fac/pase-a/obse/120', array());
        //echo static::$client->getResponse()->getContent(); die;
        $this->assertContains('error', static::$client->getResponse()->getContent());
        $this->assertTrue(true);
    }

    /**
     * A update function
     *
     * @return void
     */
    public function testUpdate()
    {
        $this->assertTrue(true);
    }

    /**
     * A validarAverageGeneral function
     *
     * @return void
     */
    public function testValidarAverageGeneral()
    {
        $this->assertTrue(true);
    }

    /**
     * A update function
     *
     * @return validarVoters
     */
    public function testValidarVoters()
    {
        $this->assertTrue(true);
    }
}