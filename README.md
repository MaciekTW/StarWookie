## StarWookie -Baza Wiedzy

### 1. Pierwsze uruchomienie
<ol>
<li> Utwórz nowy folder na dysku (Proponuje nazwać go projekt, nie trzeba potem zmieniać ścieżek w komendach które podałem)</li>
<li> Przejdź do niego i pobierz repo: * git clone git@bitbucket.org:jakkow/php_projekt.git *</li>
<li> Z folderu z repozytorium **z ćwiczeń** skopiuj do utworzonego przez ciebie folderu katalog .env oraz plik php.env </li>
<li> w konsoli wpisz source php.env</li>
<li> Wybierz opcje run ide, powinien uruchomić się phpstorm, wybierz folder php_projekt do którego zapisało się repo</li>
#### Dostęp do bazy danych z poziomu phpstorm
<li> Z prawej strony ekranu wybieramy zakładkę database</li>
<li> Dodajemy nowe połączenie (data source) z listy wybieramy mysql </li>
<li> Uzupełniamy dane host=127.0.0.1 databse=test user=root password=root123 </li>
</ol>

### 2. Aktualizowanie repo

<ol>
<li> Pociągnij repo z bitbucketa</li>
<li> W folderze z repo skopiuj plik .env.example do pliku .env w tym samym folderze</li>
<li> W konsoli wpisz polecenie *composer install*</li>
<li> Tworzymy nowy klucz poleceniem *php artisan key:generate* </li>
<li> Uruchamiamy migracje poleceniem php artisan migrate</li>
<li> Any zainstalowac dodatkowe dependencje *yarn install* </li>

</ol>

### 3. Uruchamianie projektu (jeśli serwer mysql nie działa)

<ol>
<li> Uruchamiamy serwer z bazą danych sudo docker run --name=mysql --net=host --rm --env MYSQL_ROOT_PASSWORD=root123 --env MYSQL_ROOT_HOST=% --env MYSQL_DATABASE=test --env MYSQL_USER=test --env MYSQL_PASSWORD=test123 -d mysql/mysql-server:8.0</li>
<li> Uruchamiamy serwer ze stroną php artisan serve --port 8888</li>
<li> Uruchamiamy migracje poleceniem php artisan migrate</li>
<li> Wczytujemy pokemony poleceniem php artisan db:seed (Trwa to jakieś 10 sekund) </li>
<li> Podczas pracy z frontem warto odpalić *yarn watch* włączy to watchera, który przy każdej zmianie pliku zupdateuje *tailwindcss* </li>

</ol>

### 4. Commitowanie swoich zmian

### 5. Przydatne komendy Artisiana

#### Tworzenie nowego pliku z testami:

php vendor/bin/codecept generate:cept acceptance Example

#### Tworzenie dumpa bazy danych:

mysqldump -h127.0.0.1 -u root --password=root123 test > tests_codeception/_data/dump.sql

#### Uruchamianie serwera

php artisan serve --port 8888

#### Uruchamianie migracji

php artisan migrate

#### Odświeżanie migracji

php artisan migrate:refresh

#### Tworzenie nowego modelu

php artisan make:model NAZWA_MODELU --all

#### Tworzenie nowej migracji (Tabeli w bazie danych)

php artisan make:migration create_NAZWA_TABELI_table (proszę zwrócić uwagę na format np. create_post_comments_table)

#### Tworzenie nowego kontrolera

php artisan make:controller NAZWA_KONTROLERA

#### Tworzenie nowej reguły walidatora 

php artisan make:rule NAZWA

### 6. Informacje Dodatkowe

#### Wypełnianie bazy danych poprzez seeder

Rekordy wpisujemy w metodzie run() seedera danego modelu. Seedery znajdują się w atabase/seeders/
Należy pamiętać aby poza wpisaniem rekordów w seederze danego modelu dodać połączenie do nowego seedera w database/seeders/DatabaseSeeder.php

#### Nadpisywanie domyślnej tabeli sql używanej przez model

Domyślnie model korzysta ze struktury zdefiniowanej przez tabele nazywającą się tak jak model w liczbie mnogiej (np. model Book będzie szukał tabeli books). 
Aby zmienić to zachowanie należy w pliku z modelem użyć następującej linii **protected $table = 'nazwa_tabeli';**

### 7. Linki do dokumentacji

- [Struktura katalogów projektu](https://laravel.com/docs/8.x/structure)
- [Pobieranie rekordów z bazy partiami](https://laravel.com/docs/8.x/eloquent#chunking-results)
- [Tworzenie frontendu z użyciem Blade](https://laravel.com/docs/8.x/blade)
- [Kontrolery](https://laravel.com/docs/8.x/controllers)
- [Używanie walidatorów](https://laravel.com/docs/8.x/validation)
- [Obsługa bazy danych](https://laravel.com/docs/8.x/database)
- [Testy akceptacyjne](https://codeception.com/docs/03-AcceptanceTests#PhpBrowser)

