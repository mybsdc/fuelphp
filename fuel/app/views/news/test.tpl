{extends file='common/base.tpl'}
{block name="title"}测试{/block}
{block name="style"}
    {Asset::css('fileinput/fileinput.min.css')}
{/block}
{block name="main"}
    <form action="test" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Preview File Icon</label>
            <input id="fileTest" type="file" multiple>
        </div>
    </form>
{/block}
{block name="js"}
    {Asset::js('news/fileinput/piexif.min.js')}
    {Asset::js('news/fileinput/purify.min.js')}
    {Asset::js('news/fileinput/sortable.min.js')}
    {Asset::js('news/fileinput/fileinput.min.js')}
    {Asset::js('news/fileinput/zh.js')}
    <script>
        {literal}
        $('#fileTest').fileinput({
            language: 'zh', // 语言
            uploadUrl: 'test1', // 上传地址
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'], // 允许的后缀
            showUpload: true, // 是否显示上传按钮
            showCaption: false, // 是否显示输入框
            browseClass: "btn btn-success pull-right", // 选择文件按钮样式
            // elErrorContainer: '#errorBlock', // 错误回调容器
            browseOnZoneClick: true, // 是否在点击预览区域时触发文件浏览选择
            fileType: 'any',
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>", // 检测到用于预览的不可读文件类型时，将在每个预览文件缩略图中显示的图标
            overwriteInitial: false, // 选择新图片时是否清空初始预览内容
            initialPreviewAsData: true, // 是否将初始预览内容集解析为数据而不是原始标记语言
            /*
            initialPreview: [ // 要显示的初始预览内容
                "http://lorempixel.com/1920/1080/transport/1",
                "http://lorempixel.com/1920/1080/transport/2",
                "http://lorempixel.com/1920/1080/transport/3"
            ],
            initialPreviewConfig: [ // 为每个预览图设置属性样式
                {caption: "transport-1.jpg", size: 329892, width: '120px', key: 1},
                {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ],
            */
            deleteExtraData: {id: 2}, // 删除时post到后台的数据，同ajax提交
            deleteUrl: 'test1', // 通过AJAX POST响应删除预览中图像或内容的URL地址。它会被initialPreviewConfig['url']属性覆盖
            maxFileSize: 1000,
            maxFilesNum: 10

        });
        {/literal}
    </script>
{/block}