<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquête sur les Tendances du Marché des Accessoires Informatiques</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 max-w-3xl">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Enquête sur les Tendances du Marché des Accessoires Informatiques</h1>

    <form id="marketTrendsForm" method="POST" action="{{ route('survey.store') }}" class="space-y-8">
        @csrf

        <!-- Section 1: Informations personnelles -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Informations personnelles</h2>

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="profession" class="block text-sm font-medium text-gray-700 mb-1">Profession</label>
                    <input type="text" id="profession" name="profession" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('profession') }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Êtes-vous un professionnel de l'informatique ?</label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input type="radio" id="it_pro_yes" name="it_professional" value="yes" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('it_professional') == 'yes' ? 'checked' : '' }}>
                            <label for="it_pro_yes" class="ml-2 block text-sm text-gray-700">Oui</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="it_pro_no" name="it_professional" value="no" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('it_professional') == 'no' ? 'checked' : '' }}>
                            <label for="it_pro_no" class="ml-2 block text-sm text-gray-700">Non</label>
                        </div>
                    </div>
                </div>

                <!-- Question conditionnelle pour les professionnels IT -->
                <div id="it_pro_details" class="hidden space-y-4 p-4 bg-blue-50 rounded-md">
                    <div>
                        <label for="it_role" class="block text-sm font-medium text-gray-700 mb-1">Quel est votre rôle dans l'informatique ?</label>
                        <select id="it_role" name="it_role" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Sélectionnez votre rôle</option>
                            <option value="developer" {{ old('it_role') == 'developer' ? 'selected' : '' }}>Développeur</option>
                            <option value="sysadmin" {{ old('it_role') == 'sysadmin' ? 'selected' : '' }}>Administrateur système</option>
                            <option value="network" {{ old('it_role') == 'network' ? 'selected' : '' }}>Spécialiste réseau</option>
                            <option value="security" {{ old('it_role') == 'security' ? 'selected' : '' }}>Spécialiste en sécurité</option>
                            <option value="data" {{ old('it_role') == 'data' ? 'selected' : '' }}>Data Scientist/Analyste</option>
                            <option value="support" {{ old('it_role') == 'support' ? 'selected' : '' }}>Support technique</option>
                            <option value="other" {{ old('it_role') == 'other' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>

                    <div>
                        <label for="company_size" class="block text-sm font-medium text-gray-700 mb-1">Taille de votre entreprise</label>
                        <select id="company_size" name="company_size" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Sélectionnez la taille</option>
                            <option value="small" {{ old('company_size') == 'small' ? 'selected' : '' }}>Petite (1-50 employés)</option>
                            <option value="medium" {{ old('company_size') == 'medium' ? 'selected' : '' }}>Moyenne (51-250 employés)</option>
                            <option value="large" {{ old('company_size') == 'large' ? 'selected' : '' }}>Grande (251-1000 employés)</option>
                            <option value="enterprise" {{ old('company_size') == 'enterprise' ? 'selected' : '' }}>Très grande (1000+ employés)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Habitudes d'achat -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Habitudes d'achat</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">À quelle fréquence achetez-vous des accessoires informatiques ? <span class="text-red-500">*</span></label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input type="radio" id="frequency_monthly" name="purchase_frequency" value="monthly" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('purchase_frequency') == 'monthly' ? 'checked' : '' }}>
                            <label for="frequency_monthly" class="ml-2 block text-sm text-gray-700">Tous les mois</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="frequency_quarterly" name="purchase_frequency" value="quarterly" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('purchase_frequency') == 'quarterly' ? 'checked' : '' }}>
                            <label for="frequency_quarterly" class="ml-2 block text-sm text-gray-700">Tous les trimestres</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="frequency_biannually" name="purchase_frequency" value="biannually" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('purchase_frequency') == 'biannually' ? 'checked' : '' }}>
                            <label for="frequency_biannually" class="ml-2 block text-sm text-gray-700">Tous les semestres</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="frequency_annually" name="purchase_frequency" value="annually" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('purchase_frequency') == 'annually' ? 'checked' : '' }}>
                            <label for="frequency_annually" class="ml-2 block text-sm text-gray-700">Une fois par an</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="frequency_rarely" name="purchase_frequency" value="rarely" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('purchase_frequency') == 'rarely' ? 'checked' : '' }}>
                            <label for="frequency_rarely" class="ml-2 block text-sm text-gray-700">Rarement</label>
                        </div>
                    </div>
                    @error('purchase_frequency')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Questions conditionnelles pour les acheteurs fréquents -->
                <div id="frequent_buyer_questions" class="hidden space-y-4 p-4 bg-green-50 rounded-md">
                    <p class="text-sm font-medium text-gray-700">Vous semblez acheter régulièrement des accessoires informatiques. Parlez-nous davantage de vos habitudes :</p>

                    <div>
                        <label for="budget_monthly" class="block text-sm font-medium text-gray-700 mb-1">Quel est votre budget mensuel moyen pour les accessoires informatiques ? (en €)</label>
                        <input type="number" id="budget_monthly" name="budget_monthly" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('budget_monthly') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Êtes-vous abonné à des services de type "accessoire du mois" ?</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center">
                                <input type="radio" id="subscription_yes" name="subscription" value="yes" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('subscription') == 'yes' ? 'checked' : '' }}>
                                <label for="subscription_yes" class="ml-2 block text-sm text-gray-700">Oui</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="subscription_no" name="subscription" value="no" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('subscription') == 'no' ? 'checked' : '' }}>
                                <label for="subscription_no" class="ml-2 block text-sm text-gray-700">Non</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="purchase_motivation" class="block text-sm font-medium text-gray-700 mb-1">Qu'est-ce qui vous motive à acheter aussi fréquemment ?</label>
                        <textarea id="purchase_motivation" name="purchase_motivation" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('purchase_motivation') }}</textarea>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Quels types d'accessoires informatiques avez-vous achetés au cours des 12 derniers mois ? (Plusieurs réponses possibles) <span class="text-red-500">*</span></label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_mouse" name="accessories[]" value="mouse" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('mouse', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_mouse" class="ml-2 block text-sm text-gray-700">Souris</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_keyboard" name="accessories[]" value="keyboard" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('keyboard', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_keyboard" class="ml-2 block text-sm text-gray-700">Clavier</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_headphones" name="accessories[]" value="headphones" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('headphones', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_headphones" class="ml-2 block text-sm text-gray-700">Casque/Écouteurs</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_webcam" name="accessories[]" value="webcam" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('webcam', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_webcam" class="ml-2 block text-sm text-gray-700">Webcam</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_storage" name="accessories[]" value="storage" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('storage', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_storage" class="ml-2 block text-sm text-gray-700">Stockage externe</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_monitor" name="accessories[]" value="monitor" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('monitor', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_monitor" class="ml-2 block text-sm text-gray-700">Écran/Moniteur</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="accessory_other" name="accessories[]" value="other" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ is_array(old('accessories')) && in_array('other', old('accessories')) ? 'checked' : '' }}>
                            <label for="accessory_other" class="ml-2 block text-sm text-gray-700">Autre</label>
                        </div>
                    </div>
                    @error('accessories')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Champ conditionnel pour "Autre" -->
                <div id="other_accessory_field" class="hidden">
                    <label for="other_accessory" class="block text-sm font-medium text-gray-700 mb-1">Veuillez préciser les autres accessoires :</label>
                    <input type="text" id="other_accessory" name="other_accessory" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ old('other_accessory') }}">
                </div>

                <!-- Questions conditionnelles pour les accessoires spécifiques -->
                <!-- Pour les claviers -->
                <div id="keyboard_questions" class="hidden space-y-4 p-4 bg-yellow-50 rounded-md">
                    <h3 class="text-md font-medium text-gray-800">Questions sur les claviers</h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quel type de clavier préférez-vous ?</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center">
                                <input type="radio" id="keyboard_mechanical" name="keyboard_type" value="mechanical" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('keyboard_type') == 'mechanical' ? 'checked' : '' }}>
                                <label for="keyboard_mechanical" class="ml-2 block text-sm text-gray-700">Mécanique</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="keyboard_membrane" name="keyboard_type" value="membrane" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('keyboard_type') == 'membrane' ? 'checked' : '' }}>
                                <label for="keyboard_membrane" class="ml-2 block text-sm text-gray-700">Membrane</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="keyboard_scissor" name="keyboard_type" value="scissor" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('keyboard_type') == 'scissor' ? 'checked' : '' }}>
                                <label for="keyboard_scissor" class="ml-2 block text-sm text-gray-700">Ciseaux (Scissor-switch)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Tendances du marché -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Tendances du marché</h2>

            <div class="space-y-4">
                <div>
                    <label for="market_opinion" class="block text-sm font-medium text-gray-700 mb-1">Selon vous, comment le marché des accessoires informatiques va-t-il évoluer dans les prochaines années ?</label>
                    <textarea id="market_opinion" name="market_opinion" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('market_opinion') }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-md shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Soumettre le formulaire</button>
    </form>
