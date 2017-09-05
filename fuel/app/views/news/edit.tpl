{extends file='common/base.tpl'}
{block name="title"}编辑新闻{/block}
{block name="style"}
    <style type="text/css">
        .tips {
            color: red;
        }
    </style>
{/block}
{block name="main"}
    <form action="edit" method="post" id="editForm">
        <div class="form-group">
            <label for="title">标题</label>
            <input type="text" class="form-control" id="title" name="title" value="{if empty($tempData)}{$news['title']|unescape}{else}{$tempData['title']|unescape}{/if}"/>
            <div class="title-tips tips"></div>
        </div>
        <div class="form-group">
            <label for="content">内容</label>
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain">
                {if empty($tempData)}{$news['content']|unescape}{else}{$tempData['content']|unescape}{/if}
            </script>
            {*<div id="content">
                <p>{if empty($tempData)}{$news['content']}{else}{$tempData['content']}{/if}</p>
            </div>*}
            <div class="content-tips tips"></div>
            {*<input type="hidden" name="content" id="content-hidden"/>*}
        </div>
        <input type="hidden" id="id" value="{$news['id']}" name="id"/>
        <a class="btn btn-default" href="index?page={if isset($smarty.get.page)}{$smarty.get.page}{else}1{/if}&kw={if isset($smarty.get.kw)}{$smarty.get.kw}{/if}">返回</a>
        <button class="btn btn-success pull-right" id="editTrue">提交</button>
    </form>
{/block}
{block name="js"}
    {Asset::js('news/ueditor/ueditor.config.js')}
    {Asset::js('news/ueditor/ueditor.all.js')}
    {Asset::js('news/wangEditor.min.js')}
    <script type="text/javascript">
        // 实例化百度编辑器
        var ue = UE.getEditor('container');

        // 实例化wangEdit
        /*var E = window.wangEditor;
        var editor = new E('#content');
        //    editor.customConfig.uploadImgShowBase64 = true; // 使用 base64 保存图片
        editor.customConfig.uploadImgServer = '/upload'; // 上传图片到服务器
        editor.customConfig.showLinkImg = false; // 隐藏“网络图片”tab
        editor.customConfig.uploadImgMaxSize = 5 * 1024 * 1024; // 将图片大小限制为 5M
        editor.customConfig.uploadImgMaxLength = 5; // 限制一次最多上传 5 张图片
        editor.customConfig.uploadFileName = 'img';
        editor.customConfig.uploadImgTimeout = 30000;
        editor.create();*/
    </script>
{/block}