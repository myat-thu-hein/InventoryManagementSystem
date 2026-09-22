<?php
session_start();

// Initialize language preference
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = 'en'; // Default language is English
}

// Handle language changes
if (isset($_POST['set_language'])) {
    $_SESSION['language'] = $_POST['language'];
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle dark mode toggle
if (!isset($_SESSION['dark_mode'])) {
    $_SESSION['dark_mode'] = false; // Default to light mode
}

if (isset($_POST['toggle_dark_mode'])) {
    $_SESSION['dark_mode'] = !$_SESSION['dark_mode'];
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Language translations
$translations = [
    'en' => [
        'inventory_manager' => 'Inventory Manager',
        'search_products' => 'Search Products',
        'search' => 'Search',
        'search_items' => 'Search items...',
        'search_results' => 'Search Results',
        'name' => 'Name',
        'price' => 'Price ($)',
        'quantity' => 'Quantity',
        'action' => 'Action',
        'no_items' => 'No items in inventory',
        'current_products' => 'Current Products',
        'sort_by_price' => 'Sort by Price',
        'sort_by_quantity' => 'Sort by Quantity',
        'add_new_item' => 'Add New Item',
        'item_name' => 'Item Name',
        'add_item' => 'Add Item',
        'add_request' => 'Add Request to Queue',
        'request_type' => 'Request Type',
        'restock' => 'Restock',
        'order' => 'Order',
        'add_to_queue' => 'Add to Queue',
        'request_queue' => 'Request Queue',
        'requested_queue' => 'Requested Queue',
        'process_queue' => 'Process Queue',
        'no_pending_requests' => 'No pending requests in queue',
        'type' => 'Type',
        'item' => 'Item',
        'qty' => 'Qty',
        'recently_processed' => 'Recently Processed:',
        'operation_history' => 'Operation History',
        'undo_last_action' => 'Undo Last Action',
        'undo_description' => 'Click the button above to undo your last inventory action.',
        'stack_description' => 'This utilizes a stack data structure (LIFO) for operation history.',
        'big_o_analysis' => 'Big-O Analysis',
        'data_structures' => 'Data Structures:',
        'mysql_tables' => 'MySQL Tables for efficient data management',
        'operations' => 'Operations:',
        'add_item_o' => 'Add Item: O(1)',
        'remove_item_o' => 'Remove Item: O(1)',
        'search_o' => 'Search: O(n)',
        'sort_o' => 'Sort: O(n log n)',
        'process_requests_o' => 'Process Requests: O(n)',
        'copyright' => '© 2025 Naing Zwe Htut, Myat Thu Hein, Thaw Zin Linn Htet. All rights reserved.',
        'dark_mode' => 'Dark Mode',
        'light_mode' => 'Light Mode',
        'language' => 'Language'
    ],
    'th' => [
        'inventory_manager' => 'ระบบจัดการสินค้าคงคลัง',
        'search_products' => 'ค้นหาสินค้า',
        'search' => 'ค้นหา',
        'search_items' => 'ค้นหาสินค้า...',
        'search_results' => 'ผลการค้นหา',
        'name' => 'ชื่อ',
        'price' => 'ราคา ($)',
        'quantity' => 'จำนวน',
        'action' => 'การกระทำ',
        'no_items' => 'ไม่มีสินค้าในคลัง',
        'current_products' => 'สินค้าปัจจุบัน',
        'sort_by_price' => 'เรียงตามราคา',
        'sort_by_quantity' => 'เรียงตามจำนวน',
        'add_new_item' => 'เพิ่มสินค้าใหม่',
        'item_name' => 'ชื่อสินค้า',
        'add_item' => 'เพิ่มสินค้า',
        'add_request' => 'เพิ่มคำขอในคิว',
        'request_type' => 'ประเภทคำขอ',
        'restock' => 'เติมสินค้า',
        'order' => 'สั่งซื้อ',
        'add_to_queue' => 'เพิ่มในคิว',
        'request_queue' => 'คิวคำขอ',
        'process_queue' => 'ดำเนินการคิว',
        'no_pending_requests' => 'ไม่มีคำขอที่รอดำเนินการในคิว',
        'type' => 'ประเภท',
        'item' => 'สินค้า',
        'qty' => 'จำนวน',
        'recently_processed' => 'ดำเนินการล่าสุด:',
        'operation_history' => 'ประวัติการดำเนินการ',
        'undo_last_action' => 'ยกเลิกการกระทำล่าสุด',
        'undo_description' => 'คลิกปุ่มด้านบนเพื่อยกเลิกการดำเนินการสินค้าคงคลังล่าสุด',
        'stack_description' => 'ใช้โครงสร้างข้อมูลแบบสแต็ค (LIFO) สำหรับประวัติการดำเนินการ',
        'big_o_analysis' => 'การวิเคราะห์ Big-O',
        'data_structures' => 'โครงสร้างข้อมูล:',
        'mysql_tables' => 'ตาราง MySQL สำหรับการจัดการข้อมูลอย่างมีประสิทธิภาพ',
        'operations' => 'การดำเนินการ:',
        'add_item_o' => 'เพิ่มสินค้า: O(1)',
        'remove_item_o' => 'ลบสินค้า: O(1)',
        'search_o' => 'ค้นหา: O(n)',
        'sort_o' => 'เรียงลำดับ: O(n log n)',
        'process_requests_o' => 'ดำเนินการคำขอ: O(n)',
        'copyright' => '© 2025 Naing Zwe Htut, Myat Thu Hein, Thaw Zin Linn Htet. สงวนสิทธิ์ทุกประการ',
        'dark_mode' => 'โหมดมืด',
        'light_mode' => 'โหมดสว่าง',
        'language' => 'ภาษา'
    ],
    'my' => [
        'inventory_manager' => 'ပစ္စည်းစာရင်း စီမံခန့်ခွဲမှု',
        'search_products' => 'ပစ္စည်းများ ရှာဖွေရန်',
        'search' => 'ရှာဖွေရန်',
        'search_items' => 'ပစ္စည်းများ ရှာဖွေရန်...',
        'search_results' => 'ရှာဖွေမှု ရလဒ်များ',
        'name' => 'အမည်',
        'price' => 'စျေးနှုန်း ($)',
        'quantity' => 'အရေအတွက်',
        'action' => 'လုပ်ဆောင်ချက်',
        'no_items' => 'ကုန်ပစ္စည်းမရှိပါ',
        'current_products' => 'လက်ရှိ ပစ္စည်းများ',
        'sort_by_price' => 'စျေးနှုန်းအလိုက် စီရန်',
        'sort_by_quantity' => 'အရေအတွက်အလိုက် စီရန်',
        'add_new_item' => 'ပစ္စည်းအသစ် ထည့်ရန်',
        'item_name' => 'ပစ္စည်းအမည်',
        'add_item' => 'ပစ္စည်းထည့်ရန်',
        'add_request' => 'တောင်းဆိုမှုကို တန်းစီရန်',
        'request_type' => 'တောင်းဆိုမှု အမျိုးအစား',
        'restock' => 'ပစ္စည်းဖြည့်ရန်',
        'order' => 'မှာယူရန်',
        'add_to_queue' => 'ဖြည့်ရန်',
        'request_queue' => 'တောင်းဆိုမှု တန်းစီ',
        'process_queue' => 'လုပ်ငန်းစဉ် တန်းစီ',
        'no_pending_requests' => 'ဆောင်ရွက်ရန် ကျန်ရှိသော တောင်းဆိုမှုများ မရှိပါ',
        'type' => 'အမျိုးအစား',
        'item' => 'ပစ္စည်း',
        'qty' => 'အရေအတွက်',
        'recently_processed' => 'မကြာသေးမီက လုပ်ဆောင်ခဲ့သည်:',
        'operation_history' => 'လုပ်ဆောင်မှု မှတ်တမ်း',
        'undo_last_action' => 'နောက်ဆုံးလုပ်ဆောင်မှုကို ပြန်ဖျက်ရန်',
        'undo_description' => 'သင့်နောက်ဆုံး ကုန်ပစ္စည်း လုပ်ဆောင်မှုကို ပြန်ဖျက်ရန် အထက်ခလုတ်ကို နှိပ်ပါ။',
        'stack_description' => 'ဤသည်မှာ လုပ်ဆောင်မှု မှတ်တမ်းအတွက် stack data structure (LIFO) ကို အသုံးပြုသည်။',
        'big_o_analysis' => 'Big-O ဆန်းစစ်လေ့လာမှု',
        'data_structures' => 'ဒေတာဖွဲ့စည်းပုံ:',
        'mysql_tables' => 'ထိရောက်သော ဒေတာ စီမံခန့်ခွဲမှုအတွက် MySQL ဇယားများ',
        'operations' => 'လုပ်ဆောင်ချက်များ:',
        'add_item_o' => 'ပစ္စည်းထည့်ရန်: O(1)',
        'remove_item_o' => 'ပစ္စည်းဖယ်ရှားရန်: O(1)',
        'search_o' => 'ရှာဖွေရန်: O(n)',
        'sort_o' => 'စီစဉ်ရန်: O(n log n)',
        'process_requests_o' => 'တောင်းဆိုမှုများကို လုပ်ဆောင်ရန်: O(n)',
        'copyright' => '© 2025 Naing Zwe Htut, Myat Thu Hein, Thaw Zin Linn Htet. မူပိုင်ခွင့်အားလုံး ရယူထားသည်',
        'dark_mode' => 'အမှောင်',
        'light_mode' => 'အလင်း',
        'language' => 'ဘာသာစကား'
    ]
];

// Get current language translations
$lang = $translations[$_SESSION['language']];

// Database configuration
$dbConfig = [
    'host' => getenv('MYSQLHOST') ?: 'localhost',
    'port' => (int) (getenv('MYSQLPORT') ?: 3306),
    'username' => getenv('MYSQLUSER') ?: 'root',
    'password' => getenv('MYSQLPASSWORD') ?: '',
    'database' => getenv('MYSQLDATABASE') ?: 'inventory_system'
];

// Connect to database
function connectDB() {
    global $dbConfig;
    $conn = new mysqli(
        $dbConfig['host'],
        $dbConfig['username'],
        $dbConfig['password'],
        $dbConfig['database'],
        $dbConfig['port']
    );
    
    if ($conn->connect_error) {
        error_log('Database connection failed: ' . $conn->connect_error);
        http_response_code(500);
        die('Database connection failed. Check the server configuration.');
    }

    $conn->set_charset('utf8mb4');
    
    return $conn;
}

// Initialize database tables if they don't exist
function initializeDB() {
    $conn = connectDB();
    
    // Create items table
    $sql = "CREATE TABLE IF NOT EXISTS items (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10,2) NOT NULL,
        quantity INT(11) NOT NULL
    )";
    $conn->query($sql);
    
    // Create operations table for undo functionality
    $sql = "CREATE TABLE IF NOT EXISTS operations (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        type ENUM('ADD', 'REMOVE') NOT NULL,
        item_id INT(11),
        item_name VARCHAR(255) NOT NULL,
        item_price DECIMAL(10,2) NOT NULL,
        item_quantity INT(11) NOT NULL,
        position INT(11),
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($sql);
    
    // Create requests table for queue
    $sql = "CREATE TABLE IF NOT EXISTS requests (
        id INT(11) PRIMARY KEY AUTO_INCREMENT,
        type ENUM('RESTOCK', 'ORDER') NOT NULL,
        item_name VARCHAR(255) NOT NULL,
        quantity INT(11) NOT NULL,
        status ENUM('PENDING', 'PROCESSED') DEFAULT 'PENDING',
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($sql);
    
    // Check if items table is empty, if so add sample data
    $result = $conn->query("SELECT COUNT(*) as count FROM items");
    $row = $result->fetch_assoc();
    
    if ($row['count'] == 0) {
        // Add sample items
        $sampleItems = [
            ['Laptop', 1200.00, 15],
            ['Smartphone', 800.00, 25],
            ['Headphones', 150.00, 30],
            ['Monitor', 350.00, 10],
            ['Keyboard', 80.00, 40]
        ];
        
        $stmt = $conn->prepare("INSERT INTO items (name, price, quantity) VALUES (?, ?, ?)");
        
        foreach ($sampleItems as $item) {
            $stmt->bind_param("sdi", $item[0], $item[1], $item[2]);
            $stmt->execute();
        }
        
        $stmt->close();
    }
    
    $conn->close();
}

// Initialize database
initializeDB();

// Function to get all items
function getInventory($sortField = null, $sortOrder = null) {
    $conn = connectDB();
    
    $sql = "SELECT * FROM items";
    
    if ($sortField && in_array($sortField, ['name', 'price', 'quantity'])) {
        $sql .= " ORDER BY " . $sortField;
        if ($sortOrder && in_array(strtoupper($sortOrder), ['ASC', 'DESC'])) {
            $sql .= " " . strtoupper($sortOrder);
        }
    }
    
    $result = $conn->query($sql);
    $items = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    
    $conn->close();
    return $items;
}

// Function to add an item
function addItem($name, $price, $quantity) {
    $conn = connectDB();
    
    // Add item to inventory
    $stmt = $conn->prepare("INSERT INTO items (name, price, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $name, $price, $quantity);
    $stmt->execute();
    
    $itemId = $conn->insert_id;
    
    // Log operation for undo functionality
    $stmt = $conn->prepare("INSERT INTO operations (type, item_id, item_name, item_price, item_quantity, position) VALUES ('ADD', ?, ?, ?, ?, -1)");
    $stmt->bind_param("isdi", $itemId, $name, $price, $quantity);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
    
    return $itemId;
}

// Function to remove an item
function removeItem($id) {
    $conn = connectDB();
    
    // Get item details before removal
    $stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
        
        // Get the position of the item (for undo)
        $positionResult = $conn->query("SELECT COUNT(*) as position FROM items WHERE id <= $id");
        $position = $positionResult->fetch_assoc()['position'] - 1;
        
        // Log operation for undo functionality
        $stmt = $conn->prepare("INSERT INTO operations (type, item_id, item_name, item_price, item_quantity, position) VALUES ('REMOVE', ?, ?, ?, ?, ?)");
        $stmt->bind_param("isdii", $item['id'], $item['name'], $item['price'], $item['quantity'], $position);
        $stmt->execute();
        
        // Remove the item
        $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $stmt->close();
        $conn->close();
        
        return $item;
    }
    
    $stmt->close();
    $conn->close();
    
    return null;
}

// Function to search for items (Linear Search - O(n))
function linearSearch($keyword) {
    $conn = connectDB();
    
    $stmt = $conn->prepare("SELECT * FROM items WHERE name LIKE ?");
    $searchParam = "%" . $keyword . "%";
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $items = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    
    $stmt->close();
    $conn->close();
    
    return $items;
}

// Function to add a request to the queue
function addRequest($type, $itemName, $quantity) {
    $conn = connectDB();
    
    $stmt = $conn->prepare("INSERT INTO requests (type, item_name, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $type, $itemName, $quantity);
    $stmt->execute();
    
    $requestId = $conn->insert_id;
    
    $stmt->close();
    $conn->close();
    
    return $requestId;
}

// Function to process requests (FIFO queue)
function processRequests() {
    $conn = connectDB();
    
    // Get all pending requests ordered by timestamp (FIFO)
    $result = $conn->query("SELECT * FROM requests WHERE status = 'PENDING' ORDER BY timestamp ASC");
    
    $processedRequests = [];
    
    if ($result->num_rows > 0) {
        while ($request = $result->fetch_assoc()) {
            // Process request based on type
            switch ($request['type']) {
                case 'RESTOCK':
                    // Find item in inventory and update quantity
                    $stmt = $conn->prepare("UPDATE items SET quantity = quantity + ? WHERE name = ?");
                    $stmt->bind_param("is", $request['quantity'], $request['item_name']);
                    $stmt->execute();
                    
                    if ($stmt->affected_rows > 0) {
                        $request['status'] = 'Restocked ' . $request['quantity'] . ' ' . $request['item_name'];
                    } else {
                        $request['status'] = 'Item not found: ' . $request['item_name'];
                    }
                    break;
                    
                case 'ORDER':
                    // Find item and check if we have enough quantity
                    $stmt = $conn->prepare("SELECT quantity FROM items WHERE name = ?");
                    $stmt->bind_param("s", $request['item_name']);
                    $stmt->execute();
                    $result2 = $stmt->get_result();
                    
                    if ($result2->num_rows > 0) {
                        $item = $result2->fetch_assoc();
                        
                        if ($item['quantity'] >= $request['quantity']) {
                            // Update quantity
                            $stmt = $conn->prepare("UPDATE items SET quantity = quantity - ? WHERE name = ?");
                            $stmt->bind_param("is", $request['quantity'], $request['item_name']);
                            $stmt->execute();
                            
                            $request['status'] = 'Ordered ' . $request['quantity'] . ' ' . $request['item_name'];
                        } else {
                            $request['status'] = 'Insufficient quantity for ' . $request['item_name'] . 
                                '. Available: ' . $item['quantity'];
                        }
                    } else {
                        $request['status'] = 'Item not found: ' . $request['item_name'];
                    }
                    break;
            }
            
            // Mark request as processed
            $stmt = $conn->prepare("UPDATE requests SET status = 'PROCESSED' WHERE id = ?");
            $stmt->bind_param("i", $request['id']);
            $stmt->execute();
            
            $processedRequests[] = $request;
        }
    }
    
    $conn->close();
    return $processedRequests;
}

// Function to undo last operation
function undoLastOperation() {
    $conn = connectDB();
    
    // Get the last operation
    $result = $conn->query("SELECT * FROM operations ORDER BY id DESC LIMIT 1");
    
    if ($result->num_rows > 0) {
        $operation = $result->fetch_assoc();
        
        switch ($operation['type']) {
            case 'ADD':
                // Remove the added item
                $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
                $stmt->bind_param("i", $operation['item_id']);
                $stmt->execute();
                break;
                
            case 'REMOVE':
                // Add back the removed item
                $stmt = $conn->prepare("INSERT INTO items (name, price, quantity) VALUES (?, ?, ?)");
                $stmt->bind_param("sdi", $operation['item_name'], $operation['item_price'], $operation['item_quantity']);
                $stmt->execute();
                break;
        }
        
        // Remove the operation from the history
        $stmt = $conn->prepare("DELETE FROM operations WHERE id = ?");
        $stmt->bind_param("i", $operation['id']);
        $stmt->execute();
        
        $conn->close();
        return $operation;
    }
    
    $conn->close();
    return null;
}

// Function to get all pending requests
function getPendingRequests() {
    $conn = connectDB();
    
    $result = $conn->query("SELECT * FROM requests WHERE status = 'PENDING' ORDER BY timestamp ASC");
    
    $requests = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
    }
    
    $conn->close();
    return $requests;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add_item':
                addItem($_POST['name'], $_POST['price'], $_POST['quantity']);
                $_SESSION['message'] = 'Item added successfully!';
                break;
                
            case 'remove_item':
                $removedItem = removeItem($_POST['item_id']);
                if ($removedItem) {
                    $_SESSION['message'] = 'Item removed successfully!';
                } else {
                    $_SESSION['message'] = 'Item not found!';
                }
                break;
                
            case 'add_request':
                addRequest($_POST['request_type'], $_POST['item_name'], $_POST['quantity']);
                $_SESSION['message'] = 'Request added to queue!';
                break;
                
            case 'process_requests':
                $processedRequests = processRequests();
                $_SESSION['message'] = count($processedRequests) . ' requests processed!';
                $_SESSION['processed_requests'] = $processedRequests;
                break;
                
            case 'undo':
                $operation = undoLastOperation();
                if ($operation) {
                    $_SESSION['message'] = 'Last operation undone!';
                } else {
                    $_SESSION['message'] = 'No operations to undo!';
                }
                break;
        }
    }
    
    // Only redirect if it's not a language or dark mode toggle
    if (!isset($_POST['set_language']) && !isset($_POST['toggle_dark_mode'])) {
        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Get inventory for display
$sortField = isset($_GET['sort']) ? $_GET['sort'] : null;
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';
$inventory = getInventory($sortField, $sortOrder);

// Get search results if search is performed
$searchResults = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchResults = linearSearch($_GET['search']);
}

