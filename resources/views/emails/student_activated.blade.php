<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compte validé</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f4f6f8; padding:20px">

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

<table width="600" style="background:#ffffff; padding:30px; border-radius:8px">
<tr>
<td>

<h2 style="color:#2c3e50;">🎓 Bienvenue sur CampusMaster</h2>

<p>Bonjour <strong>{{ $user->name }}</strong>,</p>

<p>
Votre compte étudiant a été
<strong style="color:green;">validé par l’administration</strong>.
</p>


<p>
Vous pouvez désormais accéder à l’ensemble des fonctionnalités de la plateforme.
</p>

<p style="text-align:center; margin:30px 0">
<a href="{{ $loginUrl }}"
   style="background:#1d4ed8; color:white; padding:12px 25px; text-decoration:none; border-radius:6px; display:inline-block;">
Se connecter à CampusMaster
</a>

</p>

<hr>

<p style="font-size:12px; color:#6b7280;">
Si vous n’êtes pas à l’origine de cette inscription, ignorez cet email.
</p>

<p style="font-size:12px; color:#6b7280;">
© {{ date('Y') }} CampusMaster – Plateforme pédagogique
</p>

</td>
</tr>
</table>

</td>
</tr>
</table>

</body>
</html>
