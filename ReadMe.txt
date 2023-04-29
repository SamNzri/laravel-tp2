 1.  install Laravel and create new project
	- composer create-project --prefer-dist laravel/laravel Maisonneuve2295537
	- cd Maisonneuve2295537
	- php artisan serve

 2. create model :
	- php artisan make:model Etudiant
	- php artisan make:model ville
   
 3.create the tables( migration files ) :  
	- php artisan make:migration create_etudiant_table --create=etudiant
	- php artisan make:migration create_ville_table --create=ville
	create tables :
	- php artisan migrate
	
 5.create fake data 
	- php artisan make:factory EtudiantFactory --model=Etudiant
	- php artisan make:factory VilleFactory --model=ville

	- App\Models\Ville::factory()->times(15)->create(); 
	- App\Models\Etudiant::factory()->times(100)->create(); 
	
6. create controllers
	-  php artisan make:controller createEtudiantController -m Etudiant 



BootStrap reference :
https://startbootstrap.com/theme/grayscale


gitHub Address : https://github.com/SamNzri/tp1-laravel


   
   
  
	 
	 
	 
	 

