<?php
   class Post extends AppModel {
 
      public $useTable = 'posts';

      public $validate = array(
			'title'=>array(
				'title_must_not_be_blank'=>array(
					'rule'=>'notEmpty',
					'message'=>'This post is missing a Title'
				),
				'title_must_be_unique'=>array(
					'rule'=>'isUnique',
					'message'=>'A post with this title already exists!'
				)
			),
			'body'=>array(
				'body_must_not_be_blank'=>array(
					'rule'=>'notEmpty',
					'message'=>'This post is missing its body'
				)
			)			
		);
   }
?>