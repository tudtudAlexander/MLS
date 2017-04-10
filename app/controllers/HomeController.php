<?php

class HomeController extends BaseController {

	function getIndex(){
		//$this->getSettings();
		$this->data['page'] = 0;
		
		$this->data['thumbs'] = $this->paginateThumbs($this->data['page']);
		return View::make('index', $this->data);
	
	}

	function getPage(){
		$this->data['page'] = \Input::has('page') ? \Input::get('page') : 1;
		$this->data['page'] = $this->data['page'] * \Config::get('config.per_page');
		$this->data['thumbs'] = $this->paginateThumbs($this->data['page']);

		return View::make('page', $this->data);
	}

	function getArt($id){

		$this->data['thumb'] = $this->getThumbs($id);
		
		return View::make('art', $this->data);
	}
}
