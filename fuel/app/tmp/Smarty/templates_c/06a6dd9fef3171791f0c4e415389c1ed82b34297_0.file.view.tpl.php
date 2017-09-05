<?php
/* Smarty version 3.1.31, created on 2017-09-05 17:23:34
  from "D:\wamp64\www\news\fuel\app\views\news\view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae6d16972274_36947648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06a6dd9fef3171791f0c4e415389c1ed82b34297' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\view.tpl',
      1 => 1504603411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae6d16972274_36947648 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1785659ae6d169406c3_80018809', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2533759ae6d1694c617_37088633', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_1785659ae6d169406c3_80018809 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1785659ae6d169406c3_80018809',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
 - 新闻查看<?php
}
}
/* {/block "title"} */
/* {block "main"} */
class Block_2533759ae6d1694c617_37088633 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_2533759ae6d1694c617_37088633',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <a class="btn btn-success" href="index?page=<?php if (!empty($_GET['page'])) {
echo $_GET['page'];
} else { ?>1<?php }?>&kw=<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>">返回</a>
    <h2><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</h2>
    <hr/>
    <?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>

<?php
}
}
/* {/block "main"} */
}
