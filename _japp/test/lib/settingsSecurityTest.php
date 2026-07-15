<?php
class LibSettingsSecurityTest extends JDbTest
{
	function testObjectInjectionPrevention()
	{
		$maliciousPayload = 'O:8:"stdClass":1:{s:4:"test";s:5:"value";}';
		
		jf::$Settings->SaveGeneral("malicious_setting", $maliciousPayload);
		
		$result = jf::LoadGeneralSetting("malicious_setting");
		
		$this->assertNotInstanceOf('stdClass', $result);
		$this->assertFalse(is_object($result));
	}
	
	function testPrimitiveTypesStillWork()
	{
		jf::SaveGeneralSetting("string_test", "test_value");
		$this->assertEquals("test_value", jf::LoadGeneralSetting("string_test"));
		
		jf::SaveGeneralSetting("int_test", 42);
		$this->assertEquals(42, jf::LoadGeneralSetting("int_test"));
		
		jf::SaveGeneralSetting("bool_test", true);
		$this->assertTrue(jf::LoadGeneralSetting("bool_test"));
		
		jf::SaveGeneralSetting("array_test", array("a", "b", "c"));
		$this->assertEquals(array("a", "b", "c"), jf::LoadGeneralSetting("array_test"));
	}
}
