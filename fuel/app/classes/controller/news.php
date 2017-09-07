<?php
/**
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/8/28
 * @time 16:58
 */

use \Model\Article;
use \Fuel\Core\View;
use \Fuel\Core\Input;
use \Fuel\Core\Response;
use \Fuel\Core\Controller;
use \Fuel\Core\Validation;
use \Fuel\Core\DB;
use \Fuel\Core\Session;
use \Parser\View_Smarty; // 第三方类库
use \Email\Email;

class Controller_News extends Controller
{
    /**
     * 新闻列表
     * @return mixed
     */
    public function action_index()
    {
        $data = Article::get_all_news_and_pages(Input::get('kw'), Input::get('page')); // Input会自动判定是否isset

        return View_Smarty::forge('news/index', $data);
    }

    /**
     * 查看新闻
     * @return View
     */
    public function action_view()
    {
        $news = Article::get_news_by_id(Input::get('id'));
        $data['news'] = $news;

        return View_Smarty::forge('news/view', $data);
    }

    /**
     * 编辑新闻
     * @return mixed
     */
    public function action_edit()
    {
        if (Input::method() === 'POST') {
            $data = Input::post();
            $val = $this->action_valid_rule();

            if (!$val->run($data)) {
//            return json_encode($val->error_message());
                $result['status'] = -1;
                $result['data'] = $val->error_message();
                return json_encode($result);
            } else { // 验证通过
                Session::set('data', $data); // 写入session
                $result = [];
                $result['status'] = 200;
                return json_encode($result);
            }
        } else {
            $strReferrer = Input::referrer();
            if (strpos($strReferrer, 'news/edit_true') === false) {
                Session::delete('data');
            }
            $id = Input::get('id');
            $news = Article::get_news_by_id($id);
            $data['news'] = $news;
            $data['tempData'] = !empty(Session::get('data')) ? Session::get('data') : [];

            return View_Smarty::forge('news/edit', $data);
        }
    }

    /**
     * 编辑确认
     * @return string
     */
    public function action_edit_true()
    {
        if (Input::method() === 'POST' && Input::post('is_true') == 1) { // 确认提交编辑
            $data = Session::get('data'); // 取session数据

            $news = Article::find_by_pk($data['id']);
            $news->set([
                'title' => $data['title'],
                'content' => $data['content'],
                'update_time' => time()
            ]);

            if ($news->save() !== false) {
                $result = [];
                $result['status'] = 200;
                Session::delete('data'); // 清空临时数据
                return json_encode($result);
            }
        } else { // 加载确认页面
            $postEditData['data'] = Session::get('data'); // 暂存的数据

            return View_Smarty::forge('news/edit_true', $postEditData);
        }
    }

    /**
     * 添加
     * @return mixed
     */
    public function action_add()
    {
        if (Input::method() === 'POST') {
            $data = Input::post();
            $val = $this->action_valid_rule();

            if (!$val->run($data)) {
                // $val->error_message();
                $result['status'] = -1;
                foreach ($val->error() as $field => $error) {
                    $result['data'][] = $error->get_message();
                }
                return json_encode($result);
            }

            $data['creat_time'] = time();
            if (Article::forge($data)->save() !== false) {
                $result['status'] = 200;
                return json_encode($result);
//                Response::redirect('news/index');
            }
        } else {
            return View_Smarty::forge('news/add');
        }
    }

    /**
     * 处理删除请求
     */
    public function action_delete()
    {
        $id = Input::get('id');
        $news = Article::find_by_pk($id);
        if ($news) {
            $news->delete();
            Response::redirect('news/index');
//            echo '删除成功';
        } else {
            echo '文件不存在';
        }
    }

    /**
     * 验证规则 for 文章添加与修改
     */
    public function action_valid_rule()
    {
        $val = Validation::forge();
        $val->add_field('title', '新闻标题', 'required|min_length[2]|max_length[10]');
        $val->add_field('content', '新闻内容', 'required|min_length[4]|max_length[300]');
        $val->set_message('required', ':label不能为空')
            ->set_message('min_length', ':label不能少于:param:1个字符')
            ->set_message('max_length', ':label不能大于:param:1个字符');
        return $val;
    }

    public function action_sendEmail()
    {
        $id = (int)Input::post('id');
        $data = Article::get_news_by_id($id);
        $html['htmlData'] = $data;
        $toEmail = !empty(Input::post('toEmail')) ? Input::post('toEmail') : 'mybsdc@qq.com';

        $email = Email::forge();
        $email->from('3074053670@qq.com', '初音');
        $email->to($toEmail, '罗叔叔');
        $email->subject($data['title']);
        // $email->body($data['content']);
        $email->html_body(View_Smarty::forge('email/template', $html));
        $email->attach(DOCROOT . 'assets/img/test.jpg', true);
        $email->alt_body('你的邮箱太过古老，不支持html格式邮件<del>，请考虑切腹</del>');

        if ($email->send()) {
            $result = [
                'code' => 200,
                'msg' => '成功向' . $toEmail . '发送了一封邮件'
            ];
        } else {
            $result = [
                'code' => -1,
                'msg' => '发送失败'
            ];
        }
        return json_encode($result);
    }

    public function action_test()
    {

    }
}