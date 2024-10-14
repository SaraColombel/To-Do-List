<?php
$name_category = "";
$id_category = "";
$listCategories = "";
$messageCategories = "";

// formInspection() : Check form datas
// Param : void
// Return : array ["name_category" => string, "erreur" => string]
function formCategoryInspection()
{
    // 1 - Look for empty fields
    if (!isset($_POST["name_category"]) || empty($_POST["name_category"])) {
        return ["name_category" => "", "erreur" => "Veuillez donner un nom à la catégorie."];
    }

    // 2 - Datas cleaning
    $name_category = sanitize($_POST["name_category"]);

    // 3 - Return a tab to have cleaner view of datas
    return ["name_category" => $name_category, "erreur" => ""];
}

// Function to show categories names
// Param : array["came_category" => string]
// Return : String
function listCategory($category)
{
    return "<li style='border-top : 2px solid black' class='mb-3 pt-3'>
        <h5>Catégorie : <strong>{$category['name_category']}</strong></h5>
    </li>";
}

$ManagerCategories = new ManagerCategories(null);

// Form reception verification
if (isset($_POST["submit"])) {
    $tab = formCategoryInspection();
    if ($tab["erreur"] != "") {
        $message = $tab["erreur"];
    } else {
        $ManagerCategories->setNameCategory($tab['name_category']);
        $message = $ManagerCategories->addCategory();
    }
}



// CATEGORY DISPLAY
$category = new ManagerCategories(null);
// 1 - Category recuperation
$data = $category->readCategories();

// 2 - User array traitment, display of all users in it
foreach ($data as $category) {
    $listCategories .= listCategory($category);
}


$listActive = "active";

