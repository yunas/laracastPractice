<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','MyFirstSite')</title>
    <!-- Latest CSS files for bulma and font-awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">


	<style type="text/css">
        .is-complete{
            text-decoration: line-through;
        }

    </style>	   


</head>
<body>
<h1>
    <ul>
        <li> <a href="/"> Home </a> </li>
        <li> <a href="/about"> About </a>   </li>
        <li> <a href="/contact"> Contact</a> </li>
        <li> <a href="/projects"> Projects</a> </li>
        

    </ul>

    <div class="container">
    	@yield('content')	
    </div>
    

</h1>
</body>
</html>