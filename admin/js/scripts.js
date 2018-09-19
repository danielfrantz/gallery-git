$(document).ready(function() {

	var user_href; // link user-id
	var user_href_splitted; //dividir link
	var user_id; // pega apenas o id do link
	var image_src;
	var image_href_splitted;
	var image_name;
	var photo_id;



	$(".modal_thumbnails").click(function() {
		
		$("#set_user_image").prop('disabled', false); // abilita o botão Apply Selection

        $(this).addClass('selected');
		user_href = $("#user-id").prop('href'); // pega o link inteiro 
		user_href_splitted = user_href.split("="); // divide onde tiver o operador =
		user_id = user_href_splitted[user_href_splitted.length - 1];// pega o segundo elemento do array - id=33

		image_src = $(this).prop('src'); // http://localhost/gallery/admin/images/_large_image_2.jpg
		image_href_splitted = image_src.split("/"); // http:,,localhost,gallery,admin,images,_large_image_2.jpg
		image_name = image_href_splitted[image_href_splitted.length - 1]; // pega nome da imagem

		photo_id = $(this).attr("data");

		// alert(image_href_splitted[image_href_splitted.length - 2]);

		$.ajax({

			url: "includes/ajax_code.php",
			data:{photo_id: photo_id}, 
			type: "POST",
			success:function (data) {
				
				if (!data.error) {

					$("#modal_sidebar").html(data);

					// location.reload(true);

				}

			}

		});



		// alert(image_id);



	});

	$("#set_user_image").click(function() {

		$.ajax({

			url: "includes/ajax_code.php",
			data:{image_name: image_name, user_id: user_id}, 
			type: "POST",
			success:function (data) {
				
				if (!data.error) {

					$(".user_image_box a img").prop('src', data);

				}

			}

		});

	});


	//************ Edit photo sidebar *************************

	$(".info-box-header").click(function() {

		$(".inside").slideToggle("fast");

		$("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon");



    });

    //************ Delete function *************************

	$(".delete_link").click(function() {

		return confirm("Are you sure you want to delete this item");



    });

    //************ Edit photo sidebar *************************

    $("#btn_create").click(function() {

    	alert('OK');

		// $.ajax({
	 //        type: "POST",
	 //        url: "locais.php",
	 //        // data: $("#ajax_form").serialize(),
	 //        success: function(data)
	 //        {
	 //           alert('data');
	 //           // location.reload(true);
	 //        }
	 //    });

	 //    return false;

    });




    

	
    tinymce.init({ selector:'textarea' });

});

