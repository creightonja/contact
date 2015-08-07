<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/contact.php";

//Creating new session
  session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

//loading silex and twig
  $app = new Silex\Application();
  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
  ));


  //Base directory to redirect to home page.
  $app->get("/", function() use ($app) {
    return $app['twig']->render('contact.html.twig', array('contacts' => Contact::getAll()));
  });


  //Posts the user input from add a contact
  $app->post("/added", function() use ($app) {
    $newcontact = array();
    $newcontact = new Contact($_POST['input_name'], $_POST['input_email'],
                      $_POST['input_number']);
    $newcontact->save();

    return $app['twig']->render('addedcontact.html.twig', array('addedcontact' => $newcontact));
  });


  $app->post("/delete_contacts", function() use ($app) {
    Contact::deleteAll();
    return $app['twig']->render('delete_contacts.html.twig');
  });


  return $app;
?>
