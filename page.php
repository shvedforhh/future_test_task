<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="Keywords" content="HTML, META, метатег, тег, поисковая система"> 
	<link rel="stylesheet" href="style.css" type="text/css"/>

</head>
<body>

<div id="x-page">
	<div id="header">
		<div class="left-part">
			<div class="info">
				<p class="st_b_w">Телефон: (499) 340-94-71</p>
				<p class="st_b_w">Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></p>
			</div>
			<div class="comments">
				<p class="big_b_w">Комментарии</p>
			</div>
		</div>	
		
		<div class="right-part">
			<a href="https://future-group.ru"><div class="logo"></div></a>
		</div>
		
		<div class="clear-both"></div>
	</div>
	
	<div class="line-breaker">&nbsp;</div>
	
	<div id="content">
	  <div id="users-comments">
		<!--
		<div class="users-comment">
			<div class="UNDT">
				<div class="UN">
					<p>Вася Пупкин</p>
				</div>
				<div class="DT">
					<pre><p>18:05   07.02.2014</p></pre>
				</div>
			</div>
			<div class="UCB">
				<p>Всем привет это бредовая информация от Васи Пупкина !</p>
			</div>
		</div>
		
		<div class="users-comment">
			<div class="UNDT">
				<div class="UN">
					<p>Вася Пупкин</p>
				</div>
				<div class="DT">
					<pre><p>18:05   07.02.2014</p></pre>
				</div>
			</div>
			<div class="UCB">
				<p>Всем привет это бредовая информация от Васи Пупкина !</p>
			</div>
		</div>
		
		<div class="users-comment">
			<div class="UNDT">
				<div class="UN">
					<p>Вася Пупкин</p>
				</div>
				<div class="DT">
					<pre><p>18:05   07.02.2014</p></pre>
				</div>
			</div>
			<div class="UCB">
				<p>Всем привет это бредовая информация от Васи Пупкина !</p>
			</div>
		</div>
		-->
		
		<?php	
			require_once 'ClassComments.php';
			//username / date / comment
			$com=new ClassComments();
			
			if (isset($_POST)){
				if (isset($_POST['username']) && isset($_POST['comment'])){
					$username=trim(htmlspecialchars($_POST['username']));
					$comment=trim(htmlspecialchars($_POST['comment']));
					if (($username!='')&&($comment!='')){
						//$date = mktime();
						$date = date('Y-m-d H:i:s');
						//print($username . '/' . $date . '/' . $comment);
						//echo date("d.m.Y",1356361196); //24.12.2012 
						$com->writeComments($username, $date, $comment);
						unset($_POST);
					}
				}
			}
			
			print($com->printComments());
			
		?>
		
	  </div>
		
		<hr>
		
		<div id="form-comments">
			<p class="mid_b_w">Оставить коментарий</p>
			<form action="page.php" method="POST" target="_self"
				enctype="application/x-www-form-urlencoded">
				<p>Ваше имя</p>
				<p><label><input class="lname" name="username" type="text" placeholder="Имя" maxlength="20" required></label></p>
				<p>Ваш комментарий</p>
				<p><label><textarea class="lcomm" name="comment" required></textarea></p>
				
				<div class="submit"> <input type="submit" value="Отправить"> </div>
			</form>
			
		</div>
	</div>
	
	<div id="footer">			
		<a href="https://future-group.ru"><div class="logo"></div></a>
		<div class="info">
				<p class="st_b_w">Телефон: (499) 340-94-71</p>
				<p class="st_b_w">Email: <a href="mailto:info@future-group.ru">info@future-group.ru</a></p>
				<p class="st_b_w">Адрес: <a href="https://yandex.ru/maps/213/moscow/?source=wizgeo&utm_source=serp&l=map&utm_medium=maps-desktop&mode=search&text=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%20%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%202-%D1%8F%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%20%D0%9C%D0%B0%D1%88%D0%B8%D0%BD%D0%BE%D1%81%D1%82%D1%80%D0%BE%D0%B5%D0%BD%D0%B8%D1%8F%2C%207%D1%811&sll=37.671372%2C55.712335">
								115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1
						  </a>
				</p>
				<br>
				<p class="all_r_r">© 2010 - 2014 Future. Все права защищены</p>
		</div>
	</div>
</div>

</body>
</html>