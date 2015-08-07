<?php
  require_once __DIR__."/../vendor/autoload.php";
  require_once __DIR__."/../src/contact.php";

//Creating new session initialized with one contact for testing
  session_start();
    $contact1 = new Contact("Mike Hannon, mikey@mike.com, 5551239999");
    if (empty($_SESSION['list_of_contacts'])) {
      $_SESSION['list_of_contacts'] = array($contact1);
    }

  $app = new Silex\Application();


  //Setting twig view directory
  $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
  ));


  //Base directory to redirect to home page.
  $app->get("/", function() use ($app) {
    return $app['twig']->render('contact.html.twig') array('contacts', Contacts::getAll()));
  });


  //Posts the user input from add a contact
  $app->post("/added", function() use ($app) {
    $newcontact = array();
    $newcontact = new Contact($_POST['input_name'], $_POST['input_email'],
                      $_POST['input_number']);
    $newcar->save();

    return $app['twig']->render('addcontact.html.twig', array('addedcontact' => $newcontact));
  });


  $app->post("/delete_contacts", function() use ($app) {
    Task::deleteAll();
    return $app['twig']->render('delete_contacts.html.twig');
  });


  return $app;
?>
