<?php

//   生成验证码类

header("Content-Type: text/html; charset=utf-8");

class Captchas{
//    验证码图片
    private $image;
//    验证码宽度
    private $width = 100;
//    验证码高度
    private $height = 40;
//    验证码字数
    private $codeNum = 4;
//    字体样式
    private $fontFile = 'msyh.ttf';
//    验证码数字
    private $captcha;
//    干扰级别
    private $level = 3;
//    错误信息
    private $errorMsg;

//    构造方法
    public function __construct($_config = array()){
        if (is_array($_config) && count($_config) > 0){
            foreach ($_config as $key=>$value){
                if (array_key_exists($key,get_class_vars(get_class($this)))){
                    $this->$key = $value;
                } else{
                    $this->errorMsg = "下标 $key 错误";
                }
            }
        } else{
            $this->errorMsg = '参数必须为数组';
        }
    }

    public function getErrorMsg(){
        return $this->errorMsg;
    }

//    创建真彩图
    private function createImage(){
//        创建真彩图
        $this->image = imagecreatetruecolor($this->width,$this->height);
//        设置背景颜色
        $bgColor = imagecolorallocate($this->image,rand(200,255),rand(200,255),rand(200,255));
//        填充颜色
        imagefill($this->image,0,0,$bgColor);
    }

    private function outPutImage(){
//        输出图片
        imagepng($this->image);
    }

    private function createCaptcha(){
        $str = '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $this->codeNum; $i++){
            $code.=$str[rand(0,strlen($str)-1)];
        }
        return $code;
    }

    public function getCaptcha(){
        return $this->captcha;
    }

    private function outputText(){
        $code = $this->createCaptcha();
        $this->captcha = $code;
        if (!file_exists($this->fontFile)){
            $this->errorMsg = "$this->fontFile 文件不存在";
            for ($i = 0; $i < $this->codeNum; $i++){
                $fontSize = rand(3,5);
                $x = floor($this->width/$this->codeNum);
                $y = rand(0,$this->height-15);
                $fontColor = imagecolorallocate($this->image,rand(0,150),rand(0,150),rand(0,150));
//
                imagechar($this->image,$fontSize,$x,$y,$this->captcha,$fontColor);
            }
        } else{
            for ($i = 0; $i < $this->codeNum; $i++){
                $fontSize=rand(20, 25);
                $angle=rand(-15, 15);
                $x=rand(5,8)+($i*$this->width/$this->codeNum);
                $y=rand(25, 35);
                $fontColor=imagecolorallocate($this->image, rand(0, 150),
                    rand(0, 150), rand(0, 150));
                imagettftext($this->image, $fontSize, $angle, $x, $y, $fontColor, $this->fontFile, $code[$i]);

            }
        }
    }

    private function setNoise(){
        for ($i = 0; $i < $this->level; $i++) {
            //        设置弧线  cx，cy圆心
            $cx = rand(35, 65);
            $cy = rand(5, 35);
            //        x轴宽度  y轴高度
            $w = rand(40, 80);
            $h = rand(10, 30);
            //        初始角度  结束角度
            $s = rand(0, 90);
            $e = rand(180, 270);
            //
            $arcColor = imagecolorallocate($this->image, rand(0, 200), rand(0, 200), rand(0, 200));
            imagearc($this->image, $cx, $cy, $w, $h, $s, $e, $arcColor);


//            线的颜色
            $lineColor=imagecolorallocate($this->image, rand(0, 150), rand(0, 150), rand(0, 150));
//            x1，y1线的初始点
            $x1=rand(0, $this->width/2);
            $y1=rand(0, $this->height/2);
//            x1，y1线的结束点
            $x2=rand($this->width/2, $this->width);
            $y2=rand($this->height/2, $this->height);
            imageline($this->image, $x1, $y1, $x2, $y2, $lineColor);
        }
    }

    public function showImag(){
//        创建图片
        $this->createImage();

//        添加干扰元素
        $this->setNoise();

//        添加字体
        $this->outputText();

//        输出图片
        $this->outPutImage();
    }


}



?>