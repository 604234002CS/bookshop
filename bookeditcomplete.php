<?php
    require 'db.php';
    $sql = "update books set BookName='" . $_POST[ 'BookName' ] . "', CategoryID='" . $_POST[ 'CategoryName' ]. "', AuthorID='" . $_POST[ 'AuthorName' ]. "', PublisherID='" .$_POST['PublisherName']. "', BookDescription='" .$_POST['BookDescription']. "', BookPrice='".$_POST['BookPrice']. "', BookNumPages='". $_POST['BookNumPages'] . "', BookISBN='" . $_POST['BookISBN'] . "', BookStatus='" . $_POST['BookStatus'] ."' where BookID=" . $_POST["id"];
    $statement=$connection->prepare($sql);
    $statement->execute();

    $sql = "SELECT * FROM books
    INNER JOIN authors ON books.AuthorID = authors.AuthorID
    INNER JOIN categories ON books.CategoryID = categories.CategoryID
    INNER JOIN publishers ON books.PublisherID = publishers.PublisherID
    WHERE BookId=" . $_POST['id'];
    $statement = $connection->prepare($sql);
    $statement->execute();
    $book = $statement->fetchAll();
?>

<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class ="card-header">
            <h2>ข้อมูลหนังสือ</h2>
        </div>
        <div class="card-body">
            <form action="bookeditcomplete.php" method="post">
                <?php foreach($book as $rows): ?>
                    <div class="form-group row">
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <label for="BookName" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" value="<?php echo $rows['BookName'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CategoryName" class="col-sm-2 col-form-label">ประเภทหนังสือ</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control-plaintext" value="<?php echo $rows['CategoryName'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="AuthorName" class="col-sm-2 col-form-label">ผู้แต่ง</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control-plaintext" value="<?php echo $rows['AuthorName'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="PublisherName" class="col-sm-2 col-form-label">สำนักพิมพ์</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control-plaintext" value="<?php echo $rows['PublisherName'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookDescription" class="col-sm-2 col-form-label">คำอธิบาย</label>
                        <div class="col-sm-10">
                            <textarea class="form-control-plaintext" cols="100" rows="6" readonly><?php echo $rows['BookDescription']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookPrice" class="col-sm-2 col-form-label">ราคา</label>
                        <div class="col-sm-10">
                            <input class="form-control-plaintext" value="<?php echo $rows['BookPrice']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookNumPages" class="col-sm-2 col-form-label">จำนวนหน้า</label>
                        <div class="col-sm-10">
                            <input class="form-control-plaintext" value="<?php echo $rows['BookNumPages']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookISBN" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input class="form-control-plaintext" type="text" value="<?php echo $rows['BookISBN']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inlineRadioOptions" class="col-sm-2 col-form-label">สถานะการขาย</label>
                        <div class="col-sm-10">
                            <?php if($rows['BookStatus'] == 1) { ?>
                                <input class="form-control-plaintext" type="text" value="ปกติ" readonly>
                            <?php } else { ?>
                                <input class="form-control-plaintext" type="text" value="เลิกจำหน่าย" readonly>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</div>