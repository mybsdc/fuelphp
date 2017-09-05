<?php
/* Smarty version 3.1.31, created on 2017-09-05 15:55:43
  from "D:\wamp64\www\news\fuel\app\views\news\test.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae587f4a7503_69434995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbc9fc8d58cb54a3f56137841b01fd2fd84e8884' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\test.tpl',
      1 => 1504598141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae587f4a7503_69434995 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1521159ae587f49ddd9_70117830', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_583259ae587f4a4186_71853596', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_1521159ae587f49ddd9_70117830 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1521159ae587f49ddd9_70117830',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
测试<?php
}
}
/* {/block "title"} */
/* {block "main"} */
class Block_583259ae587f4a4186_71853596 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_583259ae587f4a4186_71853596',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<form action="test" method="post">
    <div class="form-group">
        <label for="test1"></label>
        <input type="file" id="test1" class="form-control" name="testImg" />
    </div>
    <div class="form-group">
        <button class="btn btn-success">提交</button>
    </div>
</form>
<?php
}
}
/* {/block "main"} */
}
