<?php

class Producten extends Model
{
    // Set the table name
    protected $table = 'producten';

    // Define the properties here. Make them 'protected' and add a docblock
    /**
     * @Type int(11)
     */
    protected $id;

    /**
     * @Type varchar(255)
     */
    protected $name;

    /**
     * @Type varchar(10)
     */
    protected $teruggave;


    /**
     * @Type timestamp
     */
    protected $created_at;


    /**
     * @Type timestamp
     */
    protected $updated_at;

     /**
     * @Type int(11)
     */
    protected $users_id;

     /**
     * @Type int(11)
     */
    protected $producten_id;

  
  

  // This method is called after filling the model with the values from the form and
    // before saving it to the database. You can add your own adjustments and checks here.
    // If a model shouldn't be saved, simply return false. Else return nothing, or true. Whatever.
    protected static function newModel($obj) {

    }

    public static function addReservation($form)
    {
        if(isset($_SESSION['errors']) && count($_SESSION['errors'])) {
            return false;
        }

        $reservation = new Reservation();
        $newlening = date('Y-m-d', strtotime($form['lening']));
        $reservation->lening = $newlening;
        $newteruggave = date('Y-m-d', strtotime($form['teruggave']));
        $reservation->teruggave = $newteruggave;
        $reservation->users_id = App::$user->id;
        $reservation->pc = $form['pc'];
        $reservation->producten_id = $form['producten_id'];
         // $reservation->beeldscherm = $form['beeldscherm'];
        // $reservation->voedingskabel = $form['voedingskabel'];
        // $reservation->adapter = $form['adapter'];
        // $reservation->hdmi_kabel = $form['hdmi_kabel'];
        // $reservation->computer_muis = $form['computer_muis'];
        // $reservation->toetsenbord = $form['toetsenbord'];
        // $reservation->lening = $form['lening'];
        // $reservation->teruggave = $form['teruggave'];
        $reservation->save();

        return $reservation;
    }

    public static function reservationForm()
    {
        // $user = User::findById(App::$user->id);

        $form = new Form();

        $form->addField((new FormField('pc'))
            ->type("number")
            ->placeholder('<img src="images/gra.png" width="48px" height="50px"> PCs'));

        $form->addField((new FormField('HDMI kabel'))
            ->type("number")
            ->placeholder('<img src="images/hdmi.png" width="48px" height="50px"> HDMI'));


        $form->addField((new FormField("lening"))
            ->type("date")
            ->placeholder("Datum Lening")
            ->required());

        $form->addField((new FormField("teruggave"))
            ->type("date")
            ->placeholder("Datum Teruggave")
            ->required());
        return $form->getHTML();

    }

    public function __construct(){

    }

  
}
