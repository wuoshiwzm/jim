<?php

class GroupController extends CommonController
{


    protected $layout = 'layouts.member';


    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function view($path, $data = [])
    {
        $this->layout->content = View::make($path, $data);
    }


    /**
     * Display a listing of the resource.
     *显示所有等级信息
     * @return Response
     */
    public function index()
    {

        $groups = Source_User_UserInfoGroup::orderBy('beg_points');
        $setPage = Input::get('setpage') ? Input::get('setpage') : self::$adminPage;
        $data = $groups->paginate($setPage);

        $groups = $groups->get();
        $set['setpage'] = $setPage;
        return $this->view('admin.group.group', compact('data', 'set', 'groups'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->view('admin.group.group_add');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $input = trimValue(Input::all());
        $input = array_except($input, ['_token', 'method']);

        $validator = Group::validatorGroup($input);
        if ($validator === true) {
            $res = Group::addGroup($input);
            if ($res) {
                //添加成功
                return Redirect::to('admin/group')->with('msg', '添加成功');

            } else {
                //添加失败
                return back()->with('msg', '添加失败');
            }

        } else {
            return back()->withErrors($validator);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $group = Group::getGroupById($id);
        $this->view('admin.group.group_edit', compact('group'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = trimValue(Input::all());
//        dd($input);
        $validator = Group::validatorGroup($input);
        if ($validator === true) {

            $input = array_except($input, ['_token', '_method']);
            $res = Group::updateById($id, $input);
            if ($res) {
                //修改成功
                return Redirect::to('admin/group')->with('msg', '修改成功');

            } else {
                //修改失败
                return Redirect::back()->with('msg', '修改失败');
            }

        } else {
            return Redirect::back()->withErrors($validator);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = decode(trim($id));
        $res = Group::deleteById($id);


        if ($res) {
            $obj = new stdClass();
            $obj->status = 0;
            $obj->msg = '删除成功';
            return json_encode($obj);

        } else {
            $obj = new stdClass();
            $obj->status = 1;
            $obj->msg = '删除失败';
            return json_encode($obj);
        }

    }


}
