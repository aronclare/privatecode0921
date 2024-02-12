<?php
declare (strict_types = 1);

namespace app\qingadmin\middleware;

class Check
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    //前置中间件
    public function handle($request, \Closure $next)
    {
        if(empty(session('adminSessionData')) && !preg_match('/login/',$request->pathinfo())){
            return redirect((string) url('login/index'));
        }
        return $next($request);
    }

    //后置中间件 在未登录情况下，就会先执行后台业务逻辑，然后再判断登录
    // public function handle($request, \Closure $next)
    // {
    //     $response=$next($request);
    //     echo'我是应用中间件，我在这里处理登录逻辑';
    //     return $response;
    // }
}
