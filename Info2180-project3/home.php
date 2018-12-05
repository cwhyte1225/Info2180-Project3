<!DOCTYPE html>
<html>
    <!-- PUT COMMENTS ON THE CHANGES MADE PLEASE SO EVERYBODY CAN OVERS WHATS TAKING PLACE IN THE CODE-->
    <head>
        <title> HIRE ME-home </title>
        <link rel="stylesheet" href="styles/home.css" type="text/css" />
    </head>
    
    <body>
        <div id='top' >
            <h2>Hireme</h2>
        </div>
        
        <!--<div id='gdiv'>-->
            
            <div id='container'>
                
                <div id='sidebar'>
                    <a href="https://info2180-project3-rijkaa.c9users.io/home.php">Home</a><br/>
                    <a href="https://info2180-project3-rijkaa.c9users.io/addUser.html">Add User</a><br/>
                    <a href="https://info2180-project3-rijkaa.c9users.io/createNewJob.html">Add Job</a><br/>
                    <a href="https://info2180-project3-rijkaa.c9users.io/">LOGOUT</a>
                </div>
                
                <div id='container2'>
                    
                    <div id='dash'>
                        <h2>DASHBOARD</h2>
                        
                        <button onclick="location.href='createNewJob.html'" id='post'>Post A Job</button>
                        
                    </div>
                    
                    <div id='available'>
                        <h3>Available jobs</h3>
                        <?php
                            $host = getenv('IP');
                            $username = getenv('C9_USER');
                            $password = '';
                            $dbname = 'HireMe';
                
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                            $stmt = $conn->query("SELECT * FROM availJobs ");
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            echo '<table style="width:100%; text-align:left; border-collapse:collapse;">';
                            echo '<tr style="background-color:#e6e1de">';
                            echo '<th>'.'Company'. '</th>';
                            echo '<th>'.'Job Title'. '</th>';
                            echo '<th>'.'Category'. '</th>';
                            echo '<th>'.'Date'. '</th>';
                            echo '</tr>';
                            foreach ($results as $row) {
                                echo '<tr>'.'<td>'.$row['company'].'</td>'. '<td>'.$row['job_title'].'</td>'.'<td>'.$row['category'].'</td>'.'<td>'.$row['date_avail'].'</td>'.'</tr>';
                            }
                            echo '</table>';
                            
                        ?>
                    </div> <!--end of available div-->
                    
                    <div id='applied'>
                        <h3>Jobs Applied for</h3>
                       <?php
                            $host = getenv('IP');
                            $username = getenv('C9_USER');
                            $password = '';
                            $dbname = 'HireMe';
                
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            
                            $stmt = $conn->query("SELECT * FROM jobs WHERE jobId = (SELECT job_id FROM JobsAppliedFor WHERE user_id = 2 )");
                            
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            echo '<table style="width:100%; text-align:left; border-collapse:collapse;">';
                            echo '<tr style="background-color:#e6e1de">';
                            echo '<th>'.'Company'. '</th>';
                            echo '<th>'.'Job Title'. '</th>';
                            echo '<th>'.'Category'. '</th>';
                            echo '<th>'.'Date'. '</th>';
                            echo '</tr>';
                            foreach ($results as $row) {
                                echo '<tr>'.'<td>'.$row['company'].'</td>'. '<td>'.$row['job_title'].'</td>'.'<td>'.$row['category'].'</td>'.'<td>'.$row['date_avail'].'</td>'.'</tr>';
                            }
                            echo '</table>';
                            
                        ?> 
                        
                        
                    </div> <!--end of applied div-->
                </div><!--end of container2-->
            </div> <!-- end of container div-->   
        <!--</div> --end of grid div-->
        
    </body>
</html>