<?php

class MainController
{

	/*
	*Главный экшен метод просмотра главной страницы
	*/
	public function actionView()
	{
		$title = 'BeatStore';
		
		require_once(ROOT.'/views/main/index.php');

		return true;
	}

	/*
	*Редирект
	*/
	public static function actionStart(){
		$url = '/main';
		header('Location: '.$url);
	}

}