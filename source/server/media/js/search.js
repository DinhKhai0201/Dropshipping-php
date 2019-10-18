jQuery('#search-home-page, #search-page-form').submit(function(e) {
    e.preventDefault();
    var data = jQuery(this).serializeArray();
    var objData = {
        cat: [],
        advanced_search_cat: []
    };
    for (var i =0; i < data.length; i++) {
        if (data[i].name == 'cat') {
            // objData.cat.push(data[i].value);
            objData.advanced_search_cat.push(data[i].value);
        } else if (data[i].value) {
            objData[data[i].name] = data[i].value;
        }
    }

    if (!objData.cat.length) {
        delete objData.cat;
    } else {
        objData.cat = objData.cat.join('-');
    }

    let str = '';
    Object.keys(objData).map(item=>{
        if(item === 'advanced_search_cat'){
            if(objData.advanced_search_cat.length>0){
                objData.advanced_search_cat.map(itemCat=>{
                    str += '&advanced_search%5Bcat%5D%5B%5D='+itemCat
                })
            }
        }else if(item === 'location'){
            str += '&advanced_search%5Blocation%5D%5B%5D='+objData[item];//.replace(/ /g, '-');
        }else if(item === 'salary'){
            str += '&advanced_search%5B'+item+'%5D='+objData[item]
        }else if(item === 'rank'){
            str += '&advanced_search%5B'+item+'%5D%5B%5D='+objData[item]
        }else if(item === 'keyword'){
            str += '&keyword='+objData[item]
        }
    })
    // window.location = rootURL+'jobs?' + jQuery.param(objData);
    let link = (rootURL+'tuyen-dung-viec-lam/trang-1.html?' + str);
    link = link.replace(/\?&/g, '?');
    link = link.replace(/\?=&/g, '?');
    link = link.replace(/\?&/g, '?');
    link = link.replace(/&=$/g, '');
    window.location = link;
});