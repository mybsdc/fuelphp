{extends file='common/base.tpl'}
{block name="title"}确认页面{/block}
{block name="main"}
    <div class="row">
        <div class="alert alert-success" role="alert">请确认您的输入是否正确</div>
    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">标题</div>
            <div class="panel-body">
                {$data['title']}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">内容</div>
            <div class="panel-body">
                {$data['content']|unescape}
            </div>
        </div>
    </div>
    <div class="row pull-right">
        <button class="btn btn-default" onclick="self.location=document.referrer;">返回</button>
        <button class="btn btn-success" id="editPost">提交</button>
    </div>
{/block}