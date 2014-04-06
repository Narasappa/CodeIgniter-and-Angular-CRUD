<!doctype html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="utf-8">
  <title>My HTML File</title>
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <script src="assets/lib/angular/angular.js"></script>
  <script src="assets/js/controllers.js"></script>
</head>
<body>

    <!--
    Write some text in textbox:
    <input type="text" ng-model="sometext" />
-->

  <!-- Angular Directives Example -->
  <!-- <h1>Hello {{ sometext }}</h1> -->

  <!--
    <h1 ng-show="sometext">Hello {{ sometext }}</h1>
    <h1 ng-hide="sometext">Hello {{ sometext }}</h1>
  -->

   <!-- Angular Filters Example -->
  <!--
   <h1>Hello {{ sometext }}</h1>

    <h4 ng-show="sometext">Uppercase: {{ sometext | uppercase }}</h4>
    <h4 ng-show="sometext">Lowercase: {{ sometext | lowercase }}</h4>
     <span ng-non-bindable>{{1288323623006 | date:'medium'}}</span>:
        <span>{{1288323623006 | date:'medium'}}</span><br>
    <span ng-non-bindable>{{1288323623006 | date:'yyyy-MM-dd HH:mm:ss Z'}}</span>:
       <span>{{1288323623006 | date:'yyyy-MM-dd HH:mm:ss Z'}}</span><br>
    <span ng-non-bindable>{{1288323623006 | date:'MM/dd/yyyy @ h:mma'}}</span>:
       <span>{{'1288323623006' | date:'MM/dd/yyyy @ h:mma'}}</span>
       <br>

-->
<!--AngularJs Controller Example

   <div ng-controller="ContactController">
     Email:<input type="text" ng-model="newcontact"/>
    <button ng-click="add()">Add</button>
    <h2>Contacts</h2>

    <ul>
        <li ng-repeat="contact in contacts"> {{ contact }} </li>
    </ul>

</div>
-->

<!--
 <script type="text/javascript">
  function ContactController ($scope) {
  $scope.contacts=["narasulondave@gmail.com","narasappa.londave@yahoo.com"];
  $scope.add=function(){
   $scope.contacts.push($scope.newcontact);
  // $scope.newcontact="";
  }
  }
</script>
-->

<!-- Angular Nested Controller


<div ng-controller="CarController">
    My name is {{ name }} and I am a {{ type }}

    <div ng-controller="BMWController">
        My name is {{ name }} and I am a {{ type }}

        <div ng-controller="BMWMotorcycleController">
            My name is {{ name }} and I am a {{ type }}

        </div>
    </div>
</div>

-->

<div ng-controller="ContactController" data-ng-init="getAllConatct()">
   <ul>
                    <li class="err" ng-repeat="error in errors"> {{ error}} </li>
                </ul>
                <ul>
                    <li class="info" ng-repeat="msg in msgs"> {{ msg}} </li>
                </ul>
    <form>
    <label>Name</label>
        <input type="text" name="name" ng-model="newcontact.name"/>
    <label>Email</label>
        <input type="text" name="email" ng-model="newcontact.email"/>
    <label>Phone</label>
        <input type="text" name="phone" ng-model="newcontact.phone"/>
        <br/>
        <input type="hidden" ng-model="newcontact.id" />
     <input type="button" value="Save" ng-click="saveContact()" />
    </form>

<div ng-show = contacts >
<table class="table table-striped table-bordered table-condensed">
<thead>


<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<tr ng-repeat="contact in contacts">
	 <td>{{ contact.id }}</td>
    <td>{{ contact.name }}</td>
    <td>{{ contact.email }}</td>
    <td>{{ contact.phone }}</td>
    <td>
        <a  href="#" ng-click="edit(contact.id)">edit</a> |
        <a href="#" ng-click="delete(contact.id)">delete</a>
    </td>
 </tr>
</tbody>
</table>
</div>
</div>


</body>
</html>
