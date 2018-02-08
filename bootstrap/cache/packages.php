<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'folklore/graphql' => 
  array (
    'providers' => 
    array (
      0 => 'Folklore\\GraphQL\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'GraphQL' => 'Folklore\\GraphQL\\Support\\Facades\\GraphQL',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'rebing/graphql-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Rebing\\GraphQL\\GraphQLServiceProvider',
    ),
    'aliases' => 
    array (
      'GraphQL' => 'Rebing\\GraphQL\\Support\\Facades\\GraphQL',
    ),
  ),
);