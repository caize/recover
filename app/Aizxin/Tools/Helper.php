<?php

if (! function_exists('foo')) {
    /**
     *  [foo 示例]
     *  izxin.com
     *  @author qingfeng
     *  @DateTime 2016-09-19T11:32:07+0800
     *  @return   [type]                   [description]
     */
    function foo() {
        return "foo";
    }
}
/**
 *  递归迭代无限级分类
 */
if (! function_exists('sort_parent')) {
    /**
     *  [sort_parent description]
     */
    function sort_parent($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $v) {
            if ($v['parent_id'] == $pid) {
                $arr[$key] = $v;
                $arr[$key]['child'] = sort_parent($menus,$v['id']);
            }
        }
        return $arr;
    }
}
/**
 *  非递归迭代无限级分类
 */
if (! function_exists('aizxin_sort_parent')) {
    /**
     *  [aizxin_sort_parent description]
     */
    function aizxin_sort_parent($list)
    {
        $return = [];//索引目录
        $parent='';//根目录,

        //数组预处理,这里的$v['id']一定要唯一,不然可能会出现被覆盖的情况

        foreach ($list as $v)
            $return[$v['id']] = [
                'id' => $v['id'],
                'name' => $v['name'],
                'parent_id' => $v['parent_id'],
                'child' => '',
            ];


        //将每个目录与父目录进行拼接,并找到根目录
        //找到父路径,这里没有判断 $return[$v['pid']]['child']是否存在,
        //TP5下或者在不存在的情况下可能会报错,自己加一下
        foreach ($return as $k => $v) {
            if ($v['parent_id'] >= 0)
                $return[$v['parent_id']]['child'][$v['id']] = &$return[$k];
            else
                $parent = &$return[$k];
        }
        return $return;
    }
}
/**
 *  aizxin_paginate
 */
if (! function_exists('aizxin_paginate')) {
    /**
     *  [aizxin_paginate description]
     */
    function aizxin_paginate($results)
    {
        $response = [
            'pagination' => [
                'total' => $results['total'],
                'per_page' => $results['per_page'],
                'current_page' => $results['current_page'],
                'last_page' => $results['last_page'],
                'from' => $results['from'],
                'to' => $results['to']
            ],
            'data' => $results['data']
        ];
        return $response;
    }
}
/**
 *  qiniu_by_curl
 */
if (! function_exists('qiniu_by_curl')) {
    /**
     *  [qiniu_by_curl description]
     */
    function qiniu_by_curl($remote_server,$post_string,$upToken) {
        $headers = array();
        $headers[] = 'Content-Type:image/png';
        $headers[] = 'Authorization:UpToken '.$upToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$remote_server);
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
/**
 * 响应成功
 * @param string $message
 * @return \Illuminate\Http\Response
 */
if (! function_exists('respondWithSuccess')) {
    /**
     *  [qiniu_by_curl description]
     */
    function respondWithSuccess($data, $message = '', $code = 200, $status = 'success')
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'result' => $data,
        ]);
    }
}

/**
 * 响应错误
 * @param string $message
 * @param int $code
 * @param string $status
 * @return Response
 */
if (! function_exists('respondWithErrors')) {

    function respondWithErrors($message = '', $code = 404, $status = 'error')
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
        ]);
    }
}
