<?php
/* Smarty version 3.1.31, created on 2017-09-05 17:09:36
  from "D:\wamp64\www\news\fuel\app\views\common\base.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ae69d0409a26_28636741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4acdcd47226f68205142700a612cff6536637561' => 
    array (
      0 => 'D:\\wamp64\\www\\news\\fuel\\app\\views\\common\\base.tpl',
      1 => 1504602501,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ae69d0409a26_28636741 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2899759ae69d03c0fe1_19391295', "title");
?>
</title>
    
    
    <?php echo Asset::css('bootstrap.css');?>

    
    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2882659ae69d03cf0a9_56690287', "style");
?>

    
</head>
<body>
<div class="container">
    
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_353159ae69d03dbf26_28565989', "main");
?>

    
</div>

<?php echo Asset::js('jquery.js');?>

<?php echo Asset::js('bootstrap.min.js');?>

<?php echo Asset::js('news/base.js');?>

<?php echo '<script'; ?>
 type="text/javascript">
    var page = <?php if (isset($_GET['page'])) {
echo $_GET['page'];
} else { ?>1<?php }?>;
    var kw = '<?php if (isset($_GET['kw'])) {
echo $_GET['kw'];
}?>';
<?php echo '</script'; ?>
>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2704859ae69d0405e16_24214637', "js");
?>


</body>
</html><?php }
/* {block "title"} */
class Block_2899759ae69d03c0fe1_19391295 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2899759ae69d03c0fe1_19391295',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "style"} */
class Block_2882659ae69d03cf0a9_56690287 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_2882659ae69d03cf0a9_56690287',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "style"} */
/* {block "main"} */
class Block_353159ae69d03dbf26_28565989 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_353159ae69d03dbf26_28565989',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "main"} */
/* {block "js"} */
class Block_2704859ae69d0405e16_24214637 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'js' => 
  array (
    0 => 'Block_2704859ae69d0405e16_24214637',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "js"} */
}
