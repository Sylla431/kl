// ecrire un fonction qui prend en parametre une chaine et verifie s'il est palindrome en dart
Future<void> main() async {
  // Initialiser Amplify avec la configuration
  runApp(MyApp());

  // newEvent();
}

bool estPalindrome(String chaine) {
  // Supprimer les espaces et convertir la chaîne en minuscules
  chaine = chaine.replaceAll(' ', '').toLowerCase();

  // Vérifier si la chaîne est un palindrome
  int debut = 0;
  int fin = chaine.length - 1;

  while (debut < fin) {
    if (chaine[debut] != chaine[fin]) {
      return false;
    }

    debut++;
    fin--;
  }

  return true;
}
