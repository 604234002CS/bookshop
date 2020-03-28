<?php
    require 'db.php';
    $sql = "SELECT BookId, BookName, AuthorName, CategoryName, PublisherName, BookPrice, BookStatus FROM books
    INNER JOIN authors ON books.AuthorID = authors.AuthorID
    INNER JOIN categories ON books.CategoryID = categories.CategoryID
    INNER JOIN publishers ON books.PublisherID = publishers.PublisherID
    ORDER BY BookId";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $books = $statement->fetchAll();
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class ="card-header">
            <h2>ข้อมูลหนังสือ</h2>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#AddBook" style="float: right; margin-bottom: 15px;">
                เพิ่มหนังสือ
            </button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้แต่ง</th>
                        <th>ประเภทหนังสือ</th>
                        <th>สำนักพิมพ์</th>
                        <th>ราคา</th>
                        <th>สถานะการขาย</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($books as $rows): ?>
                    <tr>
                        <td><?php echo $rows["BookName"]; ?></td>
                        <td><?php echo $rows["AuthorName"]; ?></td>
                        <td><?php echo $rows["CategoryName"]; ?></td>
                        <td><?php echo $rows["PublisherName"]; ?></td>
                        <td><?php echo $rows["BookPrice"]; ?></td>
                        <?php if ($rows["BookStatus"] == 1){ ?>
                            <td>ปกติ</td>
                        <?php } else { ?>
                            <td>ยกเลิกการขาย</td>
                        <?php } ?>
                        <td><a href="bookedit.php?id=<?php echo $rows['BookId']; ?>" class="btn btn-outline-warning">แก้ไข</a></td>
                        <td><a href="delete.php?id=<?php echo $rows['BookId']; ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this entry?')">ลบ</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="AddBook" tabindex="-1" role="dialog" aria-labelledby="AddBook" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มหนังสือ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="insert.php" method="post">
                    <div class="form-group row">
                        <label for="BookName" class="col-sm-2 col-form-label">ชื่อหนังสือ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="BookName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CategoryName" class="col-sm-2 col-form-label">ประเภทหนังสือ</label>
                        <div class="col-sm-5">
                            <select name="CategoryName" required>
                                <option value="1">นิยาย</option>
                                <option value="2">จิตวิทยา/พัฒนาตนเอง</option>
                                <option value="3">อาหารและสุขภาพ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="AuthorName" class="col-sm-2 col-form-label">ผู้แต่ง</label>
                        <div class="col-sm-5">
                            <select name="AuthorName" required>
                                <option value="1">Haruki Murakami</option>
                                <option value="2">Malcolm Gladwell</option>
                                <option value="3">Meg Jay</option>
                                <option value="4">นายแพทย์จางเหวินหง</option>
                                <option value="5">Charles Duhigg</option>
                                <option value="6">Higashino Keigo</option>
                                <option value="7">Matthew Walker</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="PublisherName" class="col-sm-2 col-form-label">สำนักพิมพ์</label>
                        <div class="col-sm-5">
                            <select name="PublisherName" required>
                                <option value="1">สำนักพิมพ์กำมะหยี่</option>
                                <option value="2">สำนักพิมพ์วีเลิร์น</option>
                                <option value="3">สำนักพิมพ์ Amarin Health</option>
                                <option value="4">น้ำพุสำนักพิมพ์</option>
                                <option value="5">บุ๊คสเคป</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookDescription" class="col-sm-2 col-form-label">คำอธิบาย</label>
                        <div class="col-sm-10">
                            <textarea name="BookDescription" cols="50" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookPrice" class="col-sm-2 col-form-label">ราคา</label>
                        <div class="col-sm-10">
                            <input type="number" name="BookPrice" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookNumPages" class="col-sm-2 col-form-label">จำนวนหน้า</label>
                        <div class="col-sm-10">
                            <input type="number" name="BookNumPages" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="BookISBN" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" name="BookISBN" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inlineRadioOptions" class="col-sm-2 col-form-label">สถานะการขาย</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="BookStatus" value="1" checked>
                                <label class="form-check-label" for="radio1">ปกติ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="BookStatus" value="0">
                                <label class="form-check-label" for="radio12">เลิกจำหน่าย</label>
                            </div>
                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <button class="btn btn-outline-success btn-block" type="submit">บันทึก</button>
                    </div>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>