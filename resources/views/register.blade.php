<html>
	<body>
		Regist
		<form method="POST" action="/myregister">
			@csrf
			name:<input name="name" type="text"><br />
			email:<input name="email" type="text"><br />
			password:<input name="password" type="password"><br />
			check password:<input name="check_password" type="password"><br />
			<button type="submit">regist</button>
		</form>
	</body>
</html>