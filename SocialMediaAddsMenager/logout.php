<?php
session_start();
session_unset(); // Fshin të gjitha variablat e sesionit
session_destroy(); // Shkatërron sesionin plotësisht

// Kthehu te faqja kryesore
header("Location: index.php");
exit();
?>