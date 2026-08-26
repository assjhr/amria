# AMRIA

AMRIA is een dynamische fashion- en inspiratiewebsite ontwikkeld met Laravel voor de eindopdracht Backend Web.

De applicatie bevat publieke pagina's voor bezoekers en een beveiligde omgeving voor geregistreerde gebruikers en administrators. Administrators kunnen gebruikers, nieuwsitems en FAQ-content beheren.

## Functionaliteiten

### Authenticatie

De applicatie bevat een volledig authenticatiesysteem.

- Registreren van een nieuwe gebruiker
- Inloggen en uitloggen
- Remember me
- Wachtwoord vergeten
- Wachtwoord resetten
- Publieke pagina's blijven toegankelijk zonder account
- Onderscheid tussen gewone gebruikers en administrators
- Admins worden na het inloggen doorgestuurd naar het admin dashboard

### Gebruikers en profielen

Elke gebruiker heeft een publieke profielpagina die ook zichtbaar is voor bezoekers zonder account.

Een profiel bevat onder andere:

- Username
- Verjaardag
- Profielfoto
- Over mij-tekst

Een ingelogde gebruiker kan zijn eigen profielgegevens aanpassen.

Administrators kunnen daarnaast:

- Gebruikers bekijken
- Nieuwe gebruikers manueel aanmaken
- Een gebruiker administrator maken
- Adminrechten van een gebruiker verwijderen

### Nieuws

AMRIA bevat een publiek nieuwsoverzicht.

Iedere bezoeker kan:

- Alle nieuwsitems bekijken
- De detailpagina van een nieuwsitem bekijken

Een nieuwsitem bevat:

- Titel
- Afbeelding
- Content
- Publicatiedatum
- Auteur

Administrators kunnen:

- Nieuwsitems toevoegen
- Nieuwsitems wijzigen
- Nieuwsitems verwijderen

Afbeeldingen worden op de webserver opgeslagen.

### FAQ

De website bevat een publieke FAQ-pagina.

Vragen en antwoorden worden gegroepeerd per categorie.

Administrators kunnen:

- FAQ-categorieën toevoegen
- FAQ-categorieën wijzigen
- FAQ-categorieën verwijderen
- FAQ-vragen toevoegen
- FAQ-vragen wijzigen
- FAQ-vragen verwijderen

### Contact

Iedere bezoeker kan het contactformulier gebruiken zonder ingelogd te zijn.

Het formulier bevat:

- Naam
- E-mailadres
- Onderwerp
- Bericht

De invoer wordt zowel aan de clientzijde als aan de serverzijde gevalideerd.

Na het versturen wordt via Laravel Mail een e-mail gegenereerd voor:

`admin@ehb.be`

De mail bevat de gegevens en het bericht van de bezoeker.

De gebruikte maildriver wordt bepaald door de `.env`-configuratie. Tijdens lokale ontwikkeling kan `MAIL_MAILER=log` gebruikt worden om mails in `storage/logs/laravel.log` te controleren.

---

# Technische implementatie

## MVC

Het project volgt de MVC-structuur van Laravel.

### Models

De Eloquent models bevinden zich in:

`app/Models`

De models vertegenwoordigen de verschillende entiteiten van de applicatie en bevatten de nodige relaties.

### Controllers

Controllers bevinden zich in:

`app/Http/Controllers`

Adminfunctionaliteit is verder opgesplitst in:

`app/Http/Controllers/Admin`

De controllers verwerken requests, validatie en applicatielogica en geven gegevens door aan de views.

### Views

De Blade-views bevinden zich in:

`resources/views`

De applicatie maakt gebruik van Blade layouts, componenten en control structures.

---

# Technische vereisten

## Meerdere layouts

De applicatie gebruikt meerdere layouts.

Voorbeelden:

- Publieke AMRIA-layout: `resources/views/layouts/public.blade.php`
- Authenticatielayouts: `resources/views/components/layouts/auth/`

Hierdoor hebben de publieke website en authenticatiepagina's een aangepaste maar consistente structuur.

## Blade components

