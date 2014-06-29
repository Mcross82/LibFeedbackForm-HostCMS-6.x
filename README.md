# Форма обратной связи, с отправкой данных на почту для HostCMS 6.x

Типовая динамическая страница, реализующая форму обратной связи для редакции HostCMS.Халява 6.x

Реализована стандартная форма обратной связи с полями `Ваше имя`, `Ваш e-mail`, `Ваш вопрос`.

Все поля формы являются обязательными для заполнения.

## Параметры типовой динамической страницы

### Документ описания 

*(Содержимое будет выводиться перед показом формы)*

***Название переменной*** `iDocument`

***Тип*** `SQL-запрос`

***SQL-запрос***

	SELECT * FROM `documents`
	WHERE `site_id` = '{SITE_ID}' AND `deleted` = 0 
	ORDER BY `name`;

***Поле заголовка*** `name`

***Поле значения*** `id`

***

### E-mail получателя
	
*(E-mail для отправки сообщений)*

***Название переменной*** `sEmail`

***Тип*** `Поле ввода`

***

## Структура репозитория

- src/hostcmsfiles/lib/lib_xx/
 - lib_xx.php — код типовой динамической страницы



