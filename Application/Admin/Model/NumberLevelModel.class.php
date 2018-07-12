<?php
namespace Admin\Model;
use Think\Model;
class NumberLevelModel extends Model 
{
	protected $insertFields = array('level_name','bottom_num','top_num','rate');
	protected $updateFields = array('level_id','level_name','bottom_num','top_num','rate');
	protected $_validate = array(
		array('level_name', '1,30', '的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('bottom_num', 'number', '必须是一个整数！', 2, 'regex', 3),
		array('top_num', 'number', '必须是一个整数！', 2, 'regex', 3),
		array('rate', 'number', '必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->where($where)->group('a.level_id')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
	}
	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['level_id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/
}