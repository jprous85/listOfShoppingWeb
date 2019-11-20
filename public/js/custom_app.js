$(document).ready(()=>{

    modifyWindow();
    $(window).on('load scroll resize', ()=>{
        modifyWindow();
    });
    function modifyWindow() {
        let wd = window.screen.width;
        if (wd >= 576) {
            $('#hr-navbar-item').hide();
            $('#link-navbar-item').show();
        }
        else {
            $('#hr-navbar-item').show();
            $('#link-navbar-item').hide();
        }
    }
});
