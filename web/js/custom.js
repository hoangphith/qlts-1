   
function showNotif(mess){
    return $.growl({
        style: "notice",
        title: "Thông báo!",
        duration: 2000,
        message: mess           
    });
}

