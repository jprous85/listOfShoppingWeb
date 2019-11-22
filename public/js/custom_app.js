$(document).ready(()=>{

    modifyWindow();
    $(window).on('load scroll resize', ()=>{
        modifyWindow();
    });
    function modifyWindow() {
        let wd = window.screen.width;
        if (wd >= 576) {
            $('#hr-navbar-item').hide();
            $('#hr-navbar-item_II').hide();
            $('#link-navbar-item').show();
            $('#link-navbar-item_II').show();
        }
        else {
            $('#hr-navbar-item').show();
            $('#hr-navbar-item_II').show();
            $('#link-navbar-item').hide();
            $('#link-navbar-item_II').hide();
        }
    }
});
