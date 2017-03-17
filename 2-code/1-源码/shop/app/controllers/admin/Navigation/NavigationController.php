<?php
/**
 * Author:Tonychang
 * Date: 2016-12-30
 * Time: 22:31
 * DES:
 */
class NavigationController extends  CommonController
{

    /**
     * 菜单首页
     */
    public function  getIndex()
    {
        $navigations = Navigation::getNavigationList();
        $this->view("admin.navigation.index",compact('navigations'));
    }
    /**
     * 添加页面
     */
    public function  getAdd()
    {
        $navigations = Navigation::getNavigationList();
        //获取所有
        $this->view("admin.navigation.add",compact("navigations"));
    }

    /**
     * 添加保存
     */
    public function postSave()
    {
        $res =  $this->_validate();
        if ($res["status"] == 1) {
            return Redirect::back()->with('msg',$res["error"]);
        }
        $result = Navigation::addNavigation($res["data"]);
        if($result["status"] == 0) {
            return Redirect::back()->with('msg','添加成功');
        }else {
            return Redirect::back()->with('msg',$result['msg']);
        }
    }

    /**
     *保存编辑
     */
    public function postUpdate()
    {
        $res = $this->_validate();
        if ($res["status"] == 1) {
            return Redirect::back()->with('msg',$res["error"]);
        }
        if ($res['status'] == 0) {
            /* 若修改时所选父权限为自身，则复制一份在其自身导航下，否则，正常修改 */
            if ($res['data']['navigation_id'] == $res['data']['parent_id']) {
                unset($res['data']['navigation_id']);
                $parent = Navigation::getNavigation($res['data']['parent_id']);
                $hid = $parent->hid;
                $res["data"]["hid"] = $hid;
                Navigation::addNavigation($res["data"]);
            } else {
                Navigation::updateByID($res["data"],$res['data']['navigation_id']);
            }
            return Redirect::back()->with('msg','编辑成功');
        }
    }

    /**
     * 编辑
     */
    public function getEdit()
    {
        $n_id = (int)Input::get("id");
        $navigations = Navigation::getNavigationList();
        $nav =  Navigation::getNavigation($n_id);
        //获取所有
        $this->view("admin.navigation.edit",compact("navigations","nav"));
    }

    /**
     * 保存导航－校验
     */
    private function _validate()
    {
        $res = array('status' => 0, 'error' => null, 'data' => null);

        $res['data'] = array(
            'navigation_id' =>Input::get('navigation_id', 0),
            'parent_id' => Input::get('parent_id', 0),
            'title' => Input::get('title'),
            'link' => Input::get('link_url'),
            'sort' => Input::get('sort_order'),
            'status' => Input::get('status',1),
            'icon' => Input::get('icon'),
            'is_show' =>Input::get("is_show",1)
        );

        /* 数据验证 */
        if (empty($res['data']['title'])) {
            $res['status'] = 1;
            $res['error'] = '菜单名称不能为空';
            return $res;
        }

        /* 构造 hid */
        $hid = '0';
        if ($res['data']['parent_id'] > 0) {
            $parent = Navigation::getNavigation($res['data']['parent_id']);
            $hid = $parent->hid;
        }
        if ($res['data']['navigation_id'] > 0) {
            $hid .= ':' . str_pad($res['data']['navigation_id'], 4, 0, STR_PAD_LEFT);
        }

        /* 编辑状态，不可转移至自身的子孙级菜单下 */
        if ($res['data']['navigation_id'] > 0 && $res['data']['navigation_id'] != $res['data']['parent_id']) {
            $navigation = Navigation::getNavigation($res['data']['navigation_id']);
            if ($hid != $navigation->hid && strpos($hid, $navigation->hid) !== false) {
                $res['status'] = 1;
                $res['error'] = '不可移至自身的下级菜单中';
                return $res;
            }
        }
        $res['data']['hid'] = $hid;
        return $res;
    }

    /**
     * 删除操作
     */
    public function postDelete()
    {
        try{
            //定义返回数据结构
            $res = array("status" => 1);
            $n_id = (int)Input::get("id");
            Navigation::delete($n_id);
        }catch(Exception $e) {
            $res["status"] = 0;
            $res["msg"] = $e->getMessage();
        }
        return Response::json($res);
    }

}