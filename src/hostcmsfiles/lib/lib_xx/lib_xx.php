<?php

$sName = Core_Array::getPost('name', '');
$sEmail = Core_Array::getPost('email', '');
$sQuestion = Core_Array::getPost('question', '');

$sPath = Core_Page::instance()->structure->getPath();

if (!is_null(Core_Array::getPost('submit')) && (!empty($sName) && !empty($sEmail) && !empty($sQuestion)))
{
	$sEmailTo = Core_Array::get(Core_Page::instance()->libParams, 'sEmail');

	Core_Mail::instance()
	->to($sEmailTo)
	->from($sEmail)
	->subject($sName)
	->message($sQuestion)
	->contentType('text/plain')
	->send();
	?>

		<h1>Ваше сообщение отправлено</h1>
		<p>Через 5 секунд вы будете перенаправлены на исходную страницу.</p>

		<p>Если этого не произойдёт автоматически, воспользуйтесь <a href="<?php echo $sPath ?>">этой ссылкой</a>.</p>
		<script>
			setTimeout(function(){window.location = '<?php echo $sPath ?>';}, 5000);
		</script>

	<?php
}
else
{
	Core_Entity::factory('Document', Core_Array::get(Core_Page::instance()->libParams, 'iDocument'))
		->Document_Versions
		->getCurrent()
		->execute();

		if (!is_null(Core_Array::getPost('submit')) && !(!empty($sName) && !empty($sEmail) && !empty($sQuestion)))
		{
			?>
	
			<p style="color: red">Заполните все обязателные поля</p>

			<?php
		}
	?>

	<form method="POST" action="<?php echo $sPath ?>">  
		<div>
			<div><input type="text" value="<?php echo $sName ?>" name="name" placeholder="*Ваше имя"/></div>
			<div><input type="text" value="<?php echo $sEmail ?>" name="email" placeholder="*Ваш e-mail"></div>
			<div><textarea placeholder="*Ваш вопрос" name="question"><?php echo $sQuestion ?></textarea></div>
			<div><p>Поля, помеченные звездочкой, обязательны для заполнения</p></div>
			<div><input type="submit" name="submit" value="Отправить"></div>
		</div>
	</form> 

	<?php
}