<?php
/* Smarty version 3.1.31, created on 2017-09-05 18:00:59
  from "D:\wamp64\www\news\fuel\app\views\news\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae75db52f7e5_13537868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bafebcb76928c6c128ba01ccdb07a71f11fee2c6' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\index.tpl',
      1 => 1504605657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae75db52f7e5_13537868 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1344059ae75db41c358_35761565', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_274559ae75db4291c6_79009850', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_1344059ae75db41c358_35761565 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1344059ae75db41c358_35761565',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
首页<?php
}
}
/* {/block "title"} */
/* {block "main"} */
class Block_274559ae75db4291c6_79009850 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_274559ae75db4291c6_79009850',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <a href="/news/public/news/index" class="h2">今日头条<?php echo Smarty::SMARTY_VERSION;?>
</a>
    <div class="row">
        <form action="/news/public/news/index" method="get" class="form-inline pull-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="输入文章标题搜索" name="kw" value="<?php if (!empty($_GET['kw'])) {
echo $_GET['kw'];
}?>" />
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
            <?php if (!empty($_GET['page'])) {
$_smarty_tpl->_assignInScope('isPage', $_GET['page']);
} else {
$_smarty_tpl->_assignInScope('isPage', 1);
}?>
            <?php if (empty($_smarty_tpl->tpl_vars['allArticle']->value)) {
echo '<tr><td colspan="5" style="font-width: 600;">没有查到数据</td></tr>';
}?>
            <?php if (!isset($_smarty_tpl->tpl_vars['allArticle']->value)) {
$_smarty_tpl->_assignInScope('allArticle', array());
}?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allArticle']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['k']->value+1+($_smarty_tpl->tpl_vars['isPage']->value-1)*3;?>
</td>
                    <td>
                        <a href="view?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['isPage']->value;?>
&kw=<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a>
                    </td>
                    <td><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['v']->value['creat_time']);?>
</td>
                    <td><?php if (!empty($_smarty_tpl->tpl_vars['v']->value['update_time'])) {
echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['v']->value['update_time']);
} else {
echo '无';
}?></td>
                    <td>
                        <a class="btn btn-danger" href="/news/public/news/delete?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">删除</a>
                        <a class="btn btn-info"
                           href="/news/public/news/edit?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&page=<?php if (isset($_GET['page'])) {
echo $_GET['page'];
} else { ?>1<?php }?>&kw=<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>">编辑</a>
                    </td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        </table>
    </div>
    <?php echo \Fuel\Core\Pagination::instance('page')->render();?>

    <a class="btn btn-success" href="/news/public/news/add?page=<?php echo $_smarty_tpl->tpl_vars['isPage']->value;?>
&kw=<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>">添加文章</a>
<?php
}
}
/* {/block "main"} */
}
