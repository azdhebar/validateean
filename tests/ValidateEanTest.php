<?php 
namespace AZDhebar\ValidateEan\Test;

use PHPUnit\Framework\TestCase;
use AZDhebar\ValidateEan\ValidateEan;
class ValidateEanTest extends TestCase{

    /**@test */
    public function test_validateEan8_right()
    {
        $validateEan  = ValidateEan::validateEan(76543210);
        $this->assertEquals(1,$validateEan);
    }
    public function test_validateEan8_wrong()
    {
        $validateEan  = ValidateEan::validateEan(76543211);
        $this->assertEquals(0,$validateEan);
    }

    public function test_validateEan13_right()
    {
        $validateEan  = ValidateEan::validateEan(2225002000003);
        $this->assertEquals(1,$validateEan);
    }

    public function test_validateEan13_wrong()
    {
        $validateEan  = ValidateEan::validateEan(2225002000005);
        $this->assertEquals(0,$validateEan);
    }
}

?>