{extends file='common/base.tpl'}
{block name="title"}测试{/block}
{block name="main"}
<form action="test" method="post">
    <div class="form-group">
        <label for="test1"></label>
        <input type="file" id="test1" class="form-control" name="testImg" />
    </div>
    <div class="form-group">
        <button class="btn btn-success">提交</button>
    </div>
</form>
{/block}