# OnlineReservationAPI
A very simple  restful API implementation about theater reservation in PHP.

END POINTS:

GET method:
<b>/server_url/serverJsonReply.php?theatro={theater_name}</b> ----> Returns all performances of that theater(theater_name)

<b>/server_url/serverJsonReply.php?theatro={theater_name}&parastasi={performance_name}</b> ----> Returns avaliable seats of performance(performance_name)

POST method:
<b>/server_url/serverJsonReply.php</b> with POST\['parastasi'\](performance) and POST\['kratisi'\](number_of_reservation) ---> Will make a new reservation 
