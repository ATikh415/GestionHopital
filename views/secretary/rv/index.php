<?php

use App\App;
use App\Auth;
use App\Calendar\Month;

$title = "Secretariat";

$auth = (new Auth)->check();
$id_secretary = $_SESSION['auth'];

$month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
$eventTable = App::getInstance()->getTable('Event');

$start = $month->getStartingDay();
    $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
    $weeks = $month->getWeeks();
    $end = $start->modify('+' . (6 + 7 *($weeks - 1). 'days'));
    $events = $eventTable->getEventsBetweenByDaysSecretary($start, $end, $id_secretary);
?>
<div class="calendar">
    <div class="">
        <div style="display: flex; justify-content: space-between; align-items: center">
            <div class="col s6">
                <h2><?= $month->toString() ?></h2>
            </div>
            <div class="col s12">
                <?php if(isset($_GET['success'])): ?>
                    <div class="row">
                        <div class="col s12">
                        <div class="card-panel teal">
                            <span class="white-text">
                                rendez-vous ajoute avec succes, merci
                            </span>
                        </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(isset($_GET['edit'])): ?>
                    <div class="row">
                        <div class="col s12">
                        <div class="card-panel teal">
                            <span class="white-text">
                                rendez-vous modifier avec succes, merci
                            </span>
                        </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(isset($_GET['delete'])): ?>
                    <div class="row">
                        <div class="col s12">
                        <div class="card-panel teal">
                            <span class="white-text">
                                rendez-vous Supprime avec succes, merci
                            </span>
                        </div>
                        </div>
                    </div>
                <?php endif ?>
             </div>
            <div class="col s6">
                <div>
                    <a href="<?= $router->url('secretary_home')?>?month=<?= $month->previousMonth()->month ?>&year=<?= $month->previousMonth()->year ?>" class="btn blue darken-4">&lt</a>
                    <a href="<?= $router->url('secretary_home')?>?month=<?= $month->nextMonth()->month ?>&year=<?= $month->nextMonth()->year ?>" class="btn blue darken-4">&gt</a>
                </div>
             </div>
         </div>
    </div>
</div>

<table class="calendar__table calendar__table--<?= $weeks ?>weeks">
            <?php for($i = 0; $i< $weeks ; $i++): ?>
            <tr>
                
                <?php 
                    foreach($month->days as $key => $day):  
                    $date = $start->modify("+" . $key + $i * 7 . "days");
                    $eventForDay = $events[$date->format('Y-m-d')] ?? [];
                    $isToday = date('Y-m-d') === $date->format('Y-m-d');
                ?>
                    <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth' ?> 
                    <?= $isToday ? 'isToday' : '' ?>">
                        <?php if($i === 0): ?>
                        <div class="calendar__weekDay"> <?= $day ?></div>
                        <?php endif ?>
                        <a href="<?= $router->url('secretary_rv_new') ?>?date=<?= $date->format('Y-m-d') ?>" class="calendar__day"> <?= $date->format('d') ?></a>
                        <?php foreach($eventForDay as $event): ?>
                            <div class="calendar__event">
                                <?= $event->getStart()->format('H:i') ?> - <a href="<?= $router->url('secretary_rv_show', ['id' => $event->getId()]) ?>"><?= $event->getName() ?></a>
                            </div>
                        <?php endforeach ?>
                    </td>
                <?php endforeach ?>

            </tr>
            <?php  endfor ?>
        </table>
        <a href="<?= $router->url('secretary_rv_new') ?>" class="btn-floating btn-large waves-effect waves-light blue darken-4 right"><i class="material-icons">add</i></a>

</div>