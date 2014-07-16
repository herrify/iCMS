<?php /**
 * @package iCMS
 * @copyright 2007-2010, iDreamSoft
 * @license http://www.idreamsoft.com iDreamSoft
 * @author coolmoo <idreamsoft@qq.com>
 * @$Id: setting.php 2412 2014-05-04 09:52:07Z coolmoo $
 */
defined('iCMS') OR exit('What are you doing?');
iACP::head();
?>
<script type="text/javascript">

$(function(){
	iCMS.select('cache_engine',"<?php echo $config['cache']['engine'] ; ?>");
	iCMS.select('watermark_pos',"<?php echo (int)$config['watermark']['pos'] ; ?>");
	iCMS.select('time_zone',"<?php echo $config['time']['zone'] ; ?>");
	iCMS.select('system_patch',"<?php echo (int)$config['system']['patch'] ; ?>");
	<?php if($_GET['tab']){?>
		var $itab	= $("#<?php echo $_GET['app']; ?>-tab");
		$("li",$itab).removeClass("active");
		$(".tab-pane").removeClass("active").addClass("hide");
		$("a[href='#<?php echo $_GET['app']; ?>-<?php echo $_GET['tab']; ?>']",$itab).parent().addClass("active");
		$("#<?php echo $_GET['app']; ?>-<?php echo $_GET['tab']; ?>").addClass("active").removeClass("hide");
	<?php }?>
});
function modal_tplfile(el,a){
  if(!el) return;
  if(!a.checked) return;

  var e   = $('#'+el)||$('.'+el);
  var def = $("#PC_TPL").val();
  var val = a.value.replace(def+'/', "{iTPL}/");
  e.val(val);
  return 'off';
}
</script>

