window.addEventListener("load", function(event) {
    var item = document.getElementById("nav-icon1");
    var mob_menu = document.getElementById("mob-menu");
    var back_layer = document.getElementById("back_layer");
    var body = document.getElementById("body");
    item.addEventListener("click", function(event) {
        item.classList.toggle('is-active');
        mob_menu.classList.toggle('is-active');
        back_layer.classList.toggle('d-none');
        body.classList.toggle('overflow-hidden');
    });
    /*$('#nav-icon1').click(function(){
		$(this).toggleClass('open');
		$('#mob-menu').toggleClass('open');
		$('.back-layer').fadeToggle('fast');
	});*/
});