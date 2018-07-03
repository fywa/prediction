<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use think\Controller;
class Index extends Controller
{
	public function index()
	{
		$arr=array(
		         0=>array('title' => '新闻1', 'viewnum' => 123, 'content' => 'ZAQXSWedcrfv'),
		         1=>array('title' => '新闻2', 'viewnum' => 99, 'content' => 'QWERTYUIOPZXCVBNM')
		        );
		echo '不统计多维数组：'.count($arr,COUNT_NORMAL);//count($arr,COUNT_NORMAL)
		echo "<br/>";
		echo '统计多维数组：'.count($arr,1);//count($arr,COUNT_RECURSIVE)
		echo "<br/>";
		echo '统计多维数组长度：'.$arr.length;//count($arr,COUNT_RECURSIVE)

	}
}