<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>


	
		<h3 style="font-size: 20px;">Оставить заявку</h3>
		<form method="POST" action="" id="prod_form_a" enctype="multipart/form-data">
			<label>Имя</label>
			<input type="text" name="name" id="input__name" class="inp_phone" palaceholder="Имя">
			<label>Номер телефона*</label>
			<input type="text" name="phone" id="input__phone" class="inp_phone" palaceholder="Номер телефона">
<!--            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
            <input name="file" id="file" type="file" />
			<input type="submit" name="prod_form_sub" id="prod_form_sub" class="prod_form_sub" value="Отправить">
		</div>
		
	</form>

    <script>
        $(document).on('click', 'body #prod_form_sub' ,function () {
            let phone = $('#input__phone').val();
            let name = $('#input__name').val();
            var formData = new FormData();
            formData.append('file', $("#file")[0].files[0]);
            formData.append('phone', $("#input__phone").val());
            formData.append('name', $("#input__name").val());
                $.ajax({
                    type: "POST",
                    url: "/send-prod-form.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    dataType : 'json',
                }).done(function() {
                    $('.various_click').click();
                    $(this).find("input").val("");
                    $("#prod_form_a").trigger("reset");
                });
                return false;


        })
    </script>

<style>
	#prod_form_a {
		width: 400px;
	}
	#prod_form_a * {
		display: block;
		width: 100%;
		box-sizing: border-box;
	}
	#prod_form_a input[type="text"] {
		padding: 10px;
		margin-bottom: 10px;
	}
	#prod_form_a input[type="submit"] {
		padding: 12px;
		margin-top: 15px;
	}
	.pop_form {
		background: #ff8e2e;
		padding: 7px 13px;
		border-radius: 3px;
		color: #fff;
		margin-left: 10px;
		cursor: pointer;
		transition: all .3s;
		font-weight: 700;
		letter-spacing: 1px;
	}
	.pop_form:hover {
		background: #dc8133;
	}
</style>


</body>
</html>