<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class Item extends Controller
{
    public $model;
    public $request;
    public function _initialize()
    {
        parent::_initialize();
        header('Access-Control-Allow-Origin: http://localhost:8080');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId");
        $this->model=model('Item');
        $this->request=Request::instance();
    }
    public function putItem()
    {
        // return 'ERR';
        $req='';$res='';$ret='';
        $req=$this->request->param('item');
        if(!$req) return 'No data';

        $req=\json_decode($req,true);
        
        $req['imageCollects']='';$req['tagId']='';

        if(\count($req['pictures'])>0)
            foreach ($req['pictures'] as $value) {
                $req['imageCollects'].=($value.',');
            }
        else $req['imageCollects']='0,';
        $req['imageCollects']=substr($req['imageCollects'],0,-1);

        foreach ($req['tags'] as $value) {
            $req['tagId'].=($value.',');
        }
        $req['tagId']=substr($req['tagId'],0,-1);
        // var_dump($req);exit;
        $res = $this->model->putItem($req);
        return $res;
    }
    public function getItem()
    {
        $req='';$res='';$ret='';

        $req=$this->request->param('itemId');
        if(!$req) return 'no data';
        
        $res=$this->model->getItem($req);
        $res['tags']=explode(',',$res['tags']);
        $res['images']=explode(',',$res['images']);
        
        $ret=json_encode($res);
        
        return $ret;
    }
    public function getList()
    {
        $req=$this->request->param('queryList');

        if(!$req) return 'no data';
        $req=json_decode($req,true);
        $pageSrch=$req['page'];
        $wordSrch="";
        if (isset($req['keyword']))
            $wordSrch=$req['keyword'];
        unset($req['page']);unset($req['keyword']);
        if(isset($req['time']))
        {
            $req['publish_time']=$req['time'];
            unset($req['time']);
        }
        $res=$this->model->getList($pageSrch,$wordSrch,$req);

        return json_encode($res);
    }
}