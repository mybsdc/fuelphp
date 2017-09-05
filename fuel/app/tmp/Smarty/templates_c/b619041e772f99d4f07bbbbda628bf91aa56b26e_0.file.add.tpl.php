<?php
/* Smarty version 3.1.31, created on 2017-09-05 18:01:30
  from "D:\wamp64\www\news\fuel\app\views\news\add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae75fa5161e9_57918675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b619041e772f99d4f07bbbbda628bf91aa56b26e' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\add.tpl',
      1 => 1504605688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae75fa5161e9_57918675 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2541259ae75fa4e1128_53188494', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1130959ae75fa4e6697_27740247', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1366659ae75fa4eaae5_43889145', "main");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1816359ae75fa50a486_89720764', "js");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_2541259ae75fa4e1128_53188494 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2541259ae75fa4e1128_53188494',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
添加新闻<?php
}
}
/* {/block "title"} */
/* {block "style"} */
class Block_1130959ae75fa4e6697_27740247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_1130959ae75fa4e6697_27740247',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "style"} */
/* {block "main"} */
class Block_1366659ae75fa4eaae5_43889145 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1366659ae75fa4eaae5_43889145',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="tips"></div>
    <form action="add" method="post" id="addForm">
        <div class="form-group">
            <label for="exampleInputEmail1">标题</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入标题" name="title"/>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">内容</label>
            <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="请输入内容" name="content" /> -->
            <!-- 加载编辑器的容器 -->
            <?php echo '<script'; ?>
 id="container" name="content" type="text/plain" placeholder="请输入内容">
            <?php echo '</script'; ?>
>
        </div>
        <div class="form-group">
            <span>所属分类</span>
            <select>
                <option value="1">财经</option>
                <option value="2">社会</option>
                <option value="3">科技</option>
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="test" accept="image/*" />
        </div>
        <a class="btn btn-default" href="index?page=<?php if (isset($_GET['page'])) {
echo $_GET['page'];
} else { ?>1<?php }?>&kw=<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>">返回</a>
        <button class="btn btn-success pull-right" id="addPost">提交</button>
    </form>
<?php
}
}
/* {/block "main"} */
/* {block "js"} */
class Block_1816359ae75fa50a486_89720764 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_1816359ae75fa50a486_89720764',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo Asset::js('news/ueditor/ueditor.config.js');?>

    <?php echo Asset::js('news/ueditor/ueditor.all.js');?>

    <?php echo '<script'; ?>
 type="text/javascript">
        var ue = UE.getEditor('container');
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
