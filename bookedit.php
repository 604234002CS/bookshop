<?php
    require 'db.php';
    $sql = "SELECT * FROM books
    INNER JOIN authors ON books.AuthorID = authors.AuthorID
    INNER JOIN categories ON books.CategoryID = categories.CategoryID
    INNER JOIN publishers ON books.PublisherID = publishers.PublisherID
    WHERE BookId=" . $_GET['id'];
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
                        <label for="BookName" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="BookName" value="<?php echo $rows['BookName'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CategoryName" class="col-sm-2 col-form-label">ประเภทหนังสือ</label>
                        <div class="col-sm-5">
                            <select name="CategoryName" >
                                <option value="1" <?php if($rows['CategoryID'] == 1){ echo "selected"; } ?>>นิยาย</option>
                                <option value="2" <?php if($rows['CategoryID'] == 2){ echo "selected"; } ?>>จิตวิทยา/พัฒนาตนเอง</option>
                                <option value="3" <?php if($rows['CategoryID'] == 3){ echo "selected"; } ?>>อาหารและสุขภาพ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="AuthorName" class="col-sm-2 col-form-label">ผู้แต่ง</label>
                        <div class="col-sm-5">
                            <select name="AuthorName" >
                                <option value="1" <?php if($rows['AuthorID'] == 1){ echo "selected"; } ?>>Haruki Murakami</option>
                                <option value="2" <?php if($rows['AuthorID'] == 2){ echo "selected"; } ?>>Malcolm Gladwell</option>
                                <option value="3" <?php if($rows['AuthorID'] == 3){ echo "selected"; } ?>>Meg Jay</option>
                                <option value="4" <?php if($rows['AuthorID'] == 4){ echo "selected"; } ?>>นายแพทย์จางเหวินหง</option>
                                <option value="5" <?php if($rows['AuthorID'] == 5){ echo "selected"; } ?>>Charles Duhigg</option>
                                <option value="6" <?php if($rows['AuthorID'] == 6){ echo "selected"; } ?>>Higashino Keigo</option>
                                <option value="7" <?php if($rows['AuthorID'] == 7){ echo "selected"; } ?>>Matthew Walker</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="PublisherName" class="col-sm-2 col-form-label">สำนักพิมพ์</label>
                        <div class="col-sm-5">
                            <select name="PublisherName" >
                                <option value="1" <?php if($rows['PublisherID'] == 1){ echo "selected"; } ?>>สำนักพิมพ์กำมะหยี่</option>
                                <option value="2" <?php if($rows['PublisherID'] == 2){ echo "selected"; } ?>>สำนักพิมพ์วีเลิร์น</option>
                                <option value="3" <?php if($rows['PublisherID'] == 3){ echo "selected"; } ?>>สำนักพิมพ์ Amarin Health</option>
                                <option value="4" <?php if($rows['PublisherID'] == 4){ echo "selected"; } ?>>น้ำพุสำนักพิมพ์</option>
                                <option value="5" <?php if($rows['PublisherID'] == 5){ echo "selected"; } ?>>บุ๊คสเคป</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookDescription" class="col-sm-2 col-form-label">คำอธิบาย</label>
                        <div class="col-sm-10">
                            <textarea name="BookDescription" cols="100" rows="6" ><?php echo $rows['BookDescription']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookPrice" class="col-sm-2 col-form-label">ราคา</label>
                        <div class="col-sm-10">
                            <input type="number" name="BookPrice" value="<?php echo $rows['BookPrice']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookNumPages" class="col-sm-2 col-form-label">จำนวนหน้า</label>
                        <div class="col-sm-10">
                            <input type="number" name="BookNumPages" value="<?php echo $rows['BookNumPages']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookISBN" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" name="BookISBN" value="<?php echo $rows['BookISBN']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inlineRadioOptions" class="col-sm-2 col-form-label">สถานะการขาย</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="BookStatus" value="1" <?php if($rows['BookStatus'] == 1){ echo "checked"; } ?>>
                                <label class="form-check-label" for="radio1">ปกติ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="BookStatus" value="0" <?php if($rows['BookStatus'] == 0){ echo "checked"; } ?>>
                                <label class="form-check-label" for="radio12">เลิกจำหน่าย</label>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <button class="btn btn-outline-success btn-block" type="submit">บันทึก</button>
                    </div>
                    <div class="col-sm-2">
                    <a href="booklist.php" class="btn btn-outline-danger btn-block">ยกเลิก</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>