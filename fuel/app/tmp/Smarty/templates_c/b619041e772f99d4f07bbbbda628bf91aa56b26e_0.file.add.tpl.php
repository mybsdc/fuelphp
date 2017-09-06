<?php
/* Smarty version 3.1.31, created on 2017-09-06 10:49:28
  from "D:\wamp64\www\news\fuel\app\views\news\add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59af62380540e6_34405445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b619041e772f99d4f07bbbbda628bf91aa56b26e' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\news\\add.tpl',
      1 => 1504666161,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59af62380540e6_34405445 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1640759af6237eb9d68_48227579', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3174859af6237ebf802_20037287', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1380559af6237ed0468_23949773', "main");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2358659af6238046cf9_49251464', "js");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'common/base.tpl');
}
/* {block "title"} */
class Block_1640759af6237eb9d68_48227579 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1640759af6237eb9d68_48227579',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
添加新闻<?php
}
}
/* {/block "title"} */
/* {block "style"} */
class Block_3174859af6237ebf802_20037287 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_3174859af6237ebf802_20037287',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo Asset::css('dropzone.min.css');?>

<?php
}
}
/* {/block "style"} */
/* {block "main"} */
class Block_1380559af6237ed0468_23949773 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1380559af6237ed0468_23949773',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="tips"></div>
    <form action="add" method="post" class="dropzone" id="addForm">
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
        

        <div class="fallback">
            <input name="file" type="file" multiple/>
        </div>


        <div class="form-group">
            <span>所属分类</span>
            <select>
                <option value="1">财经</option>
                <option value="2">社会</option>
                <option value="3">科技</option>
            </select>
        </div>

        <a class="btn btn-default"
           href="index?page=<?php if (isset($_GET['page'])) {
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
class Block_2358659af6238046cf9_49251464 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_2358659af6238046cf9_49251464',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo Asset::js('news/ueditor/ueditor.config.js');?>

    <?php echo Asset::js('news/ueditor/ueditor.all.js');?>

    
    <?php echo Asset::js('news/dropzone.min.js');?>

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
