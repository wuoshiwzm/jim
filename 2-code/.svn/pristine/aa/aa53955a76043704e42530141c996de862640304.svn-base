<?php

class BaseController extends Controller
{
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * @param $path
	 * @param array $data
	 * 模板输出
	 */
	protected function view($path, $data = [])
	{
		$this->layout->content = View::make($path, $data);
	}
}
