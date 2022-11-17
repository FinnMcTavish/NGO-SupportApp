angular.module('social-app', ['ionic'])

.directive('headerShrink', function($document) {
  var fadeAmt;

  var shrink = function(header, content, amt, max) {
    amt = Math.min(44, amt);
    fadeAmt = 1 - amt / 44;
    ionic.requestAnimationFrame(function() {
      header.style[ionic.CSS.TRANSFORM] = 'translate3d(0, -' + amt + 'px, 0)';
      for(var i = 0, j = header.children.length; i < j; i++) {
        header.children[i].style.opacity = fadeAmt;
      }
    });
  };

  return {
    restrict: 'A',
    link: function($scope, $element, $attr) {
      var starty = $scope.$eval($attr.headerShrink) || 0;
      var shrinkAmt;
      
      var header = $document[0].body.querySelector('.bar-header');
      var headerHeight = header.offsetHeight;
      
      $element.bind('scroll', function(e) {
        if(e.detail.scrollTop > starty) {
          // Start shrinking
          shrinkAmt = headerHeight - Math.max(0, (starty + headerHeight) - e.detail.scrollTop);
          shrink(header, $element[0], shrinkAmt, headerHeight);
        } else {
          shrink(header, $element[0], 0, headerHeight);
        }
      });
    }
  }
})


.controller('paymentCtrl', function($scope, $ionicModal) {
  // No need for testing data anymore

   $scope.paymentMethod = [
     { cardNumber: 'VISA 3345' }  
  ];
  
  $scope.confirmationNumber = [
     { confirmationNumber: 'G-SFO-9876-91' } 
  ];
  
  // Create and load the Modal
  $ionicModal.fromTemplateUrl('new-task.html', function(modal) {
    $scope.taskModal = modal;
  }, {
    scope: $scope,
    animation: 'slide-in-up'
  });

  // Called when the form is submitted
  $scope.continueToPay = function(task) {
    $scope.tasks.push({
      title: task.title
    });
    $scope.taskModal.hide();
    task.title = "";
  };

  // Open payment completed modal
  $scope.payNow = function() {
    $scope.taskModal.show();
  };

  // Close the done page
  $scope.closeCart = function() {
    $scope.taskModal.hide();
  };
});

