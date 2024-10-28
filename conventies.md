# Code Conventies voor Laravel

Dit zijn de code conventies van ons groepje.

## 1. Bestandsstructuur en Organisatie

- **Controllers**: Plaats controllers in de `app/Http/Controllers` map. Gebruik logische submappen indien nodig (bijvoorbeeld `Admin`, `Auth`).
- **Models**: Alle modellen moeten worden geplaatst in de `app/Models` map en hun namen moeten in enkelvoud zijn, zoals `User` of `Order`.
- **Routes**: Definieer routes in de `routes/web.php` voor web-routes en `routes/api.php` voor API-routes. Gebruik `Route::resource` voor CRUD-routes waar mogelijk.

## 2. Naming Conventions

- **Class Names**: Gebruik PascalCase voor klassen, zoals `UserController`, `OrderService`.
- **Method Names**: Gebruik camelCase voor methoden, zoals `getUserData`, `storeOrder`.
- **Variable Names**: Gebruik camelCase voor variabelen, zoals `$orderList`, `$totalAmount`.
- **Constant Names**: Gebruik UPPER_SNAKE_CASE voor constante waarden, zoals `API_TIMEOUT` en `DEFAULT_LIMIT`.
- **Route Names**: Gebruik puntnotatie voor route-namen, zoals `user.index` of `order.create`.

## 3. Controllers

- **Single Responsibility**: Houd controllers eenvoudig en focus op één verantwoordelijkheid. Verplaats logica naar Services of Actions indien deze te complex wordt.
- **Method Naming**: Volg de standaard Laravel-naming voor RESTful controllers, zoals `index`, `show`, `store`, `update`, `destroy`.
- **Dependency Injection**: Maak gebruik van constructor dependency injection waar mogelijk in controllers voor betere testbaarheid en flexibiliteit.

## 4. Eloquent Models

- **Naming**: Gebruik de enkelvoudige naam van het model (`User`, niet `Users`).
- **Relationships**: Definieer relaties met behulp van logische methodnamen, zoals `user()`, `orders()`, en `comments()`. Gebruik `hasOne`, `hasMany`, `belongsTo` enzovoort.
- **Query Scopes**: Gebruik Local Scopes voor herbruikbare querylogica. Definieer deze in het model met een `scope`-prefix, bijvoorbeeld `scopeActive($query)`.

## 5. Migrations

- **Naming Conventions**: Geef migraties een beschrijvende naam, zoals `create_users_table` of `add_status_to_orders_table`.
- **Columns**: Maak gebruik van conventionele kolomnamen, zoals `id`, `created_at`, `updated_at`, `deleted_at` voor timestamps.
- **Default Values**: Voeg standaardwaarden toe in migraties indien van toepassing, en zorg voor duidelijk gedefinieerde kolomtypen.

## 6. Blade Templates

- **Directory Structure**: Groepeer gerelateerde templates in mappen onder `resources/views`. Bijvoorbeeld `resources/views/user/profile.blade.php`.
- **Naming Conventions**: Gebruik kleine letters met underscores voor bestandsnamen, zoals `user_profile.blade.php`.
- **Template Inheritance**: Gebruik Blade-secties (`@section`) en layouts (`@extends`) om herbruikbare sjablonen te creëren.
- **Blade Directives**: Gebruik Laravel’s ingebouwde Blade-directieven (`@if`, `@foreach`, `@include`, enz.) voor leesbaarheid en consistentie.

## 7. Routes

- **Grouping**: Groepeer routes met `Route::group` wanneer ze hetzelfde middleware, prefix of namespace delen.
- **Resourceful Routes**: Gebruik `Route::resource` voor CRUD-controllers om consistente RESTful routes te genereren.
- **Naming**: Geef routes logische namen voor eenvoudige referentie. Bijvoorbeeld:
  ```php
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
