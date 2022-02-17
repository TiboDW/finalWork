Pages:
  page 1: Login system
    + Users can log in
    + Visitors can create a new account
    + Users may or may not be an administrator
    - Only an administrator can promote another user to administrator status (or create a new user that is an admin)
  page 2: Profile pagina
    + Each user has their own publicly available profile page
    + A user can edit their own user data
    + The information shown is at least
       + Username
       + Birthday
       - Avatar
       + Short 'about me' biography
  page 3: Latest paper
    + Admins can add, edit, and delete papers
    + user can add, edit papers
    + Every visitor of the website can view the papers
    + These paper items have at least the following:
      + Title
      + Cover image
      + synopsis
      + Publishing date
  page 3: papers highlight
    + shows papers in detail
    + contains following items:
      + Author: user that made post
      + title
      + synopsis
      + full document
      + Publishing date
  page 4: FAQ page
    - There is a list of questions and answers, grouped by categories
    - Admins can add, edit, and delete FAQ categories
    + Admins can add, edit, and delete FAQ question and answer pairs
    + Every visitor of the website can view the FAQ page(s)
  page 5: Contact page
    + Visitors can fill out a contact form
    - The content of submitted forms will be sent to the administrators
  page 5: About page
    + shows off all the requirements
    + shows Sources
    + shows structure of the app

---------------------------------------------------------------------------------------------
Models:                        controllers:
  user                           usercontroller
  - id                           + weergave profiel
  - name                         - weergave van alle profielen
  - Email                        + edite van profiel
  - wachtwoord                   + update van profiel
  - isAdmin                      - delete van profielen als admin
  - Birthday
  - bio
  - timeStamp


  papers                         papercontroller:
  - id                            - weergave alle papers
  - title                         - weergave form to papers
  - synopsis                      - save papers
  - documentText                  - edit papers
  - user_id                       - delete papers
  - timestamp                     - weergave highlight papers

ik kreeg documenten opslaan niet aan het werken dus daarom werk ik nog momenteel met text

  file
  - id
  - name
  - filepath
  -

  questions                       questioncontroller
  - id                             - weergave alle question
  - category                       - filteren van questions op category
  - question                       - admin weergave van form to post question
  - answer                         - admin save post
  - user_id                        - admin delete post
  - user_idAnswer                  - admin edit post
  - timestamp                      - admin weergave post to answer questions
                                   - user weergave post to ask question




---------------------------------------------------------------------------------------------
technical requirements

  Views:
    - Use at least 2 layouts (think about maybe splitting up the 'public' website and the admin panel)
    - Use partials where logical
    - Use the techniques we've seen during the exercises:
    - Control structures:
      - XSS protection
      - CSRF protection
      - Client-side validation
  Routes:
   - All routes use controller methods
   - All routes use logical middleware
   - If possible, group the routes where needed
  Controller:
    - Use several controllers to split your logic
    - Think back to resource controllers for CRUD operations
  Models:
    - Use Eloquent models
    - Add relationships where needed
    - At least 1 one-to-many
    - At least 1 many-to-many
  Database:
    - Your database needs to be created using migration files
    - Add seeders to have some "dummy" data
    - I will run "php artisan migrate:fresh --seed" on every project. After running this your website should be usable for me
  Authentication:
    - Default functionality for authentication
    - Log in/out
    - 'Remember me'
    - Register
    - Forgot password
    - Change password
    - Add 1 default admin with a seeder
    - Username: admin
    - Email: admin@ehb.be
    - Password: Password!321
  Theming/styles:
    - Provide some default styling for your website. Even though design is not a core competence of this course, I expect a minimum. If you are not good at design, use something like Bootstrap and pick a free theme from a website such as https://startbootstrap.com/
---------------------------------------------------------------------------------------------

Bronnen:
  -https://laravel.com/
  -https://getbootstrap.com/
  -https://www.positronx.io/laravel-file-upload-with-validation/
  -stackoverflow
  -school materiaal