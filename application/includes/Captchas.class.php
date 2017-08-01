<?php
class Captchas
{
    //验证码图片
    public $image;
    //验证宽度
    public $width = 100;
    //验证码高度
    public $height = 40;
    //验证码字数
    public $codeNum = 4;
    //字体样式
    public $fontFile = 'msyh.ttf';
    //验证码数字
    public $captcha;
    //噪点级别
    public $level=3;
    //错误信息
    public $errorMsg;
    //构造方法
    public function __construct($_config=array())
    {
        //is_array() 判断是否是数组
        if(is_array($_config)&&count($_config)>0){
            foreach ($_config as $key=>$value){
                if(array_key_exists($key,get_class_vars(get_class($this)))){
                    $this->$key=$value;
                }else{
                    $this->errorMsg="参数下标 $key 不对";
                }
            }
        }else{
            $this->errorMsg="参数必须为数组";
        }
    }
    //错误处理
    public function getErrorMsg(){
        return $this->errorMsg;
    }
    public function createImage()
    {
        //创建真彩图
        $this->image = imagecreatetruecolor($this->width, $this->height);
        //设置背景颜色
        $bgColor = imagecolorallocate($this->image, rand(200, 255), rand(200, 255), rand(200, 255));
        //填充颜色
        imagefill($this->image, 0, 0, $bgColor);
    }
    //生成验证码字符
    public function createCaptcha()
    {
        $str = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $this->codeNum; $i++) {
            $code .= $str[rand(0, strlen($str) - 1)];
        }
        return $code;
    }
    //获取验证码
    public function getCaptcha(){
        return $this->captcha;
    }
    //验证码字符加入图片中
    public function outputText()
    {
        //生成的字符串
        $code = $this->createCaptcha();
        $this->captcha=$code;
        if(!file_exists($this->fontFile)){
            $this->errorMsg="$this->fontFile 文件不存在";
            for($i = 0; $i < $this->codeNum; $i++){
                $fontSize=rand(3,5);
                //floor() 下舍  5.3=>5  3  28  53  78
                $x=floor($this->width/$this->codeNum)*$i+3;
                $y=rand(0,$this->height-15);
                $fontColor = imagecolorallocate($this->image, rand(0, 150),
                    rand(0, 150), rand(0, 150));
                imagechar($this->image,$fontSize,$x,$y,$code[$i],$fontColor);
            }
        }else{
            for ($i = 0; $i < $this->codeNum; $i++) {
                $fontSize = rand(20, 25);
                $angle = rand(-15, 15);
                $x = rand(5, 8) + ($i * $this->width / $this->codeNum);
                $y = rand(25, 35);
                $fontColor = imagecolorallocate($this->image, rand(0, 150),
                    rand(0, 150), rand(0, 150));
                imagettftext($this->image, $fontSize, $angle,
                    $x, $y, $fontColor, $this->fontFile, $code[$i]);
            }
        }
//        imagettftext($img, $fontSize, $angle,
//            $x, $y, $fontColor, 'andlso.ttf', $code);
    }
    //设置干扰元素
    public function setNoise(){
        for($i=0;$i<$this->level;$i++){
            //设置弧线
            //cx,cy  圆心
            $cx=rand(-10, $this->width);
            $cy=rand(-10, $this->height);
            //$w：x轴宽度 $h：y轴高度
            $w=rand(40, $this->width);
            $h=rand(20, $this->height);
            // $s:初始角度  $e:结束角度
            $s=rand(0, 90);
            $e=rand(180, 270);
            //$arcColor：弧线颜色
            $arcColor=imagecolorallocate($this->image, rand(0, 200), rand(0, 200), rand(0, 200));
            imagearc($this->image, $cx, $cy, $w, $h, $s, $e, $arcColor);

            //设置线
            //x1,y1  线的初始点
            $x1=rand(0, $this->width/2);
            $y1=rand(0, $this->height/2);
            //x2,y2  线的结束
            $x2=rand($this->width/2, $this->width);
            $y2=rand($this->height/2, $this->height);
            //线的颜色
            $lineColor=imagecolorallocate($this->image, rand(0, 150), rand(0, 150), rand(0, 150));

            imageline($this->image, $x1, $y1, $x2, $y2, $lineColor);
        }
    }
    //输出png图片
    public function outputImage()
    {
        //输出图片
        imagepng($this->image);
    }

    public function showImage()
    {
        //创建真彩图
        $this->createImage();
        //添加干扰元素
        $this->setNoise();
        //添加字体
        $this->outputText();
        ////输出png图片
        $this->outputImage();
//        echo $this->createCaptcha();
    }
}
?>