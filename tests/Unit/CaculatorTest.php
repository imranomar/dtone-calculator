<?php

namespace Tests\Unit;

use App\Cts;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaculatorTest extends TestCase
{
  use RefreshDatabase; //migrate new database ( in memory sqlite in phpunit conf file )

  public function setUp(): void
    {
      parent::setUp();

      //Lets do this right
      //$this->withHeader('HTTP_CONTENT_TYPE','application/json');
      $this->withHeader('HTTP_ACCEPT','application/json');
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testAdd()
    {
      $data_sent = [
        'num1' => "2",
        'num2' => "3",
      ];

      $data_received = 5;

      $result = $this->post(route('add'), $data_sent)->assertStatus(Cts::HTTP_STATUS_OK)->content();
      $this->assertTrue($result==$data_received);
    }

  public function testMul()
  {
    $data_sent = [
      'num1' => "2",
      'num2' => "3",
    ];

    $data_received = 6;

    $result = $this->post(route('mul'), $data_sent)->assertStatus(Cts::HTTP_STATUS_OK)->content();
    $this->assertTrue($result==$data_received);
  }

  public function testFac()
  {
    $data_sent = [
      'num1' => "4",
    ];

    $data_received = 24;

    $result = $this->post(route('fac'), $data_sent)->assertStatus(Cts::HTTP_STATUS_OK)->content();
    $this->assertTrue($result==$data_received);
  }

  public function testFacBig()
  {
    $data_sent = [
      'num1' => "999999",
    ];

    $data_received = "Enter a number a positive integer less than 170";

    $result = $this->post(route('fac'), $data_sent)->assertStatus(Cts::HTTP_UNPROCESSABLE_ENTITY)->content();
    $this->assertTrue($result==$data_received);
  }

  public function testDivMissing1stOperand()
  {
    $data_sent = [
      'num2' => "8",
    ];

    $data_received = 'The num1 field is required';

    $result = $this->post(route('fac'), $data_sent)->assertStatus(Cts::HTTP_UNPROCESSABLE_ENTITY)->content();

    $this->assertContains($data_received,$result);
  }

  public function testDivByZero()
  {
    $data_sent = [
      'num1' => "8",
      'num1' => "0",
    ];

    $data_received = "Division by zero";

    $result = $this->post(route('div'), $data_sent)->assertStatus(Cts::HTTP_INTERNAL_SERVER_ERROR)->content();
    $this->assertTrue($result==$data_received);
  }

  //MORE TESTS
  //===============

  //decimal numbers
  //negative numbers
  //pow with large numberg
}
