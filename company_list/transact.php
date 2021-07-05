<?php
session_start();
require_once '../pdo.php';

if ( !isset($_SESSION['userid']) || strlen($_SESSION['userid']) < 1  ) {
    header('Location: ../login');
    return;
}

if($_SESSION['role'] == 'investor'){
    $users = $pdo->prepare("SELECT * FROM investor where iemail=:urnm");
    $users->execute(array(
    ':urnm' => $_SESSION['userid'])
    );
    $user = $users->fetchAll(PDO::FETCH_ASSOC);
}
else{
    header('Location: ../logout');
    return;
}

$flag=false;

$logcheck = $pdo->prepare('SELECT count(distinct(cid)) as sum from investorlog where invid=:inid');
$logcheck->execute(array(
    ':inid'=>$user[0]['invid'],
));
$logs = $logcheck->fetchAll(PDO::FETCH_ASSOC);


$compcheck = $pdo->prepare('SELECT * from investorlog where invid=:inid');
$compcheck->execute(array(
    ':inid'=>$user[0]['invid'],
));
while ( $row = $compcheck->fetch(PDO::FETCH_OBJ) )
{
	$compch[] = $row;
}

$array = array(
    7  => array("tejas.sharma@vit.edu.in",
                "rugved.shinde@vit.edu.in",
                "pavan.mitkari@vit.edu.in",
                "vaishnav.rajput@vit.edu.in",
                "vinay.khobrekar@vit.edu.in",
                "vipul.sutar@vit.edu.in",
                "aryan.arora@vit.edu.in",
                "krishnakant.gangurde@vit.edu.in",
                "raj.chaudhari20@vit.edu.in",
                "priyanshu.mavale@vit.edu.in",
                "shiwang.sawant@vit.edu.in",
                "jeevan.shetty@vit.edu.in",
                "pratik.shelake@vit.edu.in",
                "saurabh.pandey@vit.edu.in",
                "nikhil.shikare@vit.edu.in",
                "mohit.sharma20@vit.edu.in",
                "tanisha.gupta@vit.edu.in"
            ),
    8  => array('shruti.raul@vit.edu.in',
                'manasi.patil20@vit.edu.in',
                'jay.keer@vit.edu.in',
                'atul.mehta@vit.edu.in',
                'sejal.mehurkar@vit.edu.in'
            ),
    11 => array('samay.shetty@vit.edu.in',
                'soham.pal@vit.edu.in',
                'jose.akkarapatty@vit.edu.in',
                'aishwarya.deshpande@vit.edu.in',
                'rohan.kolhe@vit.edu.in',
                'pritesh.sonawane@vit.edu.in',
                'janhvi.kumar@vit.edu.in',
                'udbhav.kamath@vit.edu.in',
                'poorva.jog@vit.edu.in',
                'satyen.chavan@vit.edu.in',
                'aniket.jadhav20@vit.edu.in',
                'shravani.dorlikar@vit.edu.in'
            ),
    12 => array('manish.thakare@vit.edu.in',
                'kirti.mhatre@vit.edu.in',
                'rohan.kadu@vit.edu.in',
                'sanghavi.kedar@vit.edu.in',
                'sakshi.shete@vit.edu.in',
                'isa.rizwan@vit.edu.in',
                'mohammedsiddique.khot@vit.edu.in',
                'gracy.wagh@vit.edu.in',
                'ishita.shah@vit.edu.in',
                'priyanka.jamwal@vit.edu.in',
                'zainab.ansari@vit.edu.in',
                'shreya.khale@vit.edu.in',
                'prerna.katte@vit.edu.in',
                'rashid.geelani@vit.edu.in',
                'priya.jamanu@vit.edu.in'
            ),
    13 => array('aryan.yadav@vit.edu.in',
                'avinash.mawle@vit.edu.in',
                'darshan.mahankar@vit.edu.in',
                'hardik.parate@vit.edu.in',
                'harsh.kesarwani@vit.edu.in',
                'kunal.chavan@vit.edu.in',
                'kushal.jain@vit.edu.in',
                'survesh.damle@vit.edu.in',
                'pratham.mawle@vit.edu.in',
                'saurabh.yamgar@vit.edu.in',
                'vishal.prajapati@vit.edu.in'
            ),
    14 => array('rahul.chougule@vit.edu.in',
                'harshad.phadarte@vit.edu.in',
                'omkar.sabale@vit.edu.in',
                'yashraj.gagare@vit.edu.in',
                'prabhit.chaugule@vit.edu.in',
                'vishal.kamath@vit.edu.in',
                'rohit.kute@vit.edu.in',
                'pranav.lahote@vit.edu.in',
                'ayush.kamble@vit.edu.in',
                'sagar.more@vit.edu.in',
                'amey.parle@vit.edu.in'
            ),
    15 => array('shirish.kori@vit.edu.in',
                'arvind.nair@vit.edu.in',
                'anujkumar.baghel@vit.edu.in',
                'lokesh.bagul@vit.edu.in',
                'tanush.shetty@vit.edu.in',
                'aryaman.more@vit.edu.in',
                'apurva.pagadpalliwar@vit.edu.in',
                'vedang.mule@vit.edu.in',
                'rahul.rathod@vit.edu.in',
                'sumant.sabat@vit.edu.in',
                'rohit.kokkula@vit.edu.in'
            ),
    16 => array('ayush.tripathi@vit.edu.in',
                'atharva.thakur@vit.edu.in',
                'chinmay.kadam@vit.edu.in',
                'shreyas.gosavi@vit.edu.in',
                'shreya.sukhadeve@vit.edu.in',
                'mitali.bagadia@vit.edu.in',
                'shreyash.kakde@vit.edu.in',
                'pavan.adepu@vit.edu.in',
                'vaidehi.pawar@vit.edu.in',
                'bhargav.mahajan@vit.edu.in',
                'mahima.grover@vit.edu.in'
            ),
    17 => array('vedant.patil@vit.edu.in',
                'ambika.sanap@vit.edu.in',
                'sakshi.talele@vit.edu.in',
                'atharva.malvade@vit.edu.in',
                'devika.eppakayala@vit.edu.in',
                'aditya.waghmare@vit.edu.in',
                'kunal.waghmare@vit.edu.in',
                'tanmay.yeware@vit.edu.in',
                'divyanshu.jain@vit.edu.in',
                'satyam.mishra@vit.edu.in',
                'akanksha.amdekar@vit.edu.in',
                'vini.teckwani@vit.edu.in',
                'pranjal.kashid@vit.edu.in'
            ),
    18 => array('disha.singh@vit.edu.in',
                'rugved.patil@vit.edu.in',
                'aheesh.yathipathi@vit.edu.in',
                'shravani.kadam@vit.edu.in',
                'darshan.ht@vit.edu.in',
                'darshan.dhongade@vit.edu.in ',
                'deepanshu.kavitayadav@vit.edu.in',
                'jidnya.kanekar@vit.edu.in',
                'parth.baviskar@vit.edu.in',
                'purva.masurkar@vit.edu.in',
                'saee.majlekar@vit.edu.in',
                'yashvi.mervana@vit.edu.in',
                'roshni.varma@vit.edu.in',
                'shivam.raina@vit.edu.in',
                'shraddha.narvekar@vit.edu.in',
                'tanmay.kadam@vit.edu.in',
                'suraj.shetty@vit.edu.in',
                'ronit.murpani@vit.edu.in'
            ),
    21 => array('hrishikesh.pendurkar@vit.edu.in',
                'parnika.thamake@vit.edu.in',
                'omkar.koli20@vit.edu.in',
                'abhishek.gupta20.2@vit.edu.in',
                'abhishek.pandey20@vit.edu.in',
                'anirudh.shukla@vit.edu.in',
                'shravan.padelkar@vit.edu.in',
                'omkar.kadam@vit.edu.in',
                'piyush.worlikar@vit.edu.in',
                'zainudeen.firoz@vit.edu.in',
                'irish.mattoo@vit.edu.in'
            ),
    24 => array('abhijit.darade@vit.edu.in', 
                'jay.chaudhari@vit.edu.in', 
                'akshay.godhale@vit.edu.in', 
                'anushka.satav@vit.edu.in', 
                'ayush.warang@vit.edu.in',
                'sanika.gaikwad@vit.edu.in',
                'sanyukta.adhate@vit.edu.in',
                'yash.mane@vit.edu.in',
                'sandeep.dhenaki@vit.edu.in',
                'vedant.kajrekar@vit.edu.in',
                'siddhesh.shinde20@vit.edu.in',
                'chinmayi.deshmane@vit.edu.in',
                'pratiksha.naik@vit.edu.in',
                'aryan.sadlevkar@vit.edu.in'
            ),
    25 => array('swapnil.kedar@vit.edu.in',
                'pranit.lokare@vit.edu.in',
                'ayush.zode@vit.edu.in',
                'pratik.bhalake@vit.edu.in',
                'shriya.dubey@vit.edu.in',
                'ritesh.prasad@vit.edu.in',
                'sohan.kuna@vit.edu.in',
                'ankit.yadav@vit.edu.in',
                'aditya.wangate@vit.edu.in',
                'sarthak.mane@vit.edu.in',
                'shreesh.nagral@vit.edu.in',
                'rahul.chaugule@vit.edu.in'
            ),
    26 => array('sai.khot@vit.edu.in',
                'kaustubh.patil@vit.edu.in',
                'sagar.karwa@vit.edu.in',
                'ritesh.sonawane@vit.edu.in',
                'rithwik.nambiar@vit.edu.in',
                'krishna.dahiphale@vit.edu.in',
                'taikhum.mahableshwarwala@vit.edu.in',
                'vighnesh.budharapu@vit.edu.in',
                'Prathmesh.raut@vit.edu.in'
            ),
);

