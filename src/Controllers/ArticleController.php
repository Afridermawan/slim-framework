<?php 

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\ArticleModel;

class ArticleController extends AbstractController
{
	public function articles(Request $request, Response $response)
	{
		$article = new ArticleModel($this->db);

		$dataArticle = $article->getAll();

		$data['article'] = $dataArticle;

		return $this->view->render($response, 'article/articles.twig', $data);
	}

	public function showById(Request $request, Response $response, $args )
	{
		$article = new ArticleModel($this->db);

		$articleId = $article->getById(isset($args['id']));

		$data['id'] = $articleId;

		return $this->view->render($response, 'article/showById.twig', $data);

	}

	public function getAdd(Request $request, Response $response)
	{
		return $this->view->render($response, 'article/add.twig');
	}

	public function add(Request $request, Response $response)
	{
		$article = new ArticleModel($this->db);

		$this->validation->rule('required', ['title', 'content', 'image']);
		$this->validation->rule('integer', 'user_id');

		if ($this->validation->validate()) {
			$article->add($request->getParams());
			return $response->withRedirect($this->router->pathFor('articles.add'));
		} else {
			$_SESSION['old'] = $request->getParams() ;
			$_SESSION['errors'] = $this->validation->errors();

			return $response->withRedirect($this->router->pathFor('articles.add'));
		}
	}

	public function softDelete(Request $request, Response $response, $args)
	{
		$article = new ArticleModel($this->db);

		$softDelete = $article->softDel($args['id']);

		return $response->withRedirect($this->router->pathFor('articles'));
	}

}