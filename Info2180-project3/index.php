
<!DOCTYPE html> 
<html> 
    <!-- PUT COMMENTS ON THE CHANGES MADE PLEASE SO EVERYBODY CAN OVAZ WHATS TAKING PLACE IN THE CODE-->
    
        <!-- I MADE THE HTML FILES PHP BECAUSE THATS THE ONLY WAY I THOUGHT WE COULD KEEP TRACK OF SESSIONS
                AND I ALSO SAW IT ON A VIDEO-->
    <head> 
        <title> HIRE ME </title>         
        <script type="text/javascript" src="login.js"></script>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">
    </head>     
      
    <body> 
        <div class="LOGIN"> </div>
        
        <form method="POST" class="form-signin" style="grid-area:centre;"> 
             <!-- this class is from the styles.css file the IDE helped me make-->
                 
                <header> 
                <h1 class="uptopb">Hire Me Job Board</h1> 
                </header>  

                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <!-- this class is from the bootstrap.css file the IDE helped me make-->
                        

                    <label for="email" class="sr-only">Email address</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email address" >
                    
                    <!-- added placeholder so it shows a simple lable like thing in the textbox-->

                    <label for="pwrd" class="sr-only">Password</label>
                    <input type="password" name="pwrd" id="pwrd" class="form-control" placeholder="Password" > 
                    
                    <!--Changed the type to password so it can be hidden, 
                    and added placeholder so it shows a simple lable like thing in the textbox-->

                    <div class="checkbox">
                        <label>
                        <input type="checkbox" value="remember-me"> Remember me
                        
                        <!--did feel nuff and add a remeberme checkbox but if it make the js
                        work harder then we can forget that or just leave it for decoration-->
                        </label>
                    </div>

                    <button id="signin" class="btn btn-primary b" type="submit">Sign in</button>
                    or  
                    <button id=signup class="btn btn-primary b" type="submit">Sign up</button>
                    <!--just have this to move to the add user screen zeen-->

                    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>

        </form>
    </body>     
</html>