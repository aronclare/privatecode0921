<template>
	<!-- 全部订单 -->
	<view class="container">
		<!-- 分类 -->
		<u-tabs 
			:list="list" @click="click" 
			lineWidth="110rpx" 
			lineHeight="5"
			:activeStyle="{
				color: '#303133',
				fontWeight: 'bold',
				transform: 'scale(1.05)',
				fontSize:'34rpx'
			}"
		></u-tabs>
		<!-- 订单 -->
		<view  v-if="tradeList.length != 0">
			<!-- 自定义组件 -->
			<trade 
				:tradeList="tradeList" 
				:color="{header:'#ff0000',footer:'#45cf00'}"
				:content="{header:'待支付',footer:'去付款'}"
				:handleClickFooter="orderDetail"
			></trade>
		</view>
		<!-- 没有订单显示的样式 -->
		<u-empty
			v-else
			text="订单为空"
			textSize="30"
			mode="car"
			icon="http://cdn.uviewui.com/uview/empty/car.png"
			width="300"
			height="300"
		>
		</u-empty>
	</view>
</template>

<script>
	import { apiTradeList } from '@/config/api.js'
	export default {
		data() {
			return {
				// tabs标签
				list: [{
					name: '待付款', 
				}, {
					name: '已支付',
				}, {
					name: '已完成',
				}, {
					name: '已过期',
				}, {
					name: '待收货',
				}],
				tradeList:[], //订单列表
				status:1, //订单状态
				payInfo:'', //支付信息
			}
		},
		onShow(){
			this.getTradeList(this.status)
		},
		methods: {
			// 获取订单列表
			async getTradeList(status){
				
				try{                              //status   1 2 3 4 5
					//let res = await apiTradeList({status,include:'orderDetails.goods'})
					let res = await apiTradeList({status})
					
					//console.log(res)
					
					this.tradeList = res.data.reverse()
										
				}catch(e){}
			},
			click(item) {
				// 点击相同分类直接退出
				if(++item.index == this.status) return
				this.status = item.index
				this.getTradeList(this.status)
				
			},
			// 去订单详情页
			orderDetail(orderId){
				
				console.log(orderId)
				this.$u.route({
					url:`pages/order/order?order_id=${orderId}`,//id=${item.goods_id}
					params:{
						orderId
					}
				})
			},
		}
	}
</script>

<style lang="scss" scoped>
	// 页面容器
	.container {
		padding: 30rpx;
		
	}
</style>
