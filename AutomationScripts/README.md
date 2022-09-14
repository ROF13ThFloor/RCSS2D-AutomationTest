# AutoTest
Auto test scripts for RoboCup soccer simulation 2d games

## Usages
* Configure `PROCES` in `test.sh` as the number of simultaneously running rcssservers (each rcssserver will run in a different port automatically)
* Configure `CLIENTS` in `test.sh` to be the list of client machines running teams
* Make sure you can login to `CLIENTS` using `ssh` without typing password from the machine (which is a server) you run `test.sh`
* Deploy the testing teams (left and right) to `CLIENTS`, for example, using `scp`
* Configure `start_left` and `start_right` scripts to start left and right teams (for now just change path!)
* Run `test.sh` from the central server to start the auto test
* Use in combination with [lanmonitor](https://github.com/wrighteagle2d/lanmonitor) to monitor the testing status

## Files
* test.sh -- run auto test
* kill.sh -- stop test
* result.sh -- show result
* analyze.sh -- show more information
* start\_left -- script to start left team
* start\_right -- script to start right team
* start.tmpl -- templates of start scripts
* scripts/automonitor -- start monitors

## Example outputs:
- Output:  
![examples/output.png](examples/output.png "Output")

- Game Curve:  
![examples/curve.png](examples/curve.png "Game Curve")

- Score Map:  
![examples/score.png](examples/score.png "Score Map")
