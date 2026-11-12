# Par projektu

"Educational progress" ir akadēmiskā progresa mājaslapa, kurā lietotājs var sekot līdzi savu priekšmetu/studiju progresam. <br>
Šī mājaslapa palīdz izsekot līdzi savam progresam katrā priekšmetā, uzrādot iegūto atzīmju progresu un kopējo vidējo atzīmi (bez un ar svaru).
<img width="1236" height="746" alt="image" src="https://github.com/user-attachments/assets/110f2e3b-dfca-4b7b-ba90-29facf6a6ca0" />

Priekšmetus var arī organizēt pēc paša izveidotajām grupām, lai tos būtu vieglāk pārskatīt:
<img width="1229" height="728" alt="image" src="https://github.com/user-attachments/assets/cbdceea6-0dec-4967-b623-76be84e8237f" />


**Mājaslapas lietotājs var:**
1. izveidot un rediģēt priekšmetus;
2. pievienot un rediģēt atzīmes katram priekšmetam ar aprakstu, svaru un iegūto atzīmi *(ja atzīme vēl nav iegūta, šo lauku var atstāt tukšu)*;
3. izveidot un rediģēt grupas;
4. piesaistīt priekšmetus pie grupām.

## Uzstādīšana lokāli:
1. Veic git clone ar `git clone https://github.com/3PT-2024/Full-stack-Cabele.git`;
2. Atver projekta mapi IDE programmatūrā;
3. Atver termināli un ievadi komandu `php -v`. Ja parādās atbilde, ka php netiek atpazīts, tad jāveic php instalēšana [šeit](https://www.php.net/downloads.php?os=windows&osvariant=windows-downloads&version=default);
4. Veic composer instalēšanu ar `composer install`;
5. Izveido .env failu ar `cp .env.example .env`;
6. Uzģenerē aplikācijas atslēgu ar `php artisan key:generate`;
7. Atver pgAdmin programmatūru un izveido jaunu postgresql datubāzi priekš projekta. *Ja uz datora nav uzinstalēts postgresql, tad instalē to [šeit](https://www.postgresql.org/download/)*;
8. Atver .env failu un ieraksti vajadzīgo datubāzes informāciju:<br>
  DB_CONNECTION=pgsql <br>
  DB_HOST=127.0.0.1<br>
  DB_PORT=5432<br>
  DB_DATABASE=tavs_datubāzes_nosaukums<br>
  DB_USERNAME=tavs_datubāzes_lietotājvārds<br>
  DB_PASSWORD=tava_datubāzes_parole<br>
9. Veic datubāzes migrāciju ar `php artisan migrate`;
10. Startē lokālo serveri ar `php artisan serve` un atver doto url pārlukprogrammā.

### Izmantotās tehnoloģijas:
Laravel, PostgreSQL, JavaScript, TailwindCSS
