<?php
/**
 * @author mybsdc <mybsdc@gmail.com>
 * @date 2017/8/28
 * @time 17:05
 */

namespace Model;

use Fuel\Core\DB;
use Fuel\Core\Model_Crud;
use \Fuel\Core\Pagination;

class Article extends Model_Crud
{
    protected static $_table_name = 'fuel_article';

    /**
     * 获取所有的新闻
     * @return array|null
     */
    public static function get_all_news()
    {
//        return DB::select()->from('fuel_article')->execute(); // 查询构建器
//        return DB::query('select * from `fuel_article`'); // 原生sql
        return Article::find([
            'order_by' => ['id' => 'desc'],
        ]);
    }

    /**
     * 获取某一篇新闻
     * @param $id
     * @return null|object
     */
    public static function get_news_by_id($id)
    {
        return Article::find_by_pk($id);
    }

    /**
     * 获取搜索记录总数
     * @param string $tb
     * @param string $kw
     * @return int
     */
    public static function get_search_count($tb = '', $kw = '')
    {
        return DB::query("SELECT COUNT(*) AS c FROM `$tb` WHERE `title` LIKE '%$kw%'")->execute()->as_array()[0]['c'];
    }

    /**
     * 根据搜索条件或者直接获取所有新闻且含分页
     * @param string $kw 关键字
     * @param int $page 页码数
     * @return array
     */
    public static function get_all_news_and_pages($kw = '', $page = 1)
    {
        // 安全过滤
        $kw = (string)$kw;
        $page = (int)$page;

        // 初始化配置
        $data = [];
        $config = [
            'pagination_url' => 'http://localhost/news/public/news/index',
            'offset' => $page,
            'total_items' => DB::count_records('fuel_article'),
            'per_page' => 3, // 每页显示条数
            'num_links' => 3, // 页码数
            'uri_segment' => 'page', //"http://localhost/fuel/news/index/?page=2
            'wrapper' => '<ul class="pagination pull-right">{pagination}</ul>',
            'regular' => '<li>{link}</li>',
            'active' => '<li class="active">{link}</li>',
            'previous' => '<li class="previous">{link}</li>',
            'next' => '<li class="next">{link}</li>',
            'next-inactive' => '<li class="next-inactive disabled">{link}</li>',
            'previous-inactive' => '<li class="previous-inactive disabled">{link}</li>',
            'previous-marker' => '上一页',
            'next-marker' => '下一页',
            'first-marker' => '首页',
            'last-marker' => '尾页',
            'first' => '<li class="first">{link}</li>',
            'last' => '<li class="last">{link}</li>',
            'show_first' => true,
            'show_last' => true,
        ];

        if ($kw !== '') {
            $config['total_items'] = Article::get_search_count('fuel_article', $kw);
            $config['pagination_url'] = 'http://localhost/news/public/news/index?kw=' . $kw;
        }

        $pagination = Pagination::forge('page', $config);

        // 有无搜索条件结果不一样
        if ($kw !== '') {
            $data['allArticle'] = DB::select('*')
                ->from('fuel_article')
                ->where('title', 'like', "%$kw%")
                ->order_by('id', 'DESC')
                ->limit($pagination->per_page)
                ->offset($pagination->offset)
                ->execute()
                ->as_array();
        } else {
            $data['allArticle'] = DB::select('*')
                ->from('fuel_article')
                ->order_by('id', 'DESC')
                ->limit($pagination->per_page)
                ->offset($pagination->offset)
                ->execute()
                ->as_array();
        }

        // 生成分页
        $data['pagination'] = $pagination->pages_render();

        return $data;
    }
}