userinfo:
this entire project is not a true implementation, and will not use real money, simply give admins an option to give a check to users that have "paid"

# Vogelvereniging 't Fratertje - Project Status & TODO

## Current Status
The application is currently in an advanced stage of implementation. Core models, migrations, controllers, and views have been created.

### Accomplishments
- **Environment Setup:** Configured `.env` with SQLite and initialized the database.
- **Model Refactoring:** Renamed models to PSR-4 compliant names (`Member`, `Address`, `MemberType`, `BreedingNumber`) and implemented `SoftDeletes` on the `Member` model.
- **Database Schema:** Updated migrations to support soft deletes and ran `migrate:fresh`.
- **Routing:** Configured `routes/web.php` with `Route::resource` for members, member_types, and breeding_numbers.
- **Controller Scaffolding:** Refactored controllers for members, member_types, breeding_numbers, and invoices.
- **View Scaffolding:** Completed all CRUD views for `members`, `member_types`, `breeding_numbers`, and `invoices`.

## Pending Tasks

### 1. Implement Core Business Logic
- [ ] **Member Search:** Implement search functionality in `MembersController` (search by name, species, status, breeding number).
- [ ] **Price Management:** Implement logic for `MemberType` prices where price changes are announced and only apply to the following year.
- [ ] **Invoicing System:** Implement logic to generate invoices based on member species and membership status.
- [ ] **Public Registration/Cancellation:** Implement public-facing forms for joining/leaving the club. 
- [ ] **Verification Workflow:** Implement a mechanism for the secretary to approve/verify new or cancelled membership requests.

### 2. Final Polish & Testing
- [ ] Verify all search and filter functionality.
- [ ] Ensure soft-deletion works as expected.
- [ ] add an user field to the regristration of new members
- [ ] Final UI/UX refinements using Tailwind CSS.


## Current Status
The application is currently in a refactored and partially implemented state. The core models, migrations, routes, and controllers have been modernized to follow Laravel best practices.

### Accomplishments
NOTE: the user will give a proper .env, ask for this if they forget to give it
- **Environment Setup:** Configured `.env` with SQLite, installed dependencies via `composer.phar`, and initialized the database.
- **Model Refactoring:** Renamed models to PSR-4 compliant names (`Member`, `Address`, `MemberType`, `BreedingNumber`) and implemented `SoftDeletes` on the `Member` model.
- **Database Schema:** Updated migrations to support soft deletes and ran `migrate:fresh`.
- **Routing:** Configized `routes/web.php` with `Route::resource` for members and appropriate auth middleware.
- **Controller Scaffolding:** Refactored `MembersController`, `MemberTypesController`, and `BreedingNumberController` to use new model names and provide basic CRUD logic.
- **View Scaffolding:** Created the directory structure for views and implemented `members/index.blade.php`.

## Pending Tasks

### 1. Complete View Implementation
- [ ] `members/create.blade.php` (Registration form)
- [ ] `home.blade.php` (give users an introduction and an option to register)
- [ ] `members/show.blade.php` (Detail view)
- [ ] `members/edit.blade.php` (Edit form)
- [ ] `member_types/index.blade.php`, `create`, `show`, `edit`
- [ ] `breeding_numbers/index.blade.php`, `create`, `show`, `edit`

### 2. Implement Core Business Logic
- [ ] **Price Management:** Implement logic for `MemberType` prices where price changes are announced and only apply to the following year (requires history/effective dates).
- [ ] **Invoicing System:** Implement logic to generate invoices based on member species and membership status.
- [ ] **Public Registration/Cancellation:** Implement public-facing forms for joining/leaving the club.
- [ ] **Verification Workflow:** Implement a mechanism for the secretary to approve/verify new or cancelled membership requests.

### 3. Final Polish & Testing
- [ ] Verify all search and filter functionality.
- [ ] Ensure soft-deletion works as expected.
- [ ] Final UI/UX refinements using Tailwind CSS.
