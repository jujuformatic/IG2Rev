<?php
include_once "libs/maLibSQL.pdo.php";


function FirstConnection($Name, $Password)
{

    $sql = "INSERT INTO Users(Name,Pass) VALUES ('$Name','$Password'); ";
    $iduser = SQLInsert($sql);
    $sql = "INSERT INTO Teams(Name) VALUES ('$Name-Team');";
    $idteam = SQLInsert($sql);
    MakeUserTeamsLink($iduser, $idteam);
    MakeUserTeamsLink($iduser, 0);
}

function UpdateUsername($newname, $userid)
{

    $sql = "UPDATE Users SET name = '$newname' WHERE id='$userid';";
    SQLUpdate($sql);
}

function UpdatePassword($newpassword, $userid)
{

    $sql = "UPDATE Users SET pass = '$newpassword 'WHERE id='$userid';";
    SQLUpdate($sql);
}

function UpdateLessonText($id, $newtext)
{

    $sql = "UPDATE Lessons SET Text = '$newtext' WHERE id='id';";
    SQLUpdate($sql);
}

function MakeSubject($Name)
{
    $sql = "INSERT INTO Subjects(Name) VALUES ('$Name');";
    SQLInsert($sql);
}

function MakeChapter($Name, $id)
{
    $sql = "INSERT INTO Chapters (Name,Subject) VALUES ('$Name','$id');";
    SQLInsert($sql);
}

function MakeLesson($title, $chapter, $text, $description, $id)
{

    $sql = "INSERT INTO Lessons(Title,Chapter,Text,Description,Owner)
VALUES ('$title','$chapter','$text','$description','$id');";
    SQLInsert($sql);
}

function MakePractice($user, $lesson, $date)
{

    $sql = "INSERT INTO Practice(User,Lesson,Previous,Next) VALUES('$user','$lesson','$date',1);";
    SQLInsert($sql);
}

function MakeQuestion($text, $lesson, $rep, $false1, $false2, $false3)
{

    $sql = "INSERT INTO Questions(Text,Lesson,Answer,Wrong1,Wrong2,Wrong3) VALUES('$text','$lesson','$rep','$false1','$false2','$false3');";
    SQLInsert($sql);
}

function MakeUserTeamsLink($Usersid, $Teamid)
{

    $sql = "INSERT INTO Users_Teams_Links(User,Team) VALUES ('$Usersid','$Teamid');";
    SQLInsert($sql);
}

function MakeTeamsLessonLinks($idteam, $idlesson, $edit = 0)
{

    $sql = "INSERT INTO Teams_Lesson_Links VALUES ('$idteam','$idlesson','$edit');";
    SQLInsert($sql);
}

function DeleteSubject($id)
{

    $sql = "DELETE FROM Subjects WHERE Id='$id';";
    SQLDelete($sql);
}

function DeleteChapter($id)
{

    $sql = "DELETE FROM Chapters WHERE Id='$id';";
    SQLDelete($sql);
}

function DeleteLesson($id)
{

    $sql = "DELETE FROM Lessons WHERE Id='$id';";
    SQLDelete($sql);
}

function DeleteQuestion($id)
{

    $sql = "DELETE FROM Questions WHERE Id='$id';";
    SQLDelete($sql);
}

function DeleteQPractice($idlesson, $iduser)
{

    $sql = "DELETE FROM Practices WHERE lesson='$idlesson' AND User='$iduser';";
    SQLDelete($sql);
}

function DeleteUserTeamsLinks($iduser, $idteam)
{

    $sql = "DELETE FROM User_Teams_Links WHERE User='$iduser' AND Team='$idteam';";
    SQLDelete($sql);
}

function DeleteTeamsLessonLinks($idlesson, $idteam)
{

    $sql = "DELETE FROM Teams_Lesson_Links WHERE Lesson='$idlesson' AND Team='$idteam';";
    SQLDelete($sql);
}

function DeleteUser($id)
{

    $sql = "DELETE FROM User WHERE Id='$id';";
    SQLDelete($sql);
}

function GETquestion($id)
{

    $sql = "SELECT * FROM Questions WHERE Id=$id;";
    return parcoursRs(SQLSelect($sql));
}


function SelectUserGroup($id)
{

    $sql = "SELECT Teams.Id,Teams.name FROM Teams
JOIN Users_Teams_Links ON Users_Teams_Links.Team=Teams.Id
JOIN Users ON Users.Id=Users_Teams_Links.User
WHERE Users.Id=$id;";
    return parcoursRs(SQLSelect($sql));
}

function SelectLessonGroups($id,$edit=0)
{

    $sql = "SELECT * FROM Lessons
JOIN Teams_Lesson_Links 
ON Teams_Lesson_Links.Lesson=Lessons.Id
JOIN Teams ON Teams.Id=Teams_Lesson_Links.Team
Where Teams_Lesson_Links.Editing=$edit
AND Lessons.Id=$id;";
    return parcoursRs(SQLSelect($sql));
}

