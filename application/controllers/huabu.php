<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class huabu extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->language(array('site')); 
		$this->smarty->assign( 'language',$this->lang->language);
		
		
		$this->load->database();
		$this->load->model("projectm");
		$this->load->model("userm");
		
		$this->load->model("huabum");
		$this->load->model("pinglunm");
		
		$this->base_url=$this->config->item("base_url");
		
	    $this->smarty->assign( 'base_url',$this->base_url);
		
		//用户ID
		
		
		$this->Uid=intval($this->input->cookie("uid"));
		$this->Cid=$this->input->cookie("cid");
		
		$this->smarty->assign( 'uid',$this->Uid);
		$this->smarty->assign( 'cid',$this->Cid);
		$this->smarty->assign( 'uname',$this->input->cookie("uname"));
		
		$this->Logined=$this->input->cookie("logined")==true?true:false;
		$this->smarty->assign( 'userLogined',$this->Logined);
		
		$this->smarty->assign( 'user',$this->userm->getInfo($this->Uid));
		
	
		
	
		
	}
	public function index()
	{
		
		$this->add();
	}
	//画布展示
	public function show($mid=0){
		//$this->smarty->assign('msg',"对不起，你还没有登录哦~");
		
		
		$d=$this->huabum->isExitMid($mid);
		
		if($d){
			
			$this->huabum->addInt("visitNum",$mid);
			
			
			//数据需要特殊化转化
			$c=$this->pinglunm->getList($d["Hid"]);
		
			$this->smarty->assign('pinglunNum',sizeof($c));
			$this->smarty->assign('pinglunList',$c);
			$this->smarty->assign('data',$d);
			$this->smarty->view('huabu.show.html');
		}else{
			
			$this->smarty->assign('msg',"对不起，该值不存在~");
			$this->smarty->view('msg.html');
		}
	}
	public function zan(){
		$callback=$this->input->get("callback");
		$mid=$this->input->get("mID");
		
		if($this->huabum->addInt("favorNum",$mid)){
				echo $callback.'({"flag":1,"msg":"赞成功"})';
	
		}else{
				echo $callback.'({"flag":0,"msg":"赞失败，你已经赞过了吧，亲~"})';	
		}
	}
	
	public function edit($mid){
		$d=$this->huabum->isExitMid($mid);
			
		if($d){

			$this->smarty->assign('data',$d);
			//如果是自己的画布，则可以编辑
			if($d["CookieID"]==$this->Cid || $d["Uid"]==$this->Uid){
				$this->smarty->view('huabu.my.html');
			}else{
				$this->smarty->assign('msg',"亲，该画布不属于你哦~");
				$this->smarty->view('msg.html');
			}
		}else{
			
			$this->smarty->assign('msg',"亲，参数错误~");
			$this->smarty->view('msg.html');
		}
	}
	
	
	public function test(){
		$this->huabum->addInt("favorNum","6ab90ce026822915");
		if( $this->input->cookie("favorNum_6ab90ce026822915")){
			echo 111;	
		}else{
			echo 222;	
		}
		
	}
	public function download(){
	
		$file=$this->base_url."download/huabu";
	
		$this->smarty->assign("file",$file);
		$this->smarty->view('download.html');
	
	
	
	}
	public function add(){
		/*
		if($this->Logined){
			if($this->huabum->getMy($this->Uid)){
				header("Location: ".$this->base_url."huabu/my"); 
			}
		}
		*/
		$this->smarty->view('huabu.html');
	}
	
	
	
	
	public function my(){
		$user=$this->userm->getInfo($this->Uid);
		if($user["Email"]=="" || $user["Mobile"]==""){
			header("Location: ".$this->base_url."user/infoUpdate"); 
		}else{
			header("Location: ".$this->base_url."huabu/lists/".$user["mID"].".html"); 
		}
		exit;
			
		$num=$this->huabum->getSaveNum($this->Uid);
		if($num>1){
			$user=$this->userm->getInfo($this->Uid);
			header("Location: ".$this->base_url."huabu/lists/".$user["mID"].".html"); 
			
		}else{
			$id=$this->huabum->getMy($this->Uid);
		//lists
			if($id){
				
				
				$data=$this->huabum->getInfo($id);
			
				header("Location: ".$this->base_url."huabu/edit/".$data["mID"].".html"); 
				
				$data["h_one"]=htm2str($data["h_one"]);
				$data["h_two"]=htm2str($data["h_two"]);
				$data["h_three_one"]=htm2str($data["h_three_one"]);
				$data["h_three_two"]=htm2str($data["h_three_two"]);
				$data["h_four"]=htm2str($data["h_four"]);
				
				$data["h_five_five"]=htm2str($data["h_five_five"]);
				$data["h_six_one"]=htm2str($data["h_six_one"]);
				$data["h_six_two"]=htm2str($data["h_six_two"]);
		
			
				$this->smarty->assign('data',$data);
				$this->smarty->view('huabu.my.html');
				//$this->smarty->view('huabu.my.html');
			}else{
				$this->smarty->assign('msg',"对不起，您还没有添加哦~");
				$this->smarty->view('msg.html');
				
			}
		}
	}
	public function addSave(){
		
		$data=array();
		
		
		$data["Subject"]=$this->input->post("h_subject");
		$data["h_one"]=str2htm($this->input->post("h_one"));
	
		$data["h_one_text"]=$this->input->post("h_one_text");
		$data["h_two"]=str2htm($this->input->post("h_two"));
		
		$data["h_three_one"]=str2htm($this->input->post("h_three_one"));
		$data["h_three_two"]=str2htm($this->input->post("h_three_two"));
		
		$data["h_four"]=str2htm($this->input->post("h_four"));
		
		$data["h_five_one"]=$this->input->post("h_five_one");
		$data["h_five_two"]=$this->input->post("h_five_two");
		$data["h_five_three"]=$this->input->post("h_five_three");
		$data["h_five_four"]=$this->input->post("h_five_four");
		$data["h_five_five"]=str2htm($this->input->post("h_five_five"));
		
		$data["h_six_one"]=str2htm($this->input->post("h_six_one"));
		$data["h_six_two"]=str2htm($this->input->post("h_six_two"));
		
	
		
		$mID=$this->huabum->addSave($data);
		//$callback=$this->input->get("callback");
		//echo $callback.'({"flag":1,"mID":"'.$mID.'"})';
		header("Location: ".$this->base_url."huabu/edit/".$mID.".html"); 
		/*
		if(!$this->Logined){
			header("Location: ".$this->base_url."huabu/show/".$mID.".html"); 
		}else{
			header("Location: ".$this->base_url."huabu/my"); 
		}
		*/
		
		
		
	}
	public function modSave(){
	
		$mID=$this->input->post("mID");
		//1.用户是否已登陆
	/*
		if(!$this->Logined){
		
			$this->smarty->assign('msg',"对不起，你还没有登录哦~");
			$this->smarty->view('msg.html');
			
		}
			*/
		if(!$this->huabum->isExitMid($mID)){
			$this->smarty->assign('msg',"参数错误~");
			$this->smarty->view('msg.html');
			
		}
	
		if($this->huabum->isExitMid($mID)){
			$data=array();
			$data["Subject"]=$this->input->post("h_subject");
			$data["shareWord"]=$this->input->post("shareWord");
			$data["sharePic"]=$this->input->post("sharePic");
			$data["isPublic"]=intval($this->input->post("isPublic"));
			$data["h_one"]=str2htm($this->input->post("h_one"));
		
			$data["h_one_text"]=$this->input->post("h_one_text");
			$data["h_two"]=str2htm($this->input->post("h_two"));
			
			$data["h_three_one"]=str2htm($this->input->post("h_three_one"));
			$data["h_three_two"]=str2htm($this->input->post("h_three_two"));
			
			$data["h_four"]=str2htm($this->input->post("h_four"));
			
			$data["h_five_one"]=$this->input->post("h_five_one");
			$data["h_five_two"]=$this->input->post("h_five_two");
			$data["h_five_three"]=$this->input->post("h_five_three");
			$data["h_five_four"]=$this->input->post("h_five_four");
			$data["h_five_five"]=str2htm($this->input->post("h_five_five"));
			
			$data["h_six_one"]=str2htm($this->input->post("h_six_one"));
			$data["h_six_two"]=str2htm($this->input->post("h_six_two"));
			
		
			$this->huabum->modSave($data,$mID);
			
			header("Location: ".$this->base_url."huabu/edit/$mID.html"); 
			
		}
	}
	
	//评论画布开始
	public function comment(){
		$w=array("国旗"=>"flag","走你"=>"zouni","笑哈哈"=>"lxhwahaha","江南style"=>"gangnamstyle","吐血"=>"lxhtuxue","好激动"=>"lxhjidong","lt切克闹"=>"ltqiekenao","moc转发"=>"moczhuanfa","ala蹦"=>"alabeng","gst耐你"=>"gstnaini","xb压力"=>"xbyali","din推撞"=>"dintuizhuang","草泥马"=>"shenshou","神马"=>"horse2","浮云"=>"fuyun","给力"=>"geili","围观"=>"wg","威武"=>"vw","熊猫"=>"panda","兔子"=>"rabbit","奥特曼"=>"otm","囧"=>"j","互粉"=>"hufen","礼物"=>"liwu","呵呵"=>"smilea","嘻嘻"=>"tootha","哈哈"=>"laugh","可爱"=>"tza","可怜"=>"kl","挖鼻屎"=>"kbsa","吃惊"=>"cj","害羞"=>"shamea","挤眼"=>"zy","闭嘴"=>"bz","鄙视"=>"bs2","爱你"=>"lovea","泪"=>"sada","偷笑"=>"heia","亲亲"=>"qq","生病"=>"sb","太开心"=>"mb","懒得理你"=>"ldln","右哼哼"=>"yhh","左哼哼"=>"zhh","嘘"=>"x","衰"=>"cry","委屈"=>"wq","吐"=>"t","打哈欠"=>"k","抱抱"=>"bba","怒"=>"angrya","疑问"=>"yw","馋嘴"=>"cza","拜拜"=>"88","思考"=>"sk","汗"=>"sweata","困"=>"sleepya","睡觉"=>"sleepa","钱"=>"money","失望"=>"sw","酷"=>"cool","花心"=>"hsa","哼"=>"hatea","鼓掌"=>"gza","晕"=>"dizzya","悲伤"=>"bs","抓狂"=>"crazya","黑线"=>"h","阴险"=>"yx","怒骂"=>"nm","心"=>"hearta","伤心"=>"unheart","猪头"=>"pig","ok"=>"ok","耶"=>"ye","good"=>"good","不要"=>"no","赞"=>"z2","来"=>"come","弱"=>"sad","蜡烛"=>"lazu","蛋糕"=>"cake","钟"=>"clock","话筒"=>"m");


		$data=array();
		$data["Hid"]=$this->huabum->getHidByMid($this->input->get("m"));
		$data["Rid"]=$this->input->get("r");
		$data["Pid"]=$this->input->get("p");
		$data["CookieID"]=$this->Cid;
		$data["Uid"]=$this->Uid;
		$data["Content"]=$this->input->get("v");
	   // $data["Content"]=preg_replace("/\[(*)\]/","<img src='".$this->base_url."public/face/$1_thumb.gif'/>", $data["Content"]);

		$data["AddIP"]=ip();
		
		$this->pinglunm->addSave($data);
	}
	public function vote(){
	
		$id=intval($this->input->get("m"));
		
		$this->pinglunm->vote($id);
		
	}
	
	//画布列表
	public function lists($mID =""){
		
		$this->smarty->assign('mID',$mID);
		if($mID !=""){
			$uid=$this->userm->getUidByMid($mID);
			if($uid){
				$data=$this->huabum->getList($uid,0,24);	
				$this->smarty->assign('listData',$data);
				$this->smarty->view('list.my.html');
			}else{
				$this->smarty->assign('msg',"参数错误~");
				$this->smarty->view('msg.html');
			}
		}else{
			$data=$this->huabum->getList(0,0,24);	
			$this->smarty->assign('listData',$data);
			$this->smarty->view('list.html');
		}
		
	}
	
	//画布列表
	public function mylists(){
		$this->smarty->view('list.html');
	}
	//画布动态加载
	public function getList(){
		$mID=$this->input->get("mID");
		$v1=$this->input->get("v1");
		$v2=$this->input->get("v2");
		$v3=$this->input->get("v3");
		$v=$this->input->get("v");
		$uid=0;
		$isPub=1;
		if($mID !=""){
			$uid=$this->userm->getUidByMid($mID);
			if(!$uid){
				$uid=0;
			}else{
				$isPub=0;
			}
		}
		$data=$this->huabum->getList($uid,0,24,$isPub,$v1,$v2,$v3,$v);
	
			
			
		$callback=$this->input->get("callback");
		echo $callback.'('.json_encode($data).')';
	}
	
	
}

