<?php 
    function submit_feddback ($iduser,$name,$title,$fcontent,$currentDateTimeVN) {
        $sql = "INSERT INTO feedback(iduser,feedbackContent,feedbackTitle,feedbackStatus,feedbackName,feedbackTime) 
        VALUES ('$iduser','$fcontent','$title',0,'$name', '$currentDateTimeVN')";
        pdo_execute($sql);
    }

    function load_feedback ($iduser) {
        $sql = "SELECT * FROM feedback WHERE iduser = " . $iduser . " ORDER BY idFB DESC";

        $feedbackList = pdo_query($sql);
        return $feedbackList;
    }

    function loadAll_feedback () {
        $sql = "SELECT * FROM feedback ORDER BY idFB DESC";
        $feedbackList = pdo_query($sql);
        return $feedbackList;
    }


    function loadOne_feedback ($id) {
        $sql = "select * from feedback where idFB=".$id;
        $oneFB = pdo_query_one($sql);
        return $oneFB; 
    }


    function loadOne_feedbackUser ($iduser) {
        $sql = "select * from users where id = ".$iduser;
        $oneFB = pdo_query_one($sql);
        return $oneFB; 
    }

    function loadOne_Repfeedback ($iduser) {
        $sql = "select * from repfeedback where idFeedback = ".$iduser;
        $oneRFB = pdo_query_one($sql);
        return $oneRFB; 
    }

    function rep ($idFeedback,$content) {
        $sql = "INSERT INTO repfeedback (idFeedback,content) values ('$idFeedback','$content')";
        pdo_execute($sql);
    }

    function setStatus ($id) {
        $sql = "update feedback set feedbackStatus = 1 where idFB = " .$id;
        pdo_execute($sql);
    }

    function delete_Status ($id) {
        $sql = "delete from repfeedback where idFeedback=" .$id;
        pdo_execute($sql);

        $sql = "delete from feedback where idFB=" .$id;
        pdo_execute($sql);
    }

?>