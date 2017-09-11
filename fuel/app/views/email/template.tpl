{extends file='common/base.tpl'}
{block name="title"}邮件分享 - 新闻{/block}
{block name="main"}
    <h2>{$htmlData['title']}</h2>
    <hr/>
    {$htmlData['content']}
    <hr />
    邮件是系统自动发送，请勿回复。

{/block}