<?php

use WPC\Adapters\Cache;

final class CacheTest extends WP_UnitTestCase {

	public function testCacheSet () : void {
		$result = (new Cache())->set('test_cache', 'test_value', 3600);

		$this->assertTrue($result);
	}

	public function testCacheGet () : void {
		$result = (new Cache())->get('test_cache');

		$this->assertSame('test_value', $result);
	}

	public function testCacheDelete () : void {
		$result = (new Cache())->delete('test_cache');

		$this->assertTrue($result);
	}
}
