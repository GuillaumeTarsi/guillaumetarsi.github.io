
var app =
angular
  .module('app', ['ngAnimate'])
  .controller('appCtrl', function($scope, $http) {
    

  
    /* INITIALIZATION */


    var configData = {
      'jsonPath' : './resources/projects.json',
      'imgPath' : './resources/',
      'imgFormat' : '.png'
     };

$scope.viewSelected = 'home';
 
    $scope.projectsList = [];
    /*$http.get(configData.jsonPath)
       .then(function(result){
        for (var key in result.data) {
          $scope.candidatesList.push(result.data[key]);
        }
          numberOfCandidates = $scope.candidatesList.length;
          $scope.loadFromURL();             
        });
  */
$scope.filtersList = [{"name":"test","class":".test"},{"name":"toast","class":".toast"}];

    /* END OF */
    /* INITIALIZATION */
$http.get(configData.jsonPath)
       .then(function(result){
        for (var key in result.data) {
          var thisProject = result.data[key];
          thisProject.imgpath = configData.imgPath + thisProject.id + configData.imgFormat;
          $scope.projectsList.push(thisProject);
          console.log($scope.projectsList);
        }
        }
        );       

$scope.template = './views/home.html';
$scope.updateView = function (viewName) {

  $scope.viewSelected = viewName;
  $scope.template = './views/'+viewName+".html";
  $scope.updateURL(viewName);
  return false;

};



$scope.backToProjects = function(){
  $scope.updateView ('projects');

};

$scope.openProject = function (thisProject) {
  $scope.template ='./views/projects/'+thisProject.id+'.html';
  $scope.updateURL("projects/".thisProject.id);
};

// external js: isotope.pkgd.js

/*
// init Isotope
var $grid = $('#gallery-container').isotope({
  itemSelector: '.element-item',
  layoutMode : 'masonry',
  masonry : {
    columnWidth : 50
  },
  getSortData: {
    name: '.name',
    symbol: '.symbol',
    number: '.number parseInt',
    category: '[data-category]',
    weight: function( itemElem ) {
      var weight = $( itemElem ).find('.weight').text();
      return parseFloat( weight.replace( /[\(\)]/g, '') );
    }
  }
});

// filter functions
var filterFns = {
  // show if number is greater than 50
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  // show if name ends with -ium
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};

// bind filter button click
$('#filter-container').on( 'click', 'button', function() {
  console.log("ha");
  var filterValue = $( this ).attr('data-filter');
  // use filterFn if matches value
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});



// change is-checked class on buttons
$('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = $( buttonGroup );
  $buttonGroup.on( 'click', 'button', function() {
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $( this ).addClass('is-checked');
  });
});
  





*/



$('nav a').click(
  function () {
    $('nav a').removeClass("current");
    $(this).addClass("current");
  }
);




    /*  URL LOGIC */

  $scope.removeHashFromURL = function () {
    history.pushState("", document.title, location.pathname);
  };


    $scope.updateURL = function (hash) {
      console.log(hash);
      if(history.pushState) {
        history.pushState(null, null, hash);
      }
      else {
        location.hash = hash;
      }
    };

  $scope.loadFromURL = function () {
    if (location.hash) {
      var array_urlnames = location.hash.substring(2).split(configData.separators.url);
      var ID0 = -1 ;
      var ID1 = -1 ;
      for (var i = 0 ; i < numberOfCandidates ; i++) {
        if ($scope.candidatesList[i].urlname == array_urlnames[0]) {
          ID0 = i;
        }
        if ($scope.candidatesList[i].urlname == array_urlnames[1]) {
          ID1 = i;
        }
      }
      if (ID0 > -1 && ID1 > -1) {
        $scope.displayedCandidates[0] = $scope.candidatesList[ID0];
        $scope.displayedCandidates[1] = $scope.candidatesList[ID1];
        $scope.updateMixedCandidate();
      }
    } 
    else {
      console.log("error : wrong URL");
      $scope.removeHashFromURL();
      $scope.triggerRandomizeAll();
    }
  };

    /* END OF */
    /* URL LOGIC */


    /* TOOLBOX */

 function randomColor() {
    return COLORS[Math.floor(Math.random() * COLORS.length)];
  }

  function randomSpan() {
    var r = Math.random();
    if (r < 0.8) {
      return 1;
    } else if (r < 0.9) {
      return 2;
    } else {
      return 3;
    }
  }

    /* END OF */
    /* TOOLBOX */



  });