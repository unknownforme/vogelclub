# Vogelvereniging 't Fratertje - Project Status & TODO

## User Instructions
- This project does not use real money. Admins will manually mark members/invoices as "paid".
- Registration is public. Authentication (Login) is for Administrators only.

## Accomplishments

### 1. Foundation & Infrastructure
- [x] **Environment Setup:** Configured `.env` with SQLite and initialized the database.
- [x] **Model Refactoring:** Renamed models to PSR-4 compliant names (`Member`, `Address`, `MemberType`, `BreedingNumber`, `Invoice`) and implemented `SoftDeletes` on the `Member` model.
- [x] **Database Schema:** Updated migrations to support soft deletes and established relationships.
- [x] **Routing:** Configured `routes/web.php` with `Route::resource` for all modules, ensuring `members.create` and `members.store` are public.

### 2. View Implementation (CRUD Scaffolding)
- [x] **Members:** `index`, `create`, `show`, `edit`.
- [x] **Member Types:** `index`, `create`, `show`, `edit`.
- [x] **Breeding Numbers:** `index`, `create`, `show`, `edit`.
- [x] **Invoices:** `index`, `create`, `show`, `edit`.
- [x] **Landing Page:** Implemented `home.blade.php` with navigation for guests/admins.

### 3. Core Functionality
- [x] **Member Search & Filtering:** Implemented in `MembersController@index`.
- [x] **Public Registration:** Implemented public routes and email field in registration form.

## Pending Tasks

### 1. Implement Core Business Logic
- [ ] **Verification Workflow:** Implement a mechanism for the secretary to approve/verify new membership requests (using `is_active`).
- [ ] **Price Management:** Implement logic for `MemberType` prices where changes are announced and only apply to the following year.
- [ ] **Invoicing System:** Implement automated logic to generate invoices based on member species and membership status.
- [ ] **Public Cancellation:** Implement a public-facing form for members to request cancellation.

### 2. Refinements & Finalization
- [ ] **Final UI/UX:** Refine all interfaces using Tailwind CSS for a polished look.
- [ ] **Testing:** Verify all search, filter, and soft-deletion flows.
