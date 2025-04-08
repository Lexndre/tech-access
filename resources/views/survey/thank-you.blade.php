<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre participation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
<div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    <h1 class="text-2xl font-bold text-gray-800 mb-3">Merci pour votre participation !</h1>
    <p class="text-gray-600 mb-6">Vos réponses ont été enregistrées avec succès. Nous apprécions votre contribution à notre étude sur les tendances du marché des accessoires informatiques.</p>
    <a href="{{ route('survey.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out">Retour à l'accueil</a>
</div>
</body>
</html>
