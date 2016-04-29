// 用户代理检测(User-agent Detection)
var client = function(){

	//呈现引擎
	var engine = {
		ie: 0,
		gecko: 0,
		webkit: 0,
		khtml: 0,
		opera: 0,

		//具体的版本号
		ver: null
	};

	//浏览器
	var browser = {
		ie: 0,
		firefox: 0,
		safari: 0,
		konq: 0,
		opera: 0,
		chrome: 0,

		//具体的斑斑
		ver: null
	};

	return {
		engine: engine,
		browser: browser
	};
	
}();