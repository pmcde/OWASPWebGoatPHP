<?php
jf::import("jf/test/lib/rbac/baseSecurityTest");
class LibRbacPermissionsSecurityTest extends LibRbacBaseSecurityTest
{
	protected function Instance()
	{
		return jf::$RBAC->Permissions;
	}

	protected function Type()
	{
		return "permission";
	}
}
