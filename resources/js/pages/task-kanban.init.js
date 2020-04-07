/*
Template Name: Skote - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Version: 1.1.0
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: task kanban Init Js File
*/

dragula([
    document.getElementById("upcoming-task"), 
    document.getElementById("inprogress-task"),
    document.getElementById("complete-task")
]);