function InGroup($iduser, $idgroup)
{
    $sql = "SELECT Teams FROM Users_Teams_Links
WHERE User=$iduser AND Team=$idgroup;";
    SQLGetChamp($sql);
}

function UpdatePractice($next, $userid, $idLesson)
{
    $sql = "UPDATE Practice SET next = $next Where User=$userid AND Lesson=$idLesson;";
    SQLUpdate($sql);
}

function SelectSubject()
{
    $sql = "SELECT * FROM Subjects;";
    return parcoursRs(SQLSelect($sql));
}

function SelectChapter($idSubjects = -1)
{
    $sql = "SELECT * FROM Chapters";
    if ($idSubjects != -1)
        $sql = $sql." WHERE Subject=$idSubjects ";
    $sql =$sql.  ";";
    return parcoursRs(SQLSelect($sql));
}

function SelectLesson($idChapter = -1)
{
    $sql = "SELECT * FROM Lessons";
    if ($idChapter != -1)
        $sql = $sql . " WHERE Chapter='$idChapter'";
    $sql = $sql . ";";
    return parcoursRs(SQLSelect($sql));
}

function SelectUserSubject($id){
    $sql="SELECT DISTINCT Subjects.Id,Subjects.Name FROM Subjects
    JOIN Chapters ON Chapters.Subject=Subjects.Id
    JOIN Lessons ON Lessons.Chapter=Chapters.Id
    JOIN Teams_Lesson_Links AS TLL ON TLL.Lesson=Lessons.Id
    JOIN Teams ON Teams.Id=TLL.Team
    JOIN Users_Teams_Links AS UTL ON UTL.Team=Teams.Id
    JOIN Users ON Users.Id=UTL.User
    Where Users.Id='$id';";
    return parcoursRs(SQLSelect($sql));
}

function SelectUser(){
    $sql = "SELECT * FROM Users;";
   return  parcoursRs(SQLSelect($sql));
}

function verifUserBdd($login,$passe)
{


	$SQL="SELECT Id FROM Users WHERE Name='$login' AND Pass='$passe'";

	return SQLGetChamp($SQL);

}

function SelectUserChapter($iduser,$idsubject){
    $sql="SELECT DISTINCT Chapters.Id,Chapters.Name FROM Chapters
    JOIN Lessons ON Lessons.Chapter=Chapters.Id
    JOIN Teams_Lesson_Links AS TLL ON TLL.Lesson=Lessons.Id
    JOIN Teams ON Teams.Id=TLL.Team
    JOIN Users_Teams_Links AS UTL ON UTL.Team=Teams.Id
    JOIN Users ON Users.Id=UTL.User
    Where Users.Id=$iduser AND Chapters.Subject=$idsubject ;";
    return parcoursRs(SQLSelect($sql));
}

function SelectUserChapterLesson($iduser,$idchapter){
    $sql="SELECT DISTINCT Lessons.Id,Lessons.Chapter,Lessons.Title,Lessons.Description,Lessons.Owner FROM Lessons
    JOIN Teams_Lesson_Links AS TLL ON TLL.Lesson=Lessons.Id
    JOIN Teams ON Teams.Id=TLL.Team
    JOIN Users_Teams_Links AS UTL ON UTL.Team=Teams.Id
    JOIN Users ON Users.Id=UTL.User
    Where Users.Id=$iduser AND Lessons.Chapter=$idchapter;";
    return parcoursRs(SQLSelect($sql));
}

function SelectLessonInGroup($idLesson,$idGroup)
{

    $sql = "SELECT Lessons.Id FROM Lessons
JOIN Teams_Lesson_Links 
ON Teams_Lesson_Links.Lesson=Lessons.Id
JOIN Teams ON Teams.Id=Teams_Lesson_Links.Team
Where Teams_Lesson_Links.Team=$idLesson
AND Lessons.Id=$idLesson;";
    return SQLGetChamp($sql);
}

function SelectLessonbyId($id){
    $sql = "SELECT * FROM Lessons WHERE Lessons.Id='$id';";
   return  parcoursRs(SQLSelect($sql));
}

function SelectLessonGroupEditUser($iduser,$idlesson){
    $sql="SELECT DISTINCT Lessons.Id FROM Lessons
    JOIN Teams_Lesson_Links AS TLL ON TLL.Lesson=Lessons.Id
    JOIN Teams ON Teams.Id=TLL.Team
    JOIN Users_Teams_Links AS UTL ON UTL.Team=Teams.Id
    JOIN Users ON Users.Id=UTL.User
    Where Users.Id='$iduser' AND TLL.Editing=1 AND Lessons.Id='$idlesson' ;";
    return SQLGetChamp($sql);
}


?>