<div class="iCMS-container">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="fa fa-cog"></i> </span>
      <ul class="nav nav-tabs" id="setting-tab">
        <li class="active"><a href="#setting-base" data-toggle="tab">基本信息</a></li>
        <li><a href="#setting-url" data-toggle="tab">网站URL</a></li>
        <li><a href="#setting-tag" data-toggle="tab">标签</a></li>
        <li><a href="#setting-cache" data-toggle="tab">缓存</a></li>
        <li><a href="#setting-file" data-toggle="tab">附件</a></li>
        <li><a href="#setting-thumb" data-toggle="tab">缩略图</a></li>
        <li><a href="#setting-watermark" data-toggle="tab">水印</a></li>
        <li><a href="#setting-user" data-toggle="tab">用户</a></li>
        <li><a href="#setting-publish" data-toggle="tab">发布</a></li>
        <li><a href="#setting-comment" data-toggle="tab">评论</a></li>
        <li><a href="#setting-time" data-toggle="tab">时间</a></li>
        <li><a href="#setting-other" data-toggle="tab">其它</a></li>
        <li><a href="#setting-patch" data-toggle="tab">更新</a></li>
        <li><a href="#setting-grade" data-toggle="tab">高级</a></li>
      </ul>
    </div>
    <div class="widget-content nopadding iCMS-setting">
      <form action="<?php echo APP_FURI; ?>&do=save" method="post" class="form-inline" id="iCMS-setting" target="iPHP_FRAME">
        <div id="setting" class="tab-content">
          <div id="setting-base" class="tab-pane active">
            <div class="input-prepend"> <span class="add-on">网站名称</span>
              <input type="text" name="config[site][name]" class="span6" id="name" value="<?php echo $config['site']['name'] ; ?>"/>
            </div>
            <span class="help-inline">网站名称</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">网站标题</span>
              <input type="text" name="config[site][seotitle]" class="span6" id="seotitle" value="<?php echo $config['site']['seotitle'] ; ?>"/>
            </div>
            <span class="help-inline">网站标题通常是搜索引擎关注的重点，本设置将出现在标题中网站名称的后面，如果有多个关键字，建议用 "|"、","(不含引号) 等符号分隔</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"><span class="add-on">关 键 字</span>
              <textarea name="config[site][keywords]" id="keywords" class="span6" style="height: 90px;"><?php echo $config['site']['keywords'] ; ?></textarea>
            </div>
            <span class="help-inline">网站关键字 用","号隔开</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"><span class="add-on">网站描述</span>
              <textarea name="config[site][description]" id="description" class="span6" style="height: 90px;"><?php echo $config['site']['description'] ; ?></textarea>
            </div>
            <span class="help-inline">将被搜索引擎用来说明您网站的主要内容</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">备 案 号</span>
              <input type="text" name="config[site][icp]" class="span3" id="title" value="<?php echo $config['site']['icp'] ; ?>"/>
            </div>
            <span class="help-inline">页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入您的授权码，它将显示在页面底部，如果没有请留空</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">PC端模板</span>
              <input type="text" name="config[site][PC_TPL]" class="span3" id="PC_TPL" value="<?php echo $config['site']['PC_TPL'] ; ?>"/>
              <a href="<?php echo __ADMINCP__; ?>=files&do=seltpl&from=modal&click=dir&target=PC_TPL" class="btn" data-toggle="modal" title="选择模板文件"><i class="fa fa-search"></i> 选择</a> </div>
            <span class="help-inline">网站PC端模板默认模板</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">移动端模板</span>
              <input type="text" name="config[site][MW_TPL]" class="span3" id="MW_TPL" value="<?php echo $config['site']['MW_TPL'] ; ?>"/>
              <a href="<?php echo __ADMINCP__; ?>=files&do=seltpl&from=modal&click=dir&target=MW_TPL" class="btn" data-toggle="modal" title="选择模板文件"><i class="fa fa-search"></i> 选择</a> </div>
            <span class="help-inline">网站移动端模板默认模板,如果不想让程序自行切换请留空</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">首页模板</span>
              <input type="text" name="config[site][indexTPL]" class="span3" id="indexTPL" value="<?php echo $config['site']['indexTPL'] ; ?>"/>
              <input type="hidden" name="config[site][indexName]" class="span3" id="indexName" value="<?php echo $config['site']['indexName'] ; ?>"/>
              <a href="<?php echo __ADMINCP__; ?>=files&do=seltpl&from=modal&click=file&target=indexTPL&callback=tplfile" class="btn" data-toggle="modal" title="选择模板文件"><i class="fa fa-search"></i> 选择</a> </div>
            <span class="help-inline">首页默认模板，注：最好使用<span class="label label-inverse">{iTPL}</span>代替模板目录,程序将会自行切换PC端或者移动端</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">程序提示</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[debug][php]" id="debug_php" <?php echo $config['debug']['php']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">程序错误提示!如果网站显示空白或者不完整,可开启此项,方便排除错误</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">模板提示</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[debug][tpl]" id="debug_tpl" <?php echo $config['debug']['tpl']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">模板错误提示!如果网站显示空白或者不完整,可开启此项,方便排除错误!模板调整时也可开启,开启此项也要开"程序提示"</span> </div>
          <div id="setting-url" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">CMS安装目录</span>
              <input type="text" name="config[router][DIR]" class="span4" id="router_dir" value="<?php echo $config['router']['DIR'] ; ?>"/>
            </div>
            <span class="help-inline">CMS安装目录，如：http：//www.idreamsoft.com/iCMS 则安装目录为:iCMS 根目录请留空</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">404跳转</span>
              <input type="text" name="config[router][404]" class="span4" id="router_404" value="<?php echo $config['router']['404'] ; ?>"/>
            </div>
            <span class="help-inline">404页面跳转</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">公共资源URL</span>
              <input type="text" name="config[router][publicURL]" class="span4" id="router_publicURL" value="<?php echo $config['router']['publicURL'] ; ?>"/>
            </div>
            <span class="help-inline">公共资源访问URL 如果访问出错请修改public/config.php文件</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">用户URL</span>
              <input type="text" name="config[router][userURL]" class="span4" id="router_userURL" value="<?php echo $config['router']['userURL'] ; ?>"/>
            </div>
            <span class="help-inline">用户URL</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">网站URL</span>
              <input type="text" name="config[router][URL]" class="span4" id="router_URL" value="<?php echo $config['router']['URL'] ; ?>"/>
            </div>
            <span class="help-inline">网站网址 可绑定到静态目录 (需开启生成静态)</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">静态目录</span>
              <input type="text" name="config[router][htmldir]" class="span4" id="router_htmldir" value="<?php echo $config['router']['htmldir'] ; ?>"/>
            </div>
            <span class="help-inline">存放静态页面目录，相对于admin目录。可用../表示上级目录</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">文件后缀</span>
              <input type="text" name="config[router][htmlext]" class="span4" id="router_htmlext" value="<?php echo $config['router']['htmlext'] ; ?>"/>
            </div>
            <span class="help-inline">推荐使用.html</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">生成速度</span>
              <input type="text" name="config[router][speed]" class="span4" id="router_speed" value="<?php echo $config['router']['speed'] ; ?>"/>
            </div>
            <span class="help-inline">一次性生成多少静态页，可根据服务器IO性能调整</span> </div>
          <div id="setting-tag" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">标签URL</span>
              <input type="text" name="config[router][tagURL]" class="span4" id="router_tagURL" value="<?php echo $config['router']['tagURL'] ; ?>"/>
            </div>
            <span class="help-inline">标签目录访问URL 可绑定域名</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">标签URL规则</span>
              <input type="text" name="config[router][tagRule]" class="span4" id="router_tagRule" value="<?php echo $config['router']['tagRule'] ; ?>"/>
              <div class="btn-group"> <a class="btn dropdown-toggle" data-toggle="dropdown" tabindex="-1"><i class="fa fa-question-circle"></i> 帮助</a>
                <ul class="dropdown-menu">
                  <li><a href="{ID}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-important">{ID}</span> 标签ID</a></li>
                  <li><a href="{TKEY}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-important">{TKEY}</span> 标签标识</a></li>
                  <li><a href="{ZH_CN}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-important">{ZH_CN}</span> 标签名(中文)</a></li>
                  <li><a href="{NAME}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-important">{NAME}</span> 标签名</a></li>
                  <li class="divider"></li>
                  <li><a href="{TCID}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-inverse">{TCID}</span> 分类ID</a></li>
                  <li><a href="{TCDIR}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-inverse">{TCDIR}</span> 分类目录</a></li>
                  <li><a href="{CDIR}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-inverse">{CDIR}</span> 栏目目录</a></li>
                  <li class="divider"></li>
                  <li><a href="{P}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-inverse">{P}</span> 分页数</a></li>
                  <li><a href="{EXT}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-inverse">{EXT}</span> 后缀</a></li>
                  <li class="divider"></li>
                  <li><a href="{PHP}" data-toggle="insertContent" data-target="#router_tagRule"><span class="label label-inverse">{PHP}</span> 动态程序</a></li>
                </ul>
              </div>
            </div>
            <span class="help-inline">伪静态模式时规则一定要包含<span class="label label-important">{ID}</span>或<span class="label label-important">{NAME}</span>或<span class="label label-important">{ZH_CN}</span></span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">标签目录</span>
              <input type="text" name="config[router][tagDir]" class="span4" id="router_tagDir" value="<?php echo $config['router']['tagDir'] ; ?>"/>
            </div>
            <span class="help-inline">存放标签静态页面目录，相对于app目录。可用../表示上级目录</span> </div>
          <div id="setting-cache" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">启用缓存</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[cache][enable]" id="cache_enable" <?php echo $config['cache']['enable']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">启用缓存可减轻数据库压力</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">缓存引擎</span>
              <select name="config[cache][engine]" id="cache_engine" class="chosen-select">
                <option value="file">文件缓存 FileCache</option>
                <option value="memcached">分布式缓存 memcached</option>
                <option value="redis">分布式缓存 Redis</option>
              </select>
            </div>
            <span class="help-inline">当前PHP扩展环境:memcached <?php echo $memcache?'支持':'不支持';?>; Redis <?php echo $redis?'支持':'不支持';?></div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">缓存目录/服务器IP/UNIX SOCK</span>
              <textarea name="config[cache][host]" id="cache_host" class="span6" style="height: 150px;"><?php echo $config['cache']['host'] ; ?></textarea>
            </div>
            <span class="help-inline">文件缓存目录:文件层级(cache:1)<br />
            memcached服务器IP:每行一个,带端口. <br />
            例:<br />
            127.0.0.1:11211<br />
            127.0.0.2:11211<br />
            Redis UNIX SOCK<br />
            unix:///tmp/redis.sock@db:1 <br />
            127.0.0.1:6379@db:1</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">缓存时间</span>
              <input type="text" name="config[cache][time]" class="span4" id="cache_time" value="<?php echo $config['cache']['time'] ; ?>"/>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">数据压缩</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[cache][compress]" id="cache_compress" <?php echo $config['cache']['compress']?'checked':''; ?>/>
              </div>
            </div>
          </div>
          <div id="setting-file" class="tab-pane hide">
            <!--
            <div class="input-prepend"> <span class="add-on">附件接口</span>
              <input type="text" name="config[FS][API]" class="span4" id="FS_API" value="<?php echo $config['FS']['API'] ; ?>"/>
            </div>
            <span class="help-inline">附件接口URL</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">Token</span>
              <input type="text" name="config[FS][token]" class="span4" id="FS_token" value="<?php echo $config['FS']['token'] ; ?>"/>
              <a class="btn" onclick="$('#FS_token').val(iCMS.random(32));"><i class="fa fa-random"></i> 生成随机码</a>
            </div>
            <span class="help-inline">该Token会和接口URL中包含的Token进行比对，从而验证安全性</span>
            <div class="clearfloat mb10"></div>
            -->
            <div class="input-prepend"> <span class="add-on">附件URL</span>
              <input type="text" name="config[FS][url]" class="span4" id="FS_url" value="<?php echo $config['FS']['url'] ; ?>"/>
            </div>
            <span class="help-inline">如果访问不到,请自行调整</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">文件保存目录</span>
              <input type="text" name="config[FS][dir]" class="span4" id="FS_dir" value="<?php echo $config['FS']['dir'] ; ?>"/>
            </div>
            <span class="help-inline">相对于程序根目录</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">目录结构</span>
              <input type="text" name="config[FS][dir_format]" class="span4" id="FS_dir_format" value="<?php echo $config['FS']['dir_format'] ; ?>"/>
              <div class="btn-group" to="#FS_dir_format"> <a class="btn dropdown-toggle" data-toggle="dropdown" tabindex="-1"><i class="fa fa-question-circle"></i> 帮助</a>
                <ul class="dropdown-menu">
                  <li><a href="#Y"><span class="label label-inverse">Y</span> 4位数年份</a></li>
                  <li><a href="#y"><span class="label label-inverse">y</span> 2位数年份</a></li>
                  <li><a href="#m"><span class="label label-inverse">m</span> 月份01-12</a></li>
                  <li><a href="#n"><span class="label label-inverse">n</span> 月份1-12</a></li>
                  <li><a href="#d"><span class="label label-inverse">n</span> 日期01-31</a></li>
                  <li><a href="#j"><span class="label label-inverse">j</span> 日期1-31</a></li>
                  <li class="divider"></li>
                  <li><a href="#EXT"><span class="label label-inverse">EXT</span> 文件类型</a></li>
                </ul>
              </div>
            </div>
            <span class="help-inline">为空全部存入同一目录</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">允许上传类型</span>
              <input type="text" name="config[FS][allow_ext]" class="span4" id="FS_allow_ext" value="<?php echo $config['FS']['allow_ext'] ; ?>"/>
            </div>
          </div>
          <div id="setting-thumb" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">缩略图</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[thumb][enable]" id="thumb_enable" <?php echo $config['thumb']['enable']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">缩略图尺寸</span><span class="add-on" style="width:24px;">宽度</span>
              <input type="text" name="config[thumb][width]" class="span1" id="thumb_width" value="<?php echo $config['thumb']['width'] ; ?>"/>
              <span class="add-on" style="width:24px;">高度</span>
              <input type="text" name="config[thumb][height]" class="span1" id="thumb_height" value="<?php echo $config['thumb']['height'] ; ?>"/>
            </div>
            <span class="help-inline">px</span> </div>
          <div id="setting-watermark" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">水印</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[watermark][enable]" id="watermark_enable" <?php echo $config['watermark']['enable']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">将在上传的图片附件中加上您在下面设置的图片或文字水印</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">图片尺寸</span><span class="add-on" style="width:24px;">宽度</span>
              <input type="text" name="config[watermark][width]" class="span1" id="watermark_width" value="<?php echo $config['thumb']['width'] ; ?>"/>
              <span class="add-on" style="width:24px;">高度</span>
              <input type="text" name="config[watermark][height]" class="span1" id="watermark_height" value="<?php echo $config['thumb']['height'] ; ?>"/>
            </div>
            <span class="help-inline">单位:像素(px) 只对超过程序设置的大小的附件图片才加上水印图片或文字(设置为0不限制)</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">水印位置</span>
              <select name="config[watermark][pos]" id="watermark_pos" class="span3 chosen-select">
                <option value="0">随机位置</option>
                <option value="1">顶部居左</option>
                <option value="2">顶部居中</option>
                <option value="3">顶部居右</option>
                <option value="4">中部居左</option>
                <option value="5">中部居中</option>
                <option value="6">中部居右</option>
                <option value="7">底部居左</option>
                <option value="8">底部居中</option>
                <option value="9">底部居右</option>
                <option value="-1">自定义</option>
              </select>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">水印位置偏移</span><span class="add-on" style="width:24px;">X</span>
              <input type="text" name="config[watermark][x]" class="span1" id="watermark_x" value="<?php echo $config['watermark']['x'] ; ?>"/>
              <span class="add-on" style="width:24px;">Y</span>
              <input type="text" name="config[watermark][y]" class="span1" id="watermark_y" value="<?php echo $config['watermark']['y'] ; ?>"/>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">水印图片文件</span>
              <input type="text" name="config[watermark][img]" class="span3" id="watermark_img" value="<?php echo $config['watermark']['img'] ; ?>"/>
            </div>
            <span class="help-inline">水印图片存放路径：include/watermark/watermark.png， 如果水印图片不存在，则使用文字水印</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">水印文字</span>
              <input type="text" name="config[watermark][text]" class="span3" id="watermark_text" value="<?php echo $config['watermark']['text'] ; ?>"/>
            </div>
            <span class="help-inline">暂不支持中文</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">水印文字字体大小</span>
              <input type="text" name="config[watermark][fontsize]" class="span3" id="watermark_fontsize" value="<?php echo $config['watermark']['fontsize'] ; ?>"/>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">水印文字颜色</span>
              <input type="text" name="config[watermark][color]" class="span3" id="watermark_color" value="<?php echo $config['watermark']['color'] ; ?>"/>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">水印透明度</span>
              <input type="text" name="config[watermark][transparent]" class="span3" id="watermark_transparent" value="<?php echo $config['watermark']['transparent'] ; ?>"/>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">缩略图水印</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[watermark][thumb]" id="watermark_thumb" <?php echo $config['watermark']['thumb']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启时缩略图也会打上水印</span> </div>
          <div id="setting-user" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">用户注册</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[user][register]" id="user_register" <?php echo $config['user']['register']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">注册验证码</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[user][regseccode]" id="user_regseccode" <?php echo $config['user']['regseccode']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">用户登陆</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[user][login]" id="user_login" <?php echo $config['user']['login']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">登陆验证码</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[user][loginseccode]" id="user_loginseccode" <?php echo $config['user']['loginseccode']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">注册条款</span>
              <textarea name="config[user][agreement]" id="user_agreement" class="span6" style="height: 150px;"><?php echo $config['user']['agreement'] ; ?></textarea>
            </div>
            <fieldset class="openid r3">
              <legend>QQ开放平台</legend>
              <div class="input-prepend"> <span class="add-on" style="width:60px;">APPID:</span>
                <input type="text" name="config[openapi][QQ][appid]" class="span3" id="thumb_width" value="<?php echo $config['thumb']['width'] ; ?>"/>
              </div>
              <div class="clearfloat mb10"></div>
              <div class="input-prepend"> <span class="add-on"style="width:60px;">APPKEY:</span>
                <input type="text" name="config[openapi][QQ][appkey]" class="span3" id="thumb_height" value="<?php echo $config['thumb']['height'] ; ?>"/>
              </div>
            </fieldset>
            <fieldset class="openid r3">
              <legend>QQ开放平台</legend>
              <div class="input-prepend"> <span class="add-on" style="width:60px;">APPID:</span>
                <input type="text" name="config[openapi][QQ][appid]" class="span3" id="thumb_width" value="<?php echo $config['thumb']['width'] ; ?>"/>
              </div>
              <div class="clearfloat mb10"></div>
              <div class="input-prepend"> <span class="add-on"style="width:60px;">APPKEY:</span>
                <input type="text" name="config[openapi][QQ][appkey]" class="span3" id="thumb_height" value="<?php echo $config['thumb']['height'] ; ?>"/>
              </div>
            </fieldset>
          </div>
          <div id="setting-publish" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">自动排版</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][autoformat]" id="publish_autoformat" <?php echo $config['publish']['autoformat']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后发布文章时,程序会自动对内容进行清理无用代码.采集时推荐开启.如果内容格式丢失 请关闭此项</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">下载远程图片</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][remote]" id="publish_remote" <?php echo $config['publish']['remote']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后发表文章时该选项默认为选中状态</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">提取缩略图</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][autopic]" id="publish_autopic" <?php echo $config['publish']['autopic']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后发表文章时该选项默认为选中状态</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">提取摘要</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][autodesc]" id="publish_autodesc" <?php echo $config['publish']['autodesc']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后发表文章时程序会自动提取文章部分内容为文章摘要</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">提取摘要字数</span>
              <input type="text" name="config[publish][descLen]" class="span3" id="publish_descLen" value="<?php echo $config['publish']['descLen'] ; ?>"/>
            </div>
            <span class="help-inline">设置自动提取内容摘要字数</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">内容自动分页</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][autoPage]" id="publish_autoPage" <?php echo $config['publish']['autoPage']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后发表文章时程序会分页</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">内容分页字数</span>
              <input type="text" name="config[publish][AutoPageLen]" class="span3" id="publish_AutoPageLen" value="<?php echo $config['publish']['AutoPageLen'] ; ?>"/>
            </div>
            <span class="help-inline">设置自动内容分页字数</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">检查标题重复</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][repeatitle]" id="publish_repeatitle" <?php echo $config['publish']['repeatitle']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后不能发表相同标题的文章</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">列表显示图片</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[publish][showpic]" id="publish_showpic" <?php echo $config['publish']['showpic']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后文章列表将会显示缩略图</span> </div>
          <div id="setting-comment" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">评论</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[comment][enable]" id="comment_enable" <?php echo $config['comment']['enable']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">审核评论</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[comment][examine]" id="comment_examine" <?php echo $config['comment']['examine']?'checked':''; ?>/>
              </div>
            </div>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">验证码</span>
              <div class="switch">
                <input type="checkbox" data-type="switch" name="config[comment][seccode]" id="comment_seccode" <?php echo $config['comment']['seccode']?'checked':''; ?>/>
              </div>
            </div>
            <span class="help-inline">开启后发表评论需要验证码</span> </div>
          <div id="setting-time" class="tab-pane hide">
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">服务器时区</span>
              <select name="config[time][zone]" id="time_zone" class="span4 chosen-select">
                <option value="Pacific/Kwajalein">(标准时-12：00) 日界线西 </option>
                <option value="Pacific/Samoa">(标准时-11：00) 中途岛、萨摩亚群岛 </option>
                <option value="Pacific/Honolulu">(标准时-10：00) 夏威夷 </option>
                <option value="America/Juneau">(标准时-9：00) 阿拉斯加 </option>
                <option value="America/Los_Angeles">(标准时-8：00) 太平洋时间(美国和加拿大) </option>
                <option value="America/Denver">(标准时-7：00) 山地时间(美国和加拿大) </option>
                <option value="America/Mexico_City">(标准时-6：00) 中部时间(美国和加拿大)、墨西哥城 </option>
                <option value="America/New_York">(标准时-5：00) 东部时间(美国和加拿大)、波哥大 </option>
                <option value="America/Caracas">(标准时-4：00) 大西洋时间(加拿大)、加拉加斯 </option>
                <option value="America/St_Johns">(标准时-3：30) 纽芬兰 </option>
                <option value="America/Argentina/Buenos_Aires">(标准时-3：00) 巴西、布宜诺斯艾利斯、乔治敦 </option>
                <option value="Atlantic/Azores">(标准时-2：00) 中大西洋 </option>
                <option value="Atlantic/Azores">(标准时-1：00) 亚速尔群岛、佛得角群岛 </option>
                <option value="Europe/London">(格林尼治标准时) 西欧时间、伦敦、卡萨布兰卡 </option>
                <option value="Europe/Paris">(标准时+1：00) 中欧时间、安哥拉、利比亚 </option>
                <option value="Europe/Helsinki">(标准时+2：00) 东欧时间、开罗，雅典 </option>
                <option value="Europe/Moscow">(标准时+3：00) 巴格达、科威特、莫斯科 </option>
                <option value="Asia/Tehran">(标准时+3：30) 德黑兰 </option>
                <option value="Asia/Baku">(标准时+4：00) 阿布扎比、马斯喀特、巴库 </option>
                <option value="Asia/Kabul">(标准时+4：30) 喀布尔 </option>
                <option value="Asia/Karachi">(标准时+5：00) 叶卡捷琳堡、伊斯兰堡、卡拉奇 </option>
                <option value="Asia/Calcutta">(标准时+5：30) 孟买、加尔各答、新德里 </option>
                <option value="Asia/Colombo">(标准时+6：00) 阿拉木图、 达卡、新亚伯利亚 </option>
                <option value="Asia/Bangkok">(标准时+7：00) 曼谷、河内、雅加达 </option>
                <option value="Asia/Shanghai">(北京时间) 北京、重庆、香港、新加坡 </option>
                <option value="Asia/Tokyo">(标准时+9：00) 东京、汉城、大阪、雅库茨克 </option>
                <option value="Australia/Darwin">(标准时+9：30) 阿德莱德、达尔文 </option>
                <option value="Pacific/Guam">(标准时+10：00) 悉尼、关岛 </option>
                <option value="Asia/Magadan">(标准时+11：00) 马加丹、索罗门群岛 </option>
                <option value="Asia/Kamchatka">(标准时+12：00) 奥克兰、惠灵顿、堪察加半岛 </option>
              </select>
            </div>
            <span class="help-inline">服务器所在时区</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">服务器时间校正</span>
              <input type="text" name="config[time][cvtime]" class="span3" id="time_cvtime" value="<?php echo $config['time']['cvtime'] ; ?>"/>
            </div>
            <span class="help-inline">单位:分钟</span>
            <div class="clearfloat"></div>
            <span class="help-inline">此功能用于校正服务器操作系统时间设置错误的问题
            当确认程序默认时区设置正确后，程序显示时间仍有错误，请使用此功能校正</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend input-append"> <span class="add-on">默认时间格式</span>
              <input type="text" name="config[time][dateformat]" class="span3" id="time_dateformat" value="<?php echo $config['time']['dateformat'] ; ?>"/>
              <div class="btn-group" to="#FS_dir_format"> <a class="btn dropdown-toggle" data-toggle="dropdown" tabindex="-1"><i class="fa fa-question-circle"></i> 帮助</a>
                <ul class="dropdown-menu">
                  <li><a href="#Y"><span class="label label-inverse">Y</span> 4位数年份</a></li>
                  <li><a href="#y"><span class="label label-inverse">y</span> 2位数年份</a></li>
                  <li><a href="#m"><span class="label label-inverse">m</span> 月份01-12</a></li>
                  <li><a href="#n"><span class="label label-inverse">n</span> 月份1-12</a></li>
                  <li><a href="#d"><span class="label label-inverse">n</span> 日期01-31</a></li>
                  <li><a href="#j"><span class="label label-inverse">j</span> 日期1-31</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="setting-other" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">移动端识别</span>
              <input type="text" name="config[other][mobile_agent]" class="span6" id="mobile_agent" value="<?php echo $config['other']['mobile_agent'] ; ?>"/>
            </div>
            <span class="help-inline">请用<span class="label label-info">,</span>分隔 如不启用自动识别请留空</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">拼音分割符</span>
              <input type="text" name="config[other][CLsplit]" class="span3" id="CLsplit" value="<?php echo $config['other']['CLsplit'] ; ?>"/>
            </div>
            <span class="help-inline">留空，按紧凑型生成(pinyin)</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">关键字替换</span>
              <input type="text" name="config[other][kwCount]" class="span3" id="kwCount" value="<?php echo $config['other']['kwCount'] ; ?>"/>
            </div>
            <span class="help-inline">内链关键字替换次数 0为不替换，-1全部替换</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">侧边栏</span>
              <div class="switch" data-on-label="启用" data-off-label="关闭">
                <input type="checkbox" data-type="switch" name="config[other][sidebar_enable]" id="other_sidebar_enable" <?php echo $config['other']['sidebar_enable']?'checked':''; ?>/>
              </div>
            </div>
            <div class="switch" data-on-label="打开" data-off-label="最小化">
              <input type="checkbox" data-type="switch" name="config[other][sidebar]" id="other_sidebar" <?php echo $config['other']['sidebar']?'checked':''; ?>/>
            </div>
            <span class="help-inline">后台侧边栏默认开启,启用后可选择打开或者最小化</span> </div>
          <div id="setting-patch" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">系统更新</span>
              <select name="config[system][patch]" id="system_patch" class="span3 chosen-select">
                <option value="1">自动下载,安装时询问(推荐)</option>
                <option value="2">不自动下载更新,有更新时提示</option>
                <option value="0">关闭自动更新</option>
              </select>
            </div>
          </div>
          <div id="setting-grade" class="tab-pane hide">
            <div class="input-prepend"> <span class="add-on">sphinx服务器</span>
              <input type="text" name="config[sphinx][host]" class="span3" id="sphinx_host" value="<?php echo $config['sphinx']['host'] ; ?>"/>
            </div>
            <span class="help-inline">UNIX SOCK:unix:///tmp/sphinx.sock<br />
            HOST:127.0.0.1:9312</span>
            <div class="clearfloat mb10"></div>
            <div class="input-prepend"> <span class="add-on">sphinx 索引</span>
              <input type="text" name="config[sphinx][index]" class="span3" id="sphinx_index" value="<?php echo $config['sphinx']['index'] ; ?>"/>
            </div>
            <span class="help-inline"></span>
            <div class="clearfloat mb10"></div>
            <h3>sphinx 配置示例</h3>
            <pre>
