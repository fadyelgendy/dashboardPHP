<?php
  require_once "../config/db.php";

  // Fetch all user from database
  $sql = "SELECT * FROM users";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $userCount = $stmt->rowCount();

  // Fetch all projects from database
  $sql = "SELECT * FROM projects";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $projectCount = $stmt->rowCount();

  // Fetch all management posts from database
  $sql = "SELECT * FROM manage_posts";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $pPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $pPostsCount = $stmt->rowCount();

  // Fetch all design posts from database
  $sql = "SELECT * FROM design_posts";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $dPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dPostsCount = $stmt->rowCount();
