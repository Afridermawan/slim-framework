<?php 

namespace App\Models;

class ArticleModel extends AbstractModel
{
	protected $table = 'articles';

	public function add(array $data)
	{
		$data = [
			'title'		=> $data['title'],
			'content'	=> $data['content'],
			'image'		=> $data['image'],
			'publish_date' 	=> $data['publish_date'],
			'user_id'	=> 1,
			'created'	=> date('Y-m-d H:i:s'),
			'updated'	=> date('Y-m-d H:i:s'),
		];

		$this->createData($data);
	}
}
    