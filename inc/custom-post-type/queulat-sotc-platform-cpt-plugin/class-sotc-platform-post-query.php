<?php

use Queulat\Post_Query;

class Sotc_Platform_Post_Query extends Post_Query {
	public function get_post_type() : string {
		return 'sotc_platform';
	}
	public function get_decorator() : string {
		return Sotc_Platform_Post_Object::class;
	}
	public function get_default_args() : array {
		return [];
	}
}
