<?php

class NewsCateController extends CommonController {



    protected $layout = 'layouts.admin_news';


    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

    public function view($path, $data = [])
    {
        $this->layout->content = View::make( $path, $data );
    }




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
        //新闻分类MODEL 对应表 shop_blog_category
        $cateInfo = Source_News_NewsCate::orderBy('id','desc');

        $name = trim(Input::get('keyword'));
        if( $name )
        {
            $cateInfo->where('name','like','%'.$name.'%');
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
        $cateName = Source_News_NewsCate::where('deepth','<',2)->select('name','id')->get();
		return $this->view('admin.news.newscate_add',compact('cateName'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
     * 存取新闻分类 信息
	 */
	public function store()
	{

        $input = Input::all();
            //pid = 0 为顶级目录
        if($input['pid'] == 0){
            $input['deepth'] = 0;
            Source_News_NewsCate::create($input);
            return  Redirect::to('admin/newscate');
        }

        //如果非顶级目录，层级属性deepth+1
        $parent_deepth = Source_News_NewsCate::where('id',$input['pid'])->first()->news_cate_deepth;
        $input['news_cate_deepth'] = $parent_deepth+1;
        $res = Source_News_NewsCate::create($input);
        return  Redirect::to('admin/newscate');

	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id 新闻分类ID
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

        $cateName = Source_News_NewsCate::where('deepth','<',2)
            ->where('id','!=',$id)->select('name','id')->get();

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
        $input = trimValue( Input::except('_token','_method'));
        $validator = NewsCate::validatorNewsCate( $input );
        $id = decode( trim($id) );
        if( $validator === true )
        {

            $res = NewsCate::update($id,$input);

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

        $res = NewsCate::find( $id );

        // 判断是否有该分类
        if( $res )
        {
            //判断是否有子分类
            if(NewsCate::findChild($id)->count()){
                $obj = new stdClass();
                $obj->status = 1;
                $obj->msg = '删除失败!有子分类未删除!';
                return json_encode($obj);
            }


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
