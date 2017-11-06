<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
	// to rest database after each test
	use RefreshDatabase;

	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testBasicTest()
	{
		// Let's set up a test for the archive method on Post.php

		// given that I have a post created this month ('created_at' will be NOW() )
		$first = factory(Post::class)->create();
		// and also a post created last month
		// (override the defaults with an array that subtracts a month using Carbon)
		$second = factory(Post::class)->create([
			'created_at' => \Carbon\Carbon::now()->subMonth()
		]);

		// When I fetch the archives
		$posts = Post::archives();

		// Then the response should be in the proper format
		// I expect an array of arrays that were returned from calling archives() 
		// and we will compare against $posts
		$this->assertEquals([
			[
				'year' => $first->created_at->format('Y'),
				'month' => $first->created_at->format('F'),
				'published' => 1
			],
			[
				'year' => $second->created_at->format('Y'),
				'month' => $second->created_at->format('F'),
				'published' => 1
			]
		], $posts);
	}
}