</div>

<script>
    // Fonction pour afficher/masquer les questions conditionnelles
    function toggleConditionalQuestions() {
        // Pour les professionnels IT
        const itProYes = document.getElementById('it_pro_yes');
        const itProDetails = document.getElementById('it_pro_details');

        if (itProYes) {
            itProYes.addEventListener('change', function() {
                itProDetails.classList.remove('hidden');
            });

            document.getElementById('it_pro_no').addEventListener('change', function() {
                itProDetails.classList.add('hidden');
            });

            // Vérifier l'état initial
            if (itProYes.checked) {
                itProDetails.classList.remove('hidden');
            }
        }

        // Pour les acheteurs fréquents
        const frequentBuyerQuestions = document.getElementById('frequent_buyer_questions');
        const frequencyMonthly = document.getElementById('frequency_monthly');
        const frequencyQuarterly = document.getElementById('frequency_quarterly');

        if (frequencyMonthly && frequencyQuarterly) {
            frequencyMonthly.addEventListener('change', function() {
                frequentBuyerQuestions.classList.remove('hidden');
            });

            frequencyQuarterly.addEventListener('change', function() {
                frequentBuyerQuestions.classList.remove('hidden');
            });

            document.getElementById('frequency_biannually').addEventListener('change', function() {
                frequentBuyerQuestions.classList.add('hidden');
            });

            document.getElementById('frequency_annually').addEventListener('change', function() {
                frequentBuyerQuestions.classList.add('hidden');
            });

            document.getElementById('frequency_rarely').addEventListener('change', function() {
                frequentBuyerQuestions.classList.add('hidden');
            });

            // Vérifier l'état initial
            if (frequencyMonthly.checked || frequencyQuarterly.checked) {
                frequentBuyerQuestions.classList.remove('hidden');
            }
        }

        // Pour l'option "Autre" dans les accessoires
        const accessoryOther = document.getElementById('accessory_other');
        const otherAccessoryField = document.getElementById('other_accessory_field');

        if (accessoryOther) {
            accessoryOther.addEventListener('change', function() {
                if (this.checked) {
                    otherAccessoryField.classList.remove('hidden');
                } else {
                    otherAccessoryField.classList.add('hidden');
                }
            });

            // Vérifier l'état initial
            if (accessoryOther.checked) {
                otherAccessoryField.classList.remove('hidden');
            }
        }

        // Pour les questions spécifiques aux claviers
        const accessoryKeyboard = document.getElementById('accessory_keyboard');
        const keyboardQuestions = document.getElementById('keyboard_questions');

        if (accessoryKeyboard) {
            accessoryKeyboard.addEventListener('change', function() {
                if (this.checked) {
                    keyboardQuestions.classList.remove('hidden');
                } else {
                    keyboardQuestions.classList.add('hidden');
                }
            });

            // Vérifier l'état initial
            if (accessoryKeyboard.checked) {
                keyboardQuestions.classList.remove('hidden');
            }
        }
    }

    // Initialiser les questions conditionnelles au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        toggleConditionalQuestions();
    });
</script>
</body>
</html>
