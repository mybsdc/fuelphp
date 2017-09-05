<?php
/* Smarty version 3.1.31, created on 2017-09-05 18:01:04
  from "D:\wamp64\www\news\fuel\app\views\news\edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae75e04523d6_38002836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a095749dc4dbeee89bac3d54d7015d5c489752a6' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\edit.tpl',
      1 => 1504605393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae75e04523d6_38002836 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1801559ae75e03f0eb4_39240738', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_631659ae75e03f6ba7_93168677', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_651759ae75e03fc2c0_78622687', "main");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1153059ae75e0443c35_01065856', "js");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_1801559ae75e03f0eb4_39240738 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1801559ae75e03f0eb4_39240738',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
编辑新闻<?php
}
}
/* {/block "title"} */
/* {block "style"} */
class Block_631659ae75e03f6ba7_93168677 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_631659ae75e03f6ba7_93168677',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style type="text/css">
        .tips {
            color: red;
        }
    </style>
<?php
}
}
/* {/block "style"} */
/* {block "main"} */
class Block_651759ae75e03fc2c0_78622687 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_651759ae75e03fc2c0_78622687',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form action="edit" method="post" id="editForm">
        <div class="form-group">
            <label for="title">标题</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php if (empty($_smarty_tpl->tpl_vars['tempData']->value)) {
echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['news']->value['title'], ENT_QUOTES);
} else {
echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['tempData']->value['title'], ENT_QUOTES);
}?>"/>
            <div class="title-tips tips"></div>
        </div>
        <div class="form-group">
            <label for="content">内容</label>
            <!-- 加载编辑器的容器 -->
            <?php echo '<script'; ?>
 id="container" name="content" type="text/plain">
                <?php if (empty($_smarty_tpl->tpl_vars['tempData']->value)) {
echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['news']->value['content'], ENT_QUOTES);
} else {
echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['tempData']->value['content'], ENT_QUOTES);
}?>
            <?php echo '</script'; ?>
>
            
            <div class="content-tips tips"></div>
            
        </div>
        <input type="hidden" id="id" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
" name="id"/>
        <a class="btn btn-default" href="index?page=<?php if (isset($_GET['page'])) {
echo $_GET['page'];
} else { ?>1<?php }?>&kw=<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>">返回</a>
        <button class="btn btn-success pull-right" id="editTrue">提交</button>
    </form>
<?php
}
}
/* {/block "main"} */
/* {block "js"} */
class Block_1153059ae75e0443c35_01065856 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_1153059ae75e0443c35_01065856',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo Asset::js('news/ueditor/ueditor.config.js');?>

    <?php echo Asset::js('news/ueditor/ueditor.all.js');?>

    <?php echo Asset::js('news/wangEditor.min.js');?>

    <?php echo '<script'; ?>
 type="text/javascript">
        // 实例化百度编辑器
        var ue = UE.getEditor('container');

        // 实例化wangEdit
        /*var E = window.wangEditor;
        var editor = new E('#content');
        //    editor.customConfig.uploadImgShowBase64 = true; // 使用 base64 保存图片
        editor.customConfig.uploadImgServer = '/upload'; // 上传图片到服务器
        editor.customConfig.showLinkImg = false; // 隐藏“网络图片”tab
        editor.customConfig.uploadImgMaxSize = 5 * 1024 * 1024; // 将图片大小限制为 5M
        editor.customConfig.uploadImgMaxLength = 5; // 限制一次最多上传 5 张图片
        editor.customConfig.uploadFileName = 'img';
        editor.customConfig.uploadImgTimeout = 30000;
        editor.create();*/
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "js"} */
}