// Get pending requests
$pendingRequests = getPendingRequests();

// Track coding time and statistics
if (!isset($_SESSION['last_action_time'])) {
    $_SESSION['last_action_time'] = time();
    $_SESSION['code_sessions'] = 0;
    $_SESSION['lines_written'] = 0;
    $_SESSION['streak_days'] = 1;
    $_SESSION['last_date'] = date('Y-m-d');
} else {
    // Update coding statistics
    $current_time = time();
    $elapsed_time = $current_time - $_SESSION['last_action_time'];
    
    // If more than 5 minutes since last action, count as a new session
    if ($elapsed_time > 300) {
        $_SESSION['code_sessions']++;
        
        // If it's a new day, check streak
        if (date('Y-m-d') != $_SESSION['last_date']) {
            // If consecutive day, increase streak
            if (strtotime(date('Y-m-d')) - strtotime($_SESSION['last_date']) <= 86400) {
                $_SESSION['streak_days']++;
            } else {
                // Reset streak if gap in days
                $_SESSION['streak_days'] = 1;
            }
            $_SESSION['last_date'] = date('Y-m-d');
        }
    }
    
    // Simulate lines written (random for demonstration)
    $_SESSION['lines_written'] += rand(5, 20);
    $_SESSION['last_action_time'] = $current_time;
}


