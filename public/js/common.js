/**
 * Created
 */
var item = {
    datas: null,
    father:null,
    childrens:null,
    itemLen:undefined,
    Originitem:null,
    editItem:function(e){
        datas = new Array();
        father = $(e).parents("tr");
        OriginItem = father.html();
        childrens = father.children();
        itemLen = childrens.length;
        var update = document.getElementById('#update');
        var save = document.getElementById('#save');
        var i = 1;
        // for(i = 1; i < itemLen - 1; i++){
        datas.push(childrens.eq(i).text());
        childrens.eq(i).html('<input type="text" class="am-form-field am-radius am-input-sm" value="'+datas[i-1]+'">');
        // update.style.display = "none";
        // save.style.display = "block";
        childrens.eq(itemLen-2).html('<td> ' +
        '<a style="cursor: pointer" class="am-btn am-btn-default am-btn-xs am-text-secondary saveEdit" onclick="item.saveEditItem(this)">保存</a> ' +
        '<a style="cursor: pointer" class="am-btn am-btn-default am-btn-xs am-hide-sm-only cancelEdit"  onclick="item.cancelEditItem()">取消</a> ' +
        '</td>');

        // }
        // childrens.eq(itemLen-1).html('<div class="am-btn-toolbar">'+
        //     '<div class="am-btn-group am-btn-group-xs">'+
        //     '<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary saveEdit" onclick="item.saveEditItem(this)"><span class="am-icon-pencil-square-o"></span> 保存</button>'+
        //     '<button type="button" class="am-btn am-btn-default am-btn-xs am-hide-sm-only cancelEdit" onclick="item.cancelEditItem()"><span class="am-icon-save"></span> 取消</button>'+
        //     '</div> </div>');
    },
    cancelEditItem:function(){
        father.html(OriginItem);
    },
    saveEditItem:function(e){
        father = $(e).parents("tr");
        childrens = father.children();
        var i = 1;
        // for(i = 1; i < itemLen - 1; i++){
            datas[i-1] = childrens.eq(i).children().val();
        childrens.eq(i).html('<td>'+datas[i-1]+'</td>');
        // for(i = 1; i < itemLen - 1; i++){
        // }
        childrens.eq(itemLen-2).html('<td id="update" style="display: block;"> ' +
            '<a onclick="item.editItem(this)" style="cursor: pointer">修改</a> ' +
            '<a>删除</a> ' +
        '</td>');
    }
};
