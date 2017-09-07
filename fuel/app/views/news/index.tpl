{extends file='common/base.tpl'}
{block name="title"}首页{/block}
{block name="main"}
    <a href="/news/public/news/index" class="h2">今日头条{Smarty::SMARTY_VERSION}</a>
    <div class="row">
        <form action="/news/public/news/index" method="get" class="form-inline pull-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="输入文章标题搜索" name="kw"
                       value="{if !empty($smarty.get.kw)}{$smarty.get.kw}{/if}" required="required"/>
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
    </div>
    <div class="row">
        <table class="table table-bordered table-striped">
            <tr>
                <th>序号</th>
                <th>标题</th>
                <th>添加时间</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
            {if !empty($smarty.get.page)}{$isPage = $smarty.get.page}{else}{$isPage = 1}{/if}
            {if empty($allArticle)}{'<tr><td colspan="5" style="font-width: 600;">没有查到数据</td></tr>'}{/if}
            {if !isset($allArticle)}{$allArticle = []}{/if}
            {foreach $allArticle as $k => $v}
                <tr>
                    <td>{$k + 1 + ($isPage - 1) * 3}</td>
                    <td>
                        <a href="view?id={$v['id']}&page={$isPage}&kw={if isset($smarty.get.kw)}{$smarty.get.kw}{/if}">{$v['title']}</a>
                    </td>
                    <td>{date('Y-m-d H:i:s', $v['creat_time'])}</td>
                    <td>{if !empty($v['update_time'])}{date('Y-m-d H:i:s', $v['update_time'])}{else}{'无'}{/if}</td>
                    <td>
                        <a class="btn btn-danger" href="/news/public/news/delete?id={$v['id']}">删除</a>
                        <a class="btn btn-info" href="/news/public/news/edit?id={$v['id']}&page={if isset($smarty.get.page)}{$smarty.get.page}{else}1{/if}&kw={if isset($smarty.get.kw)}{$smarty.get.kw}{/if}">编辑</a>
                        <input type="text" placeholder="收件地址" class="form-control toEmail" style="width: 46%; display: inline-block;" id="{$v['id']}"/>
                        <button class="btn btn-success" onclick="sendEmail({$v['id']});">邮件发送</button>
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>
    {\Fuel\Core\Pagination::instance('page')->render()}
    <a class="btn btn-success" href="/news/public/news/add?page={$isPage}&kw={if isset($smarty.get.kw)}{$smarty.get.kw}{/if}">添加文章</a>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="tips-w">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">通知</h4>
                </div>
                <div class="modal-body" id="e-res"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">我知道了</button>
                </div>
            </div>
        </div>
    </div>
{/block}