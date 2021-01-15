# wepesi_exemple
this is an simple exemple on how to work with library php mini mvc oop library

# Routing
on the folder `route` witch you can name as you want there is a class `Router` that allow to defined routing in simple way.

```php
    $route= new Route();
    $route->get("/",function(){
        echo "this is the home pages";
    });
    $route->run();
```
result
```php
    this is the home pages
```
- at the first line we create an instace of the router called `route`
- with the route instance we can access the method `get` or `post` of the Router class.
- at thi end we call the method `run` to execute our script.

* GET 
- `Without parameters`
is used to manage `php $_GET` method, and it takes 2 parametrer,
* With the Callback Function
- the first parameter is the route where you want to reach, 
- and, the second is a callback function where you can define on operation while reach the route. as in the example bellow.

* Without callback Function
instad of a callback you will pass a `class_name_controller` follow by `#` and finish by the `method_of_the_class_controller` without space as a string parameter witch will have a form of `controller_class#method`.
```php
    $route->get("/","welcom#home");
```
you should respect that roule oterwise, your route will not work.
the module that mange the routing will start by call the first element as a class, and create an instance of that class, after that will call the method to perform the actions need.
* its recommande to create a folder `controller` to work properly. and you create a class inside.

```php
    class welcom{
        function home(){
            echo "<h2>Welcom to Home Pages</h2>";
        }
    }
```
result
```php
    Welcom to Home Pages
```
as you can seen on the exemple bellow, we create a class name `welcom` and define a method.
this a complete code.
```php 
    //on route folder
    $router= new Router();
    $route->get("/","welcom#home");
    $router->run();

    //on folder controller,
    class welcom{
        function home(){
            echo "<h2>Welcom to home page</h2>";
        }
    }
```
result
```php
    Welcom to home page
```
- `With parameters`
to define a parameter is verry simple.
```php
    $touter->get("/users/:id",function($id){
        echo $id
    });
```
when declare a parameter on a router, this paramters will access via the methode as parameters.
the number of parameter on a route should be equal to the number of paramaters on the method, the name and the position should be the same, from route to the method.
```php
//on route folder
    $router= new Router();
    $route->get("/home/:name","welcom#home");
    $router->run();

    //on folder controller,
    class welcom{
        function home($name){
            echo "<h2>Welcom home {$name}</h2>";
        }
    }
```
on the web brower it will look like this `localhost:80/your_app/users/john`. according to the design route,
`john` will be read has the the paramater and the result will be 
```php
    Welcom home john
```