<?php 

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\ArticleModel;

class ArticleController extends AbstractController
{
	public function index(Request $request, Response $response)
	{
		return $this->view->render($response, 'article/index.twig');
	}

	public function articles(Request $request, Response $response)
	{
		$article = new ArticleModel($this->db);

		$dataArticle = $article->getAll();

		$data['article'] = $dataArticle;

		return $this->view->render($response, 'article/articles.twig', $data);
	}
}