var Aizxin = Aizxin || {};
$(function() {
	/**
	 * 获取Aizxin基础配置
	 * @type {object}
	 */
	Aizxin.conf = window.conf;
	/* 基础对象检测 */
	Aizxin.conf || $.error("Aizxin基础配置没有正确加载！");
	Aizxin.var = null;
	/* 基础对象检测 */
	Aizxin.getV = function() {
			return Aizxin.var;
		}
		/* 基础对象检测 */
	Aizxin.setV = function(vvalue) {
			Aizxin.var = null;
			Aizxin.var = vvalue;
		}
		/**
		 * 解析URL
		 * @param  {string} url 被解析的URL
		 * @return {object}     解析后的数据
		 */
	Aizxin.parse_url = function(url) {
		var parse = url.match(/^(?:([a-z]+):\/\/)?([\w-]+(?:\.[\w-]+)+)?(?::(\d+))?([\w-\/]+)?(?:\?((?:\w+=[^#&=\/]*)?(?:&\w+=[^#&=\/]*)*))?(?:#([\w-]+))?$/i);
		parse || $.error("url格式不正确！");
		return {
			"scheme": parse[1],
			"host": parse[2],
			"port": parse[3],
			"path": parse[4],
			"query": parse[5],
			"fragment": parse[6]
		};
	}

	Aizxin.parse_str = function(str) {
		var value = str.split("&"),
			vars = {},
			param;
		for (var i = 0; i < value.length; i++) {
			param = value[i].split("=");
			vars[param[0]] = param[1];
		}
		return vars;
	}
	Aizxin.U = function(url, vars) {
		if (!url || url == '') return '';
		var info = this.parse_url(url),
			path = [],
			reg;
		/* 验证info */
		info.path || $.error("url格式错误！");
		url = info.path;
		/* 解析URL */
		path = url.split("/");
		// path = [path.pop(), path.pop(), path.pop()].reverse();
		// path[1] || $.error("Aizxin.U(" + url + ")没有指定控制器");

		/* 解析参数 */
		if (typeof vars === "string") {
			vars = this.parse_str(vars);
		}
		/* 解析URL自带的参数 */
		info.query && $.extend(vars, this.parse_str(info.query));
		// if (false !== Aizxin.conf.SUFFIX) {
		// 	url += "." + Aizxin.conf.SUFFIX;
		// }
		if ($.isPlainObject(vars)) {
			url += "?" + $.param(vars);
		}
		//url = url.replace(new RegExp("%2F","gm"),"+");
		url = Aizxin.conf.APP + "/" + url;
		return url;
	}
});