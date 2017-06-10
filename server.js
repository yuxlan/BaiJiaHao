/**
 * Created by YuXLan on 2017/6/10.
 */

var path = require("path");
var express = require("express");
var favicon = require("serve-favicon");

var app = express();
var port = 3000;

app.use(express.static(path.join(__dirname)));
app.use(favicon(path.join(__dirname,"public/img","favicon.jpg")));

app.set("views",path.join(__dirname,"public"));

app.get("*",function(req,res,next){
    res.sendFile(path.join(__dirname,"index.html"));
});

app.listen(port,function (err) {
    if(err){
        console.log(err);
    }
    console.log("running on ",port);
});


