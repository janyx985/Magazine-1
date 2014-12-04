<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//en la variable $posts almacenamos todos los elementos del modelo Post, para ello se usa el metodo all() 
		$posts = Post::all();
		//pasamos a la vista views/posts/index la variable $posts con el nombre 'posts'
		return View::make('posts.index')->with('posts', $posts);
	}


	/**
	 * Muestra el formulario para crear un nuevo recurso.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = new Post;
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		//$data contiene los datos que serán validados
		$data = Input::all();
		//reglas de validación
		$reglas = array(
			'title' => 'min:5',
			'content' => 'min:5'
			);
		//se almacena el resultado del método Validator en la variable $validador
		$validador = Validator::make($data, $reglas);
		//Si no se cumplen las reglas de validación o si alguno de los campos está vacío
		if ( ( ($validador->fails()) ) or (empty($post['title'])) or (empty($post['content'])) ){
			return 'Los campos deben contener al menos 5 carácteres';
		}
		//si se cumplen las reglas, se almacenan los campos en la BD y se redirige a 'posts'
		if ($validador->passes()){
			$post->save();
			return Redirect::to('posts');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		return View::make('posts.edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$post = Post::find($id);
		$post->title = $input['title'];
		$post->content = $input['content'];
		$post->save();
		return Redirect::to('posts/' . $id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();
		return Redirect::to('posts');
	}


}
