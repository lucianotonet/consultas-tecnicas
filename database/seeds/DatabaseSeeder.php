<?php
use App\Client;
use App\Contact;
use App\EmailMessage;
use App\Project;
use App\ProjectStage;
use App\ProjectDiscipline;
use App\TechnicalConsult;
use App\User;

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
			foreach(range(1,2) as $index){

				$user = User::create([            
	                'username'     	=> ( $index == 1 ) ? env('ADMIN_USERNAME', 'tonetlds') : $faker->userName(),
	                'name'     		=> ( $index == 1 ) ? env('ADMIN_NAME', 'Luciano') : $faker->firstName(),
	                'email'   		=> ( $index == 1 ) ? env('ADMIN_EMAIL', 'tonetlds@gmail.com') : $faker->email(),            
	                'password' 		=> ( $index == 1 ) ? Hash::make( env('ADMIN_PASSWORD', '1234') ) : Hash::make('1234')
				]);
				echo "User: #". $user->id. " ".$user->name;
				echo "\n";

				/* DISCIPLINES */
				$disciplines = array();
				foreach(range(1,3) as $index_discipline)
				{
					$items = ['Estrutura Metálica', 'Concreto', 'Instalações de Ar Condicionado', 'Segurança'];
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
	                echo "Cliente ".$client->name;
	                echo "\n";


	                /* CONTACTS */
					foreach(range(1,3) as $index)
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


					/*
						PROJECTS
					*/
					foreach(range(1,3) as $index_project)
					{

						$project = Project::create([            
			                'title'    		=> $index.'-'.$faker->stateAbbr(),
			                'description' 	=> $faker->company(),
							'status' 		=> '',
							'date' 			=> $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),							
							'client_id'		=> $client->id,
			                'owner_id'		=> $user->id,
		               ]);

						echo "Criado projeto ".$project->id." para ".$client->name . " (user: ".$user->id.")";
						echo "\n";

						/* PROJECT STAGES */
						foreach(range(1,3) as $index_stage)
						{
							$items = ['Geral','1A', '1B', '2A'];
							$projectstage = ProjectStage::create([            
								'title'   		=> $index_stage . ' ' . $items[$index_stage-1],
								'status'   		=> 'Em andamento',
								'description'   => $faker->company(),	                
								'project_id'   	=> $project->id,
				                'owner_id' 		=> $user->id,		                
			                ]);
			                echo "etapa ".$projectstage->title;
			                echo "\n";


							/* CONSULTAS TÉCNICAS */
							foreach(range(1,3) as $index_consults)
							{
								$tc_types = array('Envio', 'Resposta');
								$tc_status = array('default', 'success', 'warning', 'info', 'danger');

								$tc_type = $tc_types[array_rand($tc_types)];
								
								$consult = TechnicalConsult::create([            
									'type'   			=> $tc_type,
									'title'   			=> 'Consulta teste '.$index_consults . ' Obra '.$project->id.' Etapa '.$projectstage->id,
									'status'   			=> $tc_status[array_rand($tc_status)],
									'description'   	=> $faker->company(),	                
									'project_id'   		=> $project->id,
									'project_stage_id'  => $projectstage->id,
					                'owner_id' 			=> $user->id,		                
				                ]);

								/* EMAILS */
								$email_message = EmailMessage::create([            									
									'from'					=> $client->email,
									'to'					=> 'contato@cliente.com',
									'subject'				=> 'Assunto do email',
									'body_text'				=> 'Texto do corpo do email',
									'body_html'				=> '<strong>Teste</strong> de e-mail em <i>html</i> enviado para '.$client->email.' em '.$consult->created_at.'.',
									'headers'				=> '',
									'consulta_tecnica_id'	=> $consult->id,
					                'owner_id' 				=> $user->id,		                
				                ]);

								$email_message = EmailMessage::create([            									
									'from'					=> 'contato@cliente.com',
									'to'					=> $client->email,
									'subject'				=> 'Assunto do email',
									'body_text'				=> 'Texto do corpo do email',
									'body_html'				=> '<h1>Título</h1><p>E-mail em html enviado para '.$client->email.'.</p>',
									'headers'				=> '',
									'consulta_tecnica_id'	=> $consult->id,
					                'owner_id' 				=> $user->id,		                
				                ]);

				                echo "Consulta técnica '".$consult->title."' com 2 emails";
				                echo "\n";

				               
				            }

						}

					}
					
			
				}	

			}			
	}
}