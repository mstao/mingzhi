/**
 * 
 * 描述:javascript缓动
 * jQuery Tween算法:算法来源：http://www.robertpenner.com/easing/
 * @author:xuzengqiang
 * @since :2015-1-23 11:17:51
 * 两种比较复杂的没有收录进来
 * Elastic：指数衰减的正弦曲线缓动；
 * Back：超过范围的三次方缓动（(s+1)*t^3 - s*t^2）；
**/
;(function($){
	jQuery.extend({
		Tweens:{
			Linear:function(t,b,c,d){ //无缓动
				return c*t/d+b;	
			},
			Quad: {	//二次方缓动(t^2)
				easeIn: function(t,b,c,d){
					return c*(t/=d)*t + b;
				},
				easeOut: function(t,b,c,d){
					return -c *(t/=d)*(t-2) + b;
				},
				easeInOut: function(t,b,c,d){
					if ((t/=d/2) < 1) return c/2*t*t + b;
					return -c/2 * ((--t)*(t-2) - 1) + b;
				}
			},
			Cubic: { //三次方缓动(t^3)
				easeIn: function(t,b,c,d){
					return c*(t/=d)*t*t + b;
				},
				easeOut: function(t,b,c,d){
					return c*((t=t/d-1)*t*t + 1) + b;
				},
				easeInOut: function(t,b,c,d){
					if ((t/=d/2) < 1) return c/2*t*t*t + b;
					return c/2*((t-=2)*t*t + 2) + b;
				}
			},
			Quart: { //四次方缓动(t^4)
				easeIn: function(t,b,c,d){
					return c*(t/=d)*t*t*t + b;
				},
				easeOut: function(t,b,c,d){
					return -c * ((t=t/d-1)*t*t*t - 1) + b;
				},
				easeInOut: function(t,b,c,d){
					if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
					return -c/2 * ((t-=2)*t*t*t - 2) + b;
				}
			},
			Quint: { //五次方缓动(t^5)
				easeIn: function(t,b,c,d){
					return c*(t/=d)*t*t*t*t + b;
				},
				easeOut: function(t,b,c,d){
					return c*((t=t/d-1)*t*t*t*t + 1) + b;
				},
				easeInOut: function(t,b,c,d){
					if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
					return c/2*((t-=2)*t*t*t*t + 2) + b;
				}
			},
			Sine: { //正弦曲线的缓动(sin(t))
				easeIn: function(t,b,c,d){
					return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
				},
				easeOut: function(t,b,c,d){
					return c * Math.sin(t/d * (Math.PI/2)) + b;
				},
				easeInOut: function(t,b,c,d){
					return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
				}
			},
			Expo: { //指数曲线的缓动(2^t)
				easeIn: function(t,b,c,d){
					return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
				},
				easeOut: function(t,b,c,d){
					return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
				},
				easeInOut: function(t,b,c,d){
					if (t==0) return b;
					if (t==d) return b+c;
					if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
					return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
				}
			},
			Circ: { //圆形曲线的缓动(sqrt(1-t^2))
				easeIn: function(t,b,c,d){
					return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
				},
				easeOut: function(t,b,c,d){
					return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
				},
				easeInOut: function(t,b,c,d){
					if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
					return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
				}
			},
			Bounce: { //指数衰减的反弹缓动
				easeIn: function(t,b,c,d){
					return c - jQuery.Tweens.Bounce.easeOut(d-t, 0, c, d) + b;
				},
				easeOut: function(t,b,c,d){
					if ((t/=d) < (1/2.75)) {
						return c*(7.5625*t*t) + b;
					} else if (t < (2/2.75)) {
						return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
					} else if (t < (2.5/2.75)) {
						return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
					} else {
						return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
					}
				},
				easeInOut: function(t,b,c,d){
					if (t < d/2) return jQuery.Tweens.Bounce.easeIn(t*2, 0, c, d) * .5 + b;
					else return jQuery.Tweens.Bounce.easeOut(t*2-d, 0, c, d) * .5 + c*.5 + b;
				}
			}
		},
		/**
		 * 描述:获取样式表中的样式名称以及对应的样式值,以数组的形式返回
		**/
		Properties:function(properties){
			var //属性对象集合
			    props = [], 
				//属性名称集合
				names = [],
				len = 0;
			for(var prop in properties) {
				names[len]=prop;
				props[names[len]]=properties[prop];
				len++;
			}
			return {
				names: names,
				props: props
			}
		},
	});
	
	/**
	 * 描述:jQuery缓动
	 * options:参数
	 * properties:最终的样式.类似{"width":"200px","opacity":"1"},
	 * callback:回调函数
	**/
	jQuery.fn.slowMove = function(options,properties,callback){
		var defaultOptions={
				duration:1000, //持续时间
				speed:2, //速度,默认为1,speed越大,速度越快
				tween:'Linear', //请选择Tween算法
				//缓动方式:Linear无缓动方式
				//easeIn(从0开始加速)
				//easeOut:(减速到0的缓动)
				//easeInOut(前半段从0开始加速,后半段减速到0的缓动).
				ease:'easeIn'
		    };
		var slow = jQuery.extend({},defaultOptions,options || {}),
			current = $(this);
		
		/**
		 * 缓动核心函数
		 * prop:对象
		**/ 
		function move(prop,t,b,c,d){
			var result;
			if(slow.tween === "Linear") {
				result = jQuery.Tweens[slow.tween](t,b,c,d);	
			} else {
				result = jQuery.Tweens[slow.tween][slow.ease](t,b,c,d);	
			}
			if(t<=d) {
				t += slow.speed;
				current.css(prop,result).addClass("slowMove");
				setTimeout(function(){move(prop,t,b,c,d);},10);
			} else {
				current.removeClass("slowMove");
				if(typeof callback === "undefined") return false;
				callback();
			}
		};
		
		/**
		 * 描述:获取改变值
		**/
		function getChange(end,begin){
			if(typeof end === "string") {
				var oper = end[0];
				if(isNaN(oper)){
					end = end.substr(end.indexOf("=")+1);
					if(oper === "+") { //每次自增
						return parseInt(end);
					} else { //自减
						return -parseInt(end);
					}
				} else {
					return parseInt(end) - begin;
				}
			} 
			return parseInt(end) - begin;
		}
		
		return this.each(function(){
			var styles = jQuery.Properties(properties),
				names = styles.names,
				props = styles.props;
			for(var i=0,maxLen=names.length;i<maxLen;i++) {
				var //进行操作的对象
					prop = names[i],
					//改变值
					change,
					//起始值
					begin = parseInt(current.css(prop)),
					//起始时间
					timer = 0;
				if(!isNaN(begin)) {
					change = getChange(props[prop],begin);
					move(prop,timer,begin,change,slow.duration);
				}
			}
		});
	};
	
	jQuery.fn.extend({
		/**
		 * 描述:是否在移动
		**/
		isMove:function(){
			return $(this).hasClass("slowMove");
		}
	});
})(jQuery);