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
                $v['child'] = sort_parent($menus,$v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }
}
/**
 *  递归迭代无限级分类
 */
if (! function_exists('area_sort_parent')) {
    /**
     *  [area_sort_parent description]
     */
    function area_sort_parent($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $v) {
            if ($v['parent_id'] == $pid) {
                $v['children'] = area_sort_parent($menus,$v['code']);
                $arr[] = $v;
            }
        }
        return $arr;
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
/**
 * 读取网站信息
 * @param string $message
 * @param int $code
 * @param string $status
 * @return Response
 */
if (! function_exists('cc')) {

    function cc($key)
    {
        return Cache::get(config('admin.globals.cache.config'))[$key];
    }
}

