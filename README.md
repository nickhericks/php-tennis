# Tennis Registration App
This project was built as a way to learn more about PHP while also making something useful for my local tennis group.

***
## View project
:mag: Live version available at [nickhericks.com/tennis](https://nickhericks.com/tennis/index.php)

<br><br>
<img src="https://res.cloudinary.com/dtqevfsxh/image/upload/v1540558830/portfolio/tennis_screenshot_1200.png" width="899px">

## Code example
```php
if ($match_date !='' && $match_time !='' && $number_of_courts !='' && $number_of_players !='') {
	// connect to and send data to MySQL server  
	$dbc = mysqli_connect('localhost', MY_USERNAME, MY_PASSWORD, MY_TABLE) or die
	('Error connecting to MySQL server.')

  // Create new event
	$create_query = "
	INSERT INTO events (match_date, match_time, number_of_courts, number_of_players)
	VALUES ('$match_date', '$match_time', '$number_of_courts', '$number_of_players')";
```
