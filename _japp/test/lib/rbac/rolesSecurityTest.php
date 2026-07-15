<?php
jf::import("jf/test/lib/rbac/baseSecurityTest");
class LibRbacRolesSecurityTest extends LibRbacBaseSecurityTest
{
	protected function Instance()
	{
		return jf::$RBAC->Roles;
	}

	protected function Type()
	{
		return "role";
	}
}
