<?php
// Cliente
Breadcrumbs::register('client', function($breadcrumbs, $client)
{    
    $breadcrumbs->push( $client->name, url( 'clientes/'.$client->id ) );
});

// Cliente
Breadcrumbs::register('project', function($breadcrumbs, $project)
{    
	$breadcrumbs->parent('client', $project->client );
	$breadcrumbs->push( 'Obras', url( 'clientes/'.$project->client_id.'/obras' ) );
    $breadcrumbs->push( $project->title, url( 'clientes/'.$project->client_id.'/obras/'.$project->id ) );
});