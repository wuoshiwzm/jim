<?php

class NewsCateController extends CommonController {

  public function __construct()
  {
      parent::__construct();
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    // die('test');




    $cateInfo = Source_News_NewsCate::orderBy('news_cate_id','desc');
    //
    // foreach ($cateInfo as $k => $v) {
    // if($v->news_cate_pid == 0){
    //
    //   $v->news_cate_pname = '顶级分类';
    // }else{
    //   $v->news_cate_pname = Source_News_NewsCate::where('news_cate_id',$v->news_cate_pid)->first()->news_cate_name;
    //
    // }
    // }

    $name = trim(Input::get('keyword'));
    if( $name )
    {
        $cateInfo->where('news_cate_name','like','%'.$name.'%');
    }
    $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
    $data = $cateInfo->paginate($setPage);
    $set['name'] = $name;
    $set['setpage'] = $setPage;
		return $this->view('admin.news.newscate',compact('data','set'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $cateName = Source_News_NewsCate::where('news_cate_deepth','<',2)->select('news_cate_name','news_cate_id')->get();
		return $this->view('admin.news.newscate_add',compact('cateName'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}


  public function add(){
    // if
    $input = Input::all();
    if($input['news_cate_pid'] == 0){
      $input['news_cate_deepth'] = 0;
      Source_News_NewsCate::create($input);
      return  Redirect::back();
    }
    $parent_deepth = Source_News_NewsCate::where('news_cate_id',$input['news_cate_pid'])->first()->news_cate_deepth;
    $input['news_cate_deepth'] = $parent_deepth+1;
    $res = Source_News_NewsCate::create($input);
    return  Redirect::back();
  }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $id = decode( trim($id) );
    $data = Source_News_NewsCate::findOrFail( $id );
    $cateName = Source_News_NewsCate::where('news_cate_deepth','<',2)->select('news_cate_name','news_cate_id')->get();
    dd($cateName);
    $this->view('admin.news.newscate_edit',compact('data','cateName'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    $input = trimValue( Input::except('_token') );

    $validator = NewsCate::validatorBrand( $input );
    $id = decode( trim($id) );
    if( $validator === true )
    {

        $input = array_except( $input, ['_token','_method'] );
        $res = Source_News_NewsCate::where('news_cate_id',$id)->update( $input );

        if ( $res )
        {
            //修改成功
            return Redirect::to('admin/newscate')->with('msg','修改成功');

        }else
        {
            //修改失败
            return Redirect::back()->with('msg','修改失败');
        }

    }else
    {
        return Redirect::back()->withErrors($validator);
    }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
          $id = decode( trim($id) );
          $res = Source_News_NewsCate::find( $id );
          // return 'test';
          if( $res )
          {

              if( $res->delete() )
              {
                  $obj = new stdClass();
                  $obj->status = 0;
                  $obj->msg = '删除成功';
                  return json_encode($obj);

              }else
              {
                  $obj = new stdClass();
                  $obj->status = 1;
                  $obj->msg = '删除失败';
                  return json_encode($obj);
              }
          }else
          {
              $obj = new stdClass();
              $obj->status = 1;
              $obj->msg = '没有这个分类？删除失败';
              return json_encode($obj);
          }
    }


	}