source iCMS_article
{
	type		= mysql
	sql_host	= localhost
	sql_user	= root
	sql_pass	= 123456
	sql_db		= iCMS
	sql_port	= 3306	# optional, default is 3306
	sql_query_pre	=  SET NAMES utf8
	sql_query_pre 	= REPLACE INTO sph_counter SELECT 1, MAX(id) FROM icms_article

	sql_query = SELECT a.id, a.cid,a.userid, a.comments, a.pubdate, a.hits, a.isPic, a.title, a.keywords, a.tags, a.status FROM icms_article a,icms_category c WHERE a.cid=c.cid AND a.status ='1' AND a.id<=( SELECT max_doc_id FROM sph_counter WHERE counter_id=1 )
	sql_attr_uint		= cid
	sql_attr_uint		= userid
	sql_attr_uint		= comments
	sql_attr_uint		= hits
	sql_attr_uint		= status
	sql_attr_timestamp	= pubdate
	sql_attr_bool		= isPic

	sql_ranged_throttle	= 0
	sql_query_info		= SELECT * FROM icms_article WHERE id=$id

}
source iCMS_article_delta : iCMS_article
{
	sql_query_pre	=  SET NAMES utf8
	sql_query = SELECT a.id, a.cid,a.userid,a.comments, a.pubdate, a.hits, a.isPic, a.title, a.keywords, a.tags, a.status FROM icms_article a,icms_category c WHERE a.cid=c.cid AND a.status ='1' AND a.id>( SELECT max_doc_id FROM sph_counter WHERE counter_id=1 )
}
index iCMS_article
{
	source			= iCMS_article
	path			= /var/sphinx/iCMS_article
        docinfo                 = extern
        mlock                   = 0
        morphology              = none
        min_word_len            = 1
        charset_type            = utf-8
        min_prefix_len          = 0
        html_strip              = 1
        charset_table           = 0..9, A..Z->a..z, _, a..z, U+410..U+42F->U+430..U+44F, U+430..U+44F
        ngram_len               = 1
        ngram_chars             = U+3000..U+2FA1F
}
index iCMS_article_delta : iCMS_article
{
	source	= iCMS_article_delta
	path	= /var/sphinx/iCMS_article_delta
}
##sphinx使用问题,请自行Google上百度一下
          </pre>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> 提交</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php iACP::foot();?>