// Define dark mode styles
$darkModeClass = $_SESSION['dark_mode'] ? 'dark' : '';
?>

<!DOCTYPE html>
<html lang="<?= $_SESSION['language'] ?>" class="<?= $darkModeClass ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 Idiots Project</title>
    <link rel="icon" href="./photo_2025-04-21_17-14-16-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <style>
        /* Custom theme colors */
        :root {
            --primary-color: #4a5568;
            --secondary-color: #667eea;
            --accent-color: #48bb78;
            --background-color: #f7fafc;
            --text-color: #2d3748;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
        }
        
        .dark {
            --primary-color: #a0aec0;
            --secondary-color: #7f9cf5;
            --accent-color: #68d391;
            --background-color: #1a202c;
            --text-color: #e2e8f0;
            --card-bg: #2d3748;
            --border-color: #4a5568;
        }
        
        body {
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        
        th {
            background-color: var(--primary-color);
            color: white;
        }
        
        tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .dark tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-color);
        }
        
        .btn-danger {
            background-color: #e53e3e;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c53030;
        }
        
        .btn-success {
            background-color: var(--accent-color);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #38a169;
        }
        
        .form-control {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 0.25rem;
            background-color: var(--card-bg);
            color: var(--text-color);
        }
        
        /* Pet animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        .pet-container {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Message alert */
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 0.25rem;
            background-color: #ebf8ff;
            border-left: 4px solid #4299e1;
            color: #2b6cb0;
        }
        
        /* Dark mode toggle animations */
        .toggle-circle {
            transition: transform 0.3s ease;
        }
        
        input:checked ~ .toggle-circle {
            transform: translateX(100%);
        }
        
        /* Language selector */
        .language-selector {
            position: relative;
            display: inline-block;
        }
        
        .language-dropdown {
            display: none;
            position: absolute;
            right: 0;
            min-width: 120px;
            z-index: 10;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 0.25rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .language-selector:hover .language-dropdown {
            display: block;
        }
        
        .language-option {
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .language-option:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .dark .language-option:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <header class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold mb-4 md:mb-0"><?= $lang['inventory_manager'] ?></h1>
            
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <form method="post" class="flex items-center">
                    <input type="hidden" name="toggle_dark_mode" value="1">
                    <button type="submit" class="flex items-center">
                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                            <input type="checkbox" id="dark-mode-toggle" class="opacity-0 absolute" <?= $_SESSION['dark_mode'] ? 'checked' : '' ?>>
                            <div class="toggle-bg bg-gray-200 dark:bg-gray-700 h-6 w-11 rounded-full"></div>
                            <div class="toggle-circle absolute left-1 top-1 bg-white dark:bg-gray-300 w-4 h-4 rounded-full transition-transform duration-300 ease-in-out"></div>
                        </div>
                        <span class="text-sm">
                            <?= $_SESSION['dark_mode'] ? $lang['light_mode'] : $lang['dark_mode'] ?>
                        </span>
                    </button>
                </form>
                
                <!-- Language Selector -->
                <div class="language-selector">
                    <button class="flex items-center space-x-1">
                        <span><?= $lang['language'] ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="language-dropdown">
                        <form method="post">
                            <input type="hidden" name="set_language" value="1">
                            <button type="submit" name="language" value="en" class="language-option w-full text-left">English</button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="set_language" value="1">
                            <button type="submit" name="language" value="th" class="language-option w-full text-left">ไทย</button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="set_language" value="1">
                            <button type="submit" name="language" value="my" class="language-option w-full text-left">မြန်မာ</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert mb-6">
                <?= $_SESSION['message'] ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        
        <div class="md:grid-cols-3 gap-6">
            <!-- Virtual Pet Section -->
            
            
            <!-- Search Section -->
            <div class="card col-span-2 mx-auto w-full">
                <h2 class="text-xl font-semibold mb-4"><?= $lang['search_products'] ?></h2>
                <form method="get" class="mb-4">
                    <div class="flex space-x-6">
                        <input type="text" name="search" placeholder="<?= $lang['search_items'] ?>" class="form-control rounded-r-none" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
                        <button type="submit" class="btn btn-primary rounded-l-none"><?= $lang['search'] ?></button>
                    </div>
                </form>
                
                <?php if (!empty($searchResults)): ?>
                    <h3 class="text-lg font-medium mb-2"><?= $lang['search_results'] ?></h3>
                    <div class="overflow-x-auto">
                        <table>
                            <thead>
                                <tr>
                                    <th><?= $lang['name'] ?></th>
                                    <th><?= $lang['price'] ?></th>
                                    <th><?= $lang['quantity'] ?></th>
                                    <th><?= $lang['action'] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($searchResults as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['name']) ?></td>
                                        <td>$<?= number_format($item['price'], 2) ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td>
                                            <form method="post" class="inline">
                                                <input type="hidden" name="action" value="remove_item">
                                                <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <!-- Inventory Section -->
            <div class="card">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold"><?= $lang['current_products'] ?></h2>
                    <div class="flex space-x-2">
                        <a href="?sort=price&order=<?= ($sortField == 'price' && $sortOrder == 'asc') ? 'desc' : 'asc' ?>" class="btn btn-primary btn-sm">
                            <?= $lang['sort_by_price'] ?>
                        </a>
                        <a href="?sort=quantity&order=<?= ($sortField == 'quantity' && $sortOrder == 'asc') ? 'desc' : 'asc' ?>" class="btn btn-primary btn-sm">
                            <?= $lang['sort_by_quantity'] ?>
                        </a>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr>
                                <th><?= $lang['name'] ?></th>
                                <th><?= $lang['price'] ?></th>
                                <th><?= $lang['quantity'] ?></th>
                                <th><?= $lang['action'] ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($inventory)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4"><?= $lang['no_items'] ?></td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($inventory as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['name']) ?></td>
                                        <td>$<?= number_format($item['price'], 2) ?></td>
                                        <td><?= $item['quantity'] ?></td>
                                        <td>
                                            <form method="post" class="inline">
                                                <input type="hidden" name="action" value="remove_item">
                                                <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Inventory Chart -->
                <div class="mt-6">
                    <canvas id="inventoryChart" width="400" height="200"></canvas>
                </div>
            </div>
            
            <!-- Request Queue Section -->
            <div class="card flex flex-col space-y-16">
                <!-- Add Item Form -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium mb-2"><?= $lang['add_new_item'] ?></h3>
                    <form method="post" class="grid grid-cols-1 md:grid-cols-4 gap-2">
                        <input type="hidden" name="action" value="add_item">
                        <input type="text" name="name" placeholder="<?= $lang['item_name'] ?>" required class="form-control">
                        <input type="number" name="price" placeholder="<?= $lang['price'] ?>" step="0.01" min="0" required class="form-control">
                        <input type="number" name="quantity" placeholder="<?= $lang['quantity'] ?>" min="0" required class="form-control">
                        <button type="submit" class="btn btn-success"><?= $lang['add_item'] ?></button>
                    </form>
                    <hr class="mt-6">
                </div>
                
                
                <!-- Add Request Form -->
                <div class="mb-4">
                <h2 class="text-xl font-semibold mb-4"><?= $lang['request_queue'] ?></h2>
                    <h3 class="text-lg font-medium mb-2"><?= $lang['add_request'] ?></h3>
                    <form method="post" class="grid grid-cols-1 md:grid-cols-4 gap-2">
                        <input type="hidden" name="action" value="add_request">
                        <select name="request_type" class="form-control">
                            <option value="RESTOCK"><?= $lang['restock'] ?></option>
                            <option value="ORDER"><?= $lang['order'] ?></option>
                        </select>
                        <input type="text" name="item_name" placeholder="<?= $lang['item_name'] ?>" required class="form-control">
                        <input type="number" name="quantity" placeholder="<?= $lang['quantity'] ?>" min="1" required class="form-control">
                        <button type="submit" class="btn btn-success"><?= $lang['add_to_queue'] ?></button>
                    </form>
                    <hr class="mt-6">
                </div>
                
                <!-- Pending Requests Table -->
                <div class="overflow-x-auto">
                    <h3 class="text-lg font-medium mb-2"><?= $lang['requested_queue'] ?></h3>
                    <table class="mb-4">
                        <thead>
                            <tr>
                                <th><?= $lang['type'] ?></th>
                                <th><?= $lang['item'] ?></th>
                                <th><?= $lang['qty'] ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($pendingRequests)): ?>
                                <tr>
                                    <td colspan="3" class="text-center py-4"><?= $lang['no_pending_requests'] ?></td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($pendingRequests as $request): ?>
                                    <tr>
                                        <td><?= $request['type'] === 'RESTOCK' ? $lang['restock'] : $lang['order'] ?></td>
                                        <td><?= htmlspecialchars($request['item_name']) ?></td>
                                        <td><?= $request['quantity'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- Process Queue Button -->
                    <form method="post">
                        <input type="hidden" name="action" value="process_requests">
                        <button type="submit" class="btn btn-primary w-full"><?= $lang['process_queue'] ?></button>
                        <hr class="mt-6">
                    </form>
                </div>
                
                
                <!-- Recently Processed Requests -->
                <?php if (isset($_SESSION['processed_requests']) && !empty($_SESSION['processed_requests'])): ?>
                    <div class="mt-4">
                        <h3 class="text-lg font-medium mb-2"><?= $lang['recently_processed'] ?></h3>
                        <ul class="list-disc pl-5">
                            <?php foreach ($_SESSION['processed_requests'] as $request): ?>
                                <li><?= htmlspecialchars($request['status']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php unset($_SESSION['processed_requests']); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Operation History Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-medium mb-2"><?= $lang['operation_history'] ?></h3>
                    <form method="post" class="mb-2">
                        <input type="hidden" name="action" value="undo">
                        <button type="submit" class="btn btn-primary"><?= $lang['undo_last_action'] ?></button>
                    </form>
                    <p class="text-sm"><?= $lang['undo_description'] ?></p>
                    <p class="text-sm mt-1"><?= $lang['stack_description'] ?></p>
                </div>
            </div>
        </div>
        
        <!-- Big-O Analysis Section -->
        <div class="card mt-6 flex flex-col items-start" style="width: 30%; margin:auto; margin-top: 20px;">
            <h2 class="text-xl font-bold mb-4 text-center "><?= $lang['big_o_analysis'] ?></h2>
            <div class="flex flex-col justify-start">
                <div>
                    <h3 class="text-lg font-medium mb-2"><?= $lang['data_structures'] ?></h3>
                    <ul >
                        <li><?= $lang['mysql_tables'] ?></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-medium mb-2"><?= $lang['operations'] ?></h3>
                    <ul class="list-disc ml-4" >
                        <li><?= $lang['add_item_o'] ?></li>
                        <li><?= $lang['remove_item_o'] ?></li>
                        <li><?= $lang['search_o'] ?></li>
                        <li><?= $lang['sort_o'] ?></li>
                        <li><?= $lang['process_requests_o'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <footer class="mt-8 text-center text-sm text-gray-500 dark:text-gray-400">
            <p><?= $lang['copyright'] ?></p>
        </footer>
    </div>
    
    <script>
        // Initialize inventory chart
        const inventoryChart = document.getElementById('inventoryChart').getContext('2d');
        const isDarkMode = document.documentElement.classList.contains('dark');
        const textColor = isDarkMode ? '#e2e8f0' : '#2d3748';
        
        new Chart(inventoryChart, {
            type: 'bar',
            data: {
                labels: [<?php echo implode(',', array_map(function($item) { return '"' . addslashes($item['name']) . '"'; }, $inventory)); ?>],
                datasets: [{
                    label: 'Quantity',
                    data: [<?php echo implode(',', array_map(function($item) { return $item['quantity']; }, $inventory)); ?>],
                    backgroundColor: 'rgba(102, 126, 234, 0.6)',
                    borderColor: 'rgba(102, 126, 234, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: textColor
                        },
                        grid: {
                            color: isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        ticks: {
                            color: textColor
                        },
                        grid: {
                            color: isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: textColor
                        }
                    }
                }
            }
        });
        
        // Toggle dark mode
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        darkModeToggle.addEventListener('change', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>
</html>
