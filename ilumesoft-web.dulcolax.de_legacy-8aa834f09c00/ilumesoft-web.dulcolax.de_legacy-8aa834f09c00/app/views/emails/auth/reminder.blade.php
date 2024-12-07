<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>{{ trans('content.email_1') }}</h2>

		<div>
			{{ trans('content.email_2') }} {{ URL::to('password/reset', array($token)) }}.
		</div>
	</body>
</html>