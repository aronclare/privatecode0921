const http = uni.$u.http
// 认证api
export const apiRegister = params => http.post('/mobile/user/register',params)// post请求，用户注册
export const apiLogin = params => http.post('/mobile/user/login', params)// post请求，用户登录
export const apiLogout = () => http.post('/mobile/user/loginOut')// post请求，用户退出登录
export const apiOssToken = () => http.get('/api/auth/oss/token')// 获取阿里云OSS Token，用于前端直传文件使用
export const apiUserInfo = () => http.get('/mobile/user/index')// get请求获取用户信息     //已完成接口配对
export const apiUpdateUserInfo = params => http.put('/mobile/user/userUpdate',params)// put请求，更改用户名 id=47   name=admin   传x-www-form-urlen
export const apiUpdateUserAvatar = params => http.post('/mobile/user/avatar',params)// post请求，更新头像
//前台api
export const apiIndex = params => http.get('/mobile/index/index',{params})// get请求，获取首页数据
export const apiGoodsList = params => http.get('/mobile/goods/goods',{params})// 商品列表\接口包含分类列表
export const apiGoods = (id) => http.get(`/mobile/goods/index/${id}`)// 商品详情
export const apiCollectsGoods = (id) => http.post(`/mobile/goods/collect/${id}`)// 收藏或取消收藏 直接goods/3传参
export const apiCartList = params => http.get('/mobile/cart/index',params)// 购物车列表  //{params}参数格式为id=76
export const apiAddCart = params => http.post('/mobile/cart/add_to_cart',params)// 加入购物车
export const apiCartChecked = params => http.patch('/mobile/cart/update_cart_status',params)// 购物车改变选中     //is_checked=1   1选中0未选中
export const apiCartNum = (id,params) => http.put(`/api/carts/${id}`,params)// 购物车某个商品的数量  api/carts/29136//设置id=29136商品的数量为1num=1
export const apiCartDelete = id => http.delete(`/mobile/cart/delete_to_cart/${id}`)// 移出购物车
//以下五个接口需要实际支付场景
export const apiTrade = () => http.get('/mobile/order/index')   //preview 订单预览
export const apiSubmitTrade = params => http.post(`/mobile/order/order_create`,params)// 提交订单
export const apiTradeList = params => http.get(`/mobile/user/myorder`,{params})// 订单列表
export const apiorderDetail = (order,params) => http.get(`/mobile/user/myorder_detail/${order}`,{params})// 订单详细
export const apiPay = (orderId,params) => http.get(`/api/orders/${orderId}/pay`,{params})// 订单支付
export const apiPayStatus = (orderId) => http.get(`/mobile/order/${orderId}/get_pay_status`)// 查询支付状态
//地址模块
export const apiAddAddress = (params) => http.post('/mobile/order/address',params)// 添加地址
export const apiDeleteAddress = (address) => http.delete(`/mobile/order/addressDelete/${address}`)// 删除地址
export const apiGetAddress = () => http.get('/api/address')// 获取地址列表
export const apiUpdateAddress = (id,params) => http.put(`/mobile/order/addressUpdate/${id}`,params)// 更新地址信息

