window.addEventListener("load", function(event) {
    var item = document.getElementById("nav-icon1")
    item.addEventListener("click", function(event) {
        item.classList.toggle('is-active');

    });
    /*$('#nav-icon1').click(function(){
		$(this).toggleClass('open');
		$('#mob-menu').toggleClass('open');
		$('.back-layer').fadeToggle('fast');
	});*/
});