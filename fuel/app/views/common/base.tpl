<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {*标题*}
    <title>{block name="title"}{/block}</title>
    {*end 标题*}
    {*公共css*}
    {Asset::css('bootstrap.css')}
    {*end 公共css*}
    {*当前页单独css*}
    {block name="style"}{/block}
    {*end 当前页单独css*}
</head>
<body>
<div class="container">
    {*主体*}
    {block name="main"}{/block}
    {*end 主体*}
</div>
{*公共js*}
{Asset::js('jquery.js')}
{Asset::js('bootstrap.min.js')}
{Asset::js('news/base.js')}
<script type="text/javascript">
    var page = {if isset($smarty.get.page)}{$smarty.get.page}{else}1{/if};
    var kw = '{if isset($smarty.get.kw)}{$smarty.get.kw}{/if}';
</script>
{*end 公共js*}
{*当前页单独js*}
{block name="js"}{/block}
{*end 当前页单独js*}
</body>
</html>