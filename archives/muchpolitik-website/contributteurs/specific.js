function updateListeContributteurs (monthID) {

	$.ajax({
        type: "GET",
        url: "list_contributteurs.php",
        data: {monthID : monthID},
        success: function(result){
        	$("#tab_contributteurs").html(result);
    	}
    });

};

// to load the list when loading the page
updateListeContributteurs ("2017-08");