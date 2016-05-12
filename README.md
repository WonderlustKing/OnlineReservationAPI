# OnlineReservationAPI
A simple  restful API implementation about theater reservation.

END POINTS:

GET method:
/server_url/serverJsonReply.php?theatro={theater_name} ----> Returns all performances of that theater(theater_name)

/server_url/serverJsonReply.php?theatro={theater_name}&parastasi={performance_name} ----> Returns avaliable seats of performance(performance_name)

POST method:
/server_url/serverJsonReply.php POST['parastasi'](performance) and POST['kratisi'](number_of_reservation) ---> Will make a new reservation 
