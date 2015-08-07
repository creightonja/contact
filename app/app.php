<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/contact.php";

//creating session save file
  session_start();
  if (empty($_SESSION['list_of_contacts'])) {
    $_SESSION['list_of_contacts'] = array();
  }

//setting silex and twig paths
  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
  ));


//linking to contact form to set and view contacts
  $app->get("/", function() use ($app) {
    return $app['twig']->render('contact.html.twig', array('contacts' => Contact::getAll()));
  });


//linking to create contact page
  $app->post("/contacts", function() use ($app) {
    $contact = new Contact($_POST['name'], $_POST['email'], $_POST['phonenumber']);
    $contact->save();
    return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact));
  });


//linking to delete contact page
  $app->post("/delete_contacts", function() use ($app) {
    Contact::deleteAll();
    return $app['twig']->render('delete_contacts.html.twig');
  });

  return $app;
?>
