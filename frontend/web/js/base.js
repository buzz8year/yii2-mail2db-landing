$(document).ready(function(){
	
	$(".box-quest-vopros-label").on("click", function(){
				
		if ($(this).parent().find(".box-quest-vopros-desc").css("display") == "none") {

			$(".box-quest-vopros-desc").hide();	
			$(".box-quest-vopros").removeClass("box-quest-vopros-label-hv");
						
			$(this).parent().find(".box-quest-vopros-desc").show();		
			$(this).parent().addClass("box-quest-vopros-label-hv");
		
		} else {
			
			$(".box-quest-vopros-desc").hide();
			$(this).parent().removeClass("box-quest-vopros-label-hv");
			
		}	
		
	});
	
	
	$('.menuToggle').on('click', function(){
		$('#menu').toggleClass('menu-open');
	});
	
	$(".owl-carousel1").owlCarousel({
		items:1,
		nav:true
	});
	
	$(".owl-carousel2").owlCarousel({
		items:1,
		nav:true
	});
	
	$(".owl-prev").html('');
	$(".owl-next").html('');

	$(".box-menu").on("click", "a", function (event) {
        event.preventDefault();
		
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 800);

    });
	
	
	$(".box-menu1").on("click", "a", function (event) {
        event.preventDefault();
		
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 800);
		
		$('#menu').removeClass("menu-open");
    });	
	
	
	$('.popupbutton1').fancybox({
        'padding': 0,
        'overlayOpacity': 0.87,
        'overlayColor': '#fff',
        'transitionIn': 'none',
        'transitionOut': 'none',
        'titlePosition': 'inside',
        'centerOnScroll': true,
		afterClose: function(){
			$(".start1").css("display","block");
			$(".end1").css("display","none");
		}		
    });

	$(".poletelephon").mask("+7 (999) 999-9999");
	
	
	$(".post-consult").click(function(event){
		event.preventDefault();
		
		var parent = $(this).parent().parent();
		
		parent.find(".required").css("border", "1px solid #CCC");
		
		var name = parent.find("input[name=consult-name]").val().trim();
		var phone = parent.find("input[name=consult-phone]").val().trim();
		var body = parent.find("textarea[name=consult-body]").val().trim();
		
		
		var err = 1;
		
		parent.find(".required").each(function(){

			if ($(this).val().trim() == '') {
				err = 0;
				$(this).css("border", "1px solid red");
			}
		});
			
		if (err) {
			$.ajax({
				type: "POST",
				// url: "/email/post1.php",
				// data: "pole1="+pole1+"&pole2="+pole2+"&pole3="+pole3,
				url: "index.php?r=site/form-consult",
				data: {
					ConsultForm: {name: name, phone: phone, body: body}
				},
				error: function(data){
					console.log(data);
				},
				success: function(data){	
					console.log(data);
				}
			});
		
			// parent.find("input[name=pole1]").val("");
			// parent.find("input[name=pole2]").val("");
			// parent.find("textarea[name=pole3]").val("");
			parent.find("input[name=consult-name]").val("");
			parent.find("input[name=consult-phone]").val("");
			parent.find("textarea[name=consult-body]").val("");
		
			parent.find(".start1").css("display", "none");	
			parent.find(".end1").css("display", "block");	

		}
	});
	

	$(".setPost2").click(function(event){
		event.preventDefault();
		
		var parent = $(this).parent().parent();
		
		parent.find(".required").css("border", "2px solid #adaeae");
		
		var pole1 = parent.find("input[name=pole1]").val().trim();
		var pole2 = parent.find("input[name=pole2]").val().trim();
		var pole3 = parent.find("textarea[name=pole3]").val().trim();
		
		
		var err = 1;
		
		parent.find(".required").each(function(){

			if ($(this).find(".inppole").val().trim() == '') {
				err = 0;
				$(this).css("border", "2px solid red");
			}
		});
			
		if (err) {
			
			$.ajax({
				type: "POST",
				url: "/email/post2.php",
				data: "pole1="+pole1+"&pole2="+pole2+"&pole3="+pole3,
				success: function(msg){	
		
				}
			});
		
			parent.find("input[name=pole1]").val("");
			parent.find("input[name=pole2]").val("");
			parent.find("textarea[name=pole3]").val("");
		
			parent.find(".box-start1").css("display", "none");	
			parent.find(".box-end1").css("display", "block");	

		}
	});	


	$(".setPost3").click(function(event){
		event.preventDefault();
		
		var parent = $(this).parent().parent().parent().parent();
		
		parent.find(".required").css("border", "2px solid #c2c3c3");
		
		var pole1 = parent.find("input[name=pole1]").val().trim();
			
		var err = 1;
		
		parent.find(".required").each(function(){

			if ($(this).find(".inppole").val().trim() == '') {
				err = 0;
				$(this).css("border", "2px solid red");
			}
		});
			
		if (err) {
			
			$.ajax({
				type: "POST",
				url: "/email/post3.php",
				data: "pole1="+pole1,
				success: function(msg){	
		
				}
			});
		
			parent.find("input[name=pole1]").val("");
		
			parent.find(".box-mail-start1").css("display", "none");	
			parent.find(".box-mail-end1").css("display", "block");	
		
		}
	});	
	
	
	$(".post-partner").click(function(event){
		event.preventDefault();
		
		var parent = $(this).parent().parent();
		
		parent.find(".required").css("border", "1px solid #CCC");
		
		var name = parent.find("input[name=partner-name]").val().trim();
		var phone = parent.find("input[name=partner-phone]").val().trim();
		
		var err = 1;
		
		parent.find(".required").each(function(){
			if ($(this).val().trim() == '') {
				err = 0;
				$(this).css("border", "1px solid red");
			}
		});
			
		if (err) {
			$.ajax({
				type: "POST",
				url: "index.php?r=site/form-partner",
				data: {
					PartnerForm: { name: name, phone: phone }
				},
				error: function(data){	
					console.log(data);
				},
				success: function(data){	
					console.log(data);
				}
			});
		
			parent.find("input[name=pole1]").val("");
			parent.find("input[name=pole2]").val("");
		
			parent.find(".start1").css("display", "none");	
			parent.find(".end1").css("display", "block");	

		}
	});	
});