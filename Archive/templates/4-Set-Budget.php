<?php 
    include_once "../init.php";
    if ($getFromU->loggedIn() === false) {
        header('Location: ../index.php');
    }
    include_once 'skeleton.php'; 
    $income = $expenses = $loan = $investment = $calculated_budget = 0;


    if(isset($_POST['enterbudget']))
    {
        echo '<script>
        Swal.fire({
            title: "Done!",
            text: "Records Updated Successfully",
            icon: "success",
            confirmButtonText: "Close"
          })
        </script>';

        $user_id = $_SESSION['UserId'];

        $income = isset($_POST['income']) ? floatval($_POST['income']) : 0;
        $expenses = isset($_POST['expenses']) ? floatval($_POST['expenses']) : 0;
        $loan = isset($_POST['loan']) ? floatval($_POST['loan']) : 0;
        $investment = isset($_POST['investment']) ? floatval($_POST['investment']) : 0;
        
        $curr_budget = $getFromB->checkbudget($user_id);

        if($curr_budget == NULL)
        {
           $calculated_budget = $income - ($expenses + $loan + $investment);
           $getFromB->setbudget($user_id, $calculated_budget);

        }
        else
        {
            $calculated_budget = $income - ($expenses + $loan + $investment);
            $getFromB->updatebudget($user_id, $calculated_budget);
        }

        echo '<script>
            Swal.fire({
                title: "Your Budget",
                text: "Your budget is $'.$calculated_budget.'",
                icon: "info",
                confirmButtonText: "Close"
            })
        </script>';
    }
?>

<div class="wrapper">
        <div class="row">
            <div class="col-12 col-m-12 col-sm-12" >
                <div class="card">
                    <div class="counter"  style="height: 40vh; display: flex; align-items: center; justify-content: center;">
                        <form action="" method="post">
                                <p style="font-size: 1.4em; color:black; font-family:'Source Sans Pro'">
                                    Enter your budget for this month
                                </p>
                                <label for="income">Income:</label>
                                <input type='text' name="income" onkeypress='validate(event)' class="text-input" style="color:black;font-size: 1.2em;background: rgba(0,0,0,0);text-align: center; border: none; outline: none; border-bottom: 2px solid black;" required/><br><br>

                                <label for="expenses">Expenses:</label>
                                <input type='text' name="expenses" onkeypress='validate(event)' class="text-input" style="color:black;font-size: 1.2em;background: rgba(0,0,0,0);text-align: center; border: none; outline: none; border-bottom: 2px solid black;" required/><br><br>

                                <label for="loan">Loan:</label>
                                <input type='text' name="loan" onkeypress='validate(event)' class="text-input" style="color:black;font-size: 1.2em;background: rgba(0,0,0,0);text-align: center; border: none; outline: none; border-bottom: 2px solid black;" required/><br><br>

                                <label for="investment">Investment:</label>
                                <input type='text' name="investment" onkeypress='validate(event)' class="text-input" style="color:black;font-size: 1.2em;background: rgba(0,0,0,0);text-align: center; border: none; outline: none; border-bottom: 2px solid black;" required/><br><br><br>


                                <button type="submit" name="enterbudget" class="pressbutton">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <script src="../static/js/4-Set-Budget.js"></script>

