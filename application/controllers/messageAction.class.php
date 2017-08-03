<?php

class messageAction extends Action{
    public function main(){
        switch ($_GET['action']){
            case 'show':
                $this->show();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'send':
                $this->send();
                break;
        }
        $this->smarty->display('admin/message.html');
    }

    private function show(){
        $this->smarty->assign('show',true);
        $message = $this->model->getUser(1);

        $allMessage[] = explode(';',$message[0]['message']);
        $this->smarty->assign('allMessage',$allMessage);
    }

    private function delete(){
        $this->smarty->assign('delete',true);
    }

    private function send(){
        $this->smarty->assign('send',true);

        if ($_POST['send']){
            $array = array(
                'message' => $_POST['message'],
            );
        $result = $this->model->updateUser($array);
        if ($result) {
            Tool::progress('发送成功', '?c=message&action=show', 1, 1);
        } else {
            Tool::progress('发送失败', '?c=message&action=send', 0, 1);
        }
        }

    }
}







?>