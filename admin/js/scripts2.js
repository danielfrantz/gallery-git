$(document).ready(function() {

	var user_href;
	var user_href_splitted;
	var user_id;
	var image_src;
	var image_href_splitted;
	var image_name;
	var photo_id;


	$(".modal_thumbnails").click(function() {

		
		$("#set_user_image").prop('disabled', false);

		// alert('image_id');


			user_href = $("#user-id").prop("href");
			user_href_splitted = user_href.split("=");
			user_id = user_href_splitted[user_href_splitted.length - 1];

			image_src = $(this).prop("src");
			image_href_splitted = image_src.split("/");
			image_name = image_href_splitted[image_href_splitted.length - 1];

			// photo_id = $(this).attr("data");

		    


	});    


	$("#set_user_image").click(function() {

		// alert(image_name);	

		$.ajax({

			url: "includes/ajax_code2.php",
			data:{image_name: image_name, user_id: user_id}, 
			type: "POST",
			success:function(data) {
				
				if (!data.error) {

					// alert(data);

					$(".user_image_box a img").prop('src', data); 

					// location.reload(true);

				}

			}

		});

			
	});


	
    tinymce.init({ selector:'textarea' });

});


// 22 anos, estudante de técnico em enfermagem buscando emprego em Cabo Frio como secretária, recepcionista ou vendedora. Também aceito estágio remunerado na área de tec. enfermagem.
// Também já fiz fotos para lojas atuando como modelo caso acha essa oportunidade também aceito.
// Wpp 22 999155043