De authenticatie maakt gebruik van Blade- en Flux-componenten, bijvoorbeeld:

- `<x-layouts::auth>`
- `<flux:input>`
- `<flux:button>`
- `<flux:link>`

## Control structures

Blade control structures worden op verschillende plaatsen gebruikt:

```blade
@auth
@else
@endauth

@if
@endif

@foreach
@endforeach
```

Deze worden onder andere gebruikt voor navigatie, gebruikersrollen, nieuwsitems, FAQ's en formulieren.

## XSS protection

Gebruikersdata wordt standaard weergegeven met Blade escaping:

```blade
{{ $variable }}
```

Hierdoor wordt HTML uit gebruikersinput niet rechtstreeks uitgevoerd.

Waar regeleinden in een contactbericht behouden moeten blijven, wordt de inhoud eerst expliciet escaped:

```blade
{!! nl2br(e($messageContent)) !!}
```

## CSRF protection

POST-, PUT-, PATCH- en DELETE-formulieren gebruiken Laravel CSRF-bescherming:

```blade
@csrf
```

Voor PUT/PATCH/DELETE requests worden waar nodig method directives gebruikt:

```blade
@method('PUT')
@method('DELETE')
```

## Validatie

Formulieren gebruiken server-side Laravel-validatie in de controllers.

Daarnaast worden HTML-attributen zoals deze gebruikt voor client-side validatie:

```html
required
type="email"
```

## Routes

De routes bevinden zich in:

`routes/web.php`

Routes gebruiken controller methods en middleware waar nodig.

Adminroutes zijn gegroepeerd met een prefix, naamgeving en middleware.

Conceptueel:

```php
Route::prefix('admin')
    ->name('admin.')
    ->middleware('admin')
    ->group(function () {
        // admin routes
    });
```

Publieke routes zoals nieuws, FAQ, profielen en contact zijn toegankelijk zonder adminrechten.

## Middleware

Beveiligde functionaliteiten maken gebruik van Laravel middleware.

Voorbeelden:

- `auth`
- `verified`
- `admin`

Hierdoor kunnen alleen bevoegde gebruikers adminfunctionaliteiten uitvoeren.

## Eloquent relaties

## Eloquent relaties

Het project gebruikt Eloquent-relaties tussen de verschillende entiteiten.

### One-to-many

Nieuwsitems zijn gekoppeld aan een gebruiker/auteur. Een gebruiker kan meerdere nieuwsitems hebben en een nieuwsitem behoort tot één gebruiker.

De relaties zijn terug te vinden in:

- `app/Models/User.php`
- `app/Models/News.php`

### Many-to-many

Nieuwsitems en tags hebben een many-to-many-relatie.

Een nieuwsitem kan meerdere tags hebben en een tag kan aan meerdere nieuwsitems gekoppeld zijn.

De relaties zijn geïmplementeerd via:

- `app/Models/News.php` → `tags()`
- `app/Models/Tag.php` → `news()`

De koppeling wordt opgeslagen in de pivot table:

`news_tag`

De migration hiervan bevindt zich in `database/migrations` en bevat de foreign keys `news_id` en `tag_id`.

## Database

De databasestructuur wordt beheerd met Laravel migrations.

Locatie:

`database/migrations`

Basisgegevens worden aangemaakt via seeders:

`database/seeders`

De volledige database kan vanaf nul worden opgebouwd met:

```bash
php artisan migrate:fresh --seed
```

Dit commando is tijdens de ontwikkeling getest.

---

# Default administrator

Na het uitvoeren van de seeders is het verplichte administratoraccount beschikbaar.

**Username:** admin  
**Email:** admin@ehb.be  
**Password:** Password!321

Dit account heeft toegang tot het admin dashboard en de beheerfunctionaliteiten.

---

# Installatie

## Vereisten

Voor het project zijn onder andere nodig:

- PHP
- Composer
- Node.js en npm
- Een ondersteunde database
- Laravel-compatible ontwikkelomgeving

## 1. Repository clonen

```bash
git clone <repository-url>
cd amria
```

## 2. PHP dependencies installeren

