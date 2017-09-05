{extends file='common/base.tpl'}
{block name="title"}{$news['title']} - 新闻查看{/block}
{block name="main"}
    <a class="btn btn-success" href="index?page={if !empty($smarty.get.page)}{$smarty.get.page}{else}1{/if}&kw={if isset($smarty.get.kw)}{$smarty.get.kw}{/if}">返回</a>
    <h2>{$news['title']}</h2>
    <hr/>
    {$news['content']}
{/block}