<?php
abstract class LibRbacBaseSecurityTest extends JDbTest
{
	function setUp()
	{
		parent::setUp();
	}

	protected abstract function Instance();

	protected abstract function Type();

	function testAddPathRejectsInvalidPath()
	{
		$this->setExpectedException("\\Exception", "Path must start with /");
		$this->Instance()->AddPath("invalid/path/without/leading/slash");
	}

	function testAddPathAcceptsValidPath()
	{
		$ID = $this->Instance()->AddPath("/valid/path");
		$this->assertGreaterThan(1, $ID);
		$this->assertEquals($ID, $this->Instance()->PathID("/valid/path"));
	}

	function testAddPathRejectsEmptyString()
	{
		$this->setExpectedException("\\Exception", "Path must start with /");
		$this->Instance()->AddPath("");
	}

	function testAddPathRejectsRelativePath()
	{
		$this->setExpectedException("\\Exception", "Path must start with /");
		$this->Instance()->AddPath("../../../etc/passwd");
	}
}