```bash
composer install
```

## 3. JavaScript dependencies installeren

```bash
npm install
```

## 4. Environment configureren

Maak een `.env`-bestand op basis van `.env.example`:

```bash
cp .env.example .env
```

Configureer daarna de database- en mailinstellingen in `.env`.

## 5. Application key genereren

```bash
php artisan key:generate
```

## 6. Database opbouwen

```bash
php artisan migrate:fresh --seed
```

## 7. Storage link aanmaken

Voor publiek opgeslagen afbeeldingen:

```bash
php artisan storage:link
```

## 8. Front-end starten

```bash
npm run dev
```

## 9. Laravel starten

In een tweede terminal:

```bash
php artisan serve
```

De applicatie is vervolgens standaard bereikbaar via:

`http://127.0.0.1:8000`

---

# Mailconfiguratie

Laravel Mail wordt gebruikt voor het contactformulier en de functionaliteit voor het resetten van wachtwoorden.

De mailconfiguratie wordt via `.env` ingesteld.

Voor lokale ontwikkeling kan bijvoorbeeld de log-driver gebruikt worden:

```env
MAIL_MAILER=log
```

Hierdoor worden mails niet extern verzonden, maar lokaal gelogd.

Voor een echte mailserver kunnen de overeenkomstige mailinstellingen in `.env` geconfigureerd worden.

---

# Codekwaliteit

Tijdens de ontwikkeling werden codecontroles uitgevoerd.

## Laravel Pint

```bash
./vendor/bin/pint
```

Pint wordt gebruikt om de PHP-code volgens een consistente stijl te formatteren.

## PHPStan

```bash
php -d memory_limit=512M ./vendor/bin/phpstan analyse
```

Voor de finale controle gaf PHPStan:

```text
[OK] No errors
```

---

# Screenshots

Hier worden screenshots van de applicatie toegevoegd voor de finale indiening.

Aanbevolen screenshots:

1. Homepage
2. Loginpagina
3. Registratiepagina
4. Publieke profielpagina
5. Profiel bewerken
6. Nieuwsoverzicht
7. Nieuwsdetail
8. FAQ-pagina
9. Contactpagina
10. Admin dashboard
11. Gebruikersbeheer
12. Nieuwsbeheer
13. FAQ-beheer

De screenshots worden bewaard in:

`docs/screenshots/`

---

# Projectstructuur

Belangrijke directories:

```text
app/
├── Http/
│   ├── Controllers/
│   └── Responses/
├── Mail/
└── Models/

database/
├── migrations/
└── seeders/

resources/
└── views/
    ├── contact/
    ├── emails/
    ├── layouts/
    └── livewire/

routes/
└── web.php
```

---

# Gebruikte technologieën

- PHP
- Laravel
- Blade
- Laravel Fortify
- Livewire
- Flux
- Tailwind CSS
- Eloquent ORM
- Laravel Mail
- Vite
- SQLite tijdens lokale ontwikkeling
- Git
- GitHub

---

# Bronnen

Voor dit project werden onder andere de volgende bronnen gebruikt:

- Laravel documentatie
- Laravel Fortify documentatie
- Livewire documentatie
- Flux documentatie
- Tailwind CSS documentatie
- Cursusmateriaal Backend Web
- Oefeningen Backend Web

## AI-gebruik

AI (ChatGPT) werd gebruikt als ondersteuning tijdens de ontwikkeling, onder andere voor:

- Uitleg over Laravel-concepten
- Debuggen van foutmeldingen
- Structureren van controllers en views
- Styling en Blade/Tailwind
- Contactformulier en Laravel Mail
- Authenticatieflow
- Codecontrole
- Documentatie

De gegenereerde code werd tijdens de ontwikkeling getest en waar nodig aangepast.

De AI-chatlog wordt als bron bij de indiening toegevoegd volgens de vereisten van de opdracht.

---

# Auteur

Assia Jouhri

AMRIA werd ontwikkeld als individueel project voor het vak **Backend Web** aan Erasmushogeschool Brussel.

Herexamen — academiejaar 2025-2026.