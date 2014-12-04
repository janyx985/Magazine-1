<?php
class PostTableSeeder extends Seeder {
	public function run(){
		Post::create(array(
			'title' => 'Creador de Facebook...',
			'content' => 'Mark Zuckeberg habló...'
			));
		Post::create(array(
			'title' => 'Google rediseña la...',
			'content' => 'Se implementaron algunos...'
			));
		Post::create(array(
			'title' => 'Se filtran fotos y...',
			'content' => 'El teléfono será presentado...'
			));
	}
}