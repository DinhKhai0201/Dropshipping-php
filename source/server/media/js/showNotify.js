function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
let role = getCookie('role');
if(role === '2'){
    toastr.warning("Bạn phải đăng nhập dưới tài khoản Nhà Tuyển Dụng để sử dụng chức năng này");
}
if(role === '3'){
    toastr.warning("Bạn phải đăng nhập dưới tài khoản Ứng viên để sử dụng chức năng này");
}