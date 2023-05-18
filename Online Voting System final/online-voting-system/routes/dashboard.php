<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <style>
            #backbtn{
                padding: 10px;
                font-size: 15px;
                background-color: #000;
                color: #fff;
                border-radius: 25px;
                float: left;
                margin: 30px;
            }
            #logoutbtn{
                padding: 10px;
                font-size: 15px;
                background-color: #000;
                color: #fff;
                border-radius: 25px;
                float: right;
                margin: 30px;
            }
            #Profile{
                background-color:#af9bd3;
                width: 30%;
                padding: 35px;
                float:left;
                border-radius: 25px;
            }
            #Group{
                background-color:#af9bd3;
                width: 60%;
                padding: 20px;
                float:right;
                border-radius: 25px;
            }
            #votebtn{
                padding: 10px;
                font-size: 15px;
                background-color: #000;
                color: #fff;
                border-radius: 25px;
            }
            #mainsection{
                padding:10px;
            }
            #mainpannel{
                padding:10px;
            }
            #voted{
                padding: 10px;
                font-size: 15px;
                background-color: green;
                color: #fff;
                border-radius: 25px;
            }
            p.groove {border-style: groove; padding: 5px; border-color: black; border-radius: 15px; border-width: 2px;}
            #grps{
                padding: 15px;
            }
            hr{
                border: 1px solid black;
            }
            hr.hrt{
                border: 1px solid black;
            }
        </style>
        <div id="mainsection">
            <center>
            <div id="headersection">
                <a href="../routes/"><button id="backbtn">Back</button></a>
                <a href="logout.php"><button id="logoutbtn">Logout</button></a>
                <br><h1>VoteDigital</h1><br>
            </div>
            </center>
            <hr class="hrt">
            <div id="mainpannel">
                <div id="Profile">
                <p class="groove"><b>Name:  </b><?php echo $userdata['name']?></p><br>
                <b><p class="groove">Email:  </b><?php echo $userdata['email']?></p><br>
                <b><p class="groove">Status:  </b><?php echo $status?></p>
                </div>
                <div id="Group">
                    <?php
                        if($_SESSION['groupsdata']){
                            for($i=0; $i<count($groupsdata); $i++){
                                ?>
                                <div id="grps">
                                    <p class="groove"><b>Group Name:  </b><?php echo $groupsdata[$i]['name']?></p><br>
                                    <p class="groove"><b>Votes:  </b><?php echo $groupsdata[$i]['votes']?></p><br>
                                    <form action="../api/vote.php" method="POST">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                                        <?php
                                            if($_SESSION['userdata']['status']==0){
                                                ?>
                                                <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <button disabled type="button" name="votebtn" value="Voted" id="voted">Voted</button>
                                                <?php
                                            }
                                        ?>

                                    </form>
                                </div>
                                <hr>
                                <?php
                            }
                        }
                        else[

                        ]
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>