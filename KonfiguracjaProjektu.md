## Konfiguracja bazy
Baza MySQL została wyeksporotwana z serwera 10.4.18-MariaDB.
Dane do podłączenia użytkwonika znajdują się w folderze "config" w pliku "config.php".
Podłączam również wyeksportowny plik z użytkownikiem z bazy.

## Projekt
Zadanie zgonie z zaleceniem wykonywałem +/- 4 godziny.
Plik index.php odpowiada za uruchomienie klasy "Request" oraz metody "run()" w "ArticleController", który tę klasę dziedziczy po "Controller".
Dalej zależnie od akcji wybierana jest odpowiednia metoda w klasie "ArticleController" i renderowana jest klasą "View", która z kolei wybiera odpowiedni template.
Operacje na bazie utworzone są w pliku "Database.php".

Generalnie do poprawek jest parę rzeczy (np. rozbicie akcji w kontrolerze tj. obecnie w przypadku edycji jedna metoda obsługuje pobranie dancych i ich późniejszy zapis).
