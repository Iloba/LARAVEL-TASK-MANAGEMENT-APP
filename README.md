<!-- Setting up locally -->
#create a database and name it 'task-app' on your php my admin (I made use of mysql) and run php artisan migrate to run migration and import tables
#if the above stepp was followed you will have to register as a new user and begin to create projects
After a project is created, view the project to be able to create tasks under the project

<!-- INTERNET MUST BE ACCESSED FOR DRAG AND DROP TO WORK (I MADE USE OF LARAVEL LIVE WIRE SORTABLE CDN) -->

<!-- Projects -->
#Once signed in, a user can be able to create a project from the dashboard
#To access all Projects - Click on My Projects on the navigation (All tasks associated with a project are listed below the project. A user can also add tasks under a project)
#A project can be edited and deleted (Once a project is deleted, all tasks under that project are also deleted)
#A drop down is available on the dashboard to enable users select projects and view all the tasks under them


<!-- Tasks -->
#A user can create a task by viewing a project - he/she will be allowed to create tasks under a particluar project
NB: tasks can not be created at random, they can only be created under a project
#When creating a task, a user is allowed to enter the task priority which is an integer (1,2,3,4,5)
#To access all tasks - Click on My Tasks on the navigation (Tasks are sortable using the drag and drop feature). Tasks are sorted by Priority
#All tasks can be edited and deleted by the user

<!-- Link to github repository-->
https://github.com/Iloba/LARAVEL-TASK-MANAGEMENT-APP


