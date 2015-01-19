# PHP Interview Test

This interview test will target your approach to TDD and measure your knowledge of GIT.
Beyond this, you should discuss with the applicant what additional improvements could be made and how they should be
approached.

The test is a simple game using the command line interface. Everything is currently kept in the main loop which makes 
the creation of unit tests impossible, the applicants task is to put the game into a somewhat testable state.

You should still discuss web development with the applicant, this test does not cover concepts such as MVC, CI OR BDD.

## Tasks

- Clone the project
- Checkout the "improvements" branch
- Install dependencies
- Make the failing tests pass
- Take a look at the ```Game\Loop::start```, take the time to study it. If you have time, try to improve the method and it's class (try to use TDD).
- Discuss improvements that could be made with the interviewer.


## Requirements

- PHP 5.4
- Composer

## Running the application

```bash
# On windows
bin/game.bat
# On Linux
./bin/game
```

Type ```help``` in game to learn how to play.
