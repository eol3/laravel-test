<html>
	<body>
		<form method="POST">
			@csrf
			email:<input name="email" type="text"><br />
			password:<input name="password" type="password"><br />
			<button type="submit">login</button>
		</form>
	</body>
</html>