
First, ensure that you have completed the project development according to the given requirements.

There are three tables in the project where the Employee table is the master table and it has the Task Type and Task table relationships.

Run the migration scripts to create the necessary database tables. You can do this by executing the following command in the terminal within your Laravel project directory:

php artisan migrate

Start npm to manage project dependencies by running:

npm install && npm run dev

Turn on the server to host the project locally. Execute the following command:

php artisan serve

Once the server is running, you can access the project through your web browser by navigating to the specified address (usually http://localhost:8000).

Regarding the project's functionality, it consists of two modules: Admin and User.

User Module: Users have limited permissions and can only change the status of tasks.
Admin Module: Administrators have full access and can perform all actions within the system. To log in as an admin, you will need to use the login credentials provided for the admin account. After logging in, go to the database users table and update the Admin  is_admin =  1. Then, you can log in again using the admin credentials.

Please let me know if you need any further assistance or clarification.
