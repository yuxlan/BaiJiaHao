<?php
/*
 * 上传类：
 * 1. upload:上传文件
 * 2. is_upload_file() 是否上传成功
 * 3. move_upload_file() 上传是否成功
 * 4. setNewName:设置新的上传名字
 * 5. 检测目录
 * 6. 检测类型
 * 7. 检测大小
 * @author alan
 * */
class UpLoads
{
    //上传文件的存放路径
    private $path = './upload/';
    //上传文件的类型
    private $type;
    //上传文件的大小
    private $size;
    //允许上传文件的最大值
    private $maxsize = 1000000;
    //上传文件下标
    private $fileName = 'file';
    //原名字
    private $originalName;
    //新名字
    private $newName;
    //判断是否修改名字
    private $name = true;
    //文件允许类型
    private $allowType = array('png', 'jpg', 'jpeg', 'gif');
    //错误码
    private $errorNum = 0;
    //错误信息
    private $errorInfo;
    //配置数组
    private $configs;
    //健值
    private $ks = '';

    //构造函数
    public function __construct($_parameter = array())
    {
        //['path'=>'./test','fileName'=>'yht','maxsize'=>2000000]
        $this->configs = $_parameter;
    }

    //配置信息
    private function setConfig()
    {
        foreach ($this->configs as $key => $value) {
            // array_key_exists():检查数组里是否有指定的键名或索引
            if (array_key_exists($key, get_class_vars(get_class($this)))) {
                $this->$key = $value;
            } else {
                $this->errorNum = 11;
                $this->ks .= $key . ';';
            }
        }
    }

    //设置新名字
    private function setNewName()
    {
        if ($this->name) {
            //2017071811253256.jpg
            $this->newName = date('YmdHis') . rand(10, 99) . '.' . $this->type;
        } else {
            $this->newName = $this->originalName;
        }
    }

    //文件信息
    private function uploadFileInfo()
    {
        //获取文件名字
        //iconv('utf-8','gb2312',$str);将utf-8转换关闭gb2312（简体中文）格式
//        $this->originalName=$_FILES[$this->fileName]['name'];
        $this->originalName = iconv('utf-8', 'gb2312', $_FILES[$this->fileName]['name']);
        //获取文件类型   explode()  拆分字符串
        $arr = explode('.', $this->originalName);
        //count() 数组长度
        $this->type = $arr[count($arr) - 1];
        //获取文件大小
        $this->size = $_FILES[$this->fileName]['size'];
        $this->errorNum = $_FILES[$this->fileName]['error'];
    }

    //错误处理
    private function throwError()
    {
        $str = '';
        switch ($this->errorNum) {
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
                $str = '文件类型不符合';
                break;
            case 9:
                $str = '上传文件超过' . $this->maxsize . '字节';
                break;
            case 10:
                $str = "$this->path 目录创建失败";
                break;
            case 11:
                $str = "设置 $this->ks 下标错误";
                break;
            case 12:
                $str = "临时文件移动失败";
                break;
            default :
                $str='未知错误';
                break;
        }
        return $str;
    }

    //检测文件类型
    private function checkType()
    {
        if (!in_array($this->type, $this->allowType)) {
            $this->errorNum = 8;
            return false;
        }
    }

    //检测文件大小
    private function checkSize()
    {
        if ($this->size > $this->maxsize) {
            $this->errorNum = 9;
            return false;
        }
    }

    //检测文件路径
    private function checkPath()
    {
        if (!file_exists($this->path)) {
            if (!mkdir($this->path)) {
                $this->errorNum = 10;
                return false;
            }
        }
        //rtrim()：删除字符串右边的特定字符
        $this->path = rtrim($this->path, '/');
    }

    //预处理函数
    private function preCheck()
    {
        //配置
        if (count($this->configs) > 0) {
            $this->setConfig();
            //输出错误
            if ($this->errorNum != 0) {
                $this->errorInfo = $this->throwError();
                return false;
            }
        }
        //获取文件信息
        $this->uploadFileInfo();
        //检查大小
        $this->checkSize();
        //检查路径
        $this->checkPath();
        //检查文件类型
        $this->checkType();
        //名字
        $this->setNewName();
        //输出错误
        if ($this->errorNum != 0) {
            $this->errorInfo = $this->throwError();
            return false;
        } else {
            return true;
        }
    }

    //获取错误信息
    public function getErrorMsg()
    {
        return $this->errorInfo;
    }

    //获取文件名字
    public function getName()
    {
        return $this->newName;
    }

    //上传文件 成功返回true，失败返回false
    public function upload()
    {
        //预处理函数
        if (!$this->preCheck()) {
            return false;
        }
        //$_FILES['file']
        //is_uploaded_file()：判断文件是否上传
        if (is_uploaded_file($_FILES[$this->fileName]['tmp_name'])) {
            //移动文件move_uploaded_file(原来文件路径，新的文件路径); ./upload/aa.jpg
            //upload/
            if (move_uploaded_file($_FILES[$this->fileName]['tmp_name'], $this->path . '/' . $this->newName)) {
                return true;
            } else {
                $this->errorNum=12;
                return false;
            }
        }
    }
}

?>
