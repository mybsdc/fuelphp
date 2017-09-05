<?php
/* Smarty version 3.1.31, created on 2017-09-05 17:24:21
  from "D:\wamp64\www\news\fuel\app\views\news\edit_true.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae6d45e00751_81280506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f50e5aec15a4c1d7dc6c729337af5167394bde98' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\edit_true.tpl',
      1 => 1504603459,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae6d45e00751_81280506 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3087959ae6d45de5a38_84500198', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3223659ae6d45deb920_91108065', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_3087959ae6d45de5a38_84500198 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3087959ae6d45de5a38_84500198',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
确认页面<?php
}
}
/* {/block "title"} */
/* {block "main"} */
class Block_3223659ae6d45deb920_91108065 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_3223659ae6d45deb920_91108065',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="alert alert-success" role="alert">请确认您的输入是否正确</div>
    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">标题</div>
            <div class="panel-body">
                <?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">内容</div>
            <div class="panel-body">
                <?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['data']->value['content'], ENT_QUOTES);?>

            </div>
        </div>
    </div>
    <div class="row pull-right">
        <button class="btn btn-default" onclick="self.location=document.referrer;">返回</button>
        <button class="btn btn-success" id="editPost">提交</button>
    </div>
<?php
}
}
/* {/block "main"} */
}
