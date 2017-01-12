<?php

namespace App\Http\Middleware;

use Closure;
use namespace Aizxin\Services\CommonService;
class AuthJwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            // 如果用户登陆后的所有请求没有jwt的token抛出异常
            $user = JWTAuth::toUser($request->input('token'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->respondWithErrors('Token 无效',400);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->respondWithErrors('Token 已过期',400);
            }else{
                return $this->respondWithErrors('Token 出错了',400);
            }
        }
        return $next($request);
    }
    /**
     * 响应错误
     * @param string $message
     * @param int $code
     * @param string $status
     * @return Response
     */
    protected function respondWithErrors($message = '', $code = 404, $status = 'error')
    {
        return response()->json([
            'status' => $status,
            'code' => $code,
            'message' => $message,
        ]);
    }
}
