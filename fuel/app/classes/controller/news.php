<?php
/**
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/8/28
 * @time 16:58
 */

use App\Services\OSS;
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
use \Fuel\Core\Package; // test load
use PHPMailer\PHPMailer\PHPMailer;

class Controller_News extends Controller
{


    public function action_t()
    {
        echo '<pre>';
        $t =
            print_r($t);
    }

    public function action_toExcel()
    {
        $obj_excel = new \PHPExcel();
        // $result = Article::get_all_news();
        $result = Article::get_news_by_page((int)Input::get('page'));
        $obj_excel->getActiveSheet()->setCellValue('A1', '序号', true);
        $obj_excel->getActiveSheet()->setCellValue('B1', '标题', true);
        $obj_excel->getActiveSheet()->setCellValue('C1', '发布时间', true);
        $obj_excel->getActiveSheet()->setCellValue('D1', '更新时间', true);
        $obj_excel->getActiveSheet()->getStyle('A1:D1')->getFont()->setSize(12)->setBold(true)->setName('微软雅黑');
        $obj_excel->getActiveSheet()->getStyle('A1:D1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
        $obj_excel->getActiveSheet()->getStyle('A1:D1')->getFill()->getStartColor()->setRGB('17A3FF');
        $obj_excel->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $obj_excel->getActiveSheet()->getStyle('A1:D1')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_WHITE);
        foreach ($result as $k => $v) {
            $num = $k + 2;
            $obj_excel->getActiveSheet()->setCellValue('A' . $num, $k + 1)->getColumnDimension('A')->setWidth(6);
            $obj_excel->getActiveSheet()->setCellValue('B' . $num, $v['title'])->getColumnDimension('B')->setWidth(30);
            $obj_excel->getActiveSheet()->setCellValue('C' . $num, date('Y-m-d H:i:s', $v['creat_time']))->getColumnDimension('C')->setWidth(20);
            $obj_excel->getActiveSheet()->setCellValue('D' . $num, date('Y-m-d H:i:s', $v['update_time']))->getColumnDimension('D')->setWidth(20);
        }
        $file_name = date('Y-m-d-H-i-s', time()) . '_新闻数据导出.xlsx';
        $obj_excel->getActiveSheet()->setTitle('新闻头条');
        $obj_writer = \PHPExcel_IOFactory::createWriter($obj_excel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header('Content-Disposition: attachment;filename=' . $file_name);
        header('Cache-Control: max-age=0');
        $obj_writer->save('php://output');
    }

    public function action_toEmail()
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.qq.com';
        $mail->SMTPAuth = true;
        $mail->Username = '3074053670@qq.com';
        $mail->Password = 'junxmcaubfjedheh';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('3074053670@qq.com', 'feifei');
        $mail->addAddress('593198779@qq.com', 'luoshushu');
        $mail->addReplyTo('view@qq.com', '访客');

        /*$mail->addAttachment('/var/tmp/file.tar.gz');
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/
        $mail->isHTML(true);

        $mail->Subject = '我是主题';
        $mail->Body = '我是内容';

        $mail->setLanguage('zh_cn', '/optional/path/to/language/directory/');

        if (!$mail->send()) {
            echo '发送失败';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '已发送';
        }
    }

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
        if (Input::post()) {
            $id = (int)Input::post('id');
            $data = Article::get_news_by_id($id);
            $html['htmlData'] = $data;
            $toEmail = !empty(Input::post('toEmail')) ? Input::post('toEmail') : 'mybsdc@qq.com';

            $email = Email::forge();
            $email->from('3074053670@qq.com', '初音');
            $email->to($toEmail, '罗叔叔');
            $email->subject($data['title']);
            // $email->body($data['content']);

            try { // 异常捕获
                $email->html_body(View_Smarty::forge('email/template', $html));
            } catch (\AttachmentNotFoundException $e) {
                $result = [
                    'code' => -1,
                    'msg' => '图片地址不正确'
                ];
                return json_encode($result);
            }
            $email->attach(DOCROOT . 'assets/img/test.jpg', true);
            $email->alt_body('你的邮箱太过古老，不支持html格式邮件<del>，请考虑切腹</del>');

            try {
                $email->send();
                $result = [
                    'code' => 200,
                    'msg' => '成功向' . $toEmail . '发送了一封邮件'
                ];
            } catch (\EmailValidationFailedException $e) {
                // The validation failed
                $result = [
                    'code' => -1,
                    'msg' => '验证不通过，请检查配置'
                ];
            } catch (\EmailSendingFailedException $e) {
                // The driver could not send the email
                $result = [
                    'code' => -1,
                    'msg' => '邮件驱动存在问题'
                ];
            }
            /*
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.qq.com';
            $mail->SMTPAuth = true;
            $mail->Username = '3074053670@qq.com';
            $mail->Password = 'junxmcaubfjedheh';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('3074053670@qq.com', 'feifei');
            $mail->addAddress('593198779@qq.com', 'luoshushu');
            $mail->addReplyTo('view@qq.com', '访客');

            $mail->addAttachment('/var/tmp/file.tar.gz');
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
            $mail->isHTML(true);

            $mail->Subject = $data['title'];
            $mail->Body = View_Smarty::forge('email/template', $html);

            $mail->setLanguage('zh_cn', '/optional/path/to/language/directory/');

            if (!$mail->send()) {
                $result = [
                    'code' => 200,
                    'msg' => '失败，原因是' . $mail->ErrorInfo
                ];
            } else {
                $result = [
                    'code' => 200,
                    'msg' => '成功向' . $toEmail . '发送了一封邮件'
                ];
            }
            */

            return json_encode($result);
        } else {
            return '403';
        }
    }

    public function action_test()
    {
        return View_Smarty::forge('news/test');
    }

    public function action_test1()
    {
//        return View_Smarty::forge('news/test');
//        return json_encode('success');
        echo '<pre>';
        print_r($_FILES);
        exit;
    }
}