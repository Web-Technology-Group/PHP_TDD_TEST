<?php
/**
 * Created by PhpStorm.
 * User: daniel.chalk
 * Date: 16/01/2015
 * Time: 13:47
 */

namespace Game;

use cli;

class Loop
{
    public function start()
    {
        $player = new Actor(100);
        $monsters = [
            "ogre1" => new Actor(100),
            "ogre2" => new Actor(100),
            "ogre3" => new Actor(100)
        ];

        while ($command = cli\prompt("[player {$player->getHealth()}] ", false, null)) {
            $command = explode(' ', $command);
            switch ($command[0]) {
                case 'quit':
                    return 0;
                    break;
                case 'help':
                    cli\line("attack <monster> - Attacks a monster");
                    cli\line("show <monster>|player|all - Show a monsters, players or everbody's health");
                    break;
                case 'attack';
                    //we need to make sure the player has stated a monster and that the monster exists
                    if (!array_key_exists(1, $command)) {
                        cli\line("Please didn't tell me who or what to attack.");
                        break;
                    } elseif (!array_key_exists($command[1], $monsters)) {
                        cli\line("I can't see \"{$command[1]}\"");
                        break;
                    }

                    //assign monster and generate damage
                    $monster_name   = $command[1];
                    $monster        = $monsters[$monster_name];
                    $monster_damage = rand(11, 36);
                    $player_damage  = rand(0, 19);

                    //deduct damage from the monsters health and notify the user
                    $monster->hurt($monster_damage);
                    $player->hurt($player_damage);

                    cli\line("$monster_name took $monster_damage damage, you have taken {$player_damage} damage.");

                    if ($monster->isDead()) {
                        unset($monsters[$monster_name]);
                        cli\line("$monster_name has died.");
                    }

                    if ($player->isDead()) {
                        cli\line("You have died, unlucky!");
                        return 0;
                    }

                    if (count($monsters) == 0) {
                        cli\line("All monsters are dead, well done!");
                        return 0;
                    }

                    break;
                case 'show':
                    switch ($command[1]) {
                        case 'all':
                            foreach ($monsters as $monster => $actor) {
                                cli\line("$monster has {$actor->getHealth()} health.");
                            }
                        case 'player':
                            cli\line("you have {$player->getHealth()} health.");
                            break;
                        default:
                            if (!array_key_exists($command[1], $monsters)) {
                                cli\line("{$command[1]} isn't here!");
                                break;
                            }

                            cli\line("{$command[1]} has {$monsters[$command[1]]} health.");
                            break;
                    }
                    break;
                default:
                    cli\line("Sorry, i don't understand. Type \"help\" to see what you can do.");
                    break;
            }
        }
    }
}