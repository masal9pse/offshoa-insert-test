<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\UtilController;

//ini_set('display_errors', "On");

class TitleTest extends TestCase
{
 public function testSearchTitle()
 {
  $title = UtilController::searchFormStatic();
  $this->assertSame($title, '検索フォーム');
  $this->assertNotSame($title, '検索フォームだおおおおおお');
 }
}