$mem = $array[$_GET['cid']];

if(in_array($_SESSION['userid'], $mem)){
    $_SESSION['transact']="You can't invest in your own company 🙃";
    header('Location: company_info?cid='.$_GET['cid']);
    return;
}

$logsum = $logs[0]['sum'];

$flag=false;

foreach($compch as $ch){
    if($ch->cid === $_GET['cid']){
        $flag=true;
        break;
    }
}

if($logsum < 3 or $flag){
    if($_GET['v'] <= $user[0]['icredits']){
        try{
            $pdo->beginTransaction();

            $query1 = $pdo->prepare('UPDATE company SET credits=credits+:val where cid=:cid');
            $query1->execute(array(
                ':val'=>$_GET['v'],
                ':cid'=>$_GET['cid'],
            ));

            $query2 = $pdo->prepare('UPDATE investor SET icredits=icredits-:val where iemail=:iid');
            $query2->execute(array(
                ':val'=>$_GET['v'],
                ':iid'=>$_SESSION['userid'],
            ));

            $query3 = $pdo->prepare('INSERT INTO investorlog (invid, cid, creditamount) VALUES (:iid, :cid, :val)');
            $query3->execute(array(
                ':iid'=>$user[0]['invid'],
                ':cid'=>$_GET['cid'],
                ':val'=>$_GET['v'],
            ));

            $pdo->commit();

            $_SESSION['transact']="Transaction Successful";
            header('Location: company_info?cid='.$_GET['cid']);
            return;
        }
        
        catch(Exception $e){
            $pdo->rollBack();
            $_SESSION['transact']=$e;
            header('Location: company_info?cid='.$_GET['cid']);
            return;
        }
    }
    else{
        $_SESSION['transact']="You don't have sufficient Gems";
        header('Location: company_info?cid='.$_GET['cid']);
        return;
    }
}

else{
    $_SESSION['transact']="Maximum Investment Exceeded";
    header('Location: company_info?cid='.$_GET['cid']);
    return;
}
?>