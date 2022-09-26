<nav id="header-nav" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <a href="indexx.html" class="pull-left visible-md visible-lg">
                        <div id="logo-img" alt="Logo-img"></div>
                    </a>
                    <div class="navbar-brand">
                        <a href="indexx.html" alt="Online Tuition Management System">
                            <h1>
                                <emph>NED TUTORS</emph>
                            </h1>
                        </a>
                        <p style="color: aliceblue;">Provide best education with finest tutors in town</p>
                    </div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsable-nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                </div>
                <div id="collapsable-nav" class="collapse navbar-collapse">
                    <ul id="nav-list" class="nav navbar-nav navbar-right">
                        <li>
                            
                                <?php
                                    if (isset($_SESSION["student_id_login"])){
                                       
                                       echo' <a href="indexx.php">
                                       
                                        <span class="glyphicon glyphicon-th-list"></span><br class="hidden-xs">Logout</a>';
                                   } 
                                   else { 
                                   echo ' <a href="student-loginform.php">
                                        <span class="glyphicon glyphicon-th-list"></span><br class="hidden-xs">Login</a>';
                                         } ?>
                            
                        </li>
                        <li>
                            <a href="item-categories.html">
                                <span class="glyphicon glyphicon-info-sign"></span><br class="hidden-xs">About</a>
                        </li>
                        <li>
                            <a href="item-categories.html">
                                <span class="glyphicon glyphicon-certificate"></span><br class="hidden-xs">Awards</a>
                        </li>
                        <li id="phone" class="hidden-xs">
                            <a href="tel:03312554581">
                                <span>0331-2554581</span>
                            </a>
                            <div>  Quality Education providers</div>

                        </li>

                    </ul>

                </div>
            </div>
        </nav>
