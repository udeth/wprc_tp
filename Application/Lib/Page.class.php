<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$
use Think\Think;
class Page extends Think {
    // 起始行数
    public $firstRow	;
    // 列表每页显示行数
    public $listRows	;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 分页总页面数
    protected $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    protected $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页栏每页显示的页数
    protected $rollPage   ;
    //跳转页
    protected $jumpPage;
	// 分页显示定制
    protected $config  =	array('header'=>'条记录','prev'=>'上页','next'=>'下页','first'=>'第一页','last'=>'最后一页','theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end% %jumpPage%');

    /**
     +----------------------------------------------------------
     * 架构函数
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     +----------------------------------------------------------
     */
    public function __construct($totalRows,$listRows,$parameter='') {
        $this->totalRows = $totalRows;
        $this->parameter = $parameter;
        $this->rollPage = C('PAGE_ROLLPAGE');
        $this->listRows = !empty($listRows)?$listRows:C('PAGE_LISTROWS');
        $this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages  = ceil($this->totalPages/$this->rollPage);
        $this->nowPage  = !empty($_GET[C('VAR_PAGE')])?$_GET[C('VAR_PAGE')]:1;
		$this->jumpPage = $_POST[C('VAR_PAGE')];
		if($this->jumpPage!=""){
			 $url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?");
       		$p = C('VAR_PAGE');
       		if($this->jumpPage<2){

       			echo "<script>location.href='".$url."&".$p."=1'</script>";
       		}else{

       			echo "<script>location.href='".$url."&".$p."=".$this->jumpPage."'</script>";
       		}


		}
        if(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->firstRow = $this->listRows*($this->nowPage-1);
    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
     +----------------------------------------------------------
     * 分页显示输出
     +----------------------------------------------------------
     * @access public
     +----------------------------------------------------------
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p = C('VAR_PAGE');
        $nowCoolPage      = ceil($this->nowPage/$this->rollPage);
       $url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;
        $parse = parse_url($url);
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$p]);
            $url   =  $parse['path'].'?'.http_build_query($params);
        }
        //上下翻页字符串
        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<a href='".$url."&".$p."=$upRow'>".$this->config['prev']."</a>";
        }else{
            $upPage="";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<a href='".$url."&".$p."=$downRow'>".$this->config['next']."</a>";
        }else{
            $downPage="";
        }
        //跳转页字符串
        $jumpPage = "<form name=\"form1\" action='".$url."&".$p."=".$this->nowPage."' style=\"font-size:15px;padding:0px;margin:0px;\"   id=\"form1\" method=\"post\">转到<input tyle=\"text\" name='$p' id='$p' size='3' style=\"height:20px;padding:0px;margin:0px;\"/>页<input type=\"submit\" name='btn' id='btn' value='go' style=\"display:inline-block; height:25px;line-height:25px; width:32px; padding:0px;margin:0px; \"/></form>";
        // << < > >>
        if($nowCoolPage == 1){
            $theFirst = "";
            $prePage = "";
        }else{
            $preRow =  $this->nowPage-$this->rollPage;
            $prePage = "<a href='".$url."&".$p."=$preRow' >上".$this->rollPage."页</a>";
            $theFirst = "<a href='".$url."&".$p."=1' >".$this->config['first']."</a>";
        }
        if($nowCoolPage == $this->coolPages){
            $nextPage = "";
            $theEnd="";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            $theEndRow = $this->totalPages;
            $nextPage = "<a href='".$url."&".$p."=$nextRow' >下".$this->rollPage."页</a>";
            $theEnd = "<a href='".$url."&".$p."=$theEndRow' >".$this->config['last']."</a>";
        }
        // 1 2 3 4 5
        $linkPage = "";
        //echo $this->totalPages;
       // echo $this->rollPage;
        for($i=1;$i<=$this->totalPages;$i++){
			$page=($nowCoolPage-1)*$this->rollPage+$i;
			if($this->totalPages<=6){

					if($page!=$this->nowPage){
			                if($page<=$this->totalPages){
			                    $linkPage .= "<a href='".$url."&".$p."=$page'>".$page."</a>";
			                }else{
			                    break;
			                }
			        }else{
			                if($this->totalPages != 1){
			                    $linkPage .= "<span class='current'>".$page."</span>";
			                }
			        }

			}else{

				if(($this->nowPage)<5){

					if($i<=4){
			        	if($page!=$this->nowPage){
			                if($page<=$this->totalPages){
			                    $linkPage .= "<a href='".$url."&".$p."=$page'>".$page."</a>";
			                }else{
			                    break;
			                }
			            }else{
			                if($this->totalPages != 1){
			                    $linkPage .= "<span class='current'>".$page."</span>";
			                }
			            }

		        	}else if($i==$this->totalPages||$i==($this->totalPages-1)){
						if($i==($this->totalPages-1)) $linkPage .= "...<a href='".$url."&".$p."=$page'>".$page."</a>";
		        		else $linkPage .= "<a href='".$url."&".$p."=$page'>".$page."</a>";

		        	}
				}
				if(($this->nowPage)>($this->totalPages-4)&&($this->nowPage)>=5){

					if($i==1||$i==2){
						if($i==1)$linkPage .= "<a href='".$url."&".$p."=1'>1</a>";
						else $linkPage .= "<a href='".$url."&".$p."=2'>2</a>...";

		        	}else if($i>($this->totalPages-4)){
			        	if($i!=$this->nowPage){
			                if($i<=$this->totalPages){
			                    $linkPage .= "<a href='".$url."&".$p."=$i'>".$i."</a>";
			                }else{
			                	break;
			                }
			            }else{
			                if($this->totalPages != 1){
			                    $linkPage .= "<span class='current'>".$i."</span>";
			                }
			            }
		        	}

				}
				if( ($this->nowPage)>=5 && (($this->nowPage)<=($this->totalPages-4))){

					if($i==1||$i==2){
						if($i==1)$linkPage .= "<a href='".$url."&".$p."=1'>1</a>";
						else $linkPage .= "<a href='".$url."&".$p."=2'>2</a>...";

		        	}else if($i==$this->totalPages||$i==($this->totalPages-1)){
						if($i==($this->totalPages-1)) $linkPage .= "...<a href='".$url."&".$p."=$i'>".$i."</a>";
		        		else $linkPage .= "<a href='".$url."&".$p."=$i'>".$i."</a>";

		        	}else{

		        		if($i>($this->nowPage-3)&&$i<($this->nowPage+3)){
							if($i>=5&&$i<=($this->totalPages-4)){
			        			if($i!=$this->nowPage){
					                if($i<=$this->totalPages){
					                    $linkPage .= "<a href='".$url."&".$p."=$i'>".$i."</a>";
					                }else{
					                	break;
					                }
					            }else{
					                if($this->totalPages != 1){
					                    $linkPage .= "<span class='current'>".$i."</span>";
					                }
					            }
							}

		        		}

		        	}
				}
			}

        }
        $pageStr	 =	 str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%','%jumpPage%'),
            array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd,$jumpPage),$this->config['theme']);

        return $pageStr;
    }

}
?>