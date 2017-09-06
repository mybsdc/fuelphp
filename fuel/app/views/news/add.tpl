{extends file='common/base.tpl'}
{block name="title"}添加新闻{/block}
{block name="style"}
    {Asset::css('dropzone.min.css')}
{/block}
{block name="main"}
    <div id="tips"></div>
    <form action="add" method="post" class="dropzone" id="addForm">
        <div class="form-group">
            <label for="exampleInputEmail1">标题</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入标题" name="title"/>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">内容</label>
            <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="请输入内容" name="content" /> -->
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain" placeholder="请输入内容">
            </script>
        </div>
        {*图片上传*}

        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>


        <div class="form-group">
            <span>所属分类</span>
            <select>
                <option value="1">财经</option>
                <option value="2">社会</option>
                <option value="3">科技</option>
            </select>
        </div>

        <a class="btn btn-default"
           href="index?page={if isset($smarty.get.page)}{$smarty.get.page}{else}1{/if}&kw={if isset($smarty.get.kw)}{$smarty.get.kw}{/if}">返回</a>
        <button class="btn btn-success pull-right" id="addPost">提交</button>


    </form>
{/block}
{block name="js"}
    {Asset::js('news/ueditor/ueditor.config.js')}
    {Asset::js('news/ueditor/ueditor.all.js')}
    {*多图片上传*}
    {Asset::js('news/dropzone.min.js')}
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
    <script>
        Dropzone.options.myAwesomeDropzone = false;
        Dropzone.options.myDropzone = {
            init: function() {
                this.on("success", function(file, serverResponse) {
                    // Called after the file successfully uploaded.
                    // If the image is already a thumbnail:
                    this.emit('thumbnail', file, serverResponse.imageUrl);
                    // If it needs resizing:
                    this.createThumbnailFromUrl(file, serverResponse.imageUrl);
                });
            }
        };
    </script>
{/block}