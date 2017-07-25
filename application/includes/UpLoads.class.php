<?php

//  文件上传的所有


header('Content-Type: text/html; charset=utf-8');

//var_dump($_FILES);

class UpLoads{
    private $path = './upload/';   // 文件路径
    private $type;   // 文件类型
    private $size;   // 文件大小
    private $maxsize = 1000000;   //  允许文件的最大
    private $filename = 'file';  //  上传文件的下标
    private $oldname; // 原文件名
    private $newname; // 新文件名
    private $name = true; // 是否修改名字
    private $allowType = array('png','jpg','jpeg','gif');  // 文件允许类型
    private $errornum = 0;  // 错误代码，默认为0，默认是正确的
    private $errorinfo;
    private $configs;  // 配置参数
    private $ks = '';  // 键值

    public function __construct($_parameter=array()){
//        $this->fileName=$fileName;
//        $this->path=$path;
//        get_class($this):获取类名
//        get_class_vars('Uploads')：获取类的属性,返回数组
//        var_dump(get_class($this));
//        var_dump(get_class_vars('Uploads'));
//        ['path'=>'./test','fileName'=>'yht','maxsize'=>20]
        $this->configs = $_parameter;
    }

    private function setConfig(){
        foreach ($this->configs as $key=>$value){
//             $key=path   $value='./test'
            if(array_key_exists($key,get_class_vars(get_class($this)))){
                $this->$key=$value;
            }else{
                $this->errornum=11;
//                die("下标 $key 错误");
                $this->ks .= $key . ';';
            }
        }
    }

//    设置新名字
    private function setNewName(){
        if ($this->name){
//            改新名字
            $this->newname = date('Ymdhis').rand(100,900).'.'.$this->type;
        } else{
            $this->newname = $this->oldname;
        }
    }

//    上传文件的信息
    private function uploadFileInfo(){
//        获取文件名字    将编码格式转化成utf-8，防止传图片如果名字是中文时出现乱码
        $this->oldname = iconv('utf-8','gb2312',$_FILES[$this->filename]['name']);
//        获取文件类型
        $arr = explode('.',$this->oldname);
        $this->type = $arr[count($arr)-1];
//        获取文件大小
        $this->size = $_FILES[$this->filename]['size'];
        $this->errornum = $_FILES[$this->filename]['error'];
    }

//    处理错误
    private function throwError(){
        $str='';

        switch ($this->errornum){
            case 1:
                $str = '上传文件超过php.ini的最大值';
                break;
            case 2:
                $str = '上传文件超过表单允许的最大值';
                break;
            case 3:
                $str = '上传文件不完整';
                break;
            case 4:
                $str = '没有文件上传';
                break;
            case 6:
                $str = '临时文件没有生成';
                break;
            case 7:
                $str = '文件写入失败';
                break;
            case 8:
                $str='文件类型不符合';
                break;
            case 9:
                $str='上传文件超过'.$this->maxsize.'字节';
                break;
            case 10:
                $str="$this->path 目录创建失败";
                break;
            case 11:
                $str="下标 $this->ks 错误";
                break;
            case 12:
                $str = "临时文件移动失败";
                break;
            default:
                $str="未知错误";
                break;
        }
//        echo $this->errorNum1;
//        if($this->errorNum1==11){
//            $str="数组下标错误";
//        }

        return $str;
    }

//    检测文件类型
    private function checkType(){
        if (!in_array($this->type,$this->allowType)){
//            die('文件类型不符合');
            $this->errorNum=8;
            return false;
        }
    }

//    检测文件大小
    private function checkSize(){
        if ($this->size > $this->maxsize){
//            die('上传文件太大');
            $this->errorNum=9;
            return false;
        }
    }

//    检测文件路径
    private function checkPath(){
        if (!file_exists($this->path)) {
//            if (mkdir($this->path)){
//                echo '路径创建成功';
//            } else{
//                die('路径创建失败'); // = exit()
//            }
//        } else{
//            echo '路径已存在';
//        }
            if (!mkdir($this->path)) {
                $this->errornum = 10;
                return false;
            }
        }
//        rtrim();  删除字符串右边的特定字符
        $this->path = rtrim($this->path,'/');
    }

    //预处理函数
    private function preCheck(){

        // 配置
        if (count($this->configs) > 0){
            $this->setConfig();

            if ($this->errornum != 0){
                $this->errorinfo = $this->throwError();
                return false;
            }
        }

        $this->uploadFileInfo();  // 检查文件信息
        //检查大小
        $this->checkSize();
        //检查路径
        $this->checkPath();
        //检查文件类型
        $this->checkType();
        //名字
        $this->setNewName();
        //输出错误
        if($this->errornum!=0){
            $this->errorinfo=$this->throwError();
            return false;
        } else{
            return true;
        }
    }

//    获取错误信息
    public function getErrorMsg(){
        return $this->errorinfo;
    }

    //获取文件名字
    public function getName(){
        return $this->newname;
    }

//    获取文件信息
    public function upload(){
//        $this->uploadFileInfo();  // 检查文件信息
//        $this->checkSize();  // 检查大小
//        $this->checkType();  // 检查类型
//        $this->checkPath();  // 检查路径
//        $this->setNewName(); // 修改文件名字
//        预处理函数
        if(!$this->preCheck()){
//            echo $this->errorinfo;
            return false;
        }

////        有错误时返回错误信息
//        if ($this->errornum != 0){
//            exit($this->throwError());
//        }
//
////        判断有无文件上传
//        if (is_uploaded_file($_FILES[$this->filename]['tmp_name'])) {
////            移动文件    原来文件路径  新的文件路径
//            if (move_uploaded_file($_FILES[$this->filename]['tmp_name'], $this->path.'/'.$this->newname)) {
//                echo '文件移动成功';
//            } else {
//                exit('文件移动失败');
//            }
//        } else {
//            exit('没有文件上传');
//        }
        if (is_uploaded_file($_FILES[$this->filename]['tmp_name'])) {
            //移动文件move_uploaded_file(原来文件路径，新的文件路径); ./upload/aa.jpg
            //upload/
            if (move_uploaded_file($_FILES[$this->filename]['tmp_name'], $this->path . '/' . $this->newname)) {
                return true;
            } else {
                $this->errornum=12;
                return false;
            }
        }
    }

//    获取所有的属性值
    public function getVars(){
        return get_class_vars('upLoads');
    }
}

//if (!empty($_POST['send'])){
////    $u = new upLoads();
//    $u=new upLoads(['path'=>'./test','filename'=>'yht','maxsize'=>20]);
//    $u->upload();
//}



?>
