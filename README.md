### php学习实践

------

一个仿百度百家号的网站，前端使用html+css+js基础，后端使用php实现，数据库使用mysql

------

.BaiJiaHao
├ application
├─├ configs
├─├─├ configDb.php                 // 数据库配置文件
├─├─└ init.php                     // 主配置文件
├─├ controllers                      // 控制器
├─├─├ Action.class.php             
├─├─└ indexAction.class.php        
├─├ includes                         // 自己写的php类
├─├─├ Captchas.class.php           // 生成验证码
├─├─├ Factory.class.php            // 工厂类
├─├─├ Page.class.php               // 分页控制类
├─├─├ Template.class.php           // smarty模板
├─├─├ Tool.class.php               // 滚动条
├─├─└ Uploads.class.php            // 文件上传
├─├ models                           // 数据库操作等
├─├─├ indexModel.class.php
├─├─└ Model.class.php
├─├ runtime
├─├ views                            //  视图层
├─├─├ admin                        // 后台页面
├─├─├ home                         // 前台页面
├─├─├─├ index.html               
├─├─├─├ register.html            
├─├─├─└ vicepage.html            
├ libs                                 // 插件
├─├ bootstrap-3.3.7-dist
├─├ font-awesome-4.7.0
├─├ smarty-3.1.30                    
├─└ utf8-php                         
├ public                               // 自定义样式以及js代码
├─├ css                              
├─├ imgs                             
├─├ js                               
├─└ uploads                          // 上传文件目录
├ index.php                            // 单入口文件
├ .gitignore
└ README.md
