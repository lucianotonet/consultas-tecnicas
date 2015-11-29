<?php
use App\User;
use App\Client;
use App\Project;
use App\ProjectStage;
use App\ProjectDiscipline;
use App\Contact;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

			$faker = Faker::create('pt_BR');
			$faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));
			$faker->addProvider(new \Faker\Provider\pt_BR\Address($faker));
			// $faker->addProvider(new \Faker\Provider\en_US\Address($faker));
			// $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
			// $faker->addProvider(new \Faker\Provider\en_US\Company($faker));
			$faker->addProvider(new \Faker\Provider\Lorem($faker));
			$faker->addProvider(new \Faker\Provider\Internet($faker));			

			/*
				CREATE FAKE USERS
			 */
			foreach(range(1,4) as $index){

				$user = User::create([            
	                'username'     	=> ( $index == 1 ) ? env('ADMIN_USERNAME', 'tonetlds') : $faker->userName(),
	                'name'     		=> ( $index == 1 ) ? env('ADMIN_NAME', 'Luciano') : $faker->firstName(),
	                'email'   		=> ( $index == 1 ) ? env('ADMIN_EMAIL', 'tonetlds@gmail.com') : $faker->email(),            
	                'password' 		=> ( $index == 1 ) ? Hash::make( env('ADMIN_PASSWORD', '1234') ) : Hash::make('1234')
				]);

				/* DISCIPLINES */
				$disciplines = array();
				foreach(range(1,4) as $index_discipline)
				{
					$items = ['Estrutura','Fachada', 'Cobertura', 'Acabamento'];
					$disciplines[] = ProjectDiscipline::create([							
						'title'   		=> $items[$index_discipline-1],							
						'description'   => $faker->sentence($nbWords = 6),            
		                'owner_id' 		=> $user->id,          
	                ]);
				}
				
				/*
					Clients for each user
				 */		
				foreach(range(1,3) as $index_client){

					$client = new Client;					
					$client->email  	= $faker->email();						
	    			$client->name   	= $faker->name();
					$client->company	= $faker->company();
					$client->address 	= '';
					$client->phones 	= '';		

					$slug = $client->slug;					
					$client->slug = $slug;				

	                $client->owner_id 	= $user->id;				

	                $client->save();


					/*
						PROJECTS + PROJECTS STAGES
					*/
					foreach(range(1,5) as $index_project)
					{

						$project = Project::create([            
			                'title'    		=> $index.'-'.$faker->stateAbbr(),
			                'description' 	=> $faker->company(),
							'status' 		=> '',
							'date' 			=> $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
							'current_stage'	=> null,
							'client_id'		=> $client->id,
			                'owner_id'		=> $user->id,
		               ]);

						/* PROJECT STAGES */
						foreach(range(1,4) as $index_stage)
						{
							$items = ['Geral','Início', 'Meio', 'Fim'];
							$projectstage = ProjectStage::create([            
								'name'   		=> $index_stage . ' ' . $items[$index_stage-1],
								'project_id'   	=> $project->id,
								'completed'   	=> false,
								'description'   => $faker->company(),	                
				                'owner_id' 		=> $user->id,		                
			                ]);
						}

						$project->current_stage = ProjectStage::where( 'project_id', $project->id )->first()->id;
						$project->save();

					}
					
					/*
						CONTACTS
					 */
					foreach(range(1,5) as $index)
					{				      
			       		Contact::create([            
			                'name'     => $faker->firstName() . " " . $faker->lastName(),
			                'email'    => $faker->email(),            
			                'address'  => $faker->streetAddress(),
			                'company'  => $faker->company(),
			                'client_id' => $client->id,
			                'owner_id' => $user->id,
						]);
					}


					
			
				}	

			}			
	